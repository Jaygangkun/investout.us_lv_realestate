

<?php



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



    Route::get('/', 'HomeController@index')->name('index');

    Route::post('/signin', 'HomeController@signin')->name('signin');

    Route::get('update-zip-details','MapController@excelToDatabase');

    Route::post('/get-data-zip','MapController@getData')->name('get_data.zip');
Route::get('reservation-data','ReservationController@calendarEvent')->name('reservation.calendar');
    // admin only routes
Route::post('/coordinates','frontendController@getCoordinates')->name('envoy.coordinates');
    Route::group(['middleware' => 'auth'], function() {
        Route::group(['as' => 'admin.','prefix'=>'admin','middleware'=>['role:admin']], function () {

            Route::get('', 'adminController@index')->name('index');
            Route::post('validate-email', 'adminController@validateEmail')->name('validateEmail');

            Route::group(['as' => 'stripe.','prefix'=>'stripe'], function () {

                Route::get('', 'adminStripeController@index')->name('getStripePlans');
                Route::get('/manage-plans', 'adminStripeController@getUserPlans')->name('getUserPlans');
                Route::post('/add-plan', 'adminStripeController@addUserPlans')->name('addUserPlans');
                Route::get('/sync-stripe-plans', 'adminStripeController@syncStripePlans')->name('syncStripePlans');
                Route::get('/update-user-plan-status', 'adminStripeController@updateUserPlanStatus')->name('updateUserPlanStatus');
                Route::get('/get-user-plan', 'adminStripeController@getUserPlan')->name('getUserPlan');
                Route::post('/update-user-plan', 'adminStripeController@updateUserPlan')->name('updateUserPlan');
                Route::post('plan-update/{id}', 'adminStripeController@updateStripePlan')->name('plan-update');
                Route::get('/get-role-features', 'adminStripeController@getRoleFeatures')->name('getRoleFeatures');
                Route::get('/get-user-plan-detail', 'adminStripeController@getUserPlanDetails')->name('getUserPlanDetail');

            });

            Route::get('import-request', 'adminController@importRequests')->name('importRequests');
            Route::get('downloadBulkFile/{filename}', 'adminController@downloadCSV')->name('downloadCSV');
            Route::post('import/uploadCSV', 'adminController@uploadCSV')->name('adminUploadCSV');
            Route::get('import/{id}', 'adminController@importScrap')->name('importScrap');
            Route::get('import/revert/{id}', 'adminController@revert')->name('revert');
            Route::post('import-data', 'adminController@importData')->name('importData');

            Route::group(['as' => 'training.','prefix'=>'training'], function () {

                Route::get('/upload', 'TrainingVideoController@create')->name('create');

                Route::post('/store', 'TrainingVideoController@store')->name('store');

            });

            Route::group(['as' => 'cms.','prefix'=>'cms'], function () {

                Route::get('/{page}', 'cmsController@create')->name('index');

                Route::post('/store', 'cmsController@store')->name('update');

            });

            Route::group(['as' => 'blog.','prefix'=>'blog'], function () {

                Route::get('', 'blogController@create')->name('index');

                Route::post('/store', 'blogController@store')->name('store');

                Route::delete('/delete/{id}', 'blogController@delete')->name('delete');

            });

            Route::group(['as' => 'users.','prefix'=>'users'], function () {

                Route::get('Administrators', 'adminUserController@getAdministrator')->name('admin-index');

                Route::get('envoys', 'adminUserController@getEnvoys')->name('envoy-index');

                Route::post('administrators/create', 'adminUserController@createAdmin')->name('admin-create');

                Route::post('envoy/create', 'adminUserController@createEnvoy')->name('envoy-create');

                Route::get('envoy/edit/{id}', 'adminUserController@editEnvoy')->name('edit_envoy');
                Route::post('envoy/update', 'adminUserController@updateEnvoy')->name('update_envoy');

                Route::get('administrator/edit/{id}', 'adminUserController@editAdmin')->name('edit_other_admin_profile');
                Route::post('administrator/update', 'adminUserController@updateAdmin')->name('update_other_admin_profile');
                //Route::delete('administrator/delete/{id}', 'adminUserController@destroy')->name('delete_other_admin_user');

                Route::get('/', 'adminUserController@index')->name('index');

            });

            Route::group(['as' => 'realtors.','prefix'=>'realtors'], function () {
                Route::get('/', 'adminRealtorController@index')->name('index');
                Route::post('assign-zip-code', 'adminRealtorController@assignZipCode')->name('assignZipCode');
            });

            Route::group(['as' => 'document.','prefix'=>'document'], function () {

                Route::get('', 'adminController@showDocument')->name('show');

                Route::post('', 'adminController@uploadDocument')->name('upload');

                Route::delete('/{id}', 'adminController@destroyDocument')->name('destroy');

            });

            Route::group(['as' => 'property.','prefix'=>'property'], function () {

                Route::get('/phase/{phase}', 'adminPropertyController@getPhaseProperties')->name('phase-index');

                Route::get('seller/{id}', 'adminPropertyController@getUserProperty')->name('user-property-index');

                Route::get('approved', 'adminPropertyController@getApprovedProperties')->name('approved');

                Route::get('contracted', 'adminPropertyController@getContractedProperties')->name('contracted');

                Route::get('closed', 'adminPropertyController@getClosedProperties')->name('closed');

                Route::post('update-level/{id}', 'adminPropertyController@updatePropertyLevel')->name('update');

                // Route::post('approve/{id}', 'adminPropertyController@approveProperty')->name('approve');

                Route::post('state-update/{id}', 'adminPropertyController@updatePropertyState')->name('state-update');

                Route::get('/{id}', 'adminPropertyController@showUserProperty')->name('show');

                Route::get('/property-proposal-list/{id}', 'adminPropertyController@propertyProposalsList')->name('proposal.list');

                Route::get('/property-proposal-list/{id}/{investor_id}', 'adminPropertyController@investorProposalsView')->name('investorProposals.view');

                Route::post('/property-proposal-list', 'adminPropertyController@investorProposalsList')->name('investorProposals.list');
                           
            });



            Route::group(['as' => 'proposal.','prefix'=>'proposal'], function () {

                Route::get('', 'ProposalController@index')->name('index');

                Route::get('/approved', 'ProposalController@approvedShow')->name('approved');

                Route::post('/approve', 'ProposalController@approveProposal')->name('approve');

                Route::post('/deny', 'ProposalController@denyProposal')->name('deny');

                Route::delete('/{id}', 'ProposalController@destroyProposal')->name('destroy');

            });



            Route::group(['as' => 'membership.','prefix'=>'membership'], function () {

                Route::post('/approve', 'MembershipController@approveMembership')->name('approve');

                Route::get('', 'MembershipController@index')->name('index');

                Route::post('/deny', 'MembershipController@denyMembership')->name('deny');

            });

        });

    // investor only routes
        Route::group(['as' => 'investors.','prefix'=>'investors','middleware'=>['role:investor']], function () {

            Route::get('', 'investorController@index')->name('index');

            Route::get('/billing-details', 'BillingController@billingDetails')->name('billingDetails');

            Route::get('/cancel-subscription', 'BillingController@cancelSubscription')->name('cancelSubscription');
            
            Route::get('/document', 'investorController@viewDocument')->name('viewDocument');

            Route::group(['as' => 'property.','prefix'=>'property'], function () {

                Route::get('/phase/{phase}', 'investorPropertyController@getPhaseProperties')->name('phase-index');

                Route::get('seller/{id}', 'investorPropertyController@getUserProperty')->name('user-property-index');

                Route::get('approved', 'investorPropertyController@getApprovedProperties')->name('approved');

                Route::get('contracted', 'investorPropertyController@getContractedProperties')->name('contracted');

                Route::get('closed', 'investorPropertyController@getClosedProperties')->name('closed');

                Route::post('update-level/{id}', 'investorPropertyController@updatePropertyLevel')->name('update');

                Route::post('approve/{id}', 'investorPropertyController@approveProperty')->name('approve');

                Route::post('state-update/{id}', 'investorPropertyController@updatePropertyState')->name('state-update');

                Route::get('/{id}', 'investorPropertyController@showUserProperty')->name('show');

                Route::get('/proposals/{id}', 'investorController@showPropertyProposals')->name('propertyProposals');

                Route::post('/proposalsList', 'investorController@getPropertyProposalsList')->name('propertyProposalsList');
                           
            });

            // proposal creation route
            Route::post('proposal/create', 'ProposalController@create')->name('proposal.create');
            Route::post('proposal/new_create', 'ProposalController@new_create')->name('proposal.new_create');
          
            // search route
            Route::get('find', 'SearchController@find');
            Route::post('find/search', 'SearchController@customSeach')->name('search');

            // All proposals
            Route::get('/Proposals', 'investorController@showProposals')->name('proposals');

            // Show Proposal Propoerty
            Route::get('/Proposal/Property', 'investorController@showProposalProperty')->name('proposal.property');


            //Proposal Start
            Route::get('/proposal', 'ProposalController@investorShow')->name('proposal.show');
            
            Route::get('/proposal/accepted', 'ProposalController@brokeragehouseApprovedShow')->name('proposal.approved.show');
            Route::get('/proposal/denited', 'ProposalController@brokeragehouseDeniedShow')->name('proposal.denied.show');

            Route::post('/proposal/update', 'ProposalController@updateStatus')->name('proposal.update');

            //Proposal End

        });
        

    
    // investor only routes
        Route::group(['as' => 'brokeragehouse.','prefix'=>'brokeragehouse','middleware'=>['role:brokeragehouse']], function () {
            Route::get('/', 'brokeragehouseController@index')->name('index');

            Route::get('/billing-details', 'BillingController@billingDetails')->name('billingDetails');

            Route::get('/cancel-subscription', 'BillingController@cancelSubscription')->name('cancelSubscription');
            
            //Proposal Start
            Route::get('/proposal', 'ProposalController@brokeragehouseShow')->name('proposal.show');
            
            Route::get('/proposal/accepted', 'ProposalController@brokeragehouseApprovedShow')->name('proposal.approved.show');
            Route::get('/proposal/denited', 'ProposalController@brokeragehouseDeniedShow')->name('proposal.denied.show');

            Route::post('/proposal/update', 'ProposalController@updateStatus')->name('proposal.update');

            //Proposal End
            Route::get('/viewedproperties', 'propertyController@viewedProperties')->name('viewedProperties');

            Route::get('/document', 'brokeragehouseController@viewDocument')->name('viewDocument');

            // Realtors CRUD
            Route::get('/realtors', 'RealtorController@getRealtors')->name('getRealtors');

            Route::get('/add-realtor', 'RealtorController@createRealtor')->name('createRealtor');

            Route::get('/edit-realtor/{id}', 'RealtorController@editRealtor')->name('editRealtor');

            Route::post('/insert-realtor', 'RealtorController@storeRealtor')->name('storeRealtor');

            Route::post('/update-realtor', 'RealtorController@updateRealtor')->name('updateRealtor');

            Route::post('/delete-realtor/{id}', 'RealtorController@deleteRealtor')->name('deleteRealtor');

            Route::get('/billing-details', 'BillingController@billingDetails')->name('billingDetails');

            Route::get('/profile/Edit', 'brokeragehouseProfileController@edit')->name('editprofile');

            Route::get('/profile/show', 'brokeragehouseProfileController@show')->name('showprofile');

            Route::post('/profile', 'brokeragehouseProfileController@update')->name('updateprofile');

            Route::delete('/profile/delete/{id}', 'profileController@destroy')->name('deleteprofile');

            Route::get('/change-password', 'ChangePasswordController@index')->name('changepassword');

            Route::post('/change-password', 'ChangePasswordController@store')->name('updatepassword');

            Route::group(['as' => 'property.','prefix'=>'property'], function () {

                Route::get('/phase/{phase}', 'brokeragehousePropertyController@getPhaseProperties')->name('phase-index');

                Route::get('seller/{id}', 'brokeragehousePropertyController@getUserProperty')->name('user-property-index');

                Route::get('approved', 'brokeragehousePropertyController@getApprovedProperties')->name('approved');

                Route::get('contracted', 'brokeragehousePropertyController@getContractedProperties')->name('contracted');

                Route::get('closed', 'brokeragehousePropertyController@getClosedProperties')->name('closed');

                Route::post('update-level/{id}', 'brokeragehousePropertyController@updatePropertyLevel')->name('update');

                // Route::post('approve/{id}', 'brokeragehousePropertyController@approveProperty')->name('approve');

                Route::post('state-update/{id}', 'brokeragehousePropertyController@updatePropertyState')->name('state-update');

                Route::get('/{id}', 'brokeragehousePropertyController@showUserProperty')->name('show');

                Route::get('/is_accepted/{id}/{status}', 'brokeragehousePropertyController@AcceptRejectProperty')->name('AcceptRejectProperty');
                           
                Route::post('/is_accepted', 'brokeragehousePropertyController@RejectProperty')->name('RejectProperty');
                           
            });


        });

        // investor only routes
        Route::group(['as' => 'realtors.','prefix'=>'realtors','middleware'=>['role:realtor']], function () {

            Route::get('/', 'RealtorController@index')->name('index');

            Route::get('/billing-details', 'BillingController@billingDetails')->name('billingDetails');

            Route::get('/cancel-subscription', 'BillingController@cancelSubscription')->name('cancelSubscription');
            //Proposal Start
            Route::get('/proposal', 'ProposalController@realtorShow')->name('proposal.show');
            
            Route::get('/proposal/accepted', 'ProposalController@realtorApprovedShow')->name('proposal.approved.show');

            Route::get('/proposal/denited', 'ProposalController@realtorDeniedShow')->name('proposal.denied.show');
            
            Route::post('/proposal/update', 'ProposalController@updateStatus')->name('proposal.update');

            Route::get('/document', 'RealtorController@viewDocument')->name('viewDocument');

            Route::get('property/uploadcsv', 'RealtorController@importCSV')->name('importCSV');

            Route::post('property/bulkimport', 'RealtorController@uploadCSV')->name('uploadCSV');
            
            Route::group(['as' => 'property.','prefix'=>'property'], function () {

                Route::get('/phase/{phase}', 'realtorPropertyController@getPhaseProperties')->name('phase-index');

                Route::get('/all-phase/{phase}', 'realtorPropertyController@getAllPhaseProperties')->name('all-phase-index');

                Route::get('seller/{id}', 'realtorPropertyController@getUserProperty')->name('user-property-index');

                Route::get('approved', 'realtorPropertyController@getApprovedProperties')->name('approved');

                Route::get('contracted', 'realtorPropertyController@getContractedProperties')->name('contracted');

                Route::get('closed', 'realtorPropertyController@getClosedProperties')->name('closed');

                Route::post('update-level/{id}', 'realtorPropertyController@updatePropertyLevel')->name('update');

                // Route::post('approve/{id}', 'realtorPropertyController@approveProperty')->name('approve');

                Route::post('state-update/{id}', 'realtorPropertyController@updatePropertyState')->name('state-update');

                Route::get('/{id}', 'realtorPropertyController@showUserProperty')->name('show');
                           
            });
        });

        // investor only routes
        Route::group(['as' => 'enterprise.','prefix'=>'enterprise','middleware'=>['role:enterprise']], function () {

            Route::get('/', 'EnterpriseController@index')->name('index');

            Route::get('/billing-details', 'BillingController@billingDetails')->name('billingDetails');

            Route::group(['as' => 'property.','prefix'=>'property'], function () {

                Route::get('/phase/{phase}', 'enterprisePropertyController@getPhaseProperties')->name('phase-index');

                Route::get('seller/{id}', 'enterprisePropertyController@getUserProperty')->name('user-property-index');

                Route::get('approved', 'enterprisePropertyController@getApprovedProperties')->name('approved');

                Route::get('contracted', 'enterprisePropertyController@getContractedProperties')->name('contracted');

                Route::get('closed', 'enterprisePropertyController@getClosedProperties')->name('closed');

                Route::post('update-level/{id}', 'enterprisePropertyController@updatePropertyLevel')->name('update');

                // Route::post('approve/{id}', 'enterprisePropertyController@approveProperty')->name('approve');

                Route::post('state-update/{id}', 'enterprisePropertyController@updatePropertyState')->name('state-update');

                Route::get('/{id}', 'enterprisePropertyController@showUserProperty')->name('show');
                           
            });
        });


        // seller and realtor only routes

        Route::group(['as' => 'seller.','prefix'=>'Dash','middleware'=>['seller-realtor:seller']], function () {

            Route::get('/', 'sellerController@index')->name('index');

            Route::get('/proposal', 'ProposalController@sellerShow')->name('proposal.show');

            Route::get('/property-proposal-list/{id}', 'sellerPropertyController@propertyProposalsList')->name('proposal.list');

            Route::get('/property-proposal-list/{id}/{investor_id}', 'sellerPropertyController@investorProposalsView')->name('investorProposals.view');

            Route::post('/property-proposal-list', 'sellerPropertyController@investorProposalsList')->name('investorProposals.list');
            
            Route::get('/billing-details', 'BillingController@billingDetails')->name('billingDetails');

            Route::get('/cancel-subscription', 'BillingController@cancelSubscription')->name('cancelSubscription');

            Route::get('/proposal/accepted', 'ProposalController@sellerApprovedShow')->name('proposal.approved.show');

            Route::get('/proposal/denited', 'ProposalController@sellerDeniedShow')->name('proposal.denied.show');

            Route::post('/proposal/update', 'ProposalController@updateStatus')->name('proposal.update');
            
            Route::post('/proposal/setAccept', 'ProposalController@setAccept')->name('proposal.setAccept');


            Route::get('/property/find', 'SearchController@findState');

            Route::get('property/uploadcsv', 'sellerController@importCSV')->name('importCSV');

            Route::post('property/bulkimport', 'sellerController@uploadCSV')->name('uploadCSV');
            
            Route::get('/get-user-plan-detail-by-plan-id', 'BillingController@getUserPlanDetailsByPlanID')->name('getUserPlanDetailsByPlanID');

            Route::get('/document', 'sellerController@viewDocument')->name('viewDocument');

            Route::group(['as' => 'property.','prefix'=>'property'], function () {

                Route::get('/phase/{phase}', 'sellerPropertyController@getPhaseProperties')->name('phase-index');

                Route::get('seller/{id}', 'sellerPropertyController@getUserProperty')->name('user-property-index');

                Route::get('investorProposals/{id}', 'sellerPropertyController@getUserProperty')->name('user-property-index');

                Route::get('approved', 'sellerPropertyController@getApprovedProperties')->name('approved');

                Route::get('contracted', 'sellerPropertyController@getContractedProperties')->name('contracted');

                Route::get('closed', 'sellerPropertyController@getClosedProperties')->name('closed');

                Route::post('update-level/{id}', 'sellerPropertyController@updatePropertyLevel')->name('update');

                // Route::post('approve/{id}', 'sellerPropertyController@approveProperty')->name('approve');

                Route::post('state-update/{id}', 'sellerPropertyController@updatePropertyState')->name('state-update');

                Route::get('/{id}', 'sellerPropertyController@showUserProperty')->name('show');
                           
            });

            // proposal creation route
            Route::post('proposal/new_create', 'ProposalController@new_create')->name('proposal.new_create');
        });

        // Whole-seller only routes

        Route::group(['as' => 'whole-seller.','prefix'=>'whole-seller'], function () {
            
            Route::get('/', 'wholeSellerController@index')->name('index');

            Route::get('/proposal', 'ProposalController@sellerShow')->name('proposal.show');

            Route::get('/property-proposal-list/{id}', 'wholeSellerPropertyController@propertyProposalsList')->name('proposal.list');

            Route::get('/property-proposal-list/{id}/{investor_id}', 'wholeSellerPropertyController@investorProposalsView')->name('investorProposals.view');

            Route::post('/property-proposal-list', 'wholeSellerPropertyController@investorProposalsList')->name('investorProposals.list');
            
            Route::get('/billing-details', 'BillingController@billingDetails')->name('billingDetails');

            Route::get('/cancel-subscription', 'BillingController@cancelSubscription')->name('cancelSubscription');

            Route::get('/proposal/accepted', 'ProposalController@sellerApprovedShow')->name('proposal.approved.show');

            Route::get('/proposal/denited', 'ProposalController@sellerDeniedShow')->name('proposal.denied.show');

            Route::post('/proposal/update', 'ProposalController@updateStatus')->name('proposal.update');
            
            Route::post('/proposal/setAccept', 'ProposalController@setAccept')->name('proposal.setAccept');


            Route::get('/property/find', 'SearchController@findState');

            Route::get('property/uploadcsv', 'wholeSellerController@importCSV')->name('importCSV');

            Route::post('property/bulkimport', 'wholeSellerController@uploadCSV')->name('uploadCSV');
            
            Route::get('/get-user-plan-detail-by-plan-id', 'BillingController@getUserPlanDetailsByPlanID')->name('getUserPlanDetailsByPlanID');

            Route::get('/document', 'wholeSellerController@viewDocument')->name('viewDocument');

            Route::group(['as' => 'property.','prefix'=>'property'], function () {

                Route::get('/phase/{phase}', 'wholeSellerPropertyController@getPhaseProperties')->name('phase-index');

                Route::get('seller/{id}', 'wholeSellerPropertyController@getUserProperty')->name('user-property-index');

                Route::get('investorProposals/{id}', 'wholeSellerPropertyController@getUserProperty')->name('user-property-index');

                Route::get('approved', 'wholeSellerPropertyController@getApprovedProperties')->name('approved');

                Route::get('contracted', 'wholeSellerPropertyController@getContractedProperties')->name('contracted');

                Route::get('closed', 'wholeSellerPropertyController@getClosedProperties')->name('closed');

                Route::post('update-level/{id}', 'wholeSellerPropertyController@updatePropertyLevel')->name('update');

                // Route::post('approve/{id}', 'wholeSellerPropertyController@approveProperty')->name('approve');

                Route::post('state-update/{id}', 'wholeSellerPropertyController@updatePropertyState')->name('state-update');

                Route::get('/{id}', 'wholeSellerPropertyController@showUserProperty')->name('show');
                           
            });

            // proposal creation route
            Route::post('proposal/new_create', 'ProposalController@new_create')->name('proposal.new_create');
        });
    });






    // Common routes



    Route::group(['middleware'=>'auth'], function () {

        Route::get('viewedproperties', 'propertyController@viewedProperties')->name('viewedProperties');
        Route::get('contractedProperties', 'propertyController@contractedProperties')->name('contractedProperties');
        // common profile routes

        Route::get('{user}/profile/Edit', 'profileController@edit')->name('profile.edit');

        Route::get('{user}/profile/{adminView?}', 'profileController@show')->name('profile.show');
        
        Route::post('/profile', 'profileController@update')->name('profile.update');
        
        Route::post('/profile/WorkCategoryImageDelete', 'profileController@WorkCategoryImageDelete')->name('profile.WorkCategoryImage.delete');

        Route::post('/profile/workCategoryDelete', 'profileController@workCategoryDelete')->name('profile.workCategory.delete');

        Route::post('/profile/specialityDelete', 'profileController@specialityDelete')->name('profile.Speciality.delete');

        Route::get('/profile/delete/{id}', 'profileController@destroy')->name('profile.delete');

        // commin admin documents show route

        Route::get('{user}/documents', 'DashboardController@showDocument')->name('document.show');



        // common dashboard blog and search route

        Route::get('{user}/blog', 'blogController@index')->name('blog.show');

        Route::get('{user}/blog/{id}', 'blogController@show')->name('blog.view');        

        Route::post('{user}/blog/search', 'blogController@search')->name('blog.search');



        // common dashboard training and search route

        Route::get('{user}/Resource', 'TrainingVideoController@panelIndex')->name('resource.panel.show');

        Route::post('{user}/Resource/search', 'TrainingVideoController@search')->name('training.search');



        // common membership route

        Route::get('{user}/membership', 'MembershipController@showMemberShip')->name('membership.show');

        Route::post('{user}/membership', 'MembershipController@createMemberShip')->name('membership.create');



        // messaging routes

        Route::get('message/{id}', 'MessageController@chatHistory')->name('message.read');
        Route::post('proposal/setRead', 'ProposalController@setRead')->name('proposal.setRead');

        Route::group(['prefix'=>'ajax', 'as'=>'ajax::'], function () {

            Route::post('message/latest', 'MessageController@getNewMessage')->name('message.latest');

            Route::post('message/send', 'MessageController@ajaxSendMessage')->name('message.new');

            Route::delete('message/delete/{id}', 'MessageController@ajaxDeleteMessage')->name('message.delete');

        });



        // alert and notifcation routes

        Route::post('alert/message', 'AlertController@getMessageAlerts')->name('alerts.latest');

        Route::post('alert/notification', 'AlertController@getNotificationAlerts')->name('notifications.latest');
        Route::post('alert/readAll', 'AlertController@markAsRead')->name('notifications.readAll');

    });


Route::group(['prefix'=>'inquiries'],function (){
    Route::post('store-inquiry','InquiryController@store')->name('inquiry.store');
    Route::get('accept-inquiry/{id}','InquiryController@accept')->name('inquiry.accept');
    Route::get('reject-inquiry/{id}','InquiryController@reject')->name('inquiry.reject');
    Route::get('inquiry-edit/{id}','InquiryController@editInquiry')->name('inquiry.edit');
    Route::post('inquiry-update/{id}','InquiryController@updateInquiry')->name('update.inquiry');
    Route::get('inquiry-delete/{id}','InquiryController@deleteInquiry')->name('delete.inquiry');
});


    // external pages routes

    Route::get('/Realtor', 'HomeController@realtor')->name('realtorFront');



    Route::get('/Investor', 'HomeController@investor')->name('investorFront');



    Route::get('/Seller', 'HomeController@seller')->name('sellerFront');



    Route::get('/Subscription', 'HomeController@subscription')->name('subscriptionFront');



    Route::get('/contact', 'contactController@contactPage')->name('contactFront');

    // external route end





    // external blog route and search route

    Route::get('/Blog', 'blogController@outerIndex')->name('blog.outer.show');

    Route::get('/Blog/{id}', 'blogController@outerShow')->name('blog.outer.view');    

    Route::post('/Blog/search', 'blogController@search')->name('blog.outer.search');



    // external training route and search route

    Route::get('/Resource', 'TrainingVideoController@index')->name('train.outer.show');

    Route::post('/Resource/search', 'TrainingVideoController@search')->name('training.outer.search');



    // route for sending contact mail

    Route::post('/contact-us', 'contactController@contact')->name('contact.send');



    Route::get('/how-it-works', 'HomeController@howitworks')->name('howitworkFront');

    ;



    // email validation routes

    Route::get('/emailV/{token}', 'Auth\RegisterController@verifyUser');

    // Override register route
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    Route::post('rolebasedplans', 'Auth\RegisterController@getrolebasedplans')->name('getrolebasedplans');
    Route::post('checkCouponCode', 'Auth\RegisterController@checkCouponCode')->name('checkCouponCode');

    Route::get('paymentsuccess', array('as' => 'paymentsuccessfull.stripe','uses' => 'StripeResponseController@paymentsuccessfull'));


    // logout route

    // Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('login','Auth\LoginController@login')->name('login');
    Auth::routes();

    
    // route for managing property
    Route::get('/admin/property/phase/{id}/add-property/', 'ManagePropertyController@addProerpty')->name('AddProperty');
    Route::post('/admin/store-property/', 'ManagePropertyController@storeProerpty')->name('StoreProerpty');
    Route::post('/admin/store-property-images/', 'ManagePropertyController@storeProerptyImages')->name('StoreProerptyImages');
    Route::post('/admin/get-property-images/', 'ManagePropertyController@getProerptyImages')->name('getProerptyImages');
    Route::post('/admin/make-cover-img/', 'ManagePropertyController@makeCoverImg')->name('makeCoverImg');
    Route::post('/admin/delete-property-image/', 'ManagePropertyController@deletePropertyImg')->name('deletePropertyImg');
    Route::post('/admin/property-active/', 'ManagePropertyController@isActive')->name('IsActiveProerpty');
    Route::get('/admin/property/phase/{id}/edit', 'ManagePropertyController@editProerpty')->name('EditProperty');
    Route::get('/admin/property/phase/{id}/del', 'ManagePropertyController@delProerpty')->name('DeleteProperty');
    Route::get('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

    Route::group(['prefix'=>'admin/bookings/time-slots'],function (){
       Route::get('/','BookingContoller@index')->name('booking.index');
       Route::get('/create','BookingContoller@addTimeSlot')->name('booking.add');
       Route::post('/store','BookingContoller@store')->name('booking.store');
       Route::get('edit/{id}','BookingContoller@edit')->name('booking.edit');
       Route::post('update/','BookingContoller@update')->name('booking.update');
       Route::get('delete/{date}','BookingContoller@deleteSlot')->name('booking.delete');
       Route::post('getTimeslots','BookingContoller@getTimeSlots')->name('booking.slots');
       Route::post('delete-time-slots','BookingContoller@deleteTimeSlot')->name('timeslot.delete');
    });


    Route::group(['prefix'=>'admin/reservations'],function (){
       Route::get('/','ReservationController@index')->name('reservation.index');
    });
    Route::get('/get-user-plan-detail-by-plan-id', 'BillingController@getUserPlanDetailsByPlanID')->name('getUserPlanDetailsByPlanID');
    
    

// New GUI work by Sonal
Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/seller','frontendController@seller_index')->name('seller_index');
Route::post('/seller/seller-store-property/', 'ManagePropertyController@sellerStoreProerpty')->name('SellerStoreProerpty');
Route::get('/investor','frontendController@investor_index')->name('investor_index');
Route::get('/pricing','frontendController@subscription_index')->name('subscription_index');
Route::get('/how-it-works','frontendController@how_it_works_index')->name('how_it_works_index');
Route::get('/our-training','frontendController@training_index')->name('training_index');
Route::get('/realtor','frontendController@realtor_index')->name('realtor_index');
Route::get('/contact','frontendController@contact_index')->name('contact_index');
Route::get('/terms-of-use','frontendController@terms_of_use_index')->name('terms_of_use_index');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/homeplan', 'HomeplanController@index')->name('homeplan');
        Route::get('/plans', 'PlanController@index')->name('plans.index');
        Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
        Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');
    });

Route::post('subscribe', 'frontendController@subscribeToMailchimp')->name('subscribeToMailchimp');
Route::get('/property-lists','frontendController@property_lists')->name('property_lists');
Route::get('/load-ajax-data/','frontendController@loadDataAjax')->name('getAjaxData');
Route::get('/envoy','frontendController@getEnvoyindex')->name('envoy.index');
Route::get('/state-name', 'frontendController@getStateName')->name('envoy.state-name');
Route::Post('/city-name', 'frontendController@getCityName')->name('envoy.city-name');

// filter on grid list front end
Route::post('/serach-from-keyword/','frontendController@keywordSearch')->name('keywordSearch');
Route::post('/get-owner-details/','frontendController@getOwnerDetails')->name('getOwnerDetails');
//Route::get('/filter-by-invt-amt-range/','frontendController@invtAmountRange')->name('invtAmountRange');
//Route::get('/filter-by-arv-brv-range/','frontendController@ArvBrvRange')->name('ArvBrvRange');

Route::get('/property-lists/{id}/property-details','frontendController@property_single_page')->name('property_single_page');
Route::post('/getCounty','ManagePropertyController@getCounty')->name('getCounty');

Route::get('/notificationcheck', 'PusherNotificationController@sendNotification');
Route::get('/approve-property/{id}', 'BaseController@approvePropertyFromMail');
Route::get('/upgradeSubscription', 'wholeSellerController@upgradeSub')->name('upgradeSub');

Route::post('/hidevideo', 'profileController@hideVideo')->name('hidevideo');

Route::get('/clearCache', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    return 'Hurry!! Cleared all cache successfully.';
});

Route::get('/test','testController@toFacebookPoster1')->name('toFacebookPoster1');