@extends('layouts.whole-seller-layout')
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
                </div>
                <div class="row ">
                    <hr class="px-3">
                    <div class="col-md-12">
                        <div class="title-single-box">
                            <form id="property_seller_suggested_offer">
                                <div class="{{ $details->for_sale == '0' ? 'hide' : '' }}">
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label">Investor's Counter Offer</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_askPrice">{{ number_format($details->investor_asking) ?? '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="{{ $details->for_sale == '1' && $details->partner_up == '1' ? '' : 'hide' }}">
                                <div class="{{ $details->partner_up == '0' ? 'hide' : '' }}">
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label">Wholesaler's Estimated ARV - Selling Price</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_arv">{{ number_format($details->arv_price) ?? '0' }}</span>
                                        </div>
                                        <label for="arv" class="col-sm-3 col-form-label">Revised Asking Price to Investor</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_brv">{{ number_format($details->brv_price) ?? '0' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label">Renovation Cost</label>
                                        <div class="col-sm-3">
                                            $ <span id="seller_est_repair_cost">{{ number_format($details->estimated_repair_cost) ?? '0' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label">Wholesaler's Fee(%)</label>
                                        <div class="col-sm-3">
                                            <span id="seller_partnership_seller">{{ $details->partnership_seller ?? '0' }}</span> %
                                            </div>
                                        <label for="arv" class="col-sm-3 col-form-label d-none">Investor's Profit Share(%)</label>
                                        <div class="col-sm-3 d-none">
                                            <span id="seller_partnership_investor">{{ $details->partnership_investor ?? '0' }}</span> %
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="arv" class="col-sm-3 col-form-label">Contract Start Date</label>
                                        <div class="col-sm-3">
                                            <span >{{ Carbon\Carbon::parse($property->contract_start)->format('m/d/Y') }}</span>

                                        </div>
                                        <label for="arv" class="col-sm-3 col-form-label">Contract End Date</label>
                                        <div class="col-sm-3">
                                            <span >{{ Carbon\Carbon::parse($property->contract_end)->format('m/d/Y') }}</span>

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
                        <h5><strong>Wholesaler's Counter Offer</strong></h5>

                        <form id="send_proposal" action="{{route('whole-seller.proposal.new_create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="property_id" name="property_id" value="{{ $property->id}}">
                            <input type="hidden" class="form-control" id="from_user" name="from_user" value="{{ auth()->user()->id }}">
                            <input type="hidden" class="form-control" id="to_user" name="to_user" value="{{ $investor->id }}">
                            <input type="hidden" class="form-control" id="is_investor" name="is_investor" value="0">
                            <input type="hidden" class="form-control" id="ref_proposal" name="ref_proposal" value="">
                            <input type="hidden" class="form-control" id="rule_percentage" name="rule_percentage" value="{{$details->rule_percentage}}">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="street_no_name">Investor's Suggested ARV: </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class='form-control amountComma' name='arv' id='arv' readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="street_no_name">Home Seller's Offer Price: </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class='form-control amountComma'name='seller_offer_price' id='seller_offer_price' readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="street_no_name">Investor's Suggested Repair Cost: </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" readonly class='form-control amountComma' name='est_repair_cost' id='est_repair_cost'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="street_no_name">Holding Cost</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control" name='holding_cost' id='holding_cost' readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="street_no_name">Resale Fees</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control"name='resale_fees' id='resale_fees' readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="street_no_name">Loan Cost</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control"name='loan_cost' id='loan_cost' readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="street_no_name">Wholesaler's Fee: <small>(As a % of ARV)</small></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="text" class="form-control calc-trigger" min="1" max="99" name='seller_share_range_value' id='seller_share_range_value' data-id='seller_share'>
                                    </div>
                                    <input type="range" min="1" max="99" name='seller_share' id='seller_share' class='form-control range-trigger'>
                                    <small class="text-danger">{{ $errors->first('wholesaler_fee') }}</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="investor_profit">Investor's Profit:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control amountComma" name="investor_profit" id="investor_profit" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="seller_net_profit">Wholesaler's Profit:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control amountComma" name="wholesaler_profit" id="wholesaler_profit" value="0" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="seller_gross_profit">Revised Asking Price to Investor:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control amountComma calc-trigger" name="revised_price_range_value" id="revised_price_range_value" value="0" data-id='revised_price'>
                                    </div>
                                    <input type="range" min="1" max="10000000" name='revised_price' id='revised_price' class='form-control range-trigger'>
                                </div>
                            </div>
                            
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
            <div class="panel-heading proposal_received proposal_send" role="tab" id="headingOne" data-type="received, send">
                <table class="table_panel_heading">
                    <tbody>
                        <tr>
                            <td rowspan="2">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">
                                    <img src="https://investout.us/sitefront/best_deal.png" class="" height="50px" width="50px">
                                </a>
                            </td>
                            <td>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="title">Received From</a>
                            </td>
                            <td>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">Wholesaler's Profit:</a>
                            </td>
                            <td>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class=""> $ <span class="wholesaler-profit">98,939.88</span></a>
                            </td>
                            <td rowspan="2">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">Sent At: <span class="received-from-date">11/11/2021 01:13:47 AM</span></a>
                            </td>
                            <td rowspan="2">
                                <div class="proposal_document">
                                    <a class="btn-accept" style="" href="javascript:void(0);" id="accept_proposal_110">Accept</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="name"> tyrone glover <sub>(Investor)</sub></a>
                            </td>
                            <td>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">Maximum Offer Price to Seller:</a>
                            </td>
                            <td>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class=""> $ <span class="max-offer-seller">467,306.48</span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="collapse_110" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                <div class="panel-body">
                    <form>
                        <div class="form-group row">
                            <label for="arv" class="col-sm-3 col-form-label">Estimated ARV - Selling Price</label>
                            <div class="col-sm-3">$ <span id="seller_arv_110" class="arv">549,666</span></div>
                            <label for="arv" class="col-sm-3 col-form-label">Revised Asking Price to Investor: </label>
                            <div class="col-sm-3"> $ <span id="seller_brv_110" class="revised-asking-investor">0</span></div>
                            <label for="arv" class="col-sm-3 col-form-label">Renovation  Cost</label>
                            <div class="col-sm-3">$ <span id="seller_est_repair_cost_110" class="renovation-cost">15,428</span></div>
                        </div>
                        <div class="form-group row">
                            <label for="arv" class="col-sm-3 col-form-label">Wholesaler's Fee(%)</label>
                            <div class="col-sm-3"><span id="seller_partnership_seller_110" class="wholesaler-fee">18</span> %</div>
                            <label for="arv" class="col-sm-3 col-form-label">Investor's Projected Profit</label>
                            <div class="col-sm-3">$ <span id="seller_partnership_investor_110" class="investor-projected-profit">0</span></div>
                        </div>
                    </form>
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
        var details = JSON.parse('<?php echo json_encode($details)?>');
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
        var investorProposals_list_data_value = null;
        var chart;
        var chartOne;
        var chartTwo;
        var base_url = "{{asset('/')}}";
        var initRange = false;

        $(document).ready(function(){
            let property_id = <?php echo $property->id;?>;
            let investor_id = <?php echo $investor->id;?>;
            $.ajax({
                url    : '{{ route("whole-seller.investorProposals.list") }}',
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
                        var hasAcceptedProposal = false;
                        $.each(response.data, function(index, value){
                            panel = $('#panel_template').clone();
                            if(<?php echo auth()->user()->id?> === value.from_user) {
                                $(panel).find('.title').text('Sent To');
                                $(panel).find('.panel-heading').attr('class', 'panel-heading proposal_send');
                                $(panel).find('.panel-heading').attr('data-type', 'send');
                                $(panel).find('.btn-accept').hide();

                                $(panel).find('.name').html(value.receiver_name + '<sub>(Investor)</sub>');
                            }
                            else {
                                $(panel).find('.title').text('Received From');
                                $(panel).find('.panel-heading').attr('class', 'panel-heading proposal_received');
                                $(panel).find('.panel-heading').attr('data-type', 'received');

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

                            let calc = calcWholesaler({
                                arv_c17: str2Float(value.arv),
                                est_repair_cost_c18: str2Float(value.est_repair_cost),
                                rule_percentage_c24: str2Float(value.rule_percentage),
                                holding_cost_c19: str2Float(value.holding_cost),
                                resale_fees_c20: str2Float(value.resale_fee),
                                loan_cost_c21: str2Float(value.loan_cost),
                                wholesaler_fee_c26: str2Float(value.seller_share),
                            });

                            $(panel).find('.wholesaler-profit').text(numberWithCommas(calc.wholesaler_profit_c27));
                            $(panel).find('.max-offer-seller').text(numberWithCommas(calc.max_offer_seller_c25));
                            $(panel).find('.arv').text(numberWithCommas(str2Float(value.arv)));
                            $(panel).find('.revised-asking-investor').text(numberWithCommas(str2Float(value.revised_price)));
                            $(panel).find('.renovation-cost').text(numberWithCommas(str2Float(value.est_repair_cost)));
                            $(panel).find('.wholesaler-fee').text(numberWithCommas(value.seller_share));
                            $(panel).find('.investor-projected-profit').text(numberWithCommas(calc.investor_projected_profit_c29));

                            if(response.max_proposal_id != value.id) {
                                $(panel).find('img').addClass('hide');
                            }

                            html += $(panel).html();

                            if(response.data.length == index+1)
                            {
                                updateCalcFields({
                                    arv_c17: str2Float(value.arv),
                                    est_repair_cost_c18: str2Float(value.est_repair_cost),
                                    rule_percentage_c24: str2Float(value.rule_percentage),
                                    holding_cost_c19: str2Float(value.holding_cost),
                                    resale_fees_c20: str2Float(value.resale_fee),
                                    loan_cost_c21: str2Float(value.loan_cost),
                                    wholesaler_fee_c26: str2Float(value.seller_share),
                                })

                                $("#revised_price_range_value").val(numberWithCommas(value.revised_price));
                                $("#revised_price").val(numberWithCommas(value.revised_price));

                                $('#rule_percentage').val(value.rule_percentage);

                                let enableSend = (<?php echo auth()->user()->id?> === value.from_user ? false : true) && <?php echo (isset($accepted_proposal) ? 1 : 0)?> == 0;
                                if(!enableSend) {
                                    $('.send-proposal-div input').attr('readonly', true);
                                    $('.send-proposal-div input').attr('disabled', true);
                                    $('.send-proposal-div textarea').attr('readonly', true);
                                    $('.send-proposal-div textarea').attr('disabled', true);
                                }
                            }

                            return;
                            
                            console.log("typeof value.ask_price",value.ask_price == null ? 0 : value.ask_price);
                            ask_price = (value.ask_price == null ? 0 : parseInt(value.ask_price));
                            console.log("typeof ask_price = ", typeof ask_price);
                            console.log("ask_price", ask_price);
                            // alert(ask_price);
                            investorProposals_list_data_value = value;
                            arv = value.arv;
                            brv = value.brv;
                            est_repair_cost = value.est_repair_cost;
                            seller_share = value.seller_share;
                            investor_share = value.investor_share;
                            total_profit = Math.round(arv - (brv + est_repair_cost));
                            seller_share_profit = value.Wholesaler_profit;
                            seller_share_profit = value.arv * value.seller_share / 100;
                            seller_gross_profit = value.Wholesaler_profit;
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
                            investor_share_profit =   investor_share_profit = value.investor_projected_profit; //Math.round((total_profit * investor_share) / 100);
                            

                            investor_share_profit = c17 - (c25 + c27 + c18 + c19 + c20 + c21);

                            flip_total_cost = Math.round(brv + est_repair_cost);
                            flip_profit = total_profit;
                            partner_total_cost = est_repair_cost;
                            partner_profit = investor_share_profit;
                            flip_roi = (flip_profit/flip_total_cost).toFixed(2);
                            partner_roi =value.investor_roi;// (partner_profit/partner_total_cost).toFixed(2);
                            if(response.data.length == index+1)
                            {
                                send_proposal_div = (<?php echo auth()->user()->id?> === value.from_user ? false : true);
                                //if(<?php echo auth()->user()->id?> !== value.from_user)
                                if(true)
                                {
                                    if(ask_price > 0)
                                    {
                                        $('#ask_price').attr("max",Math.round(ask_price + ask_price/2));
                                        console.log("Math.round(ask_price + ask_price/2) = ", Math.round(ask_price + ask_price/2) );
                                    }
                                    $('#ask_price').val(ask_price);
                                    $('#ask_price_range_value').val(numberWithCommas(ask_price));
                                    $('#arv').attr("max",Math.round(value.arv + value.arv/2));
                                    $('#arv').val(value.arv);
                                    $('#arv_range_value').val(numberWithCommas(value.arv));
                                    $('#brv').attr("max",Math.round(value.brv + value.brv/2));
                                    $('#brv').val(value.brv);
                                    let brv_range_value = c25;
                                    $('#brv').attr("max",Math.round(brv_range_value * 1.5));
                                    $('#brv').attr("min",Math.round(brv_range_value * 0.5));
                                    $('#brv').val(Math.round(brv_range_value));
                                    $('#brv_range_value').val(numberWithCommas(brv_range_value));
                                    $('#est_repair_cost').attr("max",Math.round(value.est_repair_cost + value.est_repair_cost/2));
                                    $('#est_repair_cost').val(value.est_repair_cost);
                                    $('#est_repair_cost_range_value').val(numberWithCommas(value.est_repair_cost));
                                    $('#seller_share').val(value.seller_share);
                                    $('#seller_share_range_value').val(value.seller_share);
                                    $('#investor_share').val(value.investor_share);
                                    $('#investor_share_range_value').val(value.investor_share);
                                    $('#ref_proposal').val(value.id);
                                    $('#total_projected_profit').val(numberWithCommas(total_profit));
                                    $('#investor_profit').val(numberWithCommas(investor_share_profit));
                                    $('#seller_net_profit').val(numberWithCommas(seller_share_profit));
                                    $('#seller_gross_profit').val(numberWithCommas(seller_gross_profit));
                                }
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
                                    +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+ (<?php echo auth()->user()->id?> === value.from_user ? value.receiver_name + ' <sub>(Investor)</sub>' : (value.sender_name)+ ' <sub>(Investor)</sub>') + '</a></td>'
                                +'</tr>';
                                }
                            else
                                {
                                    html +='<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Investor\'s Suggested Ask Price: </a></td>'
                                        +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(ask_price)+'</a></td>'
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
                                    +'<td rowspan=' + (rowspan_count-1) + '><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> ' + (<?php echo auth()->user()->id?> === value.from_user ? value.receiver_name + ' <sub>(Investor)</sub>' : (value.sender_name) + ' <sub>(Investor)</sub>' ) + '</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Wholesaler\'s Profit</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(seller_share_profit) +'</a></td>'
                                +'</tr>'
                                +'<tr>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Wholesaler\'s Gross Profit:</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(seller_gross_profit) +'</a></td>'
                                +'</tr>';

                                }
                            else
                                {
                                    html +='<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Wholesaler\'s Profit:</a></td>'
                                        +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(seller_share_profit) +'</a></td>'
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
                                    +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+ (<?php echo auth()->user()->id?> === value.from_user ? value.receiver_name + ' <sub>(Investor)</sub>' : (value.sender_name)+ ' <sub>(Investor)</sub>') + '</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Wholesaler\'s Gross Profit:</a></td>'
                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> $ '+ numberWithCommas(seller_gross_profit) +'</a></td>'
                                +'</tr>';
                                }
                            }

                            html += '</table>'
                                +'</div>'
                                +'<div id="collapse_'+ value.id +'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">'
                                +'<div class="panel-body">'
                                +'<form>';
                            if(<?php echo $details->for_sale;?> != 0)
                            {
                                html += '<div class="form-group row">'
                                    +'<div class="col-md-12">'
                                    +'<h6><strong>For Sale</strong></h6>'
                                    +'</div>'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Ask Price</label>'
                                    +'<div class="col-sm-3">'
                                    +'$ <span id="seller_ask_price_'+value.id+'">'+numberWithCommas(ask_price)+'</span>'
                                    +'</div>'
                                    +'</div>';
                            }
                            if(<?php echo $details->for_sale;?> != 0 && <?php echo $details->partner_up;?> != 0)
                            {
                                html += '<hr>';
                            }
                            if(<?php echo $details->partner_up;?> != 0)
                            {
                                html +='<div class="form-group row">'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Estimated ARV - Selling Price</label>'
                                    +'<div class="col-sm-3">'
                                    +'$ <span id="seller_arv_'+value.id+'">'+numberWithCommas(value.arv)+'</span>'
                                    +'</div>'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Revised Asking Price to Investor: </label>'
                                    +'<div class="col-sm-3">'
                                    +' $ <span id="seller_brv_'+value.id+'">'+numberWithCommas(value.brv)+'</span>'
                                    +'</div>'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Renovation  Cost</label>'
                                    +'<div class="col-sm-3">'
                                    +'$ <span id="seller_est_repair_cost_'+value.id+'">'+numberWithCommas(value.est_repair_cost)+'</span>'
                                    +'</div>'
                                    +'</div>'
                                    +'<div class="form-group row">'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Wholesaler\'s Fee(%)</label>'
                                    +'<div class="col-sm-3">'
                                    +'<span id="seller_partnership_seller_'+value.id+'">'+value.seller_share+'</span> %'
                                    +'</div>'
                                    +'<label for="arv" class="col-sm-3 col-form-label">Investor\'s Profit Share(%)</label>'
                                    +'<div class="col-sm-3">'
                                    +'<span id="seller_partnership_investor_'+value.id+'">'+value.investor_share+'</span> %'
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
                                +'</div>';


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
                        // console.log("send_proposal_div",send_proposal_div);
                        // if(send_proposal_div && <?php echo (isset($accepted_proposal) ? 1 : 0)?> == 0)
                        // {
                        //     $('.send-proposal-div').show();
                        // }
                        // else
                        // {
                        //     // $('.send-proposal-div').show();
                        //     // $('.send-proposal-div input').attr('readonly', true);
                        //     // $('.send-proposal-div input').attr('disabled', true);
                        //     // $('.send-proposal-div textarea').attr('readonly', true);
                        //     // $('.send-proposal-div textarea').attr('disabled', true);
                        // }

                    }
                    else
                    {
                        updateCalcFields({
                            arv_c17: str2Float(details.arv_price),
                            est_repair_cost_c18: str2Float(details.estimated_repair_cost),
                            rule_percentage_c24: str2Float(details.rule_percentage),
                            holding_cost_c19: str2Float(details.holding_cost),
                            resale_fees_c20: str2Float(details.resale_fees),
                            loan_cost_c21: str2Float(details.loan_cost),
                            wholesaler_fee_c26: str2Float(details.partnership_seller),
                        })
                        
                        return;
                        var arv = parseInt(($("#arv_range_value").val()).replace(/,/g, ""));
                        let seller_ask_price = parseInt(($('#seller_ask_price').text()).replace(/,/g, ""));
                        let seller_arv = parseInt(($('#seller_arv').text()).replace(/,/g, ""));
                        let seller_brv = parseInt(($('#seller_brv').text()).replace(/,/g, ""));
                        let seller_est_repair_cost = parseInt(($('#seller_est_repair_cost').text()).replace(/,/g, ""));
                        let seller_partnership_seller = parseInt(($('#seller_partnership_seller').text()).replace(/,/g, ""));
                        let seller_partnership_investor = parseInt(($('#seller_partnership_investor').text()).replace(/,/g, ""));
                        var est_repair_cost = parseInt(($("#est_repair_cost_range_value").val()).replace(/,/g, ""));
                        var seller_share = parseInt($("#seller_share_range_value").val());
                        var holding_cost = parseInt(($("#holding_cost").val()).replace(/,/g, ""));
                        var resale_cost = parseInt(($("#resale_fees").val()).replace(/,/g, ""));
                        var loan_cost = parseInt(($("#loan_cost").val()).replace(/,/g, ""));
                        var percent_rule = parseInt(($("#rule_percentage").val()).replace(/,/g, ""));

                        var total_profit = Math.round((arv - ( est_repair_cost + holding_cost+resale_cost+loan_cost))*percent_rule/100);
                        var seller_share_profit = (total_profit * seller_share) / 100;
                        var seller_gross_profit = Math.round(brv + seller_share_profit);

                        // let total_profit = Math.round(seller_arv - (seller_brv + seller_est_repair_cost));
                        let investor_share_profit = Math.round((total_profit * seller_partnership_investor) / 100);
                        // let seller_share_profit = Math.round((total_profit * seller_partnership_seller) / 100);
                        // let seller_gross_profit = Math.round(seller_brv + seller_share_profit);
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
                        $('#investor_profit').val(numberWithCommas(investor_share_profit));
                        $('#seller_net_profit').val(numberWithCommas(seller_share_profit));
                        $('#seller_gross_profit').val(numberWithCommas(seller_gross_profit));
                    }

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

        $('.calc-trigger').on("keyup", function(){
            $('#'+$(this).attr("data-id")).val(($(this).val()).replace(/,/g, ""));
            updateCalcFields({
                arv_c17: str2Float($('#arv').val().replace(/,/g, "")),
                est_repair_cost_c18: str2Float($('#est_repair_cost').val().replace(/,/g, "")),
                rule_percentage_c24: str2Float($('#rule_percentage').val().replace(/,/g, "")),
                holding_cost_c19: str2Float($('#holding_cost').val().replace(/,/g, "")),
                resale_fees_c20: str2Float($('#resale_fees').val().replace(/,/g, "")),
                loan_cost_c21: str2Float($('#loan_cost').val().replace(/,/g, "")),
                wholesaler_fee_c26: str2Float($('#seller_share_range_value').val().replace(/,/g, "")),
            });
        });
        
        $('.range-trigger').on('input', function(){
            $('#'+$(this).attr("id")+'_range_value').val(numberWithCommas($(this).val()));
            updateCalcFields({
                arv_c17: str2Float($('#arv').val().replace(/,/g, "")),
                est_repair_cost_c18: str2Float($('#est_repair_cost').val().replace(/,/g, "")),
                rule_percentage_c24: str2Float($('#rule_percentage').val().replace(/,/g, "")),
                holding_cost_c19: str2Float($('#holding_cost').val().replace(/,/g, "")),
                resale_fees_c20: str2Float($('#resale_fees').val().replace(/,/g, "")),
                loan_cost_c21: str2Float($('#loan_cost').val().replace(/,/g, "")),
                wholesaler_fee_c26: str2Float($('#seller_share_range_value').val().replace(/,/g, "")),
            });
        })
        
        // $('#ask_price, #arv, #brv, #est_repair_cost, #seller_share, #investor_share, #holding_cost, #resale_fees, #loan_cost,#rule_percentage ').on("input", function(){
        //     console.log($(this).attr("id"));
        //     console.log("value", $(this).val());
        //     $("#brv_range_value").val(numberWithCommas( parseFloat(((parseFloat($("#rule_percentage").val().replace(",",""))/100) *parseFloat((parseFloat($("#arv_range_value").val().replace(",","")) - parseFloat($("#holding_cost").val().replace(",","")) - parseFloat($("#resale_fees").val().
        //     replace(",","")) - parseFloat($("#loan_cost").val().replace(",","")) - parseFloat($("#est_repair_cost_range_value").val().replace(",",""))).toFixed(2)) ).toFixed(2))));


        //     if($(this).attr("id") === 'seller_share')
        //     {
        //         $('#'+$(this).attr("id")+'_range_value').val($(this).val());
        //         $('#investor_share').val(100 - parseInt($(this).val()));
        //         $('#investor_share_range_value').val(100 - parseInt($(this).val()));
        //     }
        //     else if($(this).attr("id") === 'investor_share')
        //     {
        //         $('#'+$(this).attr("id")+'_range_value').val($(this).val());
        //         $('#seller_share').val(100 - parseInt($(this).val()));
        //         $('#seller_share_range_value').val(100 - parseInt($(this).val()));
        //     }
        //     else
        //     {
        //         $('#'+$(this).attr("id")+'_range_value').val(numberWithCommas($(this).val()));
        //     }
        // });

        // $('#ask_price_range_value,#arv_range_value, #brv_range_value, #est_repair_cost_range_value, #seller_share_range_value, #investor_share_range_value').on("input", function(){
        //     console.log($(this).attr("id"));
        //     console.log("value", $(this).val() == "");

        //     if($(this).attr("data-id") === 'seller_share' && $(this).val() != '')
        //     {
        //         $('#'+$(this).attr("data-id")).val(($(this).val()).replace(/,/g, ""));
        //         $('#investor_share').val(100 - parseInt($(this).val()));
        //         $('#investor_share_range_value').val(100 - parseInt($(this).val()));
        //     }
        //     else if($(this).attr("data-id") === 'investor_share' && $(this).val() != '')
        //     {
        //         $('#'+$(this).attr("data-id")).val(($(this).val().replace(/,/g, "")));
        //         $('#seller_share').val(100 - parseInt($(this).val()));
        //         $('#seller_share_range_value').val(100 - parseInt($(this).val()));
        //     }
        //     else
        //     {
        //         $('#'+$(this).attr("data-id")).val(($(this).val()).replace(/,/g, ""));
        //     }

        // });


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

        function updateCalcFields(data) {

            let calc = calcWholesaler({
                arv_c17: data.arv_c17,
                est_repair_cost_c18: data.est_repair_cost_c18,
                rule_percentage_c24: data.rule_percentage_c24,
                holding_cost_c19: data.holding_cost_c19,
                resale_fees_c20: data.resale_fees_c20,
                loan_cost_c21: data.loan_cost_c21,
                wholesaler_fee_c26: data.wholesaler_fee_c26,
            });

            $('#arv').val(numberWithCommas(data.arv_c17));

            $('#seller_offer_price').val(numberWithCommas(calc.max_offer_seller_c25));
            $('#est_repair_cost').val(numberWithCommas(data.est_repair_cost_c18));

            $('#holding_cost').val(numberWithCommas(data.holding_cost_c19));
            $('#resale_fees').val(numberWithCommas(data.resale_fees_c20));
            $('#loan_cost').val(numberWithCommas(data.loan_cost_c21));
            
            $('#seller_share').val(data.wholesaler_fee_c26);
            $('#seller_share_range_value').val(numberWithCommas(data.wholesaler_fee_c26));
            
            $('#investor_profit').val(numberWithCommas(calc.investor_projected_profit_c29));

            $('#wholesaler_profit').val(numberWithCommas(calc.wholesaler_profit_c27));

        }
        
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