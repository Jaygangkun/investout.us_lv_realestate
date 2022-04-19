<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SplFileInfo;
use App\Notification;
use Auth;
use App\User;
use App\BulkImport;
use App\Setting;
use Pusher\Pusher;
use Cartalyst\Stripe\Stripe;
use Session;
use App\Subscription;
use App\SubscriptionHistory;

class wholeSellerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:seller');
    }

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
            
            //$pusher->trigger('notification', $admin_id, 'Seller '.Auth::user()->first_name.' '.Auth::user()->last_name.' has signed document.');

            Notification::create(['user_id'=>$admin_id,'link'=>'#',
            'text'=>'Seller '.Auth::user()->first_name.' '.Auth::user()->last_name." has signed document.",'type'=>2]);

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

        $settings = Setting::where('user_id', $user->id)->get();
        $hidevideo = '';
        if(count($settings) != 0) {
            $hidevideo = $settings[0]->hidevideo;
        }

        return view('whole_seller.index', compact('hidevideo'));
    }

    public function viewDocument()
    {
        return view('whole_seller.document');
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

    public function importCSV(){
        return view('whole_seller.bulkimport');

    }

    public function uploadCSV(Request $request){
        $this->validate($request, [
                'csv_file' => 'required',
                'csv_file.*' => 'mimes:csv|max:2048'
        ]);
        $user = auth()->user();
        $user_id = $user->id;

        $photo   = $request->file('csv_file');

        $destinationPath = public_path('csv/');
        $csvName = rand(111111, 999999) .'_'.time().'.csv';
        $photo->move($destinationPath, $csvName);
        BulkImport::create(['user_id'=>$user_id,'file_name'=>$csvName,'is_uploaded'=> '0']);
        
        return redirect()->back();
    }

    public function upgradeSub(){
        $user = auth()->user();
        $userID = $user->id;
        $success = $user->subscription('main')->skipTrial()->noProrate()->swap('price_1IZgVZFD8iQYXcxLoK3RTt3R');
        if($success)
        {
            $cpn = Subscription::where('user_id', '=', $userID)->first();
            $cpn->stripe_plan = 'price_1IZgVZFD8iQYXcxLoK3RTt3R';
            $cpn->save();

            $cpn = SubscriptionHistory::where('stripe_cus_id','=',$user->stripe_id)->first();
            $cpn->expiry_date = strtotime(date('Y-m-d h:i:s'));
            $cpn->save();
            
        }
        return redirect('/whole-seller/billing-details');
    }

    
}
