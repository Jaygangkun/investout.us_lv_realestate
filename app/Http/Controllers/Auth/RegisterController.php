<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Realtor;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use jeremykenedy\LaravelRoles\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use App\StripePlan;
use App\PlanFeatures;
use App\UserPlanFeatures;
use App\Http\Requests;
use URL;
use Session;
use Redirect;
use Input;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use Cartalyst\Stripe\Coupons;
use App\Mail\WelcomeMail;
use App\State;
use App\County;
use App\Zipcode;
use App\Subscription;
use Exception;

use App\Libraries\docusign\esignclient\src\Model\Document;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipCode' => 'required|string|max:5|min:5',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|min:10|max:10|unique:profiles',
            'role' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'tnc' => 'required',
        ]);
    }

    public function showRegistrationForm()
    {
        if(isset($_GET['plan'])){
            $selected_plan = $_GET['plan'];
            $selected_plan_details = StripePlan::where('plan_id', '=', $selected_plan)->first();
            if($selected_plan_details){
                $selected_role = $selected_plan_details->role;
                $selected_plan_name = $selected_plan_details->plan_name;
                $selected_plan_id = $selected_plan_details->id;
                if($selected_role == 9){
                    $selected_role == 1;
                }
            }else{
                $selected_role = "";    
            }
        }else{
            $selected_plan = "";
            $selected_role = "";
        }
        $roles = Role::where('id', '=', $selected_plan_details->role)->first();
        $selected_role_name = $roles->name;

        $states = State::orderBy('state','asc')->get();

        if($selected_role == 1){
            $doclink = ENV('APP_URL').'documents/PROMISSORY_NOTE_SAMPLE_Seller.docx';
        }
        else if($selected_role == 2){
            $doclink = ENV('APP_URL').'documents/PROMISSORY_NOTE_SAMPLE_Realtor.docx';
        }
        else if($selected_role == 3){
            $doclink = ENV('APP_URL').'documents/PROMISSORY_NOTE_SAMPLE_Investor.docx';
        }
        else{
            $doclink = ENV('APP_URL').'documents/PROMISSORY_NOTE_SAMPLE_Investor.docx';
        }


        return view('auth.register', compact('selected_plan','doclink','selected_role','selected_plan_details','selected_plan_name','selected_role_name','selected_plan_id','states','
use App\State;
use App\County;
use App\Zipcode;'));
    }

    public function getrolebasedplans(Request $request)
    {
        $role = $request->input('role');
        $plans = StripePlan::where('role', '=', $role)->get();
        echo json_encode($plans);
        exit;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $sec = bcrypt(time());
        $token = str_replace('/', '', $sec);
        $userID = 0;

        $existinguseremail = User::where('email',$data['email'])->first();

        if(!empty($existinguseremail)){
            if($data['role'] == 2){
                $realtor = Realtor::where('realtor_id',$existinguseremail->id)->first();
                dd($realtor);
                if($realtor->status == 0){
                    $userID = $existinguseremail->id;
                }
                else{
                    $user['realtor_error'] = "Please ask brokeragehouse to delete your account!!";
                    return $user;
                    //redirect('/register')->with('warning', "Sorry your email cannot be identified.");
                    //return redirect()->route('login');
                    dd("123");
                }
            }
            else{
                    $user['realtor_error'] = "Email already registered with us!!";
                    return $user;
                    //redirect()->route('register?plan=plan_H9MDrL0o6zWhIY');
            }
        }

        if($userID == 0){

            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'token' => $token,
                'verified'=>1,
            ]);
            $userID = $user['id'];
            $role = Role::where('id', $data['role'])->first();  //choose the default role upon user creation.
            $user->attachRole($role);
                        
            if ($data['company'] == '') {
                $data['company'] = ' ';
            }

            Profile::Create(['user_id'=>$user->id,'location'=>$data['address'],'company'=>$data['company'] ,'city'=>$data['city'],'state'=>$data['state'],'phone'=>$data['phone'],'zipCode'=>$data['zipCode']]);

        }
        else{
            $user = User::where('id', $userID)->first();
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->token = $token;
            $user->verified = 1;
            $user->status = 1;
            $user->save();

            $profile = Profile::where('user_id',$userID)->first();
            $profile->location = $data['address'];
            $profile->company = $data['company'];
            $profile->city = $data['city'];
            $profile->state = $data['state'];
            $profile->phone = $data['phone'];
            $profile->zipCode = $data['zipCode'];
            $profile->save();

        }

        
        $coupon = '';
        if($data['coupon_id'] != '')
        {
            $coupon = $data['coupon_id'];
        }
        $user
            ->newSubscription('main', $data['stripePlan'])
            ->trialDays(30)
            ->create($data['stripeToken'], array(
                'email' => $data['email'],
                'name' => $data['first_name'].' '.$data['last_name'],
                'description' => $data['stripePlan'],
                'shipping' => [
                    'address' => [
                        'line1' => $data['address'],
                        'line2' => '-',
                        'city' => $data['city'],
                        'country' => 'IN',
                        'state' => $data['state'],
                        'postal_code' => $data['zipCode'],
                    ],
                    'name' => $data['first_name'].' '.$data['last_name'],
                    'phone' => $data['phone'],
                ],
                'coupon'    => $coupon
            ));

        if($coupon != ''){
            $cpn = Subscription::where('user_id', '=', $userID)->first();
            $cpn->coupon_id = $coupon;
            $cpn->save();
        }


        $plan = StripePlan::where('plan_id', '=', $data['stripePlan'])->first();

        $plan_details = PlanFeatures::where('plan_id', '=', $plan['id'])->get();
        foreach($plan_details as $plan_detail){

            $userplanfeature = new UserPlanFeatures();
            $userplanfeature->plan_id = $plan_detail['plan_id'];
            $userplanfeature->feature_id = $plan_detail['feature_id'];
            $userplanfeature->value = $plan_detail['value'];
            $userplanfeature->user_id = $user->id;
            $userplanfeature->save();
        }

        // Mail::to($data['email'])->send(new WelcomeMail($data));

        if($data['role'] == 1){
            $file_name = 'PROMISSORY_NOTE_SAMPLE_Seller.docx';
        }
        else if($data['role'] == 2){
            $file_name = 'PROMISSORY_NOTE_SAMPLE_Realtor.docx';
        }
        else if($data['role'] == 3){
            $file_name = 'PROMISSORY_NOTE_SAMPLE_Investor.docx';
        }
        else{
            $file_name = 'PROMISSORY_NOTE_SAMPLE_Investor.docx';
        }
        
        //Docusign code commented
        //$response = $this->send_document_for_signing($file_name,$data['first_name']." ".$data['last_name'],$data['email']);
        //User::where('id', $user->id)->update(['envelope_id' => $response['envelope_id']]);
        
        return $user;
    }

    public function verifyUser($token)
    {
        $user = User::where('token', $token)->first();
        if (isset($user)) {
            if (!$user->verified) {
                $user->verified = 1;
                $user->save();

                // Mail::to('approve@siteadviser.com')->send(new adminMail($user->email));
                $status = "Your e-mail is verified.";
            } else {
                $status = "Your e-mail is already verified";
            }
        } else {
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
        return redirect('/login')->with('status', $status);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('success', "Registration successful.");
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

    public function checkCouponCode(Request $request)
    {
        $coupon = $request->input('coupon');
        if($coupon == 'TEAMFREE')
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
        /*
        $stripe = new Stripe();
        try{
            $couponData = $stripe->coupons()->find($coupon);
            echo 1;
        } catch (Exception $e) {
            dd($e);
            echo 0;
        }
        */
        exit;
    }
}
