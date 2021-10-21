<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Realtor;
use App\Profile;
use App\BulkImport;
use DB;
use Auth;
use App\UserPlanFeatures;
use App\subscription;
use SplFileInfo;
use App\Notification;
use Pusher\Pusher;

class RealtorController extends Controller
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

            //$pusher->trigger('notification', $admin_id, 'Realtor '.Auth::user()->first_name.' '.Auth::user()->last_name.' has signed document.');

            Notification::create(['user_id'=>$admin_id,'link'=>'#',
            'text'=>'Realtor '.Auth::user()->first_name.' '.Auth::user()->last_name.' has signed document.','type'=>2]);
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
        return view('realtor.index');
    }
    /*
    public function show($user,$id){
        $post = BlogPost::where('id', $id)->first();        
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();        
        return view('commons.blogshow', compact('post', 'allpost'));        
    }

    public function outerIndex()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->get();
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();
        return view('pages.blog', compact('posts', 'allpost'));
    }

    public function outerShow($id){
        $post = BlogPost::where('id', $id)->first();        
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();        
        return view('pages.blogshow', compact('post', 'allpost'));        
    }*/

    public function createRealtor()
    {
        return view('admin.realtor.create');
    }

    /*
    public function search(Request $request)
    {
        $posts = BlogPost::where('heading', 'Like', '%'.$request->input('name').'%')->orderBy('created_at', 'desc')->get();
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();
        if ($request->input('page') == 1) {
            return view('commons.blogging', compact('posts', 'allpost'));
        } else {
            return view('pages.blog', compact('posts', 'allpost'));
        }
    }
    */

    public function storeRealtor(Request $request)
    {
        /*
        $request->validate([
            'first_name'=>'required|string',
            'lst_name'=>'required|string',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required',
        ]);
        */
        $userID = 0;
        $existinguser = User::where('email',$request['email'])->first();
        if(!empty($existinguser)){
            $role = DB::table('role_user')->where('user_id',$existinguser->id)->first();
            if($role->role_id == 2){
                $stripe_cus_id = $existinguser->stripe_id;
                $sub = Subscription::where('user_id',$existinguser->id)->first();
                if($sub->ends_at != ''){
                    $arr = explode(" ",$sub->ends_at);
                    $enddate = strtotime($arr[0]);
                    $userID = $existinguser->id;
                    if(strtotime(date('Y-m-d')) < $enddate){
                        return redirect()->back()->with('error','Realtor subscription is not ended yet!');   
                    }
                }
                else{
                    return redirect()->back()->with('error','Realtor subscription is activate, You can\'t add till it\'s active');   
                }
            }
            else{
                return redirect()->back()->with('error','Email is already registered with us!');   
            }
        }

        $sec = bcrypt(time());
        $token = str_replace('/', '', $sec);

        $brokeragehouse_id = Auth::user()->id;

        if($userID == 0){
            /*
            $Userplanfeatures = DB::table('user_plan_features')
                        ->select('*')
                        ->where('user_id','=',$brokeragehouse_id)
                        ->where('feature_id','=','4')
                        ->groupBy(['feature_id','plan_id'])
                        ->orderBy('id','desc')
                        ->first();
            $canCreateRealtors = $Userplanfeatures->value;

            $createdRealtors = DB::table('realtors')
                        ->select('id')
                        ->where('brokeragehouse_id','=',$brokeragehouse_id)
                        ->where('status','=','1')
                        ->where('numbers','=',$request->numbers)
                        ->get();
            
            $totalcreated = count($createdRealtors);        
            
            if($canCreateRealtors > $totalcreated){
            */
            $user = User::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'token' => $token,
                'verified'=>1,
            ]);

            Profile::Create(['user_id'=>$user->id,'location'=>$request['location'],'company'=>$request['company'] ,'city'=>$request['city'],'state'=>$request['state'],'phone'=>$request['phone']]);

            Realtor::create([
                'brokeragehouse_id' => $brokeragehouse_id,
                'realtor_id' => $user->id,
                'numbers' => 0,
                'status' => 1,
            ]);

            DB::table('role_user')->insert([
                ['role_id' => '2',
                 'user_id' => $user->id]
            ]);

            $realtor_id = $user->id;

            return redirect('/brokeragehouse/realtors')->with('success', "Realtor added successfully");
            /*
            }
            else{
                return redirect()->back()->with('Your quota over, please renew your subscription!');   
            }
            */
        }
        else{
            $user = User::where('id', $userID)->first();
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->token = $request['token'];
            $user->verified = 1;
            $user->save();

            $profile = Profile::where('user_id',$userID)->first();
            $profile->location = $request['location'];
            $profile->company = $request['company'];
            $profile->city = $request['city'];
            $profile->state = $request['state'];
            $profile->phone = $request['phone'];
            $profile->save();

            Realtor::create([
                'brokeragehouse_id' => $brokeragehouse_id,
                'realtor_id' => $user->id,
                'numbers' => 0,
                'status' => 1,
            ]);
            return redirect('/brokeragehouse/realtors')->with('success', "Realtor updated successfully");
        }
    }

    public function editRealtor($id){
        $userData = DB::table('users')
                    ->join('profiles', 'users.id', '=', 'profiles.user_id')
                    ->join('realtors', 'users.id', '=', 'realtors.realtor_id')
                    ->select('users.*','users.id as userid','profiles.*', 'realtors.numbers')
                    ->where('users.id',$id)
                    ->first();
        return view('admin.realtor.edit', compact('userData'));

    }

    public function getRealtors(){
        $realtors = DB::table('realtors')
                    ->join('users', 'users.id', '=', 'realtors.realtor_id')
                    ->join('profiles', 'users.id', '=', 'profiles.user_id')
                    ->select('users.*','profiles.*','users.id as userid')
                    ->where('realtors.brokeragehouse_id',Auth::user()->id)
                    ->get();
        return view('admin.realtor.show', compact('realtors'));

    }

    public function updateRealtor(Request $request){
        $id = $request->id;

        User::where('id',$id)->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email']
        ]);

        Profile::where('id',$id)->update([
            'location'=>$request['location'],
            'company'=>$request['company'] ,
            'city'=>$request['city'],
            'state'=>$request['state'],
            'phone'=>$request['phone']
        ]);

        return redirect('/brokeragehouse/realtors')->with('success', "Realtor updated successfully");
    }

    public function deleteRealtor($id){
        User::where('id',$id)->update(['status' => 0]);
        Realtor::where('realtor_id',$id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function viewDocument()
    {
        return view('realtor.document');
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
        return view('realtor.bulkimport');

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
        
        return redirect()->back()->with('success', 'Your import has been received. Please allow 24 hours for the information to be reviewed and approved for import into the Invest Out portal. Thank you.');
    }
}
