
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style media="screen">
    .form-page {
        padding: 50px;
        background-color: #ffffff;
    }
    .form-content h2 {
        font-family: Campton-Bold;
        font-size: 32px;
        color: #2C3B54;
    }
    .form-content .property-icon {
        height: 50px;
        width: 65px;
        background-image: url("/assets/front_end/img/seller/add_property/property_icon.png");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        margin-right: 10px;
        display:inline-block;
    }

    .step-1, .step-2, .step-3 {
        padding: 30px 50px 30px 30px;
        border: solid 2px #a8d3cc;
        border-radius: 15px;
    }
    #new-property-form {
        /* padding: 30px 50px 30px 30px;
        border: solid 2px #a8d3cc;
        border-radius: 15px; */
    }
    #new-property-form .form-group label, #new-property-form .form-group input {
        color: #707070;
        font-family: Campton-Light;
        font-size: 15px;
    }
    #new-property-form .form-group label{
        text-transform: capitalize;
    }
    #new-property-form select {
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        appearance: none;
    }
    #new-property-form .dropdown-icon {
        position: absolute;
        right: 14px;
        top: 14px;
        pointer-events: none;
    }
    #new-property-form  select::-ms-expand {
        display: none;
    }
    #new-property-form .form-group input {
        padding: 10px 15px;
        border-radius: 9px;
    }
    #new-property-form .dropdown-select {
        position: relative;
    }
    #new-property-form select.form-control:not([size]):not([multiple]) {
        
        border-radius: 10px;
        font-family: Campton-Light;
        font-size: 15px;
        color: #707070;
        cursor: pointer;
    } 
    #new-property-form .form-group {
        margin-bottom: 9px;
    }
    .sale-div h6 {
        color: #707070;
        font-family: Campton-Bold;
        font-size: 24px;
    }
    .yes a, .no a {
        display: flex;
        align-items: center;
        font-family: Campton-Light;
        font-size: 15px;
        color: #707070;
    }
    .yesIcon, .noIcon {
        height: 40px;
        width: 40px;
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
    .yesIcon { background-image: url("/assets/front_end/img/seller/add_property/yes-icon.png"); }
    .noIcon { background-image: url("/assets/front_end/img/seller/add_property/no-icon.png"); }
    .next-form-btn {
        right: 35px;
        bottom: 10px;
        text-align:right;
    }
    .previous-form-btn {
        left: 83px !important;
        transform-origin: left center;
        transform: rotate(180deg);
        bottom: 15px;
    }

    .submit-form-btn {
        right: 35px;
        bottom: 10px;
        text-align:right;
    }

    .next-icon {
        height: 50px;
        width: 50px;
        margin-top: 20px;
        background-image: url("/assets/front_end/img/seller/add_property/navigation.png");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        display:inline-block;
        cursor: pointer;
    }

    .btn-sumit-form {
        height: 50px;
        margin-top: 20px;
        display:inline-block;
        cursor: pointer;
        background-color: #44a494;
        color: white;
        font-weight: bold;
    }

    .prev-icon {
        height: 50px;
        width: 50px;
        margin-top: 20px;
        background-image: url("/assets/front_end/img/seller/add_property/navigation.png");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        left: 83px !important;
        
        transform: rotate(180deg);
        bottom: 15px;
        display:inline-block;
        cursor: pointer;
    }

    .sale-div [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    .sale-div [type=radio] + img {
    cursor: pointer;
    }

    /* CHECKED STYLES */
    .sale-div [type=radio]:checked + img {
    outline: 2px solid #a8d3cc;
    }

    .sale-div img{
        height: 40px;
    }

    .d-none {
        display: none;
    }

    .d-flex {
        display: flex;
    }

    .home-condition h4 {
        color: #707070;
        font-family: Campton-Light;
        font-size: 15px;
    }

    .home-condition div .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .home-condition div .container input[type=checkbox] {
        transform: scale(2.5);
        margin-top: 20px;
        cursor: pointer;
        position: relative;
    }

    #new-property-form .form-group label {
        white-space: nowrap;
    }

    .home-condition div .container input[type=checkbox]:checked:after {
        display: block;
    }

    .home-condition div .container input[type=checkbox]::after {
        content: '';
        position: absolute;
        background-color: #ffffff;
        top: 50%;
        left: 50%;
        height: 50%;
        width: 50%;
        background-image: url("/assets/front_end/img/seller/add_property/cross.png");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        transform: translate(-50%, -50%);
        z-index: 1;
        display: none;
    }

    .home-condition div .container input[type=checkbox]::before {
        content: '';
        position: absolute;
        background-color: #ffffff;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;
        z-index: 0;
        border-radius: 2px;
        border: 1px solid #ced4da;
    }

    .step-4 .best-deal {
        height: 60px;
        width: 240px;
        background-image: url("/assets/front_end/img/seller/add_property/bestdeal.png");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        margin-left: 30px;
        display: inline-block;
    }

    .step-4 .row-bg-color {
        background-color: #f6fcfc !important;
        border-radius: 15px;
        z-index: 1;
        border: 1px solid #ced4da;
        padding-bottom: 12px;
    }

    .step-4 .align-items-end {
        -webkit-box-align: end!important;
        -ms-flex-align: end!important;
        align-items: flex-end!important;
    }

    .step-4 .flex-column {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: column!important;
        flex-direction: column!important;
    }

    .form-row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -5px;
        margin-left: -5px;
    }
    .ml-4, .mx-4 {
        margin-left: 1.5rem!important;
    }

    .mt-4 {
        margin-top: 1.5rem!important;
    }

    .mt-5 {
        margin-top: 3rem!important;
    }

    .mb-5 {
        margin-bottom: 3rem!important;
    }

    #new-property-form .form-group input {
        padding: 5px 15px;
        border-radius: 9px;
    }

    .step-4 .charts-row h4 {
        font-family: Campton-SemiBold !important;
        font-size: 26px;
    }

    .align-items-center {
        display: flex;
        align-items: center;
    }

    .aminities input[type=checkbox] {
        height: 20px;
        width: 20px;
        margin: 0px;
        float: left;
    }

    .aminities .amenities_label {
        vertical-align: top;
        margin-left: 5px;
    }

    .font-20 {
        font-size: 20px;
    }

    .font-15 {
        font-size: 15px;
    }

    .input-group-addon {
        background-color: #eee !important;
        border: 1px solid #ccc !important;
    }
    

    @media (min-width: 500px) {
        .home-condition {
            flex-wrap: wrap;
        }
    }
  </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div id="" class="seller_detail min_height_974px">
    <div class="wrapper wrapper-content custom-container-a">
        <div class="row animated fadeInRight allproperty_header">
            <div class="col-md-12">
                <p style="text-transform:capitalize"><a href="<?php echo e(URL::previous()); ?>"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
            </div>

            <?php
            if(isset($edit_properties)) {
                $details = $edit_properties->detail()->first();
                $items = $edit_properties->items()->first();
                $images = $edit_properties->images()->get();
            }
            ?>

            
            <div class="form-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 form-content">
                            <h2 class="text-capitalize pl-4"><span class="property-icon"></span><?php echo (app('request')->input('pid') !== null ? "Edit Property:".app('request')->input('pid') : "Add new property")  ?></h2>
                            <form action="<?php echo e(route('SellerStoreProerpty')); ?>" method="post" id="property-form" class="mt-4" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type='hidden' name='phase' value='<?php echo e($redirect_var); ?>'>
                            <input type='hidden' name='is_edit' value="<?php echo e(app('request')->input('pid') ?? '-99'); ?>">
                                <div class="step-1">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="street_no_name">Street No. Street Name*</label>
                                            <input type="text" name='address' value='<?php echo e($edit_properties->address ?? ""); ?>' class='form-control validate[required,maxSize[25]]'>
                                            <small class="text-danger"><?php echo e($errors->first('address')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="city">City*</label> <br>
                                            <input type="text" name='city' value='<?php echo e($edit_properties->city ?? ""); ?>' class='form-control validate[required,maxSize[25]]'>
                                            <small class="text-danger"><?php echo e($errors->first('city')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="state">State*</label> <br>
                                            <select name="state" class='form-control validate[required]' id="">
                                                <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($edit_properties) && $edit_properties->state == $zip->state): ?>
                                                        <option value='<?php echo e($zip->state); ?>' selected><?php echo e($zip->state); ?></option>
                                                    <?php else: ?>
                                                        <option value='<?php echo e($zip->state); ?>'><?php echo e($zip->state); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <small class="text-danger"><?php echo e($errors->first('state')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="zip_code">Zip Code*</label> <br>
                                            <input type="number" name='zip' value='<?php echo e($edit_properties->zip ?? ""); ?>' class='form-control validate[required,minSize[5],maxSize[5]]'>
                                            <small class="text-danger"><?php echo e($errors->first('zip')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="floors">Floors*</label> <br>
                                            <input type="number" name='floors' value='<?php echo e($details->floors ?? ""); ?>' class='form-control validate[required,min[0],maxSize[2]]'>
                                            <small class="text-danger"><?php echo e($errors->first('floors')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="bedroom">Bed Rooms*</label> <br>
                                            <input type="number" name='bedroom' value='<?php echo e($details->bedroom ?? ""); ?>' class='form-control validate[required,min[0],maxSize[2]]'>
                                            <small class="text-danger"><?php echo e($errors->first('bedroom')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="bathroom">Bathroom*</label> <br>
                                            <input type="number" step=".01" name='bathroom' value='<?php echo e($details->bathroom ?? ""); ?>' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger"><?php echo e($errors->first('bathroom')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lot_size">Lot Size</label> <br>
                                            <input type="text" name='lot_size' value='<?php echo e($details->lot_size ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger"><?php echo e($errors->first('lot_size')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Property Type*</label> <br>
                                            <select name="property_type" class='form-control validate[required]' id="">
                                            <?php
                                                $property_types = ["Single-family Home", "Multi-family Home", "Duplex", "Twin Home", "Townhome", "Row House", "Manufactured Home", "Prefab-Modular Home"];
                                                foreach($property_types as $property_type)
                                                {
                                                    if(isset($details) && $details->property_type == $property_type)
                                                    {
                                                        echo '<option selected value="'.$property_type.'">'.$property_type.'</option>';
                                                    }
                                                    else
                                                    {
                                                        echo '<option value="'.$property_type.'">'.$property_type.'</option>';
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Year Built*</label> <br>
                                            <input type="text" name='built' value='<?php echo e($details->built ?? ""); ?>' class='form-control validate[required,minSize[4],maxSize[4]]'>
                                            <small class="text-danger"><?php echo e($errors->first('built')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Neighborhood</label> <br>
                                            <input type="text" name='neighborhood' value='<?php echo e($details->neighborhood ?? ""); ?>' class='form-control validate[maxSize[20]]'>
                                            <small class="text-danger"><?php echo e($errors->first('neighborhood')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="">County*</label> <br>
                                            <select name="county" class='form-control validate[required]' id="">
                                                <option value="">Select County</option>
                                                <?php $__currentLoopData = $county; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($details) && $details->county == $zip->county): ?>
                                                        <option value='<?php echo e($zip->county); ?>' selected><?php echo e($zip->county); ?></option>
                                                    <?php else: ?>
                                                        <option value='<?php echo e($zip->county); ?>'><?php echo e($zip->county); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <small class="text-danger"><?php echo e($errors->first('county')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row hide">
                                        <div class="form-group col-md-6">
                                            <label for="">Mortgage <sub>(Monthly)</sub>*</label> <br>
                                            <input type="text" name='mortgage' value='<?php echo e($details->mortgage ?? ""); ?>' class='form-control amountComma validate[required,min[0]]' value="0">
                                            <small class="text-danger"><?php echo e($errors->first('mortgage')); ?></small>    
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Insurance <sub>(Monthly)</sub>*</label> <br>
                                            <input type="text" name='insurance' value='<?php echo e($details->insurance ?? ""); ?>' class='form-control amountComma validate[required,min[0]]' value="0">
                                            <small class="text-danger"><?php echo e($errors->first('insurance')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 hide">
                                            <label for="">Tax <sub>(Monthly)</sub>*</label> <br>
                                            <input type="text" name='tax' value='<?php echo e($details->tax ?? ""); ?>' class='form-control amountComma validate[required,min[0]]' value="0">
                                            <small class="text-danger"><?php echo e($errors->first('tax')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Building Type</label> <br>
                                            <select name="building_type" class='form-control' id="">
                                            <?php
                                                $building_types = ["Residential Buildings", "Business Buildings", "Industrial Buildings", "Storage Buildings", "Mixed Land Use Buildings", "Detached Buildings", "Semi Detached"];
                                                foreach($building_types as $building_type)
                                                {
                                                    if(isset($details) && $details->building_type == $building_type)
                                                    {
                                                        echo '<option selected value="'.$building_type.'">'.$building_type.'</option>';
                                                    }
                                                    else
                                                    {
                                                        echo '<option value="'.$building_type.'">'.$building_type.'</option>';
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Phone Number</label> <br>
                                            <input type="number" name='phone' value='<?php echo e($details->phone ?? ""); ?>' class='form-control validate[minSize[10],maxSize[10]]'>
                                            <small class="text-danger"><?php echo e($errors->first('phone')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Email</label> <br>
                                            <input type="email" name='seller_email' value='<?php echo e($details->seller_email ?? ""); ?>' class='form-control validate[required]'>
                                            <small class="text-danger"><?php echo e($errors->first('seller_email')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Description</label> <br>
                                            <textarea name='about' class='form-control'><?php echo e($details->about ?? ""); ?></textarea>
                                            <small class="text-danger"><?php echo e($errors->first('about')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <input type="hidden" name="for_sale" id="" value="0">
                                        <!-- <div class="form-group col-md-6">
                                            <div class="">
                                                <label for="">For Sale</label> <br>
                                                <label class="radio-inline">
                                                <?php if(isset($details)): ?>
                                                    <?php if($details->for_sale == 1): ?>                                    
                                                        <input type="radio" name="for_sale" id="for_sale_yes" checked value="1"> Yes
                                                    <?php else: ?>
                                                        <input type="radio" name="for_sale" id="for_sale_yes" value="1"> Yes
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <input type="radio" name="for_sale" id="for_sale_yes" checked value="1"> Yes
                                                <?php endif; ?>
                                                </label>
                                                <label class="radio-inline">
                                                <?php if(isset($details)): ?>
                                                    <?php if($details->for_sale == 0): ?>  
                                                        <input type="radio" name="for_sale" id="for_sale_no" checked value="0"> No
                                                    <?php else: ?>
                                                        <input type="radio" name="for_sale" id="for_sale_no" value="0"> No
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <input type="radio" name="for_sale" id="for_sale_no" value="0"> No
                                                <?php endif; ?>
                                                </label>
                                                <small class="text-danger"><?php echo e($errors->first('for_sale')); ?></small>
                                            </div>
                                        </div> -->
                                        <div class="form-group col-md-3">
                                            <label for="contract_start">Contract Start</label> <br>
                                            <div class="input-group date" data-provide="datepicker">

                                                <input type="text" class="form-control" id="contract_start" name="contract_start" value="<?php echo e(\Carbon\Carbon::parse($edit_properties->contract_start ?? '')->format('m/d/Y')); ?>">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="contract_end">Contract End</label> <br>
                                            <div class="input-group date" data-provide="datepicker">

                                                <input type="text" class="form-control "  id="contract_end" name="contract_end" value="<?php echo e(\Carbon\Carbon::parse($edit_properties->contract_end ?? '')->format('m/d/Y')); ?>">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name='investment_price' id='investment_price' value='<?php echo e($details->investment_price ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                    <!-- <div class="form-row">
                                        <div class="form-group col-md-6 for_sale_row">
                                            <label for="">Ask Price*</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='investment_price' id='investment_price' value='<?php echo e($details->investment_price ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            </div>
                                            
                                            <small class="text-danger"><?php echo e($errors->first('investment_price')); ?></small>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="step-2">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 d-none">
                                            <div class="">
                                                <label for="" class="font-20">Partner Up</label> <br>
                                                <label class="radio-inline font-15">
                                                <?php if(isset($details)): ?>
                                                    <?php if($details->partner_up == 1): ?>                                    
                                                        <input type="radio" name="partner_up" id="partner_up_yes" checked value="1"> Yes
                                                    <?php else: ?>
                                                        <input type="radio" name="partner_up" id="partner_up_yes" value="1"> Yes
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <input type="radio" name="partner_up" id="partner_up_yes" checked value="1"> Yes
                                                <?php endif; ?>
                                                </label>
                                                <label class="radio-inline font-15">
                                                <?php if(isset($details)): ?>
                                                    <?php if($details->partner_up == 0): ?>  
                                                        <input type="radio" name="partner_up" id="partner_up_no" checked value="0"> No
                                                    <?php else: ?>
                                                        <input type="radio" name="partner_up" id="partner_up_no" value="0"> No
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <input type="radio" name="partner_up" id="partner_up_no" value="0"> No
                                                <?php endif; ?>
                                                </label>
                                                <small class="text-danger"><?php echo e($errors->first('partner_up')); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-6">
                                            <label for="">Sqr.Ft*</label> <br>
                                            <input type="text" step=".01" name='square_footage' id='square_footage' value='<?php echo e($details->square_footage ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger"><?php echo e($errors->first('square_footage')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Price Per Sqr.Ft*</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" step=".01" name='price_per_sqft' id='price_per_sqft' value='<?php echo e($details->price_per_sqft ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]' readOnly>
                                            </div>
                                            
                                            <small class="text-danger"><?php echo e($errors->first('price_per_sqft')); ?></small>
                                        </div>
                                        
                                    </div>
                                    <hr class="partner_up_row">
                                    <div class="form-row partner_up_row pr-md-0 d-flex align-items-center home-condition">
                                        <!-- <div class="col-md-12 pr-md-0 d-flex align-items-center home-condition">
                                            <div class="form-row"> -->
                                                <div class="form-group col-md-4">
                                                    <h4 class="text-capitalize">Home condition</h4>
                                                </div>
                                                <?php if(isset($details)): ?>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Basic <br> Renovaction <i class="fa fa-info-circle home-condition-info" title="Improvements to the kitchen, bathrooms, flooring and paint with some minor drywall work. This can be performed for between $20 to $30 for each square foot of the home. We use $25."></i>
                                                            <input type="checkbox" name="home_condition" value="1" <?php echo e($details->home_condition == 1 ? "checked" : "" ?? ""); ?> >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Advanced <br> Renovaction <i class="fa fa-info-circle" title="Improvement consisting of the basic renovation plus a potential roof, siding, Heating/AC and other systems upgrades . This can typically be estimated at $50. per square foot."></i>
                                                            <input type="checkbox" name="home_condition" value="2" <?php echo e($details->home_condition == 2 ? "checked" : "" ?? ""); ?> >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Full <br> Renovaction <i class="fa fa-info-circle" title="A full property gut includes the activities/improvements made in both the basic and advanced rehab but will additionally include framing, foundation, insulation, drywall, doors, windows and trim. This can typically be estimated at about $75 per square foot."></i>
                                                            <input type="checkbox" name="home_condition" value="3" <?php echo e($details->home_condition == 3 ? "checked" : "" ?? ""); ?> >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Other
                                                            <input type="checkbox" name="home_condition" value="4" <?php echo e($details->home_condition == 4 ? "checked" : "" ?? ""); ?> >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <?php if($details->home_condition == '4'): ?>
                                                        <div class="form-group col-md-offset-10 col-md-2 other_home_condition">
                                                            <input type="text" name='other_home_condition_value' id='other_home_condition_value' value='<?php echo e($details->other_home_condition_value ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="form-group col-md-offset-10 col-md-2 d-none other_home_condition">
                                                            <input type="text" name='other_home_condition_value' id='other_home_condition_value' value='0' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Basic <br> Renovaction <i class="fa fa-info-circle" title="Improvements to the kitchen, bathrooms, flooring and paint with some minor drywall work. This can be performed for between $20 to $30 for each square foot of the home. We use $25."></i>
                                                            <input type="checkbox" name="home_condition" value="1" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Advanced <br> Renovaction <i class="fa fa-info-circle" title="Improvement consisting of the basic renovation plus a potential roof, siding, Heating/AC and other systems upgrades . This can typically be estimated at $50. per square foot."></i>
                                                            <input type="checkbox" name="home_condition" value="2" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Full <br> Renovaction <i class="fa fa-info-circle" title="A full property gut includes the activities/improvements made in both the basic and advanced rehab but will additionally include framing, foundation, insulation, drywall, doors, windows and trim. This can typically be estimated at about $75 per square foot."></i>
                                                            <input type="checkbox" name="home_condition" value="3" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Other
                                                            <input type="checkbox" name="home_condition" value="4" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-offset-10 col-md-2 d-none other_home_condition">
                                                        <input type="text" name='other_home_condition_value' id='other_home_condition_value' value="0" class='form-control amountComma validate[min[0],maxSize[10]]'>
                                                    </div>
                                                <?php endif; ?>
                                            <!-- </div>
                                        </div> -->
                                    </div>
                                    <hr class="partner_up_row">
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-4">
                                            <label for="">Estimated Repair Cost* <i class="fa fa-info-circle" title="Estimated cost of all of the repairs required to maximize the sale price of the home."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='estimated_repair_cost' id='estimated_repair_cost' value='<?php echo e($details->estimated_repair_cost ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('estimated_repair_cost')); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Estimated After Renovation Value (ARV)* <i class="fa fa-info-circle" title="This the value the home could sell for once the home has been renovated to the expected level. This will be potentially the list price of the home."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='arv_price' id='arv_price' value='<?php echo e($details->arv_price ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('arv_price')); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">70% Rule* <i class="fa fa-info-circle" title="This rule is used for valuation, choose a value between 50-80%"></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                                <input type="number" min="50" max="80" name='rule_percentage' id='rule_percentage' value='<?php echo e($details->rule_percentage ?? "70"); ?>' class='form-control  validate[min[50],max[90]]'>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('arv_price')); ?></small>
                                        </div>
                                    </div>



                                    <div class="form-row seller_profit_share partner_up_row">
                                        <div class="col-md-12">
                                            <h3 class="text-capitalize"><b>Fees & Costs</b></h3>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="holding_cost">Holding Cost*</label>
                                            <div class="input-group">
                                                <input type="text" name="holding_cost" id="holding_cost" value='<?php echo e($details->holding_cost ?? "0"); ?>' class="amountComma form-control validate[required,min[0],maxSize[10]]">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('holding_cost')); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="seller">Resale Fees*</label>
                                            <div class="input-group">
                                                <input type="text" id="resale_fees" name="resale_fees" value='<?php echo e($details->resale_fees ?? "0"); ?>' class="amountComma form-control validate[required,min[0],maxSize[10]]">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('resale_fees')); ?></small>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="investor">Loan Cost*</label>
                                            <div class="input-group">
                                                <input type="text" name="loan_cost" id="loan_cost" value='<?php echo e($details->loan_cost ?? "0"); ?>' id="loan_cost" class="amountComma form-control validate[required,min[0],maxSize[10]]">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('loan_cost')); ?></small>
                                        </div>
                                        <div class="form-group col-md-4" style="display: none;">
                                            <label for="investor">Total</label>
                                            <div class="input-group">
                                                <input type="text" name="total_profit_share" id="total_profit_share" id="total_profit_share" class="form-control validate[required]" disabled placeholder="Calculated">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-6">
                                            <label for="">Maximum Offer Price to Seller* <i class="fa fa-info-circle" title="This the amount the homeowner is guaranteed to receive after the home has been renovated and sold. Regardless of how much additional value was created in the home due to the renovation, the homeowner will receive this, the BRV amount."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='brv_price' id='brv_price' value='<?php echo e($details->brv_price ?? ""); ?>' class='form-control amountComma validate[min[0],maxSize[10]]' onKeyup="getShareAmount()">
                                            </div>

                                            <small class="text-danger"><?php echo e($errors->first('brv_price')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6" style="display: none;">
                                            <label for="">Gross Profit <i class="fa fa-info-circle" title="This is gross profit amount."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='gross_profit' id='gross_profit' value='<?php echo e($details->gross_profit ?? "0"); ?>'  readonly class='amountComma form-control amountComma'>
                                            </div>

                                            <small class="text-danger"><?php echo e($errors->first('gross_profit')); ?></small>
                                        </div>

                                    </div>
                                    <div class="form-row seller_profit_share partner_up_row">
                                        <div class="col-md-12">
                                            <h3 class="text-capitalize"><b>%Profit Share</b></h3>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="seller">Wholesaler Fee*</label>
                                            <div class="input-group">
                                                <input type="text" name="partnership_seller" id="partnership_seller" value='<?php echo e($details->partnership_seller ?? "0"); ?>' class="form-control validate[required,maxSize[2]]" onKeyup="getShareAmount()">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('partnership_seller')); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="seller">Wholesaler Profit</label>
                                            <div class="input-group">
                                                <input readonly type="text" id="partnership_seller_price" name="wholeseller_profit" value='<?php echo e($details->partnership_seller ?? "0"); ?>' class="amountComma form-control validate[required]">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('partnership_seller')); ?></small>
                                        </div>
                                        
                                        <div class="form-group col-md-4" style="display: none;">
                                            <label for="investor">Investor*</label>
                                            <div class="input-group">
                                                <input type="text" name="partnership_investor" id="partnership_investor" value='<?php echo e($details->partnership_investor ?? "0"); ?>' id="partnership_investor" class="form-control validate[required,maxSize[2]]" readOnly>
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('partnership_investor')); ?></small>
                                        </div>
                                        <div class="form-group col-md-4" style="display: none;">
                                            <label for="investor">Total</label>
                                            <div class="input-group">
                                                <input type="text" name="total_profit_share" id="total_profit_share" id="total_profit_share" class="form-control validate[required]" disabled placeholder="Calculated">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-6">
                                            <label for="">Asking Price to Investor* <i class="fa fa-info-circle" title="This the amount the homeowner is guaranteed to receive after the home has been renovated and sold. Regardless of how much additional value was created in the home due to the renovation, the homeowner will receive this, the BRV amount."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='investor_asking' id='investor_asking' value='<?php echo e($details->investor_asking ?? "0"); ?>' class='form-control amountComma' readonly>
                                            </div>

                                            <small class="text-danger"><?php echo e($errors->first('investor_asking')); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-6">
                                            <label for="">Investor's Projected Profit* <i class="fa fa-info-circle" title="This the investors projected profit."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='investor_projected_profit' id='investor_projected_profit' value='<?php echo e($details->investor_projected_profit ?? "0"); ?>' class='form-control amountComma' readonly>
                                            </div>

                                            <small class="text-danger"><?php echo e($errors->first('investor_projected_profit')); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Investor's Return On Investment* <i class="fa fa-info-circle" title="Investors return on investment"></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                                <input type="text" name='investor_roi' id='investor_roi' value='<?php echo e($details->investor_roi ?? "0"); ?>' class='form-control amountComma' readonly>
                                            </div>

                                            <small class="text-danger"><?php echo e($errors->first('investor_roi')); ?></small>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h3><b>Images</b></h3>
                                            <label class="filename_label" for="filename">Select Property Images</label>
                                            <input type="file" id="filename" name="filename[]" class="form-control" multiple>
                                            <small class="text-danger"><?php echo e($errors->first('filename')); ?></small>
                                            <div id="gallery-img"></div>
                                        </div>
                                    </div>
                                    <div class="form-row aminities">
                                        <div class="col-md-12">
                                            <h3><b>Amenities</b></h3>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="burglar_alarm">Burglar Alarm</label>
                                            <input type="checkbox" name='burglar_alarm' value="1" <?php if(isset($items)): ?> <?php echo e($items->burglar_alarm == 1 ? 'checked' : ''); ?> <?php endif; ?> id="burglar_alarm">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="smoke_detector">Smoke Detector</label>
                                            <input type="checkbox" name='smoke_detector' value="1"  <?php if(isset($items)): ?> <?php echo e($items->smoke_detector == 1 ? 'checked' : ''); ?> <?php endif; ?> id='smoke_detector'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="fire_alarm">Fire Alarm</label>
                                            <input type="checkbox" name='fire_alarm' value="1" <?php if(isset($items)): ?> <?php echo e($items->fire_alarm == 1 ? 'checked' : ''); ?> <?php endif; ?> id='fire_alarm'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="central_air">Central Air</label>
                                            <input type="checkbox" name='central_air' value="1"  <?php if(isset($items)): ?> <?php echo e($items->central_air == 1 ? 'checked' : ''); ?> <?php endif; ?> id='central_air'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="central_heating">Central Heating</label>
                                            <input type="checkbox" name='central_heating' value="1"  <?php if(isset($items)): ?> <?php echo e($items->central_heating == 1 ? 'checked' : ''); ?> <?php endif; ?> id='central_heating'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="window_ac">Window AC</label>
                                            <input type="checkbox" name='window_ac' value="1"  <?php if(isset($items)): ?> <?php echo e($items->window_ac == 1 ? 'checked' : ''); ?> <?php endif; ?> id='window_ac'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="dishwasher">Dishwasher</label>
                                            <input type="checkbox" name='dishwasher' value="1"  <?php if(isset($items)): ?> <?php echo e($items->dishwasher == 1 ? 'checked' : ''); ?> <?php endif; ?> id='dishwasher'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="trash_compactor">Trash Compactor</label>
                                            <input type="checkbox" name='trash_compactor' value="1"  <?php if(isset($items)): ?> <?php echo e($items->trash_compactor == 1 ? 'checked' : ''); ?> <?php endif; ?> id='trash_compactor'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="garbage_disposal">Garbage Disposal</label>
                                            <input type="checkbox" name='garbage_disposal' value="1"  <?php if(isset($items)): ?> <?php echo e($items->garbage_disposal == 1 ? 'checked' : ''); ?> <?php endif; ?> id='garbage_disposal'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="oven">Oven</label>
                                            <input type="checkbox" name='oven' value="1"  <?php if(isset($items)): ?> <?php echo e($items->oven == 1 ? 'checked' : ''); ?> <?php endif; ?> id='oven'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="microwave">Microwave</label>
                                            <input type="checkbox" name='microwave' value="1"  <?php if(isset($items)): ?> <?php echo e($items->microwave == 1 ? 'checked' : ''); ?> <?php endif; ?> id='microwave'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="tv_antenna">TV Antenna</label>
                                            <input type="checkbox" name='tv_antenna' value="1"  <?php if(isset($items)): ?> <?php echo e($items->tv_antenna == 1 ? 'checked' : ''); ?> <?php endif; ?> id='tv_antenna'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="satelite_dish">Satelite Dish</label>
                                            <input type="checkbox" name='satelite_dish' value="1"  <?php if(isset($items)): ?> <?php echo e($items->satelite_dish == 1 ? 'checked' : ''); ?> <?php endif; ?> id='satelite_dish'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="intercom_system">Intercom System</label>
                                            <input type="checkbox" name='intercom_system' value="1"  <?php if(isset($items)): ?> <?php echo e($items->intercom_system == 1 ? 'checked' : ''); ?> <?php endif; ?> id='intercom_system'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="pool">Pool</label>
                                            <input type="checkbox" name='pool' value="1"  <?php if(isset($items)): ?> <?php echo e($items->pool == 1 ? 'checked' : ''); ?> <?php endif; ?> id='pool'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="washer_dryer">Washer Dryer</label>
                                            <input type="checkbox" name='washer_dryer' value="1"  <?php if(isset($items)): ?> <?php echo e($items->washer_dryer == 1 ? 'checked' : ''); ?> <?php endif; ?> id='washer_dryer'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="hot_tub">Hot Tub</label>
                                            <input type="checkbox" name='hot_tub' value="1"  <?php if(isset($items)): ?> <?php echo e($items->hot_tub == 1 ? 'checked' : ''); ?> <?php endif; ?> id='hot_tub'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="washer">Washer</label>
                                            <input type="checkbox" name='washer' value="1"  <?php if(isset($items)): ?> <?php echo e($items->washer == 1 ? 'checked' : ''); ?> <?php endif; ?> id='washer'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="dryer">Dryer</label>
                                            <input type="checkbox" name='dryer' value="1"  <?php if(isset($items)): ?> <?php echo e($items->dryer == 1 ? 'checked' : ''); ?> <?php endif; ?> id='dryer'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="refrigerator">Refrigerator</label>
                                            <input type="checkbox" name='refrigerator' value="1"  <?php if(isset($items)): ?> <?php echo e($items->refrigerator == 1 ? 'checked' : ''); ?> <?php endif; ?> id='refrigerator'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="pool_barrier">Pool Barrier</label>
                                            <input type="checkbox" name='pool_barrier' value="1"  <?php if(isset($items)): ?> <?php echo e($items->pool_barrier == 1 ? 'checked' : ''); ?> <?php endif; ?> id='pool_barrier'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="safety_cover_hottub">Safety Cover Hottub</label>
                                            <input type="checkbox" name='safety_cover_hottub' value="1"  <?php if(isset($items)): ?> <?php echo e($items->safety_cover_hottub == 1 ? 'checked' : ''); ?> <?php endif; ?> id='safety_cover_hottub'>
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row" style="display: none;">
                                        <div class="form-group col-md-4">
                                            <label for="">Seller's Total Profit </label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" id='increased_profit' name='increased_profit' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                            </div>  
                                        </div>
                                        <div class="form-group col-md-4" style="display: none;">
                                            <label for="">Seller's Profit Increase </label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" id='seller_profit' name='seller_profit' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                                <input type="hidden" id='total_profit' name='total_profit' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4" style="display: none;">
                                            <label for="">Increasd ROI </label> <br>
                                            <div class="input-group">
                                                <input type="text" id='increased_roi' name='increased_roi' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="navigation">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="prev-form-btn d-none"><span class="prev-icon btn-prev-form" data-current-active="1"></span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="next-form-btn"><span class="next-icon btn-next-form" data-current-active="1"></span></div>
                                            <div class="submit-form-btn d-none"><button type="submit" class="btn btn-sumit-form"><?php echo app('request')->input('pid') !== null ? 'Update Property' : 'Add Property'; ?></button></div>
                                        </div>
                                    <div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#deleteImageConf" id="DeleteImageButton" class="trigger-btn" style="display:none;" data-toggle="modal">Modal</a>
<div id="deleteImageConf" class="modal fade">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <div class="icon-box">
            <i class="fa fa-trash"></i>
          </div>        
          <h4 class="modal-title">Are you sure?</h4>  
          <button type="button" class="close closeDeleteModal" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete these image? This process cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <a id="delImageButton" style="line-height: 30px;color:#fff;" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
<script src="<?php echo e(URL::asset('assets/front_end/js/Chart.bundle.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/front_end/js/chartjs-gauge.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/front_end/js/chartjs-plugin-datalabels.js')); ?>"></script>

    <script>
        function getShareAmount()
        {
            var askingP = $('#brv_price').val().replace(/,/g, '');
            var pShare = $("#partnership_seller").val();
            $("#partnership_seller_price").val(numberWithCommas(Math.round(parseInt(askingP)*(parseInt(pShare)/100))));

        }

        function numberWithCommas(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
        $(".amountComma").on('keyup', function(){
            var num = $(this).val().replace(/,/g , '');
            num = num.replace(/[^0-9.]/g,'');
            var commaNum = numberWithCommas(num);
            $(this).val(commaNum);
        });

        $(document).ready(function() {

            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy'

            });

            getShareAmount();
            let partnerUp = $('input[type=radio][name=partner_up]:checked').val();
            if(partnerUp == 0)
            {
                $('.partner_up_row').hide();
            }

            $(".amountComma").each(function() {
                var num = $(this).val();
                var commaNum = numberWithCommas(num);
                $(this).val(commaNum);
            });

            $('.content').summernote();
            $('.textbelow').summernote(); +
            // $.validator.addMethod('latCoord', function(value, element) {
            //     return this.optional(element) ||
            //     value.length >= 4 && /^(?=.)-?((8[0-5]?)|([0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
            // }, 'Your Latitude format has error.')

            // $.validator.addMethod('longCoord', function(value, element) {
            //     return this.optional(element) ||
            //     value.length >= 4 && /^(?=.)-?((0?[8-9][0-9])|180|([0-1]?[0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
            // }, 'Your Longitude format has error.')
            $("#property-form").validationEngine('attach', {
                promptPosition : "inline", 
                scroll: false
            });

            $("[class^='step-']").addClass("d-none");
            $(".step-1").removeClass("d-none");

            // calculations();
            // The below function new_calculations() is located into "public/assets/front_end/js/add-property-calculation.js" file.
            new_calculations();
        });  

        $("#square_footage, #other_home_condition_value, #investment_price").on("keyup", function(){
            // calculations();
            // The below function new_calculations() is located into "public/assets/front_end/js/add-property-calculation.js" file.
            new_calculations();
        });

        $("#rule_percentage").on('change',function(){
            new_calculations1();
        });

        $("#estimated_repair_cost, #arv_price, #holding_cost, #resale_fees, #loan_cost").on("keyup", function(){
            // calculations();
            // The below function new_calculations1() is located into "public/assets/front_end/js/add-property-calculation.js" file.

            new_calculations1();
        });

        $("#brv_price, #partnership_seller").on("keyup", function(){
            // calculations();
            // The below function new_calculations2() is located into "public/assets/front_end/js/add-property-calculation.js" file.
            new_calculations2();
        });

        function calculations()
        {
            let brv = ($("#brv_price").val() == "" ? '0' : $("#brv_price").val());
            brv = (typeof parseInt(brv.replace(",", "")) == NaN ? 0 : parseInt(brv.replace(",", "")));
            console.log("brv", brv);
            let arv = ($("#arv_price").val() == "" ? '0' : $("#arv_price").val());
            arv = (typeof parseInt(arv.replace(",", "")) == NaN ? 0 : parseInt(arv.replace(",", "")));
            console.log("arv", arv);
            let sqft = ($("#square_footage").val() == "" ? '0' : $("#square_footage").val());
            sqft = (typeof parseInt(sqft.replace(",", "")) == NaN ? 0 : parseInt(sqft.replace(",", "")));
            console.log("sqft", sqft);
            let home_condition = (typeof $('[name="home_condition"]:checked').val() == 'undefined' ? 0 : $('[name="home_condition"]:checked').val());
            home_condition_price = (parseInt(home_condition) == 0 ? 0 : (parseInt(home_condition) == 1 ? 25 : (parseInt(home_condition) == 2 ? 50 : 75)));
            console.log("home_condition_price", home_condition_price);
            let price_per_sqft = 0;
            if(arv != 0 && sqft != 0)
            {
                price_per_sqft = parseFloat((arv/sqft).toFixed(2));
            }
            console.log("price_per_sqft", price_per_sqft);

            let cost_of_repair = 0;
            if(sqft != 0 && home_condition_price != 0)
            {
                cost_of_repair = sqft * home_condition_price;
            }
            console.log("cost_of_repair", cost_of_repair);

            let est_repair_cost = 0;
            if(arv != 0 && brv != 0 && cost_of_repair != 0)
            {
                est_repair_cost = parseFloat((arv - ((brv + cost_of_repair) * 0.65)).toFixed(2));
            }
            console.log("est_repair_cost", est_repair_cost);

            let seller_profit_share = parseInt(($("#partnership_seller").val() == "" ? '0' : $("#partnership_seller").val()));
            console.log("seller_profit_share", seller_profit_share);

            let investor_profit_share = 0;
            let total_profit_share = 0;
            if(seller_profit_share != 0)
            {
                investor_profit_share = 100 - seller_profit_share;
                total_profit_share = seller_profit_share + investor_profit_share;
            }
            console.log("investor_profit_share", investor_profit_share);
            console.log("total_profit_share", total_profit_share);

            let increased_profit = 0;
            if(arv != 0 && brv != 0 && cost_of_repair != 0 && seller_profit_share !=0)
            {
                increased_profit = parseFloat((arv - ((brv + cost_of_repair) * (seller_profit_share/100))).toFixed(2));
            }
            console.log("increased_profit", increased_profit);

            let total_profit = 0;
            if(arv != 0 && brv != 0 && increased_profit)
            {
                total_profit = parseFloat((arv - (brv + increased_profit)).toFixed(2));
            }
            console.log("total_profit", total_profit);

            let increased_roi = 0;
            if(arv != 0 && brv != 0 && increased_profit)
            {
                increased_roi = parseFloat((brv / (brv + increased_profit)).toFixed(2));
            }
            console.log("increased_roi", increased_roi);


            // Set Calculated Values.
            $("#price_per_sqft").val(numberWithCommas(price_per_sqft));
            $("#estimated_repair_cost").val(numberWithCommas(est_repair_cost));
            $("#partnership_investor").val(investor_profit_share);
            $("#total_profit_share").val(total_profit_share);
            $("#increased_profit").val(numberWithCommas(increased_profit));
            $("#total_profit").val(numberWithCommas(total_profit));
            $("#increased_roi").val(numberWithCommas(increased_roi));
            
        }

        

        $(".btn-next-form").click(function(){
            console.log($(this).attr("data-current-active"));
            let active_form = parseInt($(this).attr("data-current-active")) + 1;
            let total_steps = $("[class^='step-']").length;
            console.log(active_form +"<="+ total_steps-1);
            if(active_form <= total_steps-1)
            {
                $(".step-"+$(this).attr("data-current-active")).addClass("d-none");
                $(".step-"+active_form).removeClass("d-none");
                $(".prev-form-btn").removeClass("d-none");
                $(".btn-prev-form").attr("data-current-active", active_form);
                $(".btn-next-form").attr("data-current-active", active_form);
            }
            else
            {
                $(".step-"+$(this).attr("data-current-active")).addClass("d-none");
                $(".step-"+active_form).removeClass("d-none");
                $(".next-form-btn").addClass("d-none");
                $(".prev-form-btn").removeClass("d-none");
                $(".submit-form-btn").removeClass("d-none");
                $(".btn-prev-form").attr("data-current-active", active_form);
                $(".btn-next-form").attr("data-current-active", active_form);
            }
        });

        $(".btn-prev-form").click(function(){
            console.log($(this).attr("data-current-active"));
            let active_form = parseInt($(this).attr("data-current-active")) - 1;
            if(active_form >= 1)
            {
                $(".step-"+$(this).attr("data-current-active")).addClass("d-none");
                $(".step-"+active_form).removeClass("d-none");
                $(".next-form-btn").removeClass("d-none");
                $(".submit-form-btn").addClass("d-none");
                $(".prev-form-btn").addClass("d-none");
                $(".btn-prev-form").attr("data-current-active", active_form);
                $(".btn-next-form").attr("data-current-active", active_form);
            }
            else
            {
                $(".step-"+$(this).attr("data-current-active")).addClass("d-none");
                $(".step-"+active_form).removeClass("d-none");
                $(".prev-form-btn").addClass("d-none");
                $(".btn-prev-form").attr("data-current-active", active_form);
                $(".btn-next-form").attr("data-current-active", active_form);
            }
        });

        $('input[type=radio][name=partner_up]').change(function(e) {
           
            if (this.value == 1) {
                $('.partner_up_row').show();
            }
            else {
                $('.partner_up_row').hide();
            }
        });

        $('input[type=radio][name=partner_up]').click(function(e) {
            let forSale = $('input[type=radio][name=for_sale]:checked').val();
            if(forSale == 0)
            {
                e.preventDefault();
            }
        });

        $('input[type=radio][name=for_sale]').change(function(e) {
            if (this.value == 1) {
                $('.for_sale_row').show();
            }
            else {
                $('.for_sale_row').hide();
            }
        });

        $('input[type=radio][name=for_sale]').click(function(e) {
            let partnerUp = $('input[type=radio][name=partner_up]:checked').val();
            if(partnerUp == 0)
            {
                e.preventDefault();
            }
        });

        $(".seller_profit_share #partnership_seller").on("change", function(){
            console.log($(this).val());
            let seller = parseInt($(this).val());
            let investor = 100 - seller;
            $("#partnership_investor").val(investor);
            $("#total_profit_share").val(seller + investor);
        });

        $(".seller_profit_share #partnership_investor").on("change", function(){
            console.log($(this).val());
            let investor = parseInt($(this).val());
            let seller = 100 - investor;
            $("#partnership_seller").val(seller);
            $("#total_profit_share").val(seller + investor);
        });

        
        $("select[name=state]").on('change', function(){
            state_name = $(this).find("option:selected").text();
            $.ajax({
                url    : '<?php echo e(ENV('APP_URL')); ?>/getCounty',
                method : "POST",
                data : {state_name:state_name, _token:"<?php echo e(csrf_token()); ?>"},
                dataType : "text",
                success : function (responses)
                {
                    $("select[name=county]").html(responses);
                }
            });
        });

        <?php
        if(isset($edit_properties)) {
        ?>
        $('#gallery-img').html("Loading Images..");
        $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '<?php echo e(route("getProerptyImages")); ?>',
            data    : {pid: parseInt(<?php echo app('request')->input('pid'); ?>)},
            success : function(response) {
              if (response.status == true) {
                $('#gallery-img').html(response.data);
              }
              else{
                $('#gallery-img').html("No Images found");
              }
            }
        });
        <?php
        }
        ?>
        $(document).on("click", ".deleteImage", function(){
            $("#DeleteImageButton").click();
            var id = $(this).data('id');
            var dis = $(this);
            $('#delImageButton').attr('data-id',id);
        });


        $(document).on("click", "#delImageButton", function(){
            var id = $(this).data('id');
            var dis = $(this);

            $.ajax({
                type    : 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url     : '<?php echo e(route("deletePropertyImg")); ?>',
                data    : {id: id},
                success : function(response) {
                    $(".close").click();
                    $('.deleteImage[data-id="'+id+'"]').parent().parent().remove();
                }
            });

        }); 

        <?php 
            if(isset($details)){
                if($details->partner_up == 0){
                ?>
                    $(".display_partner_share").hide();
                <?php
                }
                else{
                ?>
                    $(".display_partner_share").show();
                <?php
                }
            }
            else{
                ?>
                $(".display_partner_share").show();
                <?php
            }
            ?>

        <?php 
            if(isset($details)){
                if($details->for_sale == 0){
                ?>
                    $(".for_sale_row").hide();
                <?php
                }
                else{
                ?>
                    $(".for_sale_row").show();
                <?php
                }
            }
            else{
                ?>
                $(".for_sale_row").show();
                <?php
            }
            ?>

        $(".partner_up").change(function (){
            var val = $(this).val();
            if(val == 1){
                $(".display_partner_share").show();
            }
            else{
                $(".display_partner_share").hide();
            }
        });
    </script>

    <script>
        $(".home-condition div .container input:checkbox").on('click', function() {
            var $box = $(this);
            if ($box.is(":checked")) {
                $group = $(".home-condition .container input:checkbox").prop("checked", false);
                $box.prop("checked", true);
                $(".other_home_condition").removeClass("d-none");
                if($(this).val() == "4")
                {
                    
                }
                else if($(this).val() == "3")
                {
                    $("#other_home_condition_value").val("75");
                }
                else if($(this).val() == "2")
                {
                    $("#other_home_condition_value").val("50");
                }
                else if($(this).val() == "1")
                {
                    $("#other_home_condition_value").val("25");
                }
                else
                {
                    $(".other_home_condition").addClass("d-none");
                    $("#other_home_condition_value").val("0");
                }
                // calculations();
                new_calculations();
            }
        });
    </script>
<script src="<?php echo e(URL::asset('assets/front_end/js/add-property-calculation.js')); ?>"></script>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.whole-seller-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>