@extends('layouts.investor-layout')
@section('style')
    


@section('body')
    
    <div class="wrapper wrapper-content">

    @php $details = $property->detail()->first(); @endphp
    <!-- ======= Intro Single ======= -->
        <div class="container-fluid" style="padding-top: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <p style="text-transform:capitalize"><a href="{{ URL::previous() }}"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
                </div>
            </div>
        </div>
        <section class="intro-single">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <?php
                            $title = '';
                            if(isset($details) && $details->property_type != '')
                            {
                                $title .= $details->property_type;
                            }
                            ?>
                            <h1 class="title-single">{{$title}}</h1>
                            <div class="color-text-a">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Property ID</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5>: {{ $property->id }}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Location:</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5>: {{ $property->address ?? '-' }}, {{ $property->city ?? '-' }}, {{ $property->state ?? '-' }} {{ $property->zip ?? '-' }}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Contract Start Date:</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5>{{ Carbon\Carbon::parse($property->contract_start)->format('m/d/Y') }}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Contract End Date:</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5>{{ Carbon\Carbon::parse($property->contract_start)->format('m/d/Y') }}</h5>
                                    </div>
                                </div>

                                @if(isset($accepted_proposal) && $accepted_proposal->is_accepted == 1 && ($accepted_proposal->from_user == auth()->user()->id || $accepted_proposal->to_user == auth()->user()->id))
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5>Owner's Details</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 onclick="getOwnerDetails('{{$property->id}}'); return false;"><i class="glyphicon glyphicon-phone-alt" aria-hidden="true" title="Owner Details"></i></h5>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="px-3">
                <div class="row">
                    <?php
                    if($property->seller()->first()->roles()->first()->slug == 'wholeseller')
                    {
                        $roleName = 'Wholesaler';
                    }
                    else
                    {
                        $roleName = ucfirst($property->seller()->first()->roles()->first()->slug);
                    }
                    ?>
                    <input type="hidden" id="seller_ask_price" value="{{ ($details->investor_asking) ?? '0' }}" name="seller_ask_price"/>
                    <div class="col-sm-3 hide">
                        $ <span id="seller_brv">{{ (number_format(floatval($details->brv_price))) ?? '0' }}</span>
                    </div>

                    <div class="col-md-12">
                        <div class="title-single-box">
                            <form id="property_seller_suggested_offer">
                                <div class="{{ $details->for_sale == '0' ? 'hide' : '' }}">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h2 class="margin-0"><strong></strong></h2>
                                        </div>
                                        <label for="arv" class="col-sm-3 col-form-label">Investor's Counter Offer </label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_askPrice">{{ (number_format(floatval($details->investor_asking))) ?? '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="{{ $details->for_sale == '1' && $details->partner_up == '1' ? '' : 'hide' }}">
                                <div class="{{ $details->partner_up == '0' ? 'hide' : '' }}">
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label"><?php echo $roleName; ?>'s Estimated ARV Selling Price</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_arv">{{ (number_format(floatval($details->arv_price))) ?? '0' }}</span>
                                        </div>
                                        <?php
                                        if($property->seller()->first()->roles()->first()->slug == 'wholeseller')
                                        {

                                        }
                                        else
                                        {
                                            ?>
                                            <div class="col-sm-3 hide">
                                                $ <span id="seller_brv">{{ (number_format(floatval($details->brv_price))) ?? '0' }}</span>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label"><?php echo $roleName; ?>'s Estimated Repair Cost</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_est_repair_cost">{{ (number_format(floatval($details->estimated_repair_cost))) ?? '0' }}</span>
                                        </div>
                                        <label for="arv" class="col-sm-3 col-form-label">Investor's Projected Profit</label>
                                        <div class="col-sm-3">
                                            $ <span id="investor_projected_profit">{{ number_format(floatval($details->investor_projected_profit)) ?? '0' }}</span>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <?php
                                        if($property->seller()->first()->roles()->first()->slug == 'wholeseller')
                                        {
                                            
                                        }
                                        else
                                        {
                                            ?>
                                            <label for="arv" class="col-sm-3 col-form-label"><?php echo ucfirst($property->seller()->first()->roles()->first()->slug); ?>'s Profit </label>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                                        {
                                        ?>
                                            <div class="col-sm-3">
                                                $ <span id="seller_partnership_seller_amount">{{ number_format(floatval($details->wholeseller_profit)) ?? '0' }}</span>
                                                <span class="hide" id="seller_partnership_seller">{{$details->partnership_seller}}</span>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <label for="arv" class="col-sm-3 col-form-label">Estimated Misc Cost</label>
                                        <div class="col-sm-3">
                                            $ <span id="estimated_misc_cost">{{ number_format(floatval($details->holding_cost)+floatval($details->resale_fees)+floatval($details->loan_cost)) ?? '0' }}</span>
                                            <span class="hide" id="seller_partnership_investor">{{ $details->partnership_investor ?? '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->
        <hr class="px-3">
        <section class="property-proposals-list">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5><strong>Start the conversation with an offer</strong></h5>
                    </div>
                </div>
                <div class="row proposals-list">
                    <div class="col-md-12 text-center">
                        <span>You have not submitted a starting proposal for this property yet.</span><br/>
                    </div>
                </div>
                <hr class="px-3">
                <div class="row">
                    <div class="col-md-12 send-proposal-div">
                        <h5><strong>Inverstor's Submission</strong></h5>
                        <form id="send_proposal" action="{{route('investors.proposal.new_create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="property_id" name="property_id" value="{{ $property->id}}">
                            <input type="hidden" class="form-control" id="from_user" name="from_user" value="{{ auth()->user()->id }}">
                            <input type="hidden" class="form-control" id="to_user" name="to_user" value="{{ $property->user_id }}">
                            <input type="hidden" class="form-control" id="is_investor" name="is_investor" value="1">
                            <input type="hidden" class="form-control" id="ref_proposal" name="ref_proposal" value="">

                            <?php
                            if ($roleName == 'Wholesaler') {
                                // investor wholesaler
                                ?>
                                @include('investor.property.wholesaler')
                                <?php
                            }
                            else {
                                ?>
                                <div class="row {{ $details->for_sale == '0' ? 'hide' : '' }}">
                                    <div class="col-md-12">
                                        <h6><strong>For Sale</strong></h6>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="suggest_ask_price">Suggest Ask Price: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class='form-control amountComma' min="0" max="10000000" name='ask_price_range_value' id='ask_price_range_value' data-id='ask_price'>
                                        </div>
                                        <input type="range" min="0" max="10000000" name='ask_price' id='ask_price' class='form-control'>
                                        <small class="text-danger">{{ $errors->first('ask_price') }}</small>
                                    </div>
                                </div>
                                <hr class="{{ $details->for_sale == '1' && $details->partner_up == '1' ? '' : 'hide' }}">
                                <div class="row {{ $details->partner_up == '0' ? 'hide' : '' }}">
                                    <?php
                                    if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                                    {
                                    ?>
                                    <div class="col-md-12">
                                        <h6><strong>For Partner Up</strong></h6>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-group col-md-3">
                                        <label for="street_no_name">Investor's Suggested ARV: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class="form-control amountComma" min="0" max="10000000" name='arv_range_value' id='arv_range_value' data-id="arv">
                                        </div>
                                        <input type="range" min="0" max="10000000" name='arv' id='arv' class='form-control'>
                                        <small class="text-danger">{{ $errors->first('arv') }}</small>
                                    </div>
                                    <input type="hidden"  class='form-control amountComma' min="0" max="10000000" name='brv_range_value' id='brv_range_value' data-id='brv'>
                                    <div class="form-group col-md-3">
                                        <label for="street_no_name">Investor's Suggested Repair Cost: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class='form-control amountComma' min="0" max="10000000" name='est_repair_cost_range_value' id='est_repair_cost_range_value' data-id="est_repair_cost">
                                        </div>
                                        <input type="range" min="0" max="10000000" name='est_repair_cost' id='est_repair_cost' class='form-control'>
                                        <small class="text-danger">{{ $errors->first('est_repair_cost') }}</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="70_rule">70% Rule: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">%</span>
                                            <input type="number" min="50" max="80" name='rule_percentage' id='rule_percentage' value='{{$details->rule_percentage && intval($details->rule_percentage)>0?intval($details->rule_percentage): "70"}}' class='form-control  validate[min[50],max[90]]'>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-capitalize"><b>Fees & Costs</b></h3>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="holding_cost">Holding Cost*</label>
                                        <div class="input-group">
                                            <input type="text" name="holding_cost" id="holding_cost" value='{{number_format(floatval($details->holding_cost)) ?? "0"}}' class="amountComma form-control validate[required,min[0],maxSize[10]]">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('holding_cost') }}</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="seller">Resale Fees*</label>
                                        <div class="input-group">
                                            <input type="text" id="resale_fees" name="resale_fees" value='{{number_format(floatval($details->resale_fees)) ?? "0"}}' class="amountComma form-control validate[required,min[0],maxSize[10]]">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('resale_fees') }}</small>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="investor">Loan Cost*</label>
                                        <div class="input-group">
                                            <input type="text" name="loan_cost" id="loan_cost" value='{{number_format(floatval($details->loan_cost)) ?? "0"}}' id="loan_cost" class="amountComma form-control validate[required,min[0],maxSize[10]]">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('loan_cost') }}</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="investor">Total Misc Cost</label>
                                        <div class="input-group">
                                            <input type="text" name="total_misc_cost" id="total_misc_cost"  class="form-control validate[required]" value="{{ number_format(floatval($details->holding_cost)+floatval($details->resale_fees)+floatval($details->loan_cost)) }}" disabled placeholder="Calculated">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row {{ $details->partner_up == '0' ? 'hide' : '' }}">
                                    <div class="form-group col-md-3">
                                        <?php
                                        if($property->seller()->first()->roles()->first()->slug == 'wholeseller')
                                        {
                                        ?>
                                            <label for="street_no_name">Wholesaler's Fee(%): </label>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <label for="street_no_name"><?php echo ucfirst($property->seller()->first()->roles()->first()->slug); ?>'s Profit Share: </label>
                                        <?php
                                        }
                                        ?>

                                        <div class="input-group">
                                            <input type="text" class="form-control" min="1" max="99" name='seller_share_range_value' id='seller_share_range_value' data-id='seller_share'>
                                            <span class="input-group-addon" id="basic-addon1">%</span>
                                        </div>
                                        <input type="range" min="1" max="99" name='seller_share' id='seller_share' class='form-control'>
                                        <small class="text-danger">{{ $errors->first('seller_share') }}</small>
                                    </div>
                                    <div class="form-group col-md-3 d-none">
                                        <label for="street_no_name">Investor's Profit: </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" min="1" max="99"  name='investor_share_range_value' id='investor_share_range_value' data-id='investor_share'>
                                            <span class="input-group-addon" id="basic-addon1">%</span>
                                        </div>
                                        <input type="range" min="1" max="99" name='investor_share' id='investor_share' class='form-control'>
                                        <small class="text-danger">{{ $errors->first('investor_share') }}</small>
                                    </div>
                                    <div class="form-group col-md-3">

                                    </div>
                                    <div class="form-group col-md-3">

                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="total_projected_profit">Investor's Projected Profit:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class="form-control amountComma" name="investor_profit" id="investor_profit" value="0" readonly>
                                        </div>

                                        <div class="input-group hide">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class="form-control amountComma" name="total_projected_profit" id="total_projected_profit" value="0" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="street_no_name">Estimated Offer to Wholesaler: </label>
                                        <div class="input-group">
                                            <input readonly type="text" class="form-control" min="1"  name='wholeseller_offer' id='wholeseller_offer' value="{{$details->investor_asking}}" data-id='investor_share'>
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                        </div>

                                    </div>
                                </div>



                                <div class="row {{ $details->partner_up == '0' ? 'hide' : '' }}">
                                    <div class="form-group col-md-4 d-none">
                                        <label for="investor_profit">Investor's Profit:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class="form-control amountComma" name="investor_profit" id="investor_profit" value="0" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 d-none">
                                        <label for="seller_net_profit"><?php echo ucfirst($property->seller()->first()->roles()->first()->slug); ?>'s Net Profit:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class="form-control amountComma" name="seller_net_profit" id="seller_net_profit" value="0" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="seller_gross_profit">Revised Offer price to Wholesaler:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class="form-control amountComma" name="seller_gross_profit" id="seller_gross_profit" value="0" readonly>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                </div>
                                <div class="row hide {{ $details->partner_up == '0' ? 'hide' : '' }}">
                                    <div class="col-lg-12 chart-bg-overlay">
                                        <div class="form-row mt-lg-5 charts-row">
                                            <div class="col-lg-4">
                                                <h4 class="text-center text-capitalize mb-3"><?php echo ucfirst($property->seller()->first()->roles()->first()->slug); ?> Profit Options</h4>
                                                <canvas id="ctx" style="width: 100%; height: 200px"></canvas>
                                            </div>
                                            <div class="col-lg-4">
                                                <h4 class="text-center text-capitalize mb-3">investor options</h4>
                                                <canvas id="ctxOne" style="width: 100%; height: 200px"></canvas>
                                            </div>
                                            <div class="col-lg-4 pl-3">
                                                <h4 class="text-center text-capitalize mb-3">return on investment</h4>
                                                <canvas id="ctxTwo" style="width: 100%; height: 200px"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="street_no_name">Select Document:</label>
                                    <input type="file" class='form-control' name='proposal' id='proposal'>
                                    <small class="text-danger">{{ $errors->first('address') }}</small>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="street_no_name">Description:</label>
                                    <textarea name="description" id="description" class='form-control' rows="1"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-4 col-md-4">
                                    <input type="submit" class="form-control btn btn-primary" id="send_proposal" value="Send Proposal">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

<button type="button" id="OwnerDetailModalButton" data-toggle="modal" data-target="#OwnerDetailModal" style="display:none;"></button>
<div class="modal fade" id="OwnerDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="Details">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/front_end/js/Chart.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/front_end/js/chartjs-gauge.js') }}"></script>
    <script src="{{ URL::asset('assets/front_end/js/chartjs-plugin-datalabels.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="{!! asset('assets/user/js/fullcalendar/moment.min.js') !!}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7yZbRv_jMqu_BRVZQHbUMFKe8C3jQ2DE&callback=initMap&libraries=&v=weekly"
            defer
    ></script>
    <script>
        function getOwnerDetails(id) {
            $("#preloder").css({"display": "block", "opacity": "0.7"});
            $(".loader").css({"display": "block", "opacity": "0.7"});
            $("#Details").html("");
            $.ajax({
                url    : '{{ route("getOwnerDetails") }}',
                method : "POST",
                data : {id:id, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (responses)
                {
                    console.log(responses)
                    var response = JSON.parse(responses);
                    $("#Details").html(response.data);
                    $("#OwnerDetailModalButton").click();
                },
                complete: function(){
                    $("#preloder").css({"display": "none"});
                    $(".loader").css({"display": "none"});
                }
            });
        }
    </script>
    <script>
        var details = JSON.parse('<?php echo json_encode($details)?>');
        var investorProposals_list_data_value = null;
        var chart;
        var chartOne;
        var chartTwo;
        var base_url = "{{asset('/')}}";
        $(document).ready(function(){
            return;
            let property_id = <?php echo $property->id;?>;
            console.log("property_id", property_id);
            $.ajax({
                url    : '{{ route("investors.property.propertyProposalsList") }}',
                method : "POST",
                data : {id:property_id, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (responses)
                {
                    var response = JSON.parse(responses);
                    if(response.data.length >0)
                    {
                        let html = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
                        let send_proposal_div = false;
                        var ask_price = 0;
                        var arv = 0;
                        var brv = 0;
                        var est_repair_cost = 0;
                        var seller_share = 0;
                        var investor_share = 0;
                        var total_profit = 0;
                        var seller_share_profit = 0;
                        var investor_share_profit = 0;
                        var flip_total_cost = 0;
                        var flip_profit = 0;
                        var partner_total_cost = 0;
                        var partner_profit = 0;
                        var flip_roi = 0;
                        var partner_roi = 0;
                        console.log("====================================================");
                        console.log(response.data);
                        $.each(response.data, function(index, value){

                            investorProposals_list_data_value = value;
                            ask_price = ((value.investor_asking == null || value.investor_asking == '') ? 0 : parseInt(value.investor_asking));
                            arv = value.arv;
                            brv = value.brv;
                            est_repair_cost = value.est_repair_cost;
                            seller_share = value.seller_share;
                            investor_share = value.investor_share;
                            total_profit = Math.round(arv - (brv + est_repair_cost));
                            seller_share_profit = (total_profit * seller_share) / 100;
                            seller_gross_profit = Math.round(brv+seller_share_profit);
                            let c22 = parseFloat(value.gross_profit);
                            let c24 = parseFloat(value.rule_percentage);
                            let c25 = c24 * c22 / 100;
                            let c26 = seller_share / 100;
                            let c17 = arv;
                            let c18 = est_repair_cost;
                            let c19 = parseInt(value.holding_cost);
                            let c20 = parseInt(value.resale_fee);
                            let c21 = parseInt(value.loan_cost);

                            let c27 = c26 * c17;
                            seller_gross_profit = c25 + c27;
                            
                            investor_share_profit = value.investor_projected_profit;

                            c22 = c17 - (c18 + c19 + c20 + c21);
                            c24 = parseInt(value.rule_percentage) / 100;
                            c25 = c24 * c22;
                            c27 = c26 * c17;
                            
                            investor_share_profit = c17 - (c25 + c27 + c18 + c19 + c20 + c21);

                            flip_total_cost = Math.round(brv + est_repair_cost);
                            flip_profit = total_profit;
                            partner_total_cost = est_repair_cost;
                            partner_profit = investor_share_profit;
                            flip_roi = (flip_profit/flip_total_cost).toFixed(2);
                            partner_roi = value.investor_roi;//(partner_profit/partner_total_cost).toFixed(2);

                            var wholeseller_offer =  total_profit + total_profit*seller_share/100;

                            wholeseller_offer = c26 * c17;

                            if(response.data.length == index+1)
                            {
                                send_proposal_div = (<?php echo auth()->user()->id?> === value.from_user ? false : true);

                                if(ask_price > 0)
                                {
                                    $('#ask_price').attr("max",Math.round(ask_price + ask_price/2));
                                }
                                $('#ask_price').val(ask_price);
                                $('#ask_price_range_value').val(numberWithCommas(ask_price));
                                $('#arv').attr("max",Math.round(value.arv + value.arv/2));
                                $('#arv').val(value.arv);
                                $('#arv_range_value').val(numberWithCommas(value.arv));
                                $('#brv').attr("max",Math.round(value.brv + value.brv/2));
                                $('#brv').val(value.brv);
                                $('#brv_range_value').val(numberWithCommas(value.brv));
                                $('#est_repair_cost').attr("max",Math.round(value.est_repair_cost + value.est_repair_cost/2));
                                $('#est_repair_cost').val(value.est_repair_cost);
                                $('#est_repair_cost_range_value').val(numberWithCommas(value.est_repair_cost));
                                $('#seller_share').val(value.seller_share);
                                $('#seller_share_range_value').val(value.seller_share);
                                $('#investor_share').val(value.investor_share);
                                $('#investor_share_range_value').val(value.investor_share);
                                $('#ref_proposal').val(value.id);
                                $('#total_projected_profit').val(numberWithCommas(total_profit));
                                $('#investor_profit').val(numberWithCommas(investor_share_profit.toFixed(2)));
                                $('#seller_net_profit').val(numberWithCommas(seller_share_profit));
                                $('#seller_gross_profit').val(numberWithCommas(seller_gross_profit));

                                $('#wholeseller_offer').val(numberWithCommas(wholeseller_offer));
                            }


                            let rowspan_count = (<?php echo $details->for_sale;?> != 0 ? 1 : 0) + (<?php echo $details->partner_up;?> != 0 ? 2 : 0 );
                            html += '<div class="panel panel-default">'
                            +'<div class="panel-heading '+(<?php echo auth()->user()->id?> === value.from_user ? "proposal_send" : "proposal_received")+'" role="tab" id="headingOne" data-type='+(<?php echo auth()->user()->id?> === value.from_user ? "send" : "received")+'>'
                            +'<table class="table_panel_heading">'
                            +'<tr>'
                            +'<td rowspan=' + (rowspan_count  > 2 ? rowspan_count : 2) + '><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">'
                            +'<img src="' + base_url + 'sitefront/best_deal.png" class="'+ (response.max_proposal_id == value.id ? '' : 'hide' ) + '" height="50px" width="50px">'
                            +'</a></td>'
                            +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">'
                            + (<?php echo auth()->user()->id?> === value.from_user ? "Sent To": "Received From")
                            +'</a></td>'

                            if(<?php echo $details->for_sale;?> != 0)
                            {
                                if(<?php echo $details->partner_up;?> == 0)
                                {
                                    html +='<td rowspan=' + (rowspan_count  > 2 ? rowspan_count : 2) + '><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Investor\'s Suggested Ask Price: </a></td>'
                                        +'<td rowspan=' + (rowspan_count  > 2 ? rowspan_count : 2) + '><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(ask_price)+'</a></td>'
                                        +'<td rowspan=' + (rowspan_count  > 2 ? rowspan_count : 2) + '><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Sent At: '+ moment(value.created_at).format("MM/DD/YYYY hh:mm:ss A") + '</a></td>'
                                        +'<td rowspan=' + (rowspan_count  > 2 ? rowspan_count : 2) + '>'
                                        +'<div class="proposal_document">';

                                    if(value.document !== null)
                                    {
                                        html += '<a download href="{{ asset("proposal") }}/'+ value.document+'">'
                                            +'<i class="glyphicon glyphicon-save-file"></i>'
                                            +'</a>';
                                    }
                                    if(<?php echo auth()->user()->id?> !== value.from_user && <?php echo (empty($accepted_proposal) ? 1 : 0)?> == 1)
                                    {
                                        html += '<a style="padding:0px 10px; border-radius:3px; background:#fff;color:black;" href="javascript:void(0);" id="accept_proposal_'+value.id+'">Accept</a>'
                                    }
                                else if(<?php echo (isset($accepted_proposal) ? 1 : 0)?> == 1 && value.is_accepted == 1)
                                    {
                                        html += '<a href="javascript:void(0);" class="accepted_proposal">Accepted</a>';
                                    }
                                    html += '</div>'
                                    +'</td>'
                                    +'</tr>'
                                    +'<tr>'
                                    +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+ (<?php echo auth()->user()->id?> === value.from_user ? value.receiver_name + ' <sub>(Seller)</sub>' : (value.sender_name)+ ' <sub>(Seller)</sub>') + '</a></td>'
                                +'</tr>';
                                }
                            else
                                {
                                    html +='<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Estimated Offer to Wholesaler: </a></td>'
                                        +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(wholeseller_offer)+'</a></td>'
                                        +'<td rowspan=' + (rowspan_count  > 2 ? rowspan_count : 2) + '><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Sent At: '+ moment(value.created_at).format("MM/DD/YYYY hh:mm:ss A") + '</a></td>'
                                        +'<td rowspan=' + (rowspan_count  > 2 ? rowspan_count : 2) + '>'
                                        +'<div class="proposal_document">';

                                    if(value.document !== null)
                                    {
                                        html += '<a download href="{{ asset("proposal") }}/'+ value.document+'">'
                                            +'<i class="glyphicon glyphicon-save-file"></i>'
                                            +'</a>';
                                    }
                                    if(<?php echo auth()->user()->id?> !== value.from_user && <?php echo (empty($accepted_proposal) ? 1 : 0)?> == 1)
                                    {
                                        html += '<a style="padding:0px 10px; border-radius:3px; background:#fff;color:black;" href="javascript:void(0);" id="accept_proposal_'+value.id+'">Accept</a>'
                                    }
                                else if(<?php echo (isset($accepted_proposal) ? 1 : 0)?> == 1 && value.is_accepted == 1)
                                    {
                                        html += '<a href="javascript:void(0);" class="accepted_proposal">Accepted</a>';
                                    }
                                    html += '</div>'
                                        +'</td>'
                                        +'</tr>';
                                }
                            }
                            if(<?php echo $details->partner_up;?> != 0)
                            {
                                console.log("log = ", <?php echo $details->partner_up;?> == 0);
                                if(<?php echo $details->for_sale;?> != 0)
                                {
                                    html +='<tr>'
                                    +'<td rowspan=' + (rowspan_count-1) + '><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> ' + (<?php echo auth()->user()->id?> === value.from_user ? value.receiver_name + ' <sub>(Seller)</sub>' : (value.sender_name) + ' <sub>(Seller)</sub>' ) + '</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Investor\'s Projected Profit</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(investor_share_profit.toFixed(2)) +'</a></td>'
                                +'</tr>'
                                +'<tr>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Investor\'s ROI:</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">'+ (typeof partner_roi == NaN ? 0.00 : partner_roi) +'%</a></td>'
                                +'</tr>';

                                }
                            else
                                {
                                    html +='<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Investor\'s Projected Profit:</a></td>'
                                        +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(investor_share_profit.toFixed(2)) +'</a></td>'
                                        +'<td rowspan=' + rowspan_count + '><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Sent At: '+ moment(value.created_at).format("MM/DD/YYYY hh:mm:ss A") + '</a></td>'
                                        +'<td rowspan=' + rowspan_count + '>'
                                        +'<div class="proposal_document">';

                                    if(value.document !== null)
                                    {
                                        html += '<a download href="{{ asset("proposal") }}/'+ value.document+'">'
                                            +'<i class="glyphicon glyphicon-save-file"></i>'
                                            +'</a>';
                                    }
                                    if(<?php echo auth()->user()->id?> !== value.from_user && <?php echo (empty($accepted_proposal) ? 1 : 0)?> == 1)
                                    {
                                        html += '<a style="padding:0px 10px; border-radius:3px; background:#fff;color:black;" href="javascript:void(0);" id="accept_proposal_'+value.id+'">Accept</a>'
                                    }
                                else if(<?php echo (isset($accepted_proposal) ? 1 : 0)?> == 1 && value.is_accepted == 1)
                                    {
                                        html += '<a href="javascript:void(0);" class="accepted_proposal">Accepted</a>';
                                    }
                                    html += '</div>'
                                    +'</td>'
                                    +'</tr>'
                                    +'<tr>'
                                    +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+ (<?php echo auth()->user()->id?> === value.from_user ? value.receiver_name + ' <sub>(Seller)</sub>' : (value.sender_name)+ ' <sub>(Seller)</sub>') + '</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Investor\'s ROI:</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+ (typeof partner_roi == NaN ? 0.00 : partner_roi) +'%</a></td>'
                                +'</tr>';
                                }
                            }

                            html += '</table>'
                                +'</div>'
                                +'<div id="collapse_'+ value.id +'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">'
                                +'<div class="panel-body">'
                                +'<form>'
                            if(<?php echo $details->for_sale;?> != 0)
                            {
                                html += '<div class="form-group row">'
                                    +'<div class="col-md-12">'
                                    +'<h6><strong>For Sale</strong></h6>'
                                    +'</div>'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Investor\'s Counter Offer</label>'
                                    +'<div class="col-sm-3">'
                                    +'$ <span id="seller_ask_price_'+value.id+'">'+numberWithCommas(value.investor_asking)+'</span>'
                                    +'</div>'
                                    +'</div>';

                                if("<?php echo $property->seller()->first()->roles()->first()->slug; ?>" == "wholeseller")
                                {
                                    html += '<div class="form-group row">\n\
                                                                    <label for="arv" class="col-sm-3 col-form-label">Wholesaler\'s Fee ('+value.seller_share+'%): </label>'
                                        +'<div class="col-sm-3">'
                                        +'$ <span>'+numberWithCommas(((value.wholeseller_profit)))+'</span>'
                                        +'</div>'
                                        +'</div>';

                                    /*html += '<div class="form-group row">\n\
                                                <label for="arv" class="col-sm-3 col-form-label">Total Home Seller Asking Price: </label>'
                                                +'<div class="col-sm-3">'
                                                    +'$ <span>'+numberWithCommas(ask_price+((ask_price * value.seller_share)/100))+'</span>'
                                                +'</div>'
                                            +'</div>';*/
                                }

                            }
                            if(<?php echo $details->for_sale;?> != 0 && <?php echo $details->partner_up;?> != 0)
                            {
                                html += '<hr>';
                            }
                            if(<?php echo $details->partner_up;?> != 0)
                            {
                                html +='<div class="form-group row">'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Estimated ARV  Selling Price</label>'
                                    +'<div class="col-sm-3">'
                                    +'$ <span  id="seller_arv_'+value.id+'">'+numberWithCommas(value.arv)+'</span>'
                                    +'</div>';
                                if("<?php echo $property->seller()->first()->roles()->first()->slug; ?>" != "wholeseller")
                                {
                                    html+='<label for="arv" class="col-sm-3 col-form-label">Estimated Before Renovation Value</label>'
                                        +'<div class="col-sm-3">'
                                        +'$ <span  id="seller_brv_'+value.id+'">'+numberWithCommas(value.brv)+'</span>'
                                        +'</div>';
                                }
                                html+='<label for="arv" class="col-sm-3 col-form-label">Estimated Repair Cost</label>'
                                    +'<div class="col-sm-3">'
                                    +'$ <span  id="seller_est_repair_cost_'+value.id+'">'+numberWithCommas(value.est_repair_cost)+'</span>'
                                    +'</div>'
                                    +'</div>'
                                    +'<div class="form-group row">'
                                    +'<label for="arv" class="col-sm-3 col-form-label"><?php if($property->seller()->first()->roles()->first()->slug == "wholeseller"){echo "Wholesaler\'s Fee(%)";}else{echo ucfirst($property->seller()->first()->roles()->first()->slug)."\'s Profit Share(%)";} ?></label>'
                                    +'<div class="col-sm-3">'
                                    +'<span  id="seller_partnership_seller_'+value.id+'">'+value.seller_share+'</span> %'
                                    +'</div>'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Investor\'s Profit Share(%)</label>'
                                    +'<div class="col-sm-3">'
                                    +'<span  id="seller_partnership_investor_'+value.id+'">'+value.investor_share+'</span> %'
                                    +'</div>'
                                    +'</div>';
                            }
                            if(value.description != null)
                            {
                                html +='<div class="form-group row">'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Description</label>'
                                    +'<div class="col-sm-9">'
                                    +'<span  id="seller_partnership_seller_'+value.id+'">'+value.description+'</span>'
                                    +'</div>'
                                    +'</div>';
                            }
                            html +='</form>'
                                +'</div>'
                                +'</div>'
                                +'</div>'


                        });

                        html +='</div>';


                        $('.proposals-list .col-md-12').empty();
                        $('.proposals-list .col-md-12').removeClass('text-center');
                        $('.proposals-list .col-md-12').append(html);
                        $(".collapse").collapse('hide');
                        if(send_proposal_div && <?php echo (isset($accepted_proposal) ? 1 : 0)?> == 0)
                        {
                            $('.send-proposal-div').show();
                        }
                        else
                        {
                            $('.send-proposal-div').show();
                            $('.send-proposal-div input').attr('readonly', true);
                            $('.send-proposal-div input').attr('disabled', true);
                            $('.send-proposal-div textarea').attr('readonly', true);
                            $('.send-proposal-div textarea').attr('disabled', true);
                        }

                    }
                    else
                    {
                        let seller_ask_price = parseInt(($('#seller_ask_price').val()).replace(/,/g, ""));




                        let seller_arv = parseInt(($('#seller_arv').text()).replace(/,/g, ""));
                        let seller_brv = parseInt(($('#seller_brv').text()).replace(/,/g, ""));
                        let seller_est_repair_cost = parseInt(($('#seller_est_repair_cost').text()).replace(/,/g, ""));
                        let seller_partnership_investor = parseInt(($('#seller_partnership_investor').text()).replace(/,/g, ""));
                        let seller_partnership_seller = parseInt(100 - parseInt(seller_partnership_investor));

                        var holding_cost = parseInt(($("#holding_cost").val()).replace(/,/g, ""));
                        var resale_cost = parseInt(($("#resale_fees").val()).replace(/,/g, ""));
                        var loan_cost = parseInt(($("#loan_cost").val()).replace(/,/g, ""));
                        var percent_rule = parseInt(($("#rule_percentage").val()).replace(/,/g, ""));


                        var total_profit = Math.round((seller_arv - ( seller_est_repair_cost + holding_cost+resale_cost+loan_cost))*percent_rule/100);




                        //let total_profit = Math.round($('#seller_arv').val() - ($('#seller_arv').val() + $('#seller_est_repair_cost').val()));

                        let seller_share_profit = Math.round((total_profit * parseInt($('#seller_partnership_seller').val())) / 100);

                        var wholeseller_offer =  $("#wholeseller_offer").val().replace(/,/g, "");
                        //var wholeseller_offer =  total_profit + total_profit*seller_partnership_seller/100;
                        $('#wholeseller_offer').val(numberWithCommas(wholeseller_offer));

                        let investor_share_profit = Math.round((parseInt(seller_arv) - ( parseInt(seller_est_repair_cost) + parseInt(holding_cost) + parseInt(resale_cost) + parseInt(loan_cost) + parseInt(wholeseller_offer))));
                        //alert("3:"+investor_share_profit);


                        let seller_gross_profit = Math.round($('#seller_brv').val() + seller_share_profit);
                        $('#ask_price').attr("max",Math.round(seller_ask_price + seller_ask_price/2));
                        $('#ask_price').val(seller_ask_price);
                        $('#ask_price_range_value').val(numberWithCommas(seller_ask_price));
                        $('#arv').attr("max",Math.round(seller_arv + seller_arv/2));
                        $('#arv').val(seller_arv);
                        $('#arv_range_value').val(numberWithCommas(seller_arv));
                        $('#brv').attr("max",Math.round(seller_brv + seller_brv/2));
                        $('#brv').val(seller_brv);
                        $('#brv_range_value').val(numberWithCommas(seller_brv));
                        $('#est_repair_cost').attr("max",Math.round(seller_est_repair_cost + seller_est_repair_cost/2));
                        $('#est_repair_cost').val(seller_est_repair_cost);
                        $('#est_repair_cost_range_value').val(numberWithCommas(seller_est_repair_cost));
                        $('#seller_share').val(seller_partnership_seller);
                        $('#seller_share_range_value').val(seller_partnership_seller);
                        $('#investor_share').val(seller_partnership_investor);
                        $('#investor_share_range_value').val(seller_partnership_investor);
                        $('#total_projected_profit').val(numberWithCommas(total_profit));
                        $('#investor_profit').val(numberWithCommas(investor_share_profit.toFixed(2)));
                        $('#seller_net_profit').val(numberWithCommas(seller_share_profit));
                        $('#seller_gross_profit').val(numberWithCommas(seller_gross_profit));
                    }

                    setTimeout(() => {
                        setCharts();
                    }, 200);

                },
                complete: function(){
                    $("#preloder").css({"display": "none"});
                    $(".loader").css({"display": "none"});
                }
            });
        });

        $(".amountComma").on('keyup', function(){
            var num = $(this).val().replace(/,/g , '');
            num = num.replace(/[^0-9.]/g,'');
            var commaNum = numberWithCommas(num);
            $(this).val(commaNum);
        });

        function setCharts(){
            var arv = parseInt(($("#arv_range_value").val()).replace(/,/g, ""));
            console.log("arv", arv);
            var brv = parseInt(($("#brv_range_value").val()).replace(/,/g, ""));
            var est_repair_cost = parseInt(($("#est_repair_cost_range_value").val()).replace(/,/g, ""));
            var seller_share = parseFloat($("#seller_share_range_value").val());
            var holding_cost = parseInt(($("#holding_cost").val()).replace(/,/g, ""));
            var resale_cost = parseInt(($("#resale_fees").val()).replace(/,/g, ""));
            var loan_cost = parseInt(($("#loan_cost").val()).replace(/,/g, ""));
            var percent_rule = parseInt(($("#rule_percentage").val()).replace(/,/g, ""));

            console.log("seller_share", seller_share);
            var investor_share = parseInt($("#investor_share_range_value").val());
            var total_profit = Math.round((arv - ( est_repair_cost + holding_cost+resale_cost+loan_cost))*percent_rule/100);
            var seller_share_profit = (total_profit * seller_share) / 100;
            var seller_gross_profit = Math.round(brv + seller_share_profit);
            
            let c22 = parseFloat(investorProposals_list_data_value.gross_profit);
            let c24 = parseFloat(investorProposals_list_data_value.rule_percentage);;
            let c25 = c24 * c22 / 100;
            let c26 = seller_share / 100;
            let c17 = arv;
            let c18 = est_repair_cost;
            let c19 = parseInt(holding_cost);
            let c20 = parseInt(resale_cost);
            let c21 = parseInt(loan_cost);
            let c27 = c26 * c17;
            seller_gross_profit = c25 + c27;

            var wholeseller_offer =  $("#wholeseller_offer").val().replace(/,/g, "");
            //var wholeseller_offer =  total_profit + total_profit*seller_share/100;
            //$('#wholeseller_offer').val(numberWithCommas(wholeseller_offer));

            let investor_share_profit = Math.round((parseInt(arv) - ( parseInt(est_repair_cost) + parseInt(holding_cost) + parseInt(resale_cost) + parseInt(loan_cost) + parseInt(wholeseller_offer))));

            //alert("1:"+investor_share_profit);

            var flip_total_cost = Math.round(brv + est_repair_cost);
            var flip_profit = total_profit;
            var partner_total_cost = est_repair_cost;
            var partner_profit = investor_share_profit;
            var flip_roi = (flip_profit/flip_total_cost).toFixed(2);
            var partner_roi = (partner_profit/partner_total_cost).toFixed(2);
            $('#total_projected_profit').val(numberWithCommas(total_profit));
            //$('#investor_profit').val(numberWithCommas(investor_share_profit));
            //$('input[id=investor_profit]').val(numberWithCommas(investor_share_profit));
            $('#seller_net_profit').val(numberWithCommas(seller_share_profit));
            $('#seller_gross_profit').val(numberWithCommas(seller_gross_profit));


            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Current Value', 'Projected Profit'],
                    datasets: [{
                        label: 'As Is Profit',
                        data: [brv, seller_share_profit],
                        backgroundColor: '#002060'
                    }, {
                        label: 'Partnered Increase',
                        data: [0,brv],
                        backgroundColor: '#009999'
                    }]
                },
                options: {
                    responsive: false,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: '#fff'
                        }
                    },
                    scales: {
                        xAxes: [{
                            stacked: true,
                            maxBarThickness: 60, // this should be set to make the bars stacked
                            gridLines: {
                                display: false,
                            },
                        }],
                        yAxes: [{
                            stacked: true, // this also..
                            ticks: {
                                // // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    // return '$' + value.toFixed(decimals);
                                    if (parseInt(value) >= 1000) {
                                        return '$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    } else {
                                        return '$' + value;
                                    }
                                },
                            },
                            gridLines: {
                                drawBorder: false,
                            },
                        }],

                    }
                }
            });

            chartOne = new Chart(ctxOne, {
                type: 'bar',
                data: {
                    labels: [
                        ['Flip Tot.', 'Cost'],
                        ['Profit', 'From Flip'],
                        ['Pertnered', 'Cost'],
                        ['Pertner', 'Profit']
                    ],
                    datasets: [{
                        label: 'Cost From Flip',
                        data: [flip_total_cost, 0, partner_total_cost, 0],
                        backgroundColor: '#ff0000'
                    }, {
                        label: '',
                        data: [0, total_profit, 0, 0],
                        backgroundColor: '#002060'
                    }, {
                        label: 'Investor\'s Profit',
                        data: [0, 0, 0, partner_profit, 350000],
                        backgroundColor: '#009999'
                    }]
                },
                options: {
                    responsive: false,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: '#fff'
                        }
                    },
                    scales: {
                        xAxes: [{
                            stacked: true,
                            maxBarThickness: 60, // this should be set to make the bars stacked
                            gridLines: {
                                display: false,
                            },
                            ticks: {
                                display: true,
                                stepSize: 0,
                                min: 0,
                                autoSkip: false,
                                fontSize: 11,

                                maxRotation: 0,
                                minRotation: 0,
                            }
                        }],
                        yAxes: [{
                            stacked: true, // this also..
                            ticks: {
                                // // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    // return '$' + value.toFixed(decimals);
                                    if (parseInt(value) >= 1000) {
                                        return '$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    } else {
                                        return '$' + value;
                                    }
                                },
                            },
                            gridLines: {
                                drawBorder: false,
                            },
                        }],

                    }
                }
            });
            chartTwo = new Chart(ctxTwo, {
                type: 'bar',
                data: {
                    labels: ['Fix & Flip', 'Partner'],
                    datasets: [{
                        label: '',
                        data: [flip_roi, 0, 10],
                        backgroundColor: '#009999'
                    }, {
                        label: '',
                        data: [0, partner_roi],
                        backgroundColor: '#002060'
                    }]
                },
                options: {
                    responsive: false,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: '#fff'
                        }
                    },
                    scales: {
                        xAxes: [{
                            stacked: true,
                            maxBarThickness: 60, // this should be set to make the bars stacked
                            gridLines: {
                                display: false,
                            },
                        }],
                        yAxes: [{
                            stacked: true, // this also..
                            ticks: {
                                callback: function(value, index, values) {
                                    console.log("value", value);
                                    console.log("index", index);
                                    console.log("values", values);
                                    // var strng = value+'%';
                                    if (value < 10) {
                                        strng = '0.' + value + '0%';
                                    } else {
                                        strng = '1.00%';
                                    }
                                    console.log('strng', strng);
                                    return strng;
                                }

                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Hundreds'
                            },
                            gridLines: {
                                drawBorder: false,
                            },
                        }],

                    }
                }
            });
        }

        $('#holding_cost, #resale_fees, #loan_cost').on("input", function(){
            $("#total_misc_cost").
            val(numberWithCommas(parseFloat($("#holding_cost").val().replace(",",""))+parseFloat($("#resale_fees").val().
            replace(",","")) + parseFloat($("#loan_cost").val().replace(",",""))));
        });

        $('#arv_range_value, #holding_cost, #resale_fees, #loan_cost, #est_repair_cost_range_value,#rule_percentage').on("input", function(){


        });

        $('#ask_price, #arv, #brv, #est_repair_cost, #seller_share, #investor_share, #holding_cost, #resale_fees, #loan_cost,#rule_percentage ').on("input", function(){
            console.log($(this).attr("id"));
            console.log("value", $(this).val());
            $("#brv_range_value").val(numberWithCommas( parseFloat(((parseFloat($("#rule_percentage").val().replace(",",""))/100) *parseFloat((parseFloat($("#arv_range_value").val().replace(",","")) - parseFloat($("#holding_cost").val().replace(",","")) - parseFloat($("#resale_fees").val().
            replace(",","")) - parseFloat($("#loan_cost").val().replace(",","")) - parseFloat($("#est_repair_cost_range_value").val().replace(",",""))).toFixed(2)) ).toFixed(2))));


            if($(this).attr("id") === 'seller_share')
            {
                $('#'+$(this).attr("id")+'_range_value').val($(this).val());
                $('#investor_share').val(100 - parseInt($(this).val()));
                $('#investor_share_range_value').val(100 - parseInt($(this).val()));
            }
            else if($(this).attr("id") === 'investor_share')
            {
                $('#'+$(this).attr("id")+'_range_value').val($(this).val());
                $('#seller_share').val(100 - parseInt($(this).val()));
                $('#seller_share_range_value').val(100 - parseInt($(this).val()));
            }
            else
            {
                $('#'+$(this).attr("id")+'_range_value').val(numberWithCommas($(this).val()));
            }

            setTimeout(() => {
                updateCharts();
            }, 2000);
        });

        $('#ask_price_range_value,#arv_range_value, #brv_range_value, #est_repair_cost_range_value, #seller_share_range_value, #investor_share_range_value').on("input", function(){
            console.log($(this).attr("id"));
            console.log("value", $(this).val() == "");

            if($(this).attr("data-id") === 'seller_share' && $(this).val() != '')
            {
                $('#'+$(this).attr("data-id")).val(($(this).val()).replace(/,/g, ""));
                $('#investor_share').val(100 - parseInt($(this).val()));
                $('#investor_share_range_value').val(100 - parseInt($(this).val()));
            }
            else if($(this).attr("data-id") === 'investor_share' && $(this).val() != '')
            {
                $('#'+$(this).attr("data-id")).val(($(this).val().replace(/,/g, "")));
                $('#seller_share').val(100 - parseInt($(this).val()));
                $('#seller_share_range_value').val(100 - parseInt($(this).val()));
            }
            else
            {
                $('#'+$(this).attr("data-id")).val(($(this).val()).replace(/,/g, ""));
            }

            setTimeout(() => {
                updateCharts();
            }, 2000);
        });

        function updateCharts()
        {
            console.log("UpdateCharts>>>>>>>>>>");
            var arv = parseInt(($("#arv_range_value").val()).replace(/,/g, ""));
            var brv = parseInt(($("#brv_range_value").val()).replace(/,/g, ""));
            var est_repair_cost = parseInt(($("#est_repair_cost_range_value").val()).replace(/,/g, ""));
            var seller_share = parseInt($("#seller_share_range_value").val());
            var investor_share = parseInt($("#investor_share_range_value").val());

            var holding_cost = parseInt(($("#holding_cost").val()).replace(/,/g, ""));
            var resale_cost = parseInt(($("#resale_fees").val()).replace(/,/g, ""));
            var loan_cost = parseInt(($("#loan_cost").val()).replace(/,/g, ""));
            var percent_rule = parseInt(($("#rule_percentage").val()).replace(/,/g, ""));


            var total_profit = Math.round((arv - ( est_repair_cost + holding_cost+resale_cost+loan_cost))*percent_rule/100);


            var seller_share_profit = Math.round((total_profit * seller_share) / 100);
            var seller_gross_profit = Math.round(brv + seller_share_profit);

            var wholeseller_offer =  $("#wholeseller_offer").val().replace(/,/g, "");
            //var wholeseller_offer =  total_profit + total_profit*seller_share/100;
            let c26 = seller_share / 100;
            let c17 = arv;
            wholeseller_offer = c26 * c17;
            $('#wholeseller_offer').val(numberWithCommas(wholeseller_offer));

            let investor_share_profit = Math.round((parseInt(arv) - ( parseInt(est_repair_cost) + parseInt(holding_cost) + parseInt(resale_cost) + parseInt(loan_cost) + parseInt(wholeseller_offer))));
            // alert("2:"+investor_share_profit);

            var flip_total_cost = brv + est_repair_cost;
            var flip_profit = total_profit;
            var partner_total_cost = est_repair_cost;
            var partner_profit = investor_share_profit;
            var flip_roi = (flip_profit/flip_total_cost).toFixed(2);
            var partner_roi = (partner_profit/partner_total_cost).toFixed(2);
            $('#total_projected_profit').val(numberWithCommas(total_profit));
            let c18 = est_repair_cost;
            let c19 = holding_cost;
            let c20 = resale_cost;
            let c21 = loan_cost;

            let c22 = c17 - (c18 + c19 + c20 + c21);
            let c24 = percent_rule / 100;
            let c25 = c24 * c22;
            let c27 = c26 * c17;
            
            seller_gross_profit = c25 + c27;

            investor_share_profit = c17 - (c25 + c27 + c18 + c19 + c20 + c21);
            $('#investor_profit').val(numberWithCommas(investor_share_profit.toFixed(2)));
            $('#seller_net_profit').val(numberWithCommas(seller_share_profit));
            $('#seller_gross_profit').val(numberWithCommas(seller_gross_profit));

            chart.data.datasets[0].data = [brv, seller_share_profit];
            chart.data.datasets[1].data = [0, brv];
            chart.update();

            chartOne.data.datasets[0].data = [flip_total_cost, 0, partner_total_cost, 0];
            chartOne.data.datasets[1].data = [0, total_profit, 0, 0];
            chartOne.data.datasets[2].data = [0, 0, 0, partner_profit, 350000];
            chartOne.update();

            chartTwo.data.datasets[0].data = [flip_roi, 0, 10];
            chartTwo.data.datasets[1].data = [0, partner_roi];
            chartTwo.update();
        }

        $(document).on("show.bs.collapse", ".collapse", function (event) {
            var proposal_id = $(this).attr("id").split('_');
            if ($(this).siblings('.proposal_received').length || ($(this).siblings('.best_deal').length && $(this).siblings('.best_deal').attr("data-type") === "received")) {
                $.ajax({
                    url: '{{ route("proposal.setRead") }}',
                    method: 'POST',
                    data: { id: proposal_id[1], _token:"{{csrf_token()}}" },
                    dataType: 'json',
                    success: function(response)
                    {
                        if(response.status)
                        {
                            $(".panel_bold_"+response.id).removeClass("font-weight-bold");
                        }
                    }
                });

            }
        });

        $(document).on("click", "a[id^='accept_proposal_']", function(){
            console.log($(this).attr('id'));
            var proposal_id = $(this).attr("id").split('_');

            $.ajax({
                url: '{{ route("whole-seller.proposal.setAccept") }}',
                method: 'POST',
                data: { id: proposal_id[2] },
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                dataType: 'json',
                success: function(response)
                {
                    if(response.status)
                    {
                        console.log(".accept_proposal_"+response.id);
                        $("#accept_proposal_"+response.id).parent(".proposal_document").append("<a href='javascript:void(0);' class='accepted_proposal'>Accepted</a>");
                        setTimeout(() => {
                            $("a[id^='accept_proposal_']").remove();
                            $('.send-proposal-div').hide();
                        }, 1000);
                    }
                }
            });

        });
    </script>
    <script>
        // In this example, we center the map, and add a marker, using a LatLng object
        // literal instead of a google.maps.LatLng object. LatLng object literals are
        // a convenient way to add a LatLng coordinate and, in most cases, can be used
        // in place of a google.maps.LatLng object.
        let map;

        function initMap() {
            const mapOptions = {
                zoom: 12,
                center: { lat: {{$property->lat}}, lng: {{$property->long}} },
            };
            map = new google.maps.Map(document.getElementById("map"), mapOptions);
            const marker = new google.maps.Marker({
                // The below line is equivalent to writing:
                // position: new google.maps.LatLng({{$property->lat}}, {{$property->long}})
                position: { lat: {{$property->lat}}, lng: {{$property->long}} },
                map: map,
            });
            // You can use a LatLng literal in place of a google.maps.LatLng object when
            // creating the Marker object. Once the Marker object is instantiated, its
            // position will be available as a google.maps.LatLng object. In this case,
            // we retrieve the marker's position using the
            // google.maps.LatLng.getPosition() method.
            const infowindow = new google.maps.InfoWindow({
                content: "<p>Marker Location:" + marker.getPosition() + "</p>",
            });
            google.maps.event.addListener(marker, "click", () => {
                infowindow.open(map, marker);
            });
        }
    </script>
    <script src="{{ URL::asset('assets/front_end/js/global.js') }}"></script>
@endsection