@extends('layouts.seller-layout')

@section('body')

    <div class="wrapper wrapper-content">

        <?php
            if(isset($property))
            {
                $details = $property->detail()->first();
            }
        ?>

        <!-- ======= Intro Single ======= -->
        <div class="container-fluid" style="padding-top: 10px;">
            <div class="row">
                <div class="col-md-8">
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
                                // if(isset($details) && $details->bedroom != '')
                                // {
                                //   $title .= $details->bedroom."BHK ";
                                // }
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="property-price d-flex justify-content-center foo">
                            <div class="card-header-c d-flex">
                                <div class="card-title-c align-self-center">
                                    <h5>Asking Price</h5>
                                    <h5 class="title-c">$ <span class="priceNew" id="seller_ask_price">{{ number_format($details->investment_price) ?? '0' }}</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <hr class="px-3">
                    <div class="col-md-12">
                        <div class="title-single-box d-flex justify-content-start align-items-center">
                            <h2 class="margin-0"><strong>Property Seller Suggested Offer</strong></h2>
                            <span class="best-deal"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="title-single-box">
                            <form id="property_seller_suggested_offer">
                                <div class="{{ $details->for_sale == '0' ? 'hide' : '' }}">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h2 class="margin-0"><strong>For Ask Price</strong></h2>
                                        </div>
                                        <label for="arv" class="col-sm-3 col-form-label">Seller's Suggested Ask Price</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_askPrice">{{ number_format($details->investment_price) ?? '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="{{ $details->for_sale == '1' && $details->partner_up == '1' ? '' : 'hide' }}">
                                <div class="{{ $details->partner_up == '0' ? 'hide' : '' }}">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h2 class="margin-0"><strong>For Partner Up</strong></h2>
                                        </div>
                                        <label for="arv" class="col-sm-3 col-form-label">Seller's Estimated ARV - Selling Price</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_arv">{{ number_format($details->arv_price) ?? '0' }}</span>
                                        </div>
                                        <label for="arv" class="col-sm-3 col-form-label">Seller's Estimated Before Renovation Value</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_brv">{{ number_format($details->brv_price) ?? '0' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label">Seller's Estimated Repair Cost</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_est_repair_cost">{{ number_format($details->estimated_repair_cost) ?? '0' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label">Seller's Profit Share(%)</label>
                                        <div class="col-sm-3">
                                            <span id="seller_partnership_seller">{{ $details->partnership_seller ?? '0' }}</span> %
                                        </div>
                                        <label for="arv" class="col-sm-3 col-form-label">Investor's Profit Share(%)</label>
                                        <div class="col-sm-3">
                                            <span id="seller_partnership_investor">{{ $details->partnership_investor ?? '0' }}</span> %
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
                        <span>You not send any proposal for this property yet.</span><br/>
                    </div>
                </div>
                <hr class="px-3">
                <div class="row">
                    <div class="col-md-12 send-proposal-div">
                        <h5><strong>Seller's Submission</strong></h5>
                        
                        <form id="send_proposal" action="{{route('seller.proposal.new_create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="property_id" name="property_id" value="{{ $property->id}}">
                            <input type="hidden" class="form-control" id="from_user" name="from_user" value="{{ auth()->user()->id }}">
                            <input type="hidden" class="form-control" id="to_user" name="to_user" value="{{ $investor->id }}">
                            <input type="hidden" class="form-control" id="is_investor" name="is_investor" value="0">
                            <input type="hidden" class="form-control" id="ref_proposal" name="ref_proposal" value="">
                            <input type="hidden" class="form-control" id="holding_cost" name="holding_cost" value="">
                            <input type="hidden" class="form-control" id="resale_fees" name="resale_fees" value="">
                            <input type="hidden" class="form-control" id="loan_cost" name="loan_cost" value="">
                            <div class="row {{ $details->for_sale == '0' ? 'hide' : '' }}">
                                <div class="col-md-12">
                                    <h6><strong>For Sale</strong></h6>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="suggest_ask_price">Suggest Ask Price: </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class='form-control amountComma calc-trigger' name='ask_price' id='ask_price'>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if($details->for_sale == '1' && $details->partner_up == '1') {
                                ?>
                                <hr>
                                <?php
                            }

                            if($details->partner_up != '0') {
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6><strong>For Partner Up</strong></h6>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="arv">Investor's Suggested ARV: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class='form-control amountComma calc-trigger' name='arv' id='arv'>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="brv">Investor's Suggested BRV: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class='form-control amountComma' name='brv' id='brv' readonly>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="est_repair_cost">Investor's Suggested Repair Cost: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class='form-control amountComma calc-trigger' name='est_repair_cost' id='est_repair_cost'>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="est_repair_cost">70% Rule: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon" >%</span>
                                            <input type="number" name='rule_percentage' id='rule_percentage' class='form-control calc-trigger'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="seller_share">Seller's Profit Share: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input type="text" class="form-control calc-trigger" name='seller_share' id='seller_share'>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="investor_share">Investor's Profit Share: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input type="text" class="form-control" name='investor_share' id='investor_share' readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="seller_increased_profit">Seller's Increased Profit:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control amountComma" name="seller_increased_profit" id="seller_increased_profit" value="0" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="seller_total_profit">Seller's Total Profit:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control amountComma" name="seller_total_profit" id="seller_total_profit" value="0" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 chart-bg-overlay">
                                        <div class="form-row mt-lg-5 charts-row">
                                            <div class="col-lg-4">
                                                <h4 class="text-center text-capitalize mb-3">Seller Profit Options</h4>
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
<div class="d-none" id="panel_template">
    <div class="panel panel-default">
        <div class="panel-heading proposal_send" role="tab" id="headingOne" data-type="send">
            <table class="table_panel_heading">
                <tbody>
                    <tr>
                        <td rowspan="2">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">
                                <img src="{{asset('/')}}sitefront/best_deal.png" class="" height="50px" width="50px">
                            </a>
                        </td>
                        <td>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="title">Sent To</a>
                        </td>
                        <td rowspan="2">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">Before Renovation Value:</a>
                        </td>
                        <td rowspan="2">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class=""> $ <span class="brv">58,931.52</span></a>
                        </td>
                        <td rowspan="2">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class=""><span class="sent-at-title">Sent At</span>: <span class="sent-at-date">11/11/2021 01:13:47 AM</span></a>
                        </td>
                        <td rowspan="2">
                            <div class="proposal_document">
                                <a class="btn-accept" href="javascript:void(0);" id="accept_proposal_110">Accept</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="name"> test company <sub>(Seller)</sub></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="collapse_110" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
            <div class="panel-body">
                <div class="form-group row">
                    <label for="arv" class="col-sm-3 col-form-label">Seller's Increased Profit</label>
                    <div class="col-sm-3">$ <span id="seller_arv_110" class="seller-increased-profit">549,666</span></div>
                    <label for="arv" class="col-sm-3 col-form-label">Seller's Total Profit</label>
                    <div class="col-sm-3">$ <span id="seller_est_repair_cost_110" class="seller-total-profit">15,428</span></div>
                </div>
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
<script>
    var details = JSON.parse('<?php echo json_encode($details)?>');
    var chart;
    var chartOne;
    var chartTwo;
    var base_url = "{{asset('/')}}";
    $(document).ready(function(){
        let property_id = <?php echo $property->id;?>;
        let investor_id = <?php echo $investor->id;?>;
        $.ajax({
            url    : '{{ route("seller.investorProposals.list") }}',
            method : "POST",
            data : {id:property_id, investor_id: investor_id, _token:"{{csrf_token()}}"},
            dataType : "text",
            success : function (responses)
            {
                var response = JSON.parse(responses);
                if(response.data.length >0)
                {
                    let html = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
                    let send_proposal_div = false;
                    let is_accepted;
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
                    $.each(response.data, function(index, value){
                        panel = $('#panel_template').clone();
                        if(<?php echo auth()->user()->id?> === value.from_user) {
                            $(panel).find('.title').text('Sent To');
                            $(panel).find('.panel-heading').attr('class', 'panel-heading proposal_send');
                            $(panel).find('.panel-heading').attr('data-type', 'send');
                            $(panel).find('.btn-accept').hide();
                            $(panel).find('.received-from-title').text('Sent At');

                            $(panel).find('.name').html(value.receiver_name + '<sub>(Investor)</sub>');
                        }
                        else {
                            $(panel).find('.title').text('Received From');
                            $(panel).find('.panel-heading').attr('class', 'panel-heading proposal_received');
                            $(panel).find('.panel-heading').attr('data-type', 'received');
                            $(panel).find('.received-from-title').text('Received At');

                            $(panel).find('.name').html(value.sender_name + '<sub>(Investor)</sub>');
                        }

                        if(value.is_accepted == '1') {
                            $(panel).find('.btn-accept').show();
                            $(panel).find('.btn-accept').text('Accepted');
                            $(panel).find('.btn-accept').addClass('accepted_proposal');
                            $(panel).find('.btn-accept').attr('id', '');
                            hasAcceptedProposal = true;
                        }
                        else {
                            $(panel).find('.btn-accept').attr('id', 'accept_proposal_' + value.id);
                        }
                        
                        $(panel).find('[role="button"]').attr('href', '#collapse_' + value.id);
                        $(panel).find('[role="button"]').attr('aria-controls', 'collapse_' + value.id);
                        $(panel).find('[role="tabpanel"]').attr('id', 'collapse_' + value.id);                            

                        $(panel).find('.sent-at-date').text(moment(value.created_at).format("MM/DD/YYYY hh:mm:ss A"));

                        let calc_seller_investor = calcSellerInvestorProposal({
                            asking_price_i10: str2Float(value.ask_price.replace(/,/g, "")),
                            arv_i16: str2Float(value.arv),
                            holding_cost_i17: str2Float(value.holding_cost),
                            resale_fees_i18: str2Float(value.resale_fee),
                            loan_cost_i19: str2Float(value.loan_cost),
                            rule_percentage_i22: str2Float(value.rule_percentage),
                            seller_profit_share_i24: str2Float(value.seller_share),
                            estimated_cost_repairs_d21: str2Float(value.est_repair_cost)
                        });

                        $('#holding_cost').val(value.holding_cost);
                        $('#resale_fees').val(value.resale_fee);
                        $('#loan_cost').val(value.loan_cost);
                        
                        calc_params = {
                            asking_price_d10: str2Float(value.ask_price),
                            arv_d16: str2Float(value.arv),
                            estimated_cost_repair_d21: <?php echo auth()->user()->id?> === value.from_user ? str2Float(value.est_repair_cost) : calc_seller_investor.estimated_cost_repairs_misc_i21,
                            rule_percentage_d22: str2Float(value.rule_percentage),
                            seller_profit_share_d24: str2Float(value.seller_share),
                        };

                        let calc = calcInvestorSellerProposal(calc_params);
                        calc_results = calc;

                        $(panel).find('.brv').text(numberWithCommas(calc.brv_d23));
                        $(panel).find('.seller-increased-profit').text(numberWithCommas(calc.seller_increased_profit_d26));
                        $(panel).find('.seller-total-profit').text(numberWithCommas(calc.seller_total_profit_d27));
                        
                        if(response.max_proposal_id != value.id) {
                            $(panel).find('img').addClass('hide');
                        }

                        html += $(panel).html();

                        if(response.data.length == index+1)
                        {
                            updateCalcFields(calc_params)

                            $('#rule_percentage').val(value.rule_percentage);

                            let enableSend = (<?php echo auth()->user()->id?> === value.from_user ? false : true) && <?php echo (isset($accepted_proposal) ? 1 : 0)?> == 0;
                            if(!enableSend) {
                                $('.send-proposal-div input').attr('readonly', true);
                                $('.send-proposal-div input').attr('disabled', true);
                                $('.send-proposal-div textarea').attr('readonly', true);
                                $('.send-proposal-div textarea').attr('disabled', true);
                            }
                        }

                    });

                    html +='</div>';


                    $('.proposals-list .col-md-12').empty();
                    $('.proposals-list .col-md-12').removeClass('text-center');
                    $('.proposals-list .col-md-12').append(html);

                    if(hasAcceptedProposal) {
                        $('.btn-accept[id^="accept_proposal_"]').hide();
                        $('.send-proposal-div').hide();
                    }

                    $(".collapse").collapse('hide');

                }
                else
                {
                    let seller_ask_price = parseInt(($('#seller_ask_price').text()).replace(/,/g, ""));
                    let seller_arv = parseInt(($('#seller_arv').text()).replace(/,/g, ""));
                    let seller_brv = parseInt(($('#seller_brv').text()).replace(/,/g, ""));
                    let seller_est_repair_cost = parseInt(($('#seller_est_repair_cost').text()).replace(/,/g, ""));
                    let seller_partnership_seller = parseInt(($('#seller_partnership_seller').text()).replace(/,/g, ""));
                    let seller_partnership_investor = parseInt(($('#seller_partnership_investor').text()).replace(/,/g, ""));
                    let total_profit = Math.round(seller_arv - (seller_brv + seller_est_repair_cost));
                    let investor_share_profit = Math.round((total_profit * seller_partnership_investor) / 100);
                    let seller_share_profit = Math.round((total_profit * seller_partnership_seller) / 100);
                    let seller_gross_profit = Math.round(seller_brv + seller_share_profit);
                    $('#ask_price').attr("max",Math.round(seller_ask_price + seller_ask_price/2));
                    $('#ask_price').val(seller_ask_price);
                    $('#ask_price').val(numberWithCommas(seller_ask_price));
                    $('#arv').attr("max",Math.round(seller_arv + seller_arv/2));
                    $('#arv').val(seller_arv);
                    $('#arv').val(numberWithCommas(seller_arv));
                    $('#brv').attr("max",Math.round(seller_brv + seller_brv/2));
                    $('#brv').val(seller_brv);
                    $('#brv').val(numberWithCommas(seller_brv));
                    $('#est_repair_cost').attr("max",Math.round(seller_est_repair_cost + seller_est_repair_cost/2));
                    $('#est_repair_cost').val(seller_est_repair_cost);
                    $('#est_repair_cost').val(numberWithCommas(seller_est_repair_cost));
                    $('#seller_share').val(seller_partnership_seller);
                    $('#seller_share').val(seller_partnership_seller);
                    $('#investor_share').val(seller_partnership_investor);
                    $('#investor_share').val(seller_partnership_investor);
                    $('#total_projected_profit').val(numberWithCommas(total_profit));
                    $('#investor_profit').val(numberWithCommas(investor_share_profit));
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

    function setCharts(){
        var arv = parseInt(($("#arv").val()).replace(/,/g, ""));
        console.log("arv", arv);
        var brv = parseInt(($("#brv").val()).replace(/,/g, ""));
        var est_repair_cost = parseInt(($("#est_repair_cost").val()).replace(/,/g, ""));
        var seller_share = parseInt($("#seller_share").val());
        console.log("seller_share", seller_share);
        var investor_share = parseInt($("#investor_share").val());
        var total_profit = Math.round(arv - (brv + est_repair_cost));
        var seller_share_profit = Math.round((total_profit * seller_share) / 100);
        var seller_gross_profit = Math.round(brv+seller_share_profit);
        var investor_share_profit = Math.round((total_profit * investor_share) / 100);
        var flip_total_cost = Math.round(brv + est_repair_cost);
        var flip_profit = total_profit;
        var partner_total_cost = est_repair_cost;
        var partner_profit = investor_share_profit;
        var flip_roi = ((flip_profit/flip_total_cost).toFixed(2)) * 100;
        console.log("flip_roi", flip_roi);
        var partner_roi = ((partner_profit/partner_total_cost).toFixed(2)) * 100;
        console.log("partner_roi", partner_roi);
        $('#total_projected_profit').val(numberWithCommas(total_profit));
        $('#investor_profit').val(numberWithCommas(investor_share_profit));
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
                    data: [0, brv],
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
                        fontColor: '#ffffff'
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
                                var strng = value+'%';
                                // if (value < 10) {
                                //     strng = '0.' + value + '0%';
                                // } else {
                                //     strng = '1.00%';
                                // }
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

    function updateCharts()
    {
        var arv = parseInt(($("#arv").val()).replace(/,/g, ""));
        var brv = parseInt(($("#brv").val()).replace(/,/g, ""));
        var est_repair_cost = parseInt(($("#est_repair_cost").val()).replace(/,/g, ""));
        var seller_share = parseInt($("#seller_share").val());
        var investor_share = parseInt($("#investor_share").val());
        var total_profit = Math.round(arv - (brv + est_repair_cost));
        var seller_share_profit = Math.round((total_profit * seller_share) / 100);
        var seller_gross_profit = Math.round(brv + seller_share_profit);
        var investor_share_profit = Math.round((total_profit * investor_share) / 100);
        var flip_total_cost = brv + est_repair_cost;
        var flip_profit = total_profit;
        var partner_total_cost = est_repair_cost;
        var partner_profit = investor_share_profit;
        var flip_roi = ((flip_profit/flip_total_cost).toFixed(2)) * 100;
        var partner_roi = ((partner_profit/partner_total_cost).toFixed(2)) * 100;
        $('#total_projected_profit').val(numberWithCommas(total_profit));
        $('#investor_profit').val(numberWithCommas(investor_share_profit));
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
            console.log("yesyes");
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
            url: '{{ route("seller.proposal.setAccept") }}',
            method: 'POST',
            data: { id: proposal_id[2], _token:"{{csrf_token()}}" },
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

    $('.calc-trigger').on("keyup", function(){
        
        updateCalcFields({
            asking_price_d10: str2Float($('#ask_price').val()),
            arv_d16: str2Float($('#arv').val()),
            estimated_cost_repair_d21: str2Float($('#est_repair_cost').val()),
            rule_percentage_d22: str2Float($('#rule_percentage').val()),
            seller_profit_share_d24: str2Float($('#seller_share').val()),
        });
    });
    
    function updateCalcFields(data) {

        let calc = calcInvestorSellerProposal({
            asking_price_d10: data.asking_price_d10,
            arv_d16: data.arv_d16,
            estimated_cost_repair_d21: data.estimated_cost_repair_d21,
            rule_percentage_d22: data.rule_percentage_d22,
            seller_profit_share_d24: data.seller_profit_share_d24,
        });
        
        $('#ask_price').val(numberWithCommas(data.asking_price_d10));

        $('#arv').val(numberWithCommas(data.arv_d16));
        $('#brv').val(numberWithCommas(calc.brv_d23));

        $('#est_repair_cost').val(numberWithCommas(data.estimated_cost_repair_d21));
        $('#rule_percentage').val(data.rule_percentage_d22);

        $('#seller_share').val(data.seller_profit_share_d24);
        $('#investor_share').val(calc.investor_partnership_d25);
        
        $('#seller_increased_profit').val(numberWithCommas(calc.seller_increased_profit_d26));
        $('#seller_total_profit').val(numberWithCommas(calc.seller_total_profit_d27));
        
    }
</script>
<script src="{{ URL::asset('assets/front_end/js/global.js') }}"></script>
<script src="{{ URL::asset('assets/front_end/js/ui.js') }}"></script>
@endsection