
<?php $__env->startSection('title'); ?>
Register On InvestOut
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>

  <style media="screen">
  @media (min-width: 992px){
  .auth-right {
      width: 57.6%;
  }
  .auth-left{
    height: 103%;
    position: absolute;
    left: 0;
    top: 0;
    width: 40.6%;
  }
  .auth-right > div:first-child{
        width: 51.0%;
  }
  .inside-right-container{
    width: 47.333333%
  }
  .card {
    overflow: hidden;
    position: relative;
    width: 92.5%;
    margin-left: 4.5%;
  }
}
  .auth-right {
    padding: 2em 0em;
    margin-left: 43.8%;
  }

  .auth-right h4{
    margin-bottom: .5em;
  }

  .auth-right form .col-md-12{
    padding:0px;
  }

  .auth-right input:last-of-type{
    margin-bottom: .8em;
  }
  .auth-left img{
    height: 100%;
  }

  .auth-left,.inside-right-container{
    padding-top: 29%;
  }

  .auth-left img{
    position: absolute;
    top: -4px;
    left: -4px;
    z-index: 1;
    width: 100%;
  }

  .inside-right-container{
    padding:3.5em;
    padding-top: 41%;
  }
  .inside-right-container img{
    width: 100%;
  }

  .auth-right .dont-have-account{
    font-size: 1.1em;
    width: 100%;
    padding:0px;
    padding-top: 1em;
    text-align: center;
    color: #808080;
  }
      .outer {
      width: 4px;
      height: 808px;
      margin: auto;
      position: absolute;
      overflow: hidden;
      top: 10%;
      left: 6%;
      }
    .inner {
      position: absolute;
      width: 100%;
      height: 33.5%;
      background: #e6e7e8;
    }
    .inner1{
      position: absolute;
      width: 100%;
      top: 41%;
      height: 37.5%;
      background: #e6e7e8;
    }

    .invalid-feedback{
      color: red;
    }
    .auth-right select{
      height: 49px;
    }
    #card-errors{
      color: red;
    }
  </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<main class=''>
  <div class="container ">
    <div class="row">
      <div class="card col-md-8 col-md-offset-2">
        <div class="col-md-5 auth-left text-center">
          <img src="<?php echo e(asset('sitefront/auth-back.png')); ?>" alt="">
          <div class="">
            <h3 style='letter-spacing:3px;margin-bottom:0px'>WELCOME TO</h3>
            <h1 style='margin:6px;'><a href="/" class='no-hover'>INVESTOUT</a></h1>
          <h3>For Yourself dosen't <br> mean BY YourSelf</h3>
          </div>
        </div>

        <div class="col-md-7 auth-right">
          <div class="col-md-8" style='padding-left:0px'>
            <div class="row text-left" style='margin:0px'>
              <h4>Sign Up for <br><span class='site-brand'><a href="/" class='no-hover'>InvestOut</a> </span> Dashboard</h4>
            </div>
            <?php if(session('warning')): ?>
                <div class="alert alert-warning">
                    <?php echo e(session('warning')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-md-12">
                <h5><?php echo e($selected_plan_name); ?></h5>
                <h5>Role : <?php echo e($selected_role_name); ?></h5>
                <form method="POST" action="<?php echo e(route('register')); ?>"  id="payment-form">
                    <?php echo csrf_field(); ?>
                  <?php if($selected_role == 9 || $selected_role == 1): ?>
                    <input type="hidden" name="company" value="" placeholder="Company *">
                  <?php else: ?>
                  <div class="col-md-12">
                    <input type="text" class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>" name="company" value="<?php echo e(old('company')); ?>" placeholder="Company *">
                    <?php if($errors->has('company')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('company')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <?php endif; ?>
                  <div class="col-md-6" style='padding:0px'>
                    <input type="text" class="form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>" name="first_name" placeholder="First Name *" value="<?php echo e(old('first_name')); ?>" data-validation-engine="validate[required,maxSize[30]]" maxlength=100>
                    <?php if($errors->has('first_name')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('first_name')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-6" style='padding:0px;padding-left:5px'>
                    <input type="text" class="form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" placeholder="Last Name *" data-validation-engine="validate[required,maxSize[30]]">
                    <?php if($errors->has('last_name')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('last_name')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-12">
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email *" data-validation-engine="validate[required,custom[email]]" maxlength="100">

                    <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-12">
                    <input type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="address" value="<?php echo e(old('address')); ?>" placeholder="Address *" data-validation-engine="validate[required,maxSize[255]]" >
                    <?php if($errors->has('address')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('address')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-6" style='padding:0px'>
                    <input type="text" class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>" name="city" value="<?php echo e(old('city')); ?>" placeholder="City *" data-validation-engine="validate[required,custom[onlyLetterSp]]" maxlength=100>
                    <?php if($errors->has('city')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('city')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-6" style='padding:0px;padding-left:5px'>
                    <!--<input type="text" class="form-control<?php echo e($errors->has('state') ? ' is-invalid' : ''); ?>" name="state" value="<?php echo e(old('state')); ?>" placeholder="State *" data-validation-engine="validate[required]" maxlength=100>-->
                    <select name="state" class='form-control<?php echo e($errors->has('state') ? ' is-invalid' : ''); ?>' id="" data-validation-engine="validate[required]">
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($edit_properties) && $edit_properties->state == $zip->state): ?>
                                <option value='<?php echo e($zip->state); ?>' selected><?php echo e($zip->state); ?></option>
                            <?php else: ?>
                                <option value='<?php echo e($zip->state); ?>'><?php echo e($zip->state); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('state')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('state')); ?></strong>
                        </span>
                    <?php endif; ?>                  </div>
                  <div class="col-md-12">
                    <input type="tel" class="form-control<?php echo e($errors->has('zipCode') ? ' is-invalid' : ''); ?>" name="zipCode" value="<?php echo e(old('zipCode')); ?>" placeholder="Zip Code *" data-validation-engine="validate[required,custom[onlyNumberSp],minSize[5],maxSize[5]]" maxlength=5>
                    <?php if($errors->has('zipCode')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('zipCode')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-12" style="margin-bottom:0.8em;">
                    <input type="tel" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="9998882220" data-validation-engine="validate[required,custom[onlyNumberSp],minSize[10],maxSize[10]]" maxlength=10 style="margin-bottom:0;">
                    <?php if($errors->has('phone')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('phone')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-12">
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Password *" name="password" data-validation-engine="validate[required,custom[customPassword]]" maxlength=100>

                    <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-12">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password *" data-validation-engine="validate[required,equals[password]]">
                  </div>
                  <div class="col-md-12">
                    <?php if($selected_role == 9): ?>
                      <input type="hidden" name="role" value="1">
                    <?php else: ?>
                      <input type="hidden" name="role" value="<?php echo e($selected_role); ?>">
                    <?php endif; ?>
                      <input type="hidden" name="stripePlan" value="<?php echo e($selected_plan); ?>">
                  </div>
                  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                  <br>
                  <h5>Card Details *</h5>
                  <div class="form-group">
                    <div class="card-header">
                        <label for="card-element">
                            Enter your credit card information
                        </label>
                    </div>
                    <div class="card-body">
                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        <input type="hidden" name="plan" value="<?php echo e($selected_plan_id); ?>" />
                    </div>
                  </div>

                  <input type="hidden" name="coupon_id" id="coupon_id" value="" />

                  <div class="col-md-12" style="padding: 0px;">
                    <div class="form-group">
                      <input type="checkbox" name="tnc" class="<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" data-validation-engine="validate[required]"> After successful registration, you will need to sign TnC document digitally, without signature we will not let you use any of web app features, you can click <a href="<?php echo e($doclink); ?>">here</a> to see TnC
                    </div>
                  </div>
                    <?php if($errors->has('tnc')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('tnc')); ?></strong>
                        </span>
                    <?php endif; ?>
                  <div class="col-md-12 text-right" style='margin-top:.6em'>
                    <button type="submit" name="button" id="investOutRegister">Register</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
          <div class="inside-right-container text-center col-md-4">
            <div class="outer">
              <div class="inner"></div>
              <div class="inner1"></div>
            </div>
              <a href="/"><img src="<?php echo e(asset('sitefront/auth-logo.png')); ?>"  alt=""></a>
            <div class="dont-have-account">
              <span>Already have an account?<a href="<?php echo e(route('login')); ?>" class='signup-link'>Login</a></span>
            </div>
            <br/>
            
            <div class="col-md-8" style="padding: 0px;">
              <input type="tel" class="form-control" name="coupon_id_check" id="coupon_id_check" value="<?php echo e(old('coupon_id_check')); ?>" placeholder="Coupon Code">
              <div id="couponerror" style="color:red;margin-bottom: 10px;"></div>
              <div id="couponsuccess" style="color:green;margin-bottom: 10px;"></div>
            </div>
            <div class="col-md-4">
              <button type="button" onClick="checkCouponCode()">Check</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_script'); ?>
<script type="text/javascript" src="https://static.leaddyno.com/js"></script>
<script>
  LeadDyno.key = "a4fc3abd0c9f3174b30eed0b0bb348709e6ccd5f";
  LeadDyno.recordVisit();
  LeadDyno.autoWatch();
</script>
  <script type="text/javascript">

  $("#payment-form").validationEngine();
  $(document).ready(function() {


    //console.log($('auth-right').outerHeight());
    $('auth-left').height();

    if(!$('.role-selected').hasClass('disable-ajax')){
      var role = $('.role-selected').val();
      getrolebasedplans(role);
    }

    $('.role-selected').change(function(){
      var role = $('.role-selected').val();
      getrolebasedplans(role);
    });

  });

  function getrolebasedplans(role){
    var formData = {role:role};
 
    $.ajax({
        url : "<?php echo e(ENV('APP_URL')); ?>/rolebasedplans",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        data : formData,
        success: function(response, textStatus, jqXHR)
        {
          plans = JSON.parse(response);
          $('.role-based-plans').html();
          var html = '';
          for(var i = 0; i < plans.length; i++){
            html += '<option value="'+plans[i].id+'" data>'+plans[i].plan_name+'</option>';
          }
          $('.role-based-plans').html(html);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
    
        }
    });
  }

  </script>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
var stripe = Stripe("<?php echo e(config('app.basepath.STRIPE_KEY')); ?>");

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style,hidePostalCode: true});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

function checkCouponCode(){
  var formData = {coupon:$("#coupon_id_check").val()};
  $("#couponerror").html("");
  $("#couponsuccess").html("");
  $.ajax({
      url : "<?php echo e(ENV('APP_URL')); ?>/checkCouponCode",
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: "POST",
      data : formData,
      success: function(response, textStatus, jqXHR)
      {
        var response = $.trim(response);
        if(response == 1){
          $("#couponsuccess").html("Coupon found.");
          $("#coupon_id").val($("#coupon_id_check").val());
        }
        else{
          $("#couponerror").html("Invalid coupon!"); 
          $("#coupon_id").val("");
        }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
  
      }
  });
}

$("#coupon_id_check").keyup(function(){
  if($(this).val() == 'TEAMFREE')
  {
    $("#coupon_id").val($("#coupon_id_check").val());
  }
  else
  {
    $("#coupon_id").val("");
  }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>