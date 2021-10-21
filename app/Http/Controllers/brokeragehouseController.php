<?php

namespace App\Http\Controllers;

use App\User;
use App\State;
use App\County;
use App\Zipcode;
use App\Property;
use App\Proposal;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use SplFileInfo;
use App\Notification;
use Auth;
use Pusher\Pusher;

class brokeragehouseController extends Controller
{
    public function index()
    {
        /*
        $properties = Property::where('acceptance_level', 5)->where('approved', 1)->where('property_state', '!=', 2)->get();
        $zipcodes = Zipcode::all();
        $states = State::all();
        $counties = County::all();
        */
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

            //$pusher->trigger('notification', $admin_id, 'Brokeragehouse '.Auth::user()->first_name.' '.Auth::user()->last_name.' has signed document.');
            
            Notification::create(['user_id'=>$admin_id,'link'=>'#',
            'text'=>'Brokeragehouse '.Auth::user()->first_name.' '.Auth::user()->last_name.' has signed document.','type'=>2]);

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
        return view('brokeragehouse.index');
    }

    public function showProperty($id)
    {
        $property = Property::where('id', $id)->first();
        return view('investor.property.property-detail', compact('property'));
    }

    public function showProposals()
    {
        $proposals = Proposal::where('user_id', auth()->user()->id)->get();
        return view('investor.all-proposal', compact('proposals'));
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
        return view('brokeragehouse.document');
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
