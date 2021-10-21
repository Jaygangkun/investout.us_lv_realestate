<?php
namespace App\Http\Controllers\Auth;

use Auth;
use Carbon\Carbon;
use App\Membership;
use App\Notification;
use App\User;
use App\SubscriptionHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use SplFileInfo;
use Redirect;
use Illuminate\Http\File;
use Pusher\Pusher;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }

        View::composer('*', function ($view) {
            $view->with('userRole', $this->role());
        });

        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );

        $user = auth()->user();

        $layout = $this->userRole();
        $usertxt = $this->userTxt();
        Session::put('profile', auth()->user()->profile);
        Session::put('layout', $layout);
        Session::put('userTxt', $usertxt);
        if ($user->status == 1) {
            if ($user->membership_type == 1) {
                if ($user->roles()->first()->slug != 'admin') {
                    if  (isset($user->membership->mem_end_date))
                    {
                        if ($user->membership->mem_end_date == Carbon::now()->addDays(3)) {

                            //$pusher->trigger('notification', $user->id, 'Please Renew Your Membership before the end date.');

                            Notification::create(['user_id'=>$user->id,'link'=>route('membership.show', $user->roles()->first()->slug),
                        'text'=>'Please Renew Your Membership before the end date.','type'=>2]);
                        } elseif ($user->membership->mem_end_date <= Carbon::now()) {
                            $user = User::where('id', $user->id)->first();
                            $user->membership_type = 1;
                            $user->save();
                            //Membership::where('user_id', $user->id)->delete();
                            //$pusher->trigger('notification', $user->id, 'Your Membership has been Cancelled. Please Renew Your Membership');

                            Notification::create(['user_id'=>$user->id,'link'=>route('membership.show', $user->roles()->first()->slug),
                        'text'=>'Your Membership has been Cancelled. Please Renew Your Membership','type'=>2]);
                        }
                    }
                    else
                    {
                        $user->membership_type = 1;
                        $user->save();
                        //$pusher->trigger('notification', $user->id, 'Your account does not have Membership. Please get Membership');
                        
                        Notification::create(['user_id'=>$user->id,'link'=>route('membership.show', $user->roles()->first()->slug),
                        'text'=>'Your account does not have Membership. Please get Membership','type'=>2]);
                    }
                }
            }
            else{
                
                $subscription = SubscriptionHistory::where('stripe_cus_id','=',$user->stripe_id)->orderBy('transaction_date', 'DESC')->first();
                if(!empty($subscription) > 0){
                    $now = strtotime(date('Y-m-d'));
                    if($subscription->expiry_date < $now){
                        auth()->logout();
                        return redirect('/login')->with('warning', "Your subscription has been expired, Please contact admin!");
                    }
                }
            }
        }
        else{
            auth()->logout();
            return redirect('/login')->with('warning', "Your account is disabled, Please contact admin for furthur information!");
        }
        if(!$user->hasRole('admin')){
            app('App\Http\Controllers\BillingController')->billingDetails();
            /*
            if($user->envelope_id == '' || $user->envelope_id == null){
                if($user->hasRole('seller')){
                    $file_name = 'PROMISSORY_NOTE_SAMPLE_Seller.docx';
                }
                else if($user->hasRole('realtor')){
                    $file_name = 'PROMISSORY_NOTE_SAMPLE_Realtor.docx';
                }
                else if($user->hasRole('investor')){
                    $file_name = 'PROMISSORY_NOTE_SAMPLE_Investor.docx';
                }
                else{
                    $file_name = 'PROMISSORY_NOTE_SAMPLE_Investor.docx';
                }
            
                $response = $this->send_document_for_signing($file_name,$user->first_name." ".$user->last_name,$user->email);
            
                User::where('id', $user->id)->update(['envelope_id' => $response['envelope_id']]);
                $user->envelope_id = $response['envelope_id'];
            }

            $response = $this->getDocuSignStatus($user->envelope_id,$user->id);
            if($response['url'] != ''){
                return Redirect::to($response['url']);
            }
            else{
                */
                if ($user->hasRole('brokeragehouse')) {
                    return redirect('/brokeragehouse');
                } elseif ($user->hasRole('realtor')) {
                    return redirect('/realtors');
                } elseif ($user->hasRole('investor')) {
                    return redirect('/investors');
                } elseif ($user->hasRole('enterprise')) {
                    return redirect('/enterprise');
                } elseif ($user->hasRole('wholeseller')) {
                    return redirect('/whole-seller');
                } else{
                    return redirect('/Dash');
                }
            //}
        }
        else{
            return redirect('/admin');
        }
    }

    public function role()
    {
        return auth()->user()->roles()->first()->slug;
    }

    public function userRole()
    {
        $user = auth()->user();
        if ($user->hasRole('seller') or $user->hasRole('realtor')) {
            return 'layouts.seller-layout';
        } elseif ($user->hasRole('investor')) {
            return 'layouts.investor-layout';
        } elseif ($user->hasRole('admin')) {
            return 'layouts.admin-layout';
        }
    }

    public function userTxt()
    {
        $user = auth()->user();
        if ($user->hasRole('seller')) {
            return 'I am a Seller';
        } elseif ($user->hasRole('realtor')) {
            return 'I am a Realtor';
        } elseif ($user->hasRole('investor')) {
            return 'I am an Investor';
        } elseif ($user->hasRole('admin')) {
            return 'I am an admin';
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    
    public function getDocuSignStatus($envelope_id,$userid){
        
        $basePath = config('app.basepath.DOCUSIGN_BASEPATH');
        $accountid = config('app.basepath.DOCUSIGN_ACCOUNTID');
        $username  = config('app.basepath.DOCUSIGN_USERNAME');
        $password = config('app.basepath.DOCUSIGN_PASSWORD');
        $integrator_key = config('app.basepath.DOCUSIGN_INTEGRATOR_KEY');


        $config = new \DocuSign\eSign\Configuration();
        $config->setHost($basePath);
        //$config->addDefaultHeader("Authorization", "Bearer " . $args['accessToken']);
        $config->addDefaultHeader("X-DocuSign-Authentication", "{\"Username\":\"" . $username . "\",\"Password\":\"" . $password . "\",\"IntegratorKey\":\"" . $integrator_key . "\"}");
        $apiClient = new \DocuSign\eSign\Client\ApiClient($config);
        $envelopeApi = new \DocuSign\eSign\Api\EnvelopesApi($apiClient);
        $results = $envelopeApi->getEnvelope($accountid,$envelope_id); //=== To get the envelope data.

        //$results2 = $envelopeApi->setCertificate(TRUE);
        if($results['status'] == 'sent' || $results['status'] == 'delivered' || $results['status'] == 'declined' ){
            $arr = array();
            $arr['userName'] = Auth::user()->first_name." ". Auth::user()->last_name; 
            $arr['email'] = Auth::user()->email; 
            $arr['recipientId'] = 1; 
            $arr['clientUserId'] = 1234; 
            $arr['authenticationMethod'] = "email"; 
            $user = auth()->user();
            if ($user->hasRole('admin')) {
                $arr['returnUrl'] = config('app.basepath.APP_URL')."admin";
            } elseif ($user->hasRole('brokeragehouse')) {
                $arr['returnUrl'] = config('app.basepath.APP_URL')."brokeragehouse";
            } elseif ($user->hasRole('realtor')) {
                $arr['returnUrl'] = config('app.basepath.APP_URL')."realtors";
            } elseif ($user->hasRole('investor')) {
                $arr['returnUrl'] = config('app.basepath.APP_URL')."investors";
            }else{
                $arr['returnUrl'] = config('app.basepath.APP_URL')."Dash";
            }

            $return = $envelopeApi->createRecipientView($accountid, $envelope_id,$arr);
            $results['url'] = $return['url'];
        }
        else{
            if(!file_exists(public_path("signed_documents/".$userid.".pdf"))){
                $results2 = $envelopeApi->getDocument($accountid, 'combined',    $envelope_id);
                $fileinfo = new SplFileInfo($results2->getRealPath());
                file_put_contents("signed_documents/".$userid.".pdf", file_get_contents($fileinfo));
            }
            $results['url'] = '';
        }

        //$results = $envelopeApi->getEnvelope($accountid, $envelope_id); //=== To get the envelope data.
        return $results;
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