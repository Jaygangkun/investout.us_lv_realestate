<div class="row">
    <div class="form-group col-md-3">
        <label for="street_no_name">Investor's Suggested ARV: </label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input type="text" class="form-control amountComma calc-trigger" min="0" max="10000000" name='arv_range_value' id='arv_range_value' data-id="arv">
        </div>
        <input type="range" min="0" max="10000000" name='arv' id='arv' class='form-control range-trigger'>
        <small class="text-danger">{{ $errors->first('arv') }}</small>
    </div>
    <input type="hidden"  class='form-control amountComma' min="0" max="10000000" name='brv_range_value' id='brv_range_value' data-id='brv'>
    <div class="form-group col-md-3">
        <label for="street_no_name">Investor's Suggested Repair Cost: </label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input type="text" class='form-control amountComma calc-trigger' min="0" max="10000000" name='est_repair_cost_range_value' id='est_repair_cost_range_value' data-id="est_repair_cost">
        </div>
        <input type="range" min="0" max="10000000" name='est_repair_cost' id='est_repair_cost' class='form-control range-trigger'>
        <small class="text-danger">{{ $errors->first('est_repair_cost') }}</small>
    </div>
    <div class="form-group col-md-3">
        <label for="70_rule">70% Rule: </label>
        <div class="input-group">
            <span class="input-group-addon" >%</span>
            <input type="number" min="50" max="80" name='rule_percentage' id='rule_percentage' value='{{$details->rule_percentage && intval($details->rule_percentage)>0?intval($details->rule_percentage): "70"}}' class='form-control  validate[min[50],max[90]] calc-trigger'>
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
            <span class="input-group-addon" >$</span>
            <input type="text" name="holding_cost" id="holding_cost" value='{{number_format(floatval($details->holding_cost)) ?? "0"}}' class="amountComma form-control validate[required,min[0],maxSize[10]] calc-trigger">
        </div>
        <small class="text-danger">{{ $errors->first('holding_cost') }}</small>
    </div>
    <div class="form-group col-md-3">
        <label for="seller">Resale Fees*</label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input type="text" id="resale_fees" name="resale_fees" value='{{number_format(floatval($details->resale_fees)) ?? "0"}}' class="amountComma form-control validate[required,min[0],maxSize[10]] calc-trigger">
        </div>
        <small class="text-danger">{{ $errors->first('resale_fees') }}</small>
    </div>

    <div class="form-group col-md-3">
        <label for="investor">Loan Cost*</label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input type="text" name="loan_cost" id="loan_cost" value='{{number_format(floatval($details->loan_cost)) ?? "0"}}' id="loan_cost" class="amountComma form-control validate[required,min[0],maxSize[10]] calc-trigger">
        </div>
        <small class="text-danger">{{ $errors->first('loan_cost') }}</small>
    </div>
    <div class="form-group col-md-3">
        <label for="investor">Total Misc Cost</label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input type="text" name="total_misc_cost" id="total_misc_cost"  class="form-control validate[required]" value="{{ number_format(floatval($details->holding_cost)+floatval($details->resale_fees)+floatval($details->loan_cost)) }}" disabled placeholder="Calculated">
        </div>
    </div>
</div>
<div class="row {{ $details->partner_up == '0' ? 'hide' : '' }}">
    <div class="form-group col-md-3">
        <label for="street_no_name">Wholesaler's Fee(%): </label>
        <div class="input-group">
            <span class="input-group-addon" >%</span>
            <input type="text" class="form-control calc-trigger" name='seller_share_range_value' id='seller_share_range_value' data-id='seller_share'>
        </div>
        <input type="range" min="0.01" max="99.99" step="0.01" name='seller_share' id='seller_share' class='form-control range-trigger' style="display: none">
        <small class="text-danger">{{ $errors->first('seller_share') }}</small>
    </div>
    <div class="form-group col-md-3">
        <label for="total_projected_profit">Investor's Projected Profit:</label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input type="text" class="form-control amountComma" name="investor_profit" id="investor_profit" value="" readonly>
        </div>

        <div class="input-group hide">
            <span class="input-group-addon" >$</span>
            <input type="text" class="form-control amountComma" name="total_projected_profit" id="total_projected_profit" value="" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="street_no_name">Estimated Offer to Wholesaler: </label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input readonly type="text" class="form-control" min="1"  name='wholeseller_offer' id='wholeseller_offer' value="" data-id='investor_share'>
        </div>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="revised_price">Revised Offer price to Wholesaler:</label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input type="text" class="form-control amountComma calc-trigger" name="revised_price_range_value" id="revised_price_range_value" value="" data-id="revised_price">
        </div>
        <input type="range" min="1" max="10000000" step="0.01" name='revised_price' id='revised_price' class='form-control range-trigger'>
    </div>
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
                        <td>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">Investor's Projected Profit:</a>
                        </td>
                        <td>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class=""> $ <span class="investor-projected-profit">58,931.52</span></a>
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
                        <td>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">Investor's ROI:</a>
                        </td>
                        <td>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class=""> <span class="investor-roi">20</span>%</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="collapse_110" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
            <div class="panel-body">
                <div class="form-group row">
                    <label for="arv" class="col-sm-3 col-form-label">Estimated ARV  Selling Price</label>
                    <div class="col-sm-3">$ <span id="seller_arv_110" class="arv">549,666</span></div>
                    <label for="arv" class="col-sm-3 col-form-label">Estimated Repair Cost</label>
                    <div class="col-sm-3">$ <span id="seller_est_repair_cost_110" class="est-repair-cost">15,428</span></div>
                </div>
                <div class="form-group row">
                    <label for="arv" class="col-sm-3 col-form-label">Wholesaler's Fee(%)</label>
                    <div class="col-sm-3"><span id="seller_partnership_seller_110" class="wholesaler-fee">18</span> %</div>
                    <label for="arv" class="col-sm-3 col-form-label">Investor's Projected Profit</label>
                    <div class="col-sm-3">$ <span id="seller_partnership_investor_110" class="investor-projected-profit">0</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
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
                    var hasAcceptedProposal = false;
                    $.each(response.data, function(index, value){
                        panel = $('#panel_template').clone();

                        if(<?php echo auth()->user()->id?> === value.from_user) {
                            $(panel).find('.title').text('Sent To');
                            $(panel).find('.panel-heading').attr('class', 'panel-heading proposal_send');
                            $(panel).find('.panel-heading').attr('data-type', 'send');
                            $(panel).find('.btn-accept').hide();
                            $(panel).find('.sent-at-title').text('Sent At');
                        }
                        else {
                            $(panel).find('.title').text('Received From');
                            $(panel).find('.panel-heading').attr('class', 'panel-heading proposal_received');
                            $(panel).find('.panel-heading').attr('data-type', 'received');
                            $(panel).find('.sent-at-title').text('Received At');
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

                        $(panel).find('.investor-projected-profit').text(numberWithCommas(calc.investors_projected_profit_c24_2));
                        $(panel).find('.investor-roi').text(numberWithCommas(calc.investor_roi_c30));
                        $(panel).find('.arv').text(numberWithCommas(str2Float(value.arv)));
                        $(panel).find('.est-repair-cost').text(numberWithCommas(str2Float(value.est_repair_cost)));
                        $(panel).find('.wholesaler-fee').text(numberWithCommas(value.seller_share));

                        if(response.max_proposal_id != value.id) {
                            $(panel).find('img').addClass('hide');
                        }

                        html += $(panel).html();
                        
                        if(response.data.length == index+1)
                        {
                            updateCalcFields(calc_params)

                            // $("#revised_price_range_value").val(numberWithCommas(value.revised_price));
                            // $("#revised_price").val(numberWithCommas(value.revised_price));

                            // $("#description").val(value.description);

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

                    updateCalcFields(calc_params);
                }
            },
            complete: function(){
                $("#preloder").css({"display": "none"});
                $(".loader").css({"display": "none"});
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
            $("#revised_price").val(calc.asking_price_investor_c28);
            $("#revised_price_range_value").val(numberWithCommasAndDecimals(calc.asking_price_investor_c28));

            $('#wholeseller_offer').val(numberWithCommasAndDecimals(calc.asking_price_investor_c28));
            calc_results.asking_price_investor_c28 = calc.asking_price_investor_c28;
        }

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
        
        if(!initRange) {
            $('#arv').attr("max",Math.round(data.arv_c17 * 3 / 2));
        }
        
        $('#arv').val(data.arv_c17);
        $('#arv_range_value').val(numberWithCommas(data.arv_c17));

        if(!initRange) {
            $('#est_repair_cost').attr("max",Math.round(data.est_repair_cost_c18 * 3 / 2));
        }
        $('#est_repair_cost').val(data.est_repair_cost_c18);
        $('#est_repair_cost_range_value').val(numberWithCommas(data.est_repair_cost_c18));

        $('#holding_cost').val(numberWithCommas(data.holding_cost_c19));
        $('#resale_fees').val(numberWithCommas(data.resale_fees_c20));
        $('#loan_cost').val(numberWithCommas(data.loan_cost_c21));
        
        $('#total_misc_cost').val(numberWithCommas(calc.total_misc_cost_c18_2));
        
        if(!is_update_revised_asking_price_investor) {
            $('#seller_share').val(wholesaler_fee.updated_wholesaler_fee_h30);
            $('#seller_share_range_value').val(numberWithCommasAndDecimals(wholesaler_fee.updated_wholesaler_fee_h30));
        }
        else {
            $('#seller_share').val(calc_params.wholesaler_fee_c26);
            $('#seller_share_range_value').val(numberWithCommasAndDecimals(calc_params.wholesaler_fee_c26));
        }

        if(!initRange) {
            $('#revised_price').attr("max", data.arv_c17 - data.est_repair_cost_c18);
            $('#revised_price').attr("min", data.est_repair_cost_c18);
        }
        $('#investor_profit').val(numberWithCommas(calc.investors_projected_profit_c24_2));

        initRange = true;
        is_update_revised_asking_price_investor = false;
    }
        
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
            arv_c17: str2Float($('#arv_range_value').val().replace(/,/g, "")),
            est_repair_cost_c18: str2Float($('#est_repair_cost_range_value').val().replace(/,/g, "")),
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
            arv_c17: str2Float($('#arv_range_value').val().replace(/,/g, "")),
            est_repair_cost_c18: str2Float($('#est_repair_cost_range_value').val().replace(/,/g, "")),
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
</script>
<script src="{{ URL::asset('assets/front_end/js/ui.js') }}"></script>
<script src="{{ URL::asset('assets/front_end/js/global.js') }}"></script>
@endsection