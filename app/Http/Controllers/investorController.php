<?php

namespace App\Http\Controllers;

use DB;
use App\State;
use App\County;
use App\Zipcode;
use App\Property;
use App\Proposal;
use App\PropertyProposal;
use App\User;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Auth;
use SplFileInfo;
use App\Notification;
use Pusher\Pusher;

class investorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if(isset($_GET['event']) && $_GET['event'] == 'signing_complete'){
            $basePath = ENV('DOCUSIGN_BASEPATH');
            $accountid = ENV('DOCUSIGN_ACCOUNTID');
            $username = ENV('DOCUSIGN_USERNAME');
            $password = ENV('DOCUSIGN_PASSWORD');
            $integrator_key = ENV('DOCUSIGN_INTEGRATOR_KEY');


            $config = new \DocuSign\eSign\Configuration();
            $config->setHost($basePath);
            $config->addDefaultHeader("X-DocuSign-Authentication", "{\"Username\":\"" . $username . "\",\"Password\":\"" . $password . "\",\"IntegratorKey\":\"" . $integrator_key . "\"}");
            $apiClient = new \DocuSign\eSign\Client\ApiClient($config);
            $envelopeApi = new \DocuSign\eSign\Api\EnvelopesApi($apiClient);

            $results2 = $envelopeApi->getDocument($accountid, 'combined', Auth::user()->envelope_id);
            $fileinfo = new SplFileInfo($results2->getRealPath());
            file_put_contents("signed_documents/".Auth::user()->id.".pdf", file_get_contents($fileinfo));

            $options = array(
                'cluster' => 'ap2',
                'encrypted' => true
            );

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'), $options
            );

            $admin_id = 1;
            $admin = User::where('status', 1)->whereHas('roles',function ($q) {$q->where('roles.id', 4);})->first();
            if(!empty($admin))
            {
                $admin_id = $admin->id;
            }

            //$pusher->trigger('notification', $admin_id, 'Investor '.Auth::user()->first_name.' '.Auth::user()->last_name.' has signed document.');

            Notification::create(['user_id'=>$admin_id,'link'=>'#',
            'text'=>'Investor '.Auth::user()->first_name.' '.Auth::user()->last_name." has signed document.",'type'=>2]);
        }
        else if(isset($_GET['event']) && $_GET['event'] == 'decline'){
            if($user->hasRole('role') == 1){
                $file_name = 'PROMISSORY_NOTE_SAMPLE_Seller.docx';
            }
            else if($user->hasRole('role') == 2){
                $file_name = 'PROMISSORY_NOTE_SAMPLE_Realtor.docx';
            }
            else if($user->hasRole('role') == 3){
                $file_name = 'PROMISSORY_NOTE_SAMPLE_Investor.docx';
            }
            else{
                $file_name = 'PROMISSORY_NOTE_SAMPLE_Investor.docx';
            }
            
            $response = $this->send_document_for_signing($file_name,$user->first_name." ".$user->last_name,$user->email);
            User::where('id', $user->id)->update(['envelope_id' => $response['envelope_id']]);

            Auth::logout();
            return redirect('/login');

        }
        else if(isset($_GET['event']) && $_GET['event'] == 'viewing_complete'){
            Auth::logout();
            return redirect('/login');
        }
        $properties = Property::where('acceptance_level', 5)->where('approved', 1)->where('property_state', '=', 0)->get();
        $zipcodes = Zipcode::all();
        $states = State::orderBy('state','asc')->get();
        $counties = County::orderBy('county','asc')->get();

        return view('investor.index', compact('properties', 'zipcodes', 'states', 'counties'));
    }

    public function showProperty($id)
    {
        $property = Property::where('id', $id)->first();
        return view('investor.property.property-detail', compact('property'));
    }

    public function showProposals()
    {
        // $proposals = array();
        // $props = Proposal::where('user_id', auth()->user()->id)->get();
        // foreach($props as $proposal){
        //     $arr = array();
        //     $arr['id'] = $proposal->id;
        //     $arr['user_id'] = $proposal->user_id;
        //     $arr['property_id'] = $proposal->property_id;
        //     $arr['file'] = $proposal->file;
        //     $arr['approved'] = $proposal->approved;
        //     $arr['status'] = $proposal->status;
        //     $arr['created_at'] = $proposal->created_at;
        //     $arr['updated_at'] = $proposal->updated_at;
        //     $arr['image'] = Property::where('id', $proposal->property_id)->first();
        //     array_push($proposals,$arr);
        // }

        $proposalsLists = PropertyProposal::Select('pp2.*', DB::raw('(pp2.arv - (pp2.brv + pp2.est_repair_cost)) as total_projected_profit'), DB::raw('(((pp2.arv - (pp2.brv + pp2.est_repair_cost)) * pp2.investor_share)/100) as investor_share_profit'), DB::raw('((pp2.arv - (pp2.brv + pp2.est_repair_cost)) * (pp2.investor_share/100)/ pp2.est_repair_cost) as investor_roi'))
                            ->join(DB::raw("(SELECT from_user, to_user, property_id, max(investor_share) as investor_share, arv, brv, est_repair_cost, SUM(CASE WHEN is_read = '0' && to_user = ".auth()->user()->id." THEN 1 ELSE 0 END) as unread_proposals FROM property_proposals WHERE property_proposals.to_user = ".auth()->user()->id." OR property_proposals.from_user = ".auth()->user()->id." GROUP BY property_id ORDER BY investor_share DESC) pp2"), function($join){
                                $join->on("property_proposals.from_user", "=", "pp2.from_user");
                            }, 'inner')
                            ->join('property_details as pd', 'pp2.property_id', '=', 'pd.property_id')
                            ->groupBy("pp2.property_id")
                            ->orderBy("pp2.investor_share", "DESC")
                            ->get();

        
        // $acceptedProposal = PropertyProposal::where(['property_id' => $property_id, 'is_accepted' => "1"])->first();

        return view('investor.all-proposal', compact('proposalsLists'));
    }

    public function showPropertyProposals($id)
    {
        $property = Property::where('id', $id)->first();

        $accepted_proposal = PropertyProposal::select('is_accepted', 'from_user', 'to_user')
                                                ->where(['property_id' => $id, 'is_accepted' => '1'])
                                                ->first();

        return view('investor.property.all-proposals', compact('property', 'id', 'accepted_proposal'));
    }

    public function getPropertyProposalsList(Request $request)
    {
        $property_id = $request->id;
        $user_detail = auth()->user();

        if(!empty($user_detail)){
            
            $proposals = PropertyProposal::select('property_proposals.*', DB::raw("CONCAT(u1.first_name, ' ',u1.last_name) AS sender_name"), DB::raw("CONCAT(u2.first_name, ' ',u2.last_name) AS receiver_name"))
                            ->join('users as u1', 'u1.id', '=', 'property_proposals.from_user')
                            ->join('users as u2', 'u2.id', '=', 'property_proposals.to_user')
                            ->where('property_id', $property_id)
                            ->where(function ($query) use ($user_detail) {
                                $query->where(['from_user' => $user_detail->id])
                                    ->orWhere(['to_user' => $user_detail->id]);
                            })->get();

            $max_proposal_id = PropertyProposal::select('id')
                                ->where("property_id", $property_id)
                                ->where(function ($query) use ($user_detail) {
                                    $query->orWhere(['to_user' => $user_detail->id, "from_user" => $user_detail->id]);
                                })
                                ->orderBy("investor_share", "DESC")
                                ->limit(1)
                                ->pluck('id');

            
            
            if(!empty($max_proposal_id[0]))
            {
                return response()->json(['data' => $proposals, 'max_proposal_id' => $max_proposal_id[0]]);
            }
            else
            {
                return response()->json(['data' => $proposals, 'max_proposal_id' => '']);
            }
            
        }
        else{
            return response()->json(['data' => 'You are not logged in, Please <a href="'.route('login').'">Login</a> OR sign up as <a href="' . route('seller_index') . '">Home owner</a> or <a href="' . route('investor_index') . '">Invester</a> and try again!']);
        }
    }

    public function showProposalProperty()
    {
        $proposals = Proposal::where('user_id', auth()->user()->id)->get();
        $properties = [];
        foreach ($proposals as $key => $proposal) {
            $properties[] =  Property::where('id', $proposal->property_id)->first();
        }
        return view('investor.property-proposal', compact('properties'));
    }

    public function viewDocument()
    {
        return view('investor.document');
    }
    
    public function send_document_for_signing($file_name,$name,$email){

        $basePath = config('app.basepath.DOCUSIGN_BASEPATH');
        $accountid = config('app.basepath.DOCUSIGN_ACCOUNTID');
        $username  = config('app.basepath.DOCUSIGN_USERNAME');
        $password = config('app.basepath.DOCUSIGN_PASSWORD');
        $integrator_key = config('app.basepath.DOCUSIGN_INTEGRATOR_KEY');

        # Recipient Information:
        $args['signerName'] = $name;
        $args['signerEmail'] = $email;
        # The document you wish to send. Path is relative to the root directory of this repo.
        $fileNamePath = public_path().'/documents/'.$file_name;

        # Constants
        $appPath = getcwd();
        $contentBytes = file_get_contents($fileNamePath);
        $base64FileContent =  base64_encode ($contentBytes);

        $document = new \DocuSign\eSign\Model\Document([  
            'document_base64' => $base64FileContent, 
            'name' => 'Example document', # can be different from actual file name
            'file_extension' => 'docx', # many different document types are accepted
            'document_id' => '4' # a label used to reference the doc
        ]);

        $signer = new \DocuSign\eSign\Model\Signer([ 
            'email' => $args['signerEmail'], 'name' => $args['signerName'], 'recipient_id' => "1", 'routing_order' => "1", 'client_user_id' => "1234"
        ]);

        $signHere = new \DocuSign\eSign\Model\SignHere([ 
            'document_id' => '4', 'page_number' => '1', 'recipient_id' => '1', 
            'tab_label' => 'SignHereTab', 'x_position' => '195', 'y_position' => '147'
        ]);

        //$signer->setTabs(new \DocuSign\eSign\Model\Tabs(['sign_here_tabs' => [$signHere]])); 

        $envelopeDefinition = new \DocuSign\eSign\Model\EnvelopeDefinition([
            'email_subject' => "Please sign this document",
            'documents' => [$document], # The order in the docs array determines the order in the envelope
            # The Recipients object wants arrays for each recipient type
            'recipients' => new \DocuSign\eSign\Model\Recipients(['signers' => [$signer]]), 
            'status' => "sent" # requests that the envelope be created and sent.
        ]);

        $config = new \DocuSign\eSign\Configuration();
        $config->setHost($basePath);
        $config->addDefaultHeader("X-DocuSign-Authentication", "{\"Username\":\"" . $username . "\",\"Password\":\"" . $password . "\",\"IntegratorKey\":\"" . $integrator_key . "\"}");
        //$config->addDefaultHeader("Authorization", "Bearer " . $args['accessToken']);
        $apiClient = new \DocuSign\eSign\Client\ApiClient($config);
        $envelopeApi = new \DocuSign\eSign\Api\EnvelopesApi($apiClient);


        return $results = $envelopeApi->createEnvelope($accountid, $envelopeDefinition);

        //ENVELOPE_ID = getDocuSignStatus($envelope_id)94c0808c-51ef-4ef6-8cec-f83bc57fd69a
    }

}
