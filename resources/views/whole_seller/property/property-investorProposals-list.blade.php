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
                                    <label for="">Investor's Suggested ARV: </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class='form-control amountComma' name='arv' id='arv' readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Home Seller's Offer Price: </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class='form-control amountComma'name='seller_offer_price' id='seller_offer_price' readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Investor's Suggested Repair Cost: </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" readonly class='form-control amountComma' name='est_repair_cost' id='est_repair_cost'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Holding Cost</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control" name='holding_cost' id='holding_cost' readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Resale Fees</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control"name='resale_fees' id='resale_fees' readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Loan Cost</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control"name='loan_cost' id='loan_cost' readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Wholesaler's Fee: <small>(As a % of ARV)</small></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="text" class="form-control calc-trigger" min="1" max="99" name='seller_share_range_value' id='seller_share_range_value' data-id='seller_share'>
                                    </div>
                                    <input type="range" min="0.01" max="99.99" step="0.01" name='seller_share' id='seller_share' class='form-control range-trigger' style="display: none">
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
                                        <input type="text" class="form-control calc-trigger" name="revised_price_range_value" id="revised_price_range_value" value="" data-id='revised_price'>
                                    </div>
                                    <input type="range" min="1" max="10000000" step="0.01" name='revised_price' id='revised_price' class='form-control range-trigger'>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Select Document:</label>
                                    <input type="file" class='form-control' name='proposal' id='proposal'>
                                    <small class="text-danger">{{ $errors->first('address') }}</small>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Description:</label>
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
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class=""><span class="received-from-title">Sent At</span>: <span class="received-from-date">11/11/2021 01:13:47 AM</span></a>
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
    <script>
        var details = JSON.parse('<?php echo json_encode($details)?>');
        var base_url = "{{asset('/')}}";
        var initRange = false;
        var calc_params = {};
        var calc_results = {};
        var is_update_revised_asking_price_investor = true;

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
                        var hasAcceptedProposal = false;
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

                            calc_params = {
                                arv_c17: str2Float(value.arv),
                                est_repair_cost_c18: str2Float(value.est_repair_cost),
                                rule_percentage_c24: str2Float(value.rule_percentage),
                                holding_cost_c19: str2Float(value.holding_cost),
                                resale_fees_c20: str2Float(value.resale_fee),
                                loan_cost_c21: str2Float(value.loan_cost),
                                wholesaler_fee_c26: str2Float(value.seller_share),
                            };

                            let calc = calcWholesaler(calc_params);
                            calc_results = calc;

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
                                updateCalcFields(calc_params)

                                // $("#revised_price_range_value").val(numberWithCommas(value.revised_price));
                                // $("#revised_price").val(numberWithCommas(value.revised_price));

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
                        calc_params = {
                            arv_c17: str2Float(details.arv_price),
                            est_repair_cost_c18: str2Float(details.estimated_repair_cost),
                            rule_percentage_c24: str2Float(details.rule_percentage),
                            holding_cost_c19: str2Float(details.holding_cost),
                            resale_fees_c20: str2Float(details.resale_fees),
                            loan_cost_c21: str2Float(details.loan_cost),
                            wholesaler_fee_c26: str2Float(details.partnership_seller),
                        }

                        let calc = calcWholesaler(calc_params);
                        calc_results = calc;

                        updateCalcFields(calc_params)
                    }

                },
                complete: function(){
                    $("#preloder").css({"display": "none"});
                    $(".loader").css({"display": "none"});
                }
            });


        });

        $('.calc-trigger').on("keyup", function(){
            $('#'+$(this).attr("data-id")).val(($(this).val()).replace(/,/g, ""));
            if($(this).attr('data-id') == 'seller_share' && $(this).val().charAt($(this).val().length - 1) == '.') {
                return;
            }
            
            let wholesaler_fee_c26 = str2Float($('#seller_share_range_value').val().replace(/,/g, ""));
            if($(this).attr('data-id') != 'seller_share') {
                wholesaler_fee_c26 = calc_params.wholesaler_fee_c26;
            }
            else {
                is_update_revised_asking_price_investor = true;
            }

            calc_params.wholesaler_fee_c26 = wholesaler_fee_c26;

            updateCalcFields({
                arv_c17: str2Float($('#arv').val().replace(/,/g, "")),
                est_repair_cost_c18: str2Float($('#est_repair_cost').val().replace(/,/g, "")),
                rule_percentage_c24: str2Float($('#rule_percentage').val().replace(/,/g, "")),
                holding_cost_c19: str2Float($('#holding_cost').val().replace(/,/g, "")),
                resale_fees_c20: str2Float($('#resale_fees').val().replace(/,/g, "")),
                loan_cost_c21: str2Float($('#loan_cost').val().replace(/,/g, "")),
                wholesaler_fee_c26: wholesaler_fee_c26,
            });
        });
        
        $('.range-trigger').on('input', function(){
            $('#'+$(this).attr("id")+'_range_value').val(numberWithCommas($(this).val()));
            let wholesaler_fee_c26 = str2Float($('#seller_share_range_value').val().replace(/,/g, ""));
            if($(this).attr('id') != 'seller_share') {
                wholesaler_fee_c26 = calc_params.wholesaler_fee_c26;
            }
            else {
                is_update_revised_asking_price_investor = true;
            }

            calc_params.wholesaler_fee_c26 = wholesaler_fee_c26;

            updateCalcFields({
                arv_c17: str2Float($('#arv').val().replace(/,/g, "")),
                est_repair_cost_c18: str2Float($('#est_repair_cost').val().replace(/,/g, "")),
                rule_percentage_c24: str2Float($('#rule_percentage').val().replace(/,/g, "")),
                holding_cost_c19: str2Float($('#holding_cost').val().replace(/,/g, "")),
                resale_fees_c20: str2Float($('#resale_fees').val().replace(/,/g, "")),
                loan_cost_c21: str2Float($('#loan_cost').val().replace(/,/g, "")),
                wholesaler_fee_c26: wholesaler_fee_c26,
            });
        })

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
                        $("a[id^='accept_proposal_']").hide();
                        $('.send-proposal-div').hide();
                        $("#accept_proposal_"+response.id).show();
                        $("#accept_proposal_"+response.id).text('Accepted');
                        $("#accept_proposal_"+response.id).addClass('accepted_proposal');
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

            if(is_update_revised_asking_price_investor) {
                $("#revised_price").val(numberWithCommas(calc.asking_price_investor_c28));
                $("#revised_price_range_value").val(numberWithCommasAndDecimals(calc.asking_price_investor_c28));
            }

            // arv_c17: str2Float(value.arv),
            // est_repair_cost_c18: str2Float(value.est_repair_cost),
            // rule_percentage_c24: str2Float(value.rule_percentage),
            // holding_cost_c19: str2Float(value.holding_cost),
            // resale_fees_c20: str2Float(value.resale_fee),
            // loan_cost_c21: str2Float(value.loan_cost),
            // wholesaler_fee_c26: str2Float(value.seller_share),

            let wholesaler_fee = calcWholesalerFeeFromRevisedAskingPrice({
                new_asking_price_investor_h28: str2Float($('#revised_price_range_value').val().replace(/,/g, "")),
                asking_price_investor_c28: calc_results.asking_price_investor_c28,
                wholesaler_fee_c26: calc_params.wholesaler_fee_c26,
                arv_c17: data.arv_c17
            });

            calc = calcWholesaler({
                arv_c17: data.arv_c17,
                est_repair_cost_c18: data.est_repair_cost_c18,
                rule_percentage_c24: data.rule_percentage_c24,
                holding_cost_c19: data.holding_cost_c19,
                resale_fees_c20: data.resale_fees_c20,
                loan_cost_c21: data.loan_cost_c21,
                wholesaler_fee_c26: wholesaler_fee.updated_wholesaler_fee_h30,
            });

            $('#arv').val(numberWithCommas(data.arv_c17));

            $('#seller_offer_price').val(numberWithCommas(calc.max_offer_seller_c25));
            $('#est_repair_cost').val(numberWithCommas(data.est_repair_cost_c18));

            $('#holding_cost').val(numberWithCommas(data.holding_cost_c19));
            $('#resale_fees').val(numberWithCommas(data.resale_fees_c20));
            $('#loan_cost').val(numberWithCommas(data.loan_cost_c21));
            
            if(!is_update_revised_asking_price_investor) {
                $('#seller_share').val(wholesaler_fee.updated_wholesaler_fee_h30);
                $('#seller_share_range_value').val(numberWithCommasAndDecimals(wholesaler_fee.updated_wholesaler_fee_h30));
            }
            else {
                $('#seller_share').val(calc_params.wholesaler_fee_c26);
                $('#seller_share_range_value').val(numberWithCommasAndDecimals(calc_params.wholesaler_fee_c26));
            }
            
            $('#investor_profit').val(numberWithCommas(calc.investor_projected_profit_c29));

            $('#wholesaler_profit').val(numberWithCommas(data.arv_c17 * wholesaler_fee.updated_wholesaler_fee_h30 / 100));

            if(!initRange) {
                $('#revised_price').attr("max", data.arv_c17 - data.est_repair_cost_c18);
                $('#revised_price').attr("min", data.est_repair_cost_c18);
            }
            
            initRange = true;
            is_update_revised_asking_price_investor = false;
        }
        
    </script>
    <script src="{{ URL::asset('assets/front_end/js/global.js') }}"></script>
    <script src="{{ URL::asset('assets/front_end/js/ui.js') }}"></script>
@endsection