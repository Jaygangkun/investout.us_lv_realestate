<div class="row">
    <div class="form-group col-md-3">
        <label for="street_no_name">Investor's Suggested ARV: </label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">$</span>
            <input type="text" class="form-control amountComma calc-trigger" min="0" max="10000000" name='arv_range_value' id='arv_range_value' data-id="arv">
        </div>
        <input type="range" min="0" max="10000000" name='arv' id='arv' class='form-control range-trigger'>
        <small class="text-danger">{{ $errors->first('arv') }}</small>
    </div>
    <input type="hidden"  class='form-control amountComma' min="0" max="10000000" name='brv_range_value' id='brv_range_value' data-id='brv'>
    <div class="form-group col-md-3">
        <label for="street_no_name">Investor's Suggested Repair Cost: </label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">$</span>
            <input type="text" class='form-control amountComma calc-trigger' min="0" max="10000000" name='est_repair_cost_range_value' id='est_repair_cost_range_value' data-id="est_repair_cost">
        </div>
        <input type="range" min="0" max="10000000" name='est_repair_cost' id='est_repair_cost' class='form-control range-trigger'>
        <small class="text-danger">{{ $errors->first('est_repair_cost') }}</small>
    </div>
    <div class="form-group col-md-3">
        <label for="70_rule">70% Rule: </label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">%</span>
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
            <span class="input-group-addon" id="basic-addon1">$</span>
            <input type="text" name="holding_cost" id="holding_cost" value='{{number_format(floatval($details->holding_cost)) ?? "0"}}' class="amountComma form-control validate[required,min[0],maxSize[10]] calc-trigger">
        </div>
        <small class="text-danger">{{ $errors->first('holding_cost') }}</small>
    </div>
    <div class="form-group col-md-3">
        <label for="seller">Resale Fees*</label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">$</span>
            <input type="text" id="resale_fees" name="resale_fees" value='{{number_format(floatval($details->resale_fees)) ?? "0"}}' class="amountComma form-control validate[required,min[0],maxSize[10]] calc-trigger">
        </div>
        <small class="text-danger">{{ $errors->first('resale_fees') }}</small>
    </div>

    <div class="form-group col-md-3">
        <label for="investor">Loan Cost*</label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">$</span>
            <input type="text" name="loan_cost" id="loan_cost" value='{{number_format(floatval($details->loan_cost)) ?? "0"}}' id="loan_cost" class="amountComma form-control validate[required,min[0],maxSize[10]] calc-trigger">
        </div>
        <small class="text-danger">{{ $errors->first('loan_cost') }}</small>
    </div>
    <div class="form-group col-md-3">
        <label for="investor">Total Misc Cost</label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">$</span>
            <input type="text" name="total_misc_cost" id="total_misc_cost"  class="form-control validate[required]" value="{{ number_format(floatval($details->holding_cost)+floatval($details->resale_fees)+floatval($details->loan_cost)) }}" disabled placeholder="Calculated">
        </div>
    </div>
</div>
<div class="row {{ $details->partner_up == '0' ? 'hide' : '' }}">
    <div class="form-group col-md-3">
        <label for="street_no_name">Wholesaler's Fee(%): </label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">%</span>
            <input type="text" class="form-control calc-trigger" min="1" max="99" name='seller_share_range_value' id='seller_share_range_value' data-id='seller_share'>
        </div>
        <input type="range" min="1" max="99" name='seller_share' id='seller_share' class='form-control range-trigger'>
        <small class="text-danger">{{ $errors->first('seller_share') }}</small>
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
            <span class="input-group-addon" id="basic-addon1">$</span>
            <input readonly type="text" class="form-control" min="1"  name='wholeseller_offer' id='wholeseller_offer' value="{{$details->investor_asking}}" data-id='investor_share'>
        </div>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="revised_price">Revised Offer price to Wholesaler:</label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">$</span>
            <input type="text" class="form-control amountComma calc-trigger" name="revised_price_range_value" id="revised_price_range_value" value="0" data-id="revised_price">
        </div>
        <input type="range" min="1" max="10000000" name='revised_price' id='revised_price' class='form-control range-trigger' value="0">
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
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">Sent At: <span class="sent-at-date">11/11/2021 01:13:47 AM</span></a>
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
    var investorProposals_list_data_value = null;
    var chart;
    var chartOne;
    var chartTwo;
    var base_url = "{{asset('/')}}";
    var initRange = false;

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
                    var hasAcceptedProposal = false;
                    $.each(response.data, function(index, value){
                        panel = $('#panel_template').clone();

                        if(<?php echo auth()->user()->id?> === value.from_user) {
                            $(panel).find('.title').text('Sent To');
                            $(panel).find('.panel-heading').attr('class', 'panel-heading proposal_send');
                            $(panel).find('.panel-heading').attr('data-type', 'send');
                            $(panel).find('.btn-accept').hide();
                        }
                        else {
                            $(panel).find('.title').text('Received From');
                            $(panel).find('.panel-heading').attr('class', 'panel-heading proposal_received');
                            $(panel).find('.panel-heading').attr('data-type', 'received');
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

                            // $("#description").val(value.description);

                            let enableSend = (<?php echo auth()->user()->id?> === value.from_user ? false : true) && <?php echo (isset($accepted_proposal) ? 1 : 0)?> == 0;
                    
                            if(!enableSend) {
                                $('.send-proposal-div input').attr('readonly', true);
                                $('.send-proposal-div input').attr('disabled', true);
                                $('.send-proposal-div textarea').attr('readonly', true);
                                $('.send-proposal-div textarea').attr('disabled', true);
                            }
                        }

                        return;
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
                        +'</a></td>';
                        

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

                    if(hasAcceptedProposal) {
                        $('.btn-accept[id^="accept_proposal_"]').hide();
                        $('.send-proposal-div').hide();
                    }

                    
                    $(".collapse").collapse('hide');

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
        
        $('#seller_share').val(data.wholesaler_fee_c26);
        $('#seller_share_range_value').val(data.wholesaler_fee_c26);

        $('#investor_profit').val(numberWithCommas(calc.investors_projected_profit_c24_2));

        $('#wholeseller_offer').val(numberWithCommas(calc.estimated_offer_c23_2));

        initRange = true;
    }
    
    $(".amountComma").on('keyup', function(){
        var num = $(this).val().replace(/,/g , '');
        num = num.replace(/[^0-9.]/g,'');
        var commaNum = numberWithCommas(num);
        $(this).val(commaNum);
    });
    
    $('.calc-trigger').on("keyup", function(){
        $('#'+$(this).attr("data-id")).val(($(this).val()).replace(/,/g, ""));
        updateCalcFields({
            arv_c17: str2Float($('#arv_range_value').val().replace(/,/g, "")),
            est_repair_cost_c18: str2Float($('#est_repair_cost_range_value').val().replace(/,/g, "")),
            rule_percentage_c24: str2Float($('#rule_percentage').val().replace(/,/g, "")),
            holding_cost_c19: str2Float($('#holding_cost').val().replace(/,/g, "")),
            resale_fees_c20: str2Float($('#resale_fees').val().replace(/,/g, "")),
            loan_cost_c21: str2Float($('#loan_cost').val().replace(/,/g, "")),
            wholesaler_fee_c26: str2Float($('#seller_share_range_value').val().replace(/,/g, "")),
        });
    });

    // $('#holding_cost, #resale_fees, #loan_cost').on("input", function(){
    //     $("#total_misc_cost").
    //     val(numberWithCommas(parseFloat($("#holding_cost").val().replace(",",""))+parseFloat($("#resale_fees").val().
    //     replace(",","")) + parseFloat($("#loan_cost").val().replace(",",""))));
    // });

    $('.range-trigger').on('input', function(){
        $('#'+$(this).attr("id")+'_range_value').val(numberWithCommas($(this).val()));
        updateCalcFields({
            arv_c17: str2Float($('#arv_range_value').val().replace(/,/g, "")),
            est_repair_cost_c18: str2Float($('#est_repair_cost_range_value').val().replace(/,/g, "")),
            rule_percentage_c24: str2Float($('#rule_percentage').val().replace(/,/g, "")),
            holding_cost_c19: str2Float($('#holding_cost').val().replace(/,/g, "")),
            resale_fees_c20: str2Float($('#resale_fees').val().replace(/,/g, "")),
            loan_cost_c21: str2Float($('#loan_cost').val().replace(/,/g, "")),
            wholesaler_fee_c26: str2Float($('#seller_share_range_value').val().replace(/,/g, "")),
        });
    })

    

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
<script src="{{ URL::asset('assets/front_end/js/global.js') }}"></script>
@endsection