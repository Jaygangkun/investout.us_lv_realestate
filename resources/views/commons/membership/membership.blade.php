@extends(session('layout')) 
@section('style')
<style media="screen">
    .ibox-content {
        background: white;
        padding: 0px;
        border: none;
        color: #0b2a4a !important;
    }

    h1 {
        font-family: unisansboldbold;
        font-weight: 100;
    }

    #page-wrapper {
        background: white;
        padding: 3em .8em !important
    }

    .ibox-content {
        box-shadow: 0 -2px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        margin-bottom: 2em;
    }

    .table {
        margin: 0px !important
    }

    #membership_detail .modal-dialog {
        margin-right: 23%;
        width: 25%;
        margin-top: 10%;
    }

    .modal-content {
        border-radius: 0px;
    }

    #membership_detail h2,
    #membership_buy h2 {
        font-family: unisansboldbold;
        color: #0b2a4a;
        font-size: 2.3em;
        margin-bottom: 1.3em;
    }

    #membership_detail h4 {
        font-family: unisansboldbold;
        color: #0b2a4a;
        font-size: 1.3em;
        font-weight: 100;
    }

    #membership_detail .membership_dates {
        color: #7bc3b5;
        font-family: unisansregularregular;
        font-size: 1.2em;
    }

    .apply-button {
        background-color: #0b2a4a;
        color: white;
        font-family: unisansboldbold;
        border-radius: 6px;
        box-shadow: -3px 3px 3px 0px rgba(100, 100, 100, .24);
        border: none;
        width: 33%;
    }

    .apply-button:hover {
        color: white !important
    }

    .apply-button:focus {
        color: white;
    }

    .membership-medium {
        cursor: pointer;
    }

    .modal-open {
        overflow: scroll;
    }

    #membership_buy .modal-dialog {
        width: 75%;
        margin-right: 5.4%;
        margin-top: 10%;
    }

    #membership_buy .modal-body {
        padding: 0px;
    }

    #membership_buy .modal-body>.row>div {
        padding: 60px 50px;
        height: 100%
    }

    #membership_buy h2 {
        display: inline;
        padding-bottom: .8em;
    }

    #membership_buy label {
        font-family: unisansboldbold;
        font-weight: 100;
        color: #0b2a4a;
        font-size: 1.1em;
    }

    .membership-left-section input {
        box-shadow: 4px 4px 5px -2px rgba(100, 100, 100, .4) !important;
        border-radius: 5px;
        border: 1px solid #eee;
        padding-left: 1em;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
        height: 40px
    }

    #membership_buy input:focus,
    #membership_buy select:focus {
        border: 1px solid #eee !important;
    }

    #membership_buy .membership-right-section {
        background: url("{{ asset('dashboard/membership-back.png') }}");
        margin-top: -11px;
        margin-left: -15px;
        height: 391px;
    }

    .payment-form-icon {
        line-height: 46px;
        margin-right: 10px;
        color: #dddddd !important;
    }

    #payment-form .has-error .form-control {
        border-color: #ed5565 !important;
    }

    #payment-form .has-success .input-group-addon {
        color: #3c763d !important;
        background-color: #dff0d8 !important;
        border-color: #3c763d !important;
    }
</style>
@endsection
 
@section('body')
<div class="custom-container-a">

    <div class="row">
        <div class="membership-title col-lg-12">
            <h1><strong>Our Membership Plan</strong></h1>
        </div>
        <div class="col-lg-12">
            <div class="">
                <div class="text-right" style=''>
                    @if(auth()->user()->membership_type == 1)
                    <a href='#' data-target="#membership_detail" data-toggle='modal' type="button" style='width:20%;margin-bottom: 15%;margin-bottom: 2%;'
                        class="btn btn-sm btn-primary-01 apply-button">Membership Detail</a> @endif
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered  text-center membership">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <h2><strong style='font-weight:100;'>Check out our Membership plans</strong></h2>
                                        <h2 style='color:#a8aaac;font-size:1.4em;font-weight:100'>Read about our features below and choose the <br>membership plan that's right for
                                            you.
                                        </h2>
                                    </th>
                                    <th class="text-center membership-basic">
                                        <h1 style='margin-left:-49px;margin-bottom:-15px'><strong>Basic</strong></h1>
                                        <div class="membership-price-module"><i class="fa fa-dollar"></i><label class="membership-price">0</label><label class="membership-month">/MONTH</label>
                                            <label style='font-family:unisansregularregular;color:#a8aaac;display:block;font-size:1.2em;font-weight:100'>Current membership</label>
                                        </div>

                                    </th>
                                    <th class="text-center membership-medium">
                                        <h1 style='margin-left:-40px;margin-bottom:-13px'><strong>Enterprise</strong></h1>
                                        <div class="membership-price-module"><i class="fa fa-dollar"></i><label class="membership-price">59</label><label class="membership-month">/month</label></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th class="memebership-content membership-table-th">
                                        <h3 class="text_decoration_line"><strong>Review Property Listings in need of investment</strong></h3>
                                        <h4>Users have the opportunity to see all of the properties based on their search criteria.Users
                                            can see the seller's suggested current (BRV)and projected (ARV)post renovation
                                            value. Basic level members are able to purchase different types of information
                                            on individual properties(Ale cart) and submit proposals for a fee.</h4>
                                    </th>
                                    <td class="membership-basic">
                                        <i class="fa fa-check-circle"></i>
                                    </td>
                                    <td class="membership-medium"><i class="fa fa-check-circle"></i></td>
                                </tr>
                                <tr>
                                    <th class="memebership-content">
                                        <h3 class="text_decoration_line"><strong>Submit proposals to property owners</strong></h3>
                                        <h4>Proposal sbumissions are only available forthe Enterprise membership level or if
                                            purchased through Ale cart services for the Basic level of membership.</h4>
                                    </th>
                                    <td class="membership-basic">
                                        <i class="fa fa-times-circle"></i>
                                    </td>
                                    <td class="membership-medium"><i class="fa fa-check-circle"></i></td>
                                </tr>
                                <tr>
                                    <th class="memebership-content membership-table-th">
                                        <h3 class="text_decoration_line"><strong>View Property Inspection Reports</strong></h3>
                                        <h4>Property inspection report reviews are only available for eht Enterprise membership
                                            level or if purchased through Ale cart services for the Basic level of membership.
                                        </h4>
                                    </th>
                                    <td><i class="fa fa-times-circle"></i></td>
                                    <td class="membership-medium"><i class="fa fa-check-circle"></i></td>

                                </tr>
                                <tr>
                                    <th class="memebership-content ">
                                        <h3 class="text_decoration_line"><strong>Review Title & Lien Search Results</strong></h3>
                                        <h4>Title & Lien search results are only available for the Enterprise membership level
                                            or if purchased through Ale cart services for the Basic level of membership</h4>
                                    </th>
                                    <td><i class="fa fa-times-circle"></i></td>
                                    <td class="membership-medium"><i class="fa fa-check-circle"></td>

                                    </tr>
                                    <tr>
                                        <th class="memebership-content membership-table-th">
                                            <h3 class="text_decoration_line"><strong>Invest Out facilitation of services</strong></h3>
                                            <h4>If through the Ale carte services if the Basic membership level is awarded the project by the Seller, Invest Out services are additionally awarded to the investor based on the Enterprise level services.</h4>
                                        </th>
                                        <td><i class="fa fa-check-circle"></i></td>
                                    <td class="membership-medium"><i class="fa fa-check-circle"></i></td>

                                </tr>
                                <tr>
                                    <th class="memebership-content ">
                                        <h3 class="text_decoration_line"><strong>Communicate directly with home owners</strong></h3>
                                        <h4>Enterprise level members will have the option to communicate realtime with property
                                            owners.
                                        </h4>
                                    </th>
                                    <td><i class="fa fa-times-circle"></i></td>
                                    <td class="membership-medium"><i class="fa fa-check-circle"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                                                    <div class='member-btns'>
                                    <button type="button" class="btn btn-sm btn-primary-01 apply-button ent-btn" style='width:12%;float:right;margin-right:2em'>Enterprise</button>
                                </div>

                </div>
            </div>

        </div>

    </div>

    @if(auth()->user()->membership_type == 1 )
    <div class="modal fade" id="membership_detail">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="" style=''>
              <h2>Membership Detail</h2>
              <hr style='margin-bottom: 30px;'>
              <h4><i class="fa fa-calendar"></i> &nbsp;Membership Starting Date</h4>
                                        <span class='membership_dates'>{{auth()->user()->membership->mem_start_date}}</span>
                                        <h4><i class="fa fa-calendar"></i> &nbsp;Membership Ending Date</h4>
                                        <span class='membership_dates'>{{auth()->user()->membership->mem_end_date}}</span>
                                        <h4><i class="fa fa-dollar"></i> &nbsp;Membership Type</h4>
                                        <span class='membership_dates'>Enterprise Membership </span>
                                        <hr style='margin:30px 0px'> {{--
                                        <div class="text-right" style='margin-top:2em'>
                                            <a href='#' type="button" class="btn btn-sm btn-primary-01 apply-button">Renew</a>
                                        </div> --}}

                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endif
    <div class="modal fade" id="membership_buy">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method='post' id="payment-form" action='{{route("membership.create",auth()->user()->roles()->first()->slug) }}'>
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12" style='padding-bottom:3.5em;'>
                                        <h2>Membership detail</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="membership-left-section">
                                        <div class="col-md-12">
                                            @if(session('card_error'))
                                            <label class='text text-danger payment-error'>{{session('card_error')}}</label>                                            @else
                                            <label class='text text-danger payment-error'></label> @endif
                                            <strong class='text-danger'>{{ $errors->first() }}</strong>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <label for="formGroupExampleInput">First Name</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <label for="formGroupExampleInput">Last Name</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="formGroupExampleInput">Credit Card Number <small class="text-muted">[<span data-payment="cc-brand"></span>]</small></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                    <input id="cc-number" data='Please enter a valid credit card number.' type="tel" class="input-lg form-control cc-number"
                                                        autocomplete="cc-number" placeholder="•••• •••• •••• ••••" data-payment='cc-number'
                                                        required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Expiration (MM/YYYY)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input id="cc-exp" data='Please enter a valid expiration date.' type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp"
                                                        placeholder="•• / ••••" data-payment='cc-exp' required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>CVC Code</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input id="cc-cvc" data='Please enter a valid CVC.' type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••"
                                                        data-payment='cc-cvc' required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 membership-right-section">
                                <div class="col-md-12" style='padding-bottom:3em;'>
                                    <h2>Complete Checkout</h2>
                                </div>
                                <div class="col-md-12">
                                    <ul>
                                        <li><label style='font-size:1.1em' for="">Review Property Listings in need of investment</label></li>
                                        <li><label style='font-size:1.1em' for="">Submit proposals to property owners</label></li>
                                        <li><label style='font-size:1.1em' for="">View Property Inspection Reports</label></li>
                                        <li><label style='font-size:1.1em' for="">Review Title & Lien Search Results</label></li>
                                        <li><label style='font-size:1.1em' for="">Invest Out facilitation of services</label></li>
                                        <li><label style='font-size:1.1em' for="">Communicate directly with home owners</label></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 text-right" style='margin-top: 30px;padding:0px'>
                                    <h2 class=''>Total: &nbsp;&nbsp;&nbsp; $59 <sub style='font-size:.6em'>/MO</sub></h2>
                                </div>
                                <div class="col-md-12 text-right" style='padding:0px'>
                                    <div class="text-right" style='margin-top:10px'>
                                        <button id="validate" type="button" class="btn btn-sm btn-primary-01 apply-button">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
 
@section('script')

    <script type='text/javascript' src='{{asset("js/jquery.payment.js")}}'></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_aYhxn06i5P1NyV906GgEkEA7');
    </script>
    <script>
        @if(session('card_error'))
            $('#membership_buy').modal('show');
        @endif


        $('.ent-btn').click(()=>{
            $('#membership_buy').modal('show');
        })

        cardIcons = {
                    "visa": "fa fa-cc-visa",
                    "mastercard": "fa fa-cc-mastercard",
                    "amex": "fa fa-cc-amex",
                    "dinersclub": "fa fa-cc-diners-club",
                    "discover": "fa fa-cc-discover",
                    "jcb": "fa fa-cc-jcb",
                    "default": "fa fa-credit-card-alt"
                };

        $('#cc-number').payment('formatCardNumber');
        $('#cc-exp') .payment('formatCardExpiry')
        $('#cc-cvc') .payment('formatCardCVC')
                    // Update card type on input
        $('#cc-number').change(function () {
            let cardType = $.payment.cardType($(this).val());
            var fg = $(this).closest('.form-group');
            fg.toggleClass('has-feedback', true);
            fg.find('.form-control-feedback').remove();
            if (cardType) {
                $('span[data=cc-brand]').text(cardType);
                // Also set an icon
                var icon = cardIcons[cardType] ? cardIcons[cardType] : cardIcons["default"];
                fg.append("<i class='" + icon + " fa-lg payment-form-icon form-control-feedback'></i>");
            } else {
                $("[data-payment='cc-brand']").text("");
            }

            setValidationState($(this), !$.payment.validateCardNumber($(this).val()),$(this).attr('data'));
        });


        $("#cc-exp").change(function(){
        // Validate card expiry on change
            setValidationState($(this), !$.payment.validateCardExpiry($(this).payment('cardExpiryVal')),$(this).attr('data'));
        })

        $("#cc-cvc").change(function(){
            let ct = $.payment.cardType($('#cc-number').val());
            setValidationState($(this), !$.payment.validateCardCVC($(this).val(),ct),$(this).attr('data'));
        })


        setValidationState = function (el, erred,data) {
            var fg = el.closest('.form-group');
            fg.toggleClass('has-error', erred).toggleClass('has-success', !erred);
            fg.find('.payment-error-message').remove();
            if (erred) {
                fg.append("<span class='text-danger payment-error-message'>" + data + "</span>");
            }


            return this;
        }


        $('#validate').click(function(e){
            e.preventDefault()
            let ct = $.payment.cardType($('#cc-number').val());
            let valid = setValidationState($('#cc-number'), !$.payment.validateCardNumber($('#cc-number').val()), $('#cc-number').attr('data'));
            valid = setValidationState($('#cc-exp'), !$.payment.validateCardExpiry($('#cc-exp').payment('cardExpiryVal')),$('#cc-exp').attr('data'));
            valid = setValidationState($('#cc-cvc'), !$.payment.validateCardCVC($('#cc-cvc').val(),ct),$('#cc-cvc').attr('data'));
            if(valid){
                let expiry = $('#cc-exp').payment('cardExpiryVal')
               Stripe.card.createToken({
                    number: $('#cc-number').val(),
                    cvc: $('#cc-cvc').val(),
                    exp_month: expiry.month,
                    exp_year: expiry.year
                }, stripeResponseHandler);
            }
                        // Re-enable the submit button:
            $('#validate').prop('disabled', true);
        })

        function stripeResponseHandler(status, response) {
            if (response.error) {
                reportError(response.error.message);
            } else { // No errors, submit the form.
                // Get a reference to the form:
                var f = $("#payment-form");

                // Get the token from the response:
                var token = response.id;
                // Add the token to the form:
                f.append('<input type="hidden" name="stripeToken" value="' + token + '" />');

                // Submit the form:
                f.get(0).submit();
            }
        }

        function reportError(msg) {

            // Show the error in the form:
            $('.payment-error').text('');
            $('.payment-error').text(msg);

            // Re-enable the submit button:
            $('#validate').prop('disabled', false);

            return false;

        }

        // $(document).ready(function() {

        //     // Watch for a form submission:
        //     $("#payment-form").submit(function(event) {
        //         $('#submitBtn').attr('disabled', 'disabled');
        //         return false;
        //     }); // form submission



        //     function stripeResponseHandler(status, response) {
        //         if (response.error) {
        //             reportError(response.error.message);
        //         } else { // No errors, submit the form.
        //             // Get a reference to the form:
        //             var f = $("#payment-form");

        //             // Get the token from the response:
        //             var token = response.id;

        //             // Add the token to the form:
        //             f.append('<input type="hidden" name="stripeToken" value="' + token + '" />');

        //             // Submit the form:
        //             f.get(0).submit();
        //         }
        //     }

        //     function reportError(msg) {

        //         // Show the error in the form:
        //         $('#payment-errors').text(msg).addClass('error');

        //         // Re-enable the submit button:
        //         $('#submitBtn').prop('disabled', false);

        //         return false;

        //     }


        // }); // document ready.
    </script>
@endsection