<div class="row {{ $details->for_sale == '0' ? 'hide' : '' }}">
    <div class="col-md-12">
        <h6><strong>For Sale</strong></h6>
    </div>
    <div class="form-group col-md-4">
        <label for="suggest_ask_price">Suggest Ask Price: </label>
        <div class="input-group">
            <span class="input-group-addon" id="">$</span>
            <input type="text" class='form-control amountComma calc-trigger' name='ask_price' id='ask_price'>
        </div>
    </div>
</div>
<?php
if($details->for_sale == '1' && $details->partner_up == '1') {
    ?>
    <hr class="{{ $details->for_sale == '1' && $details->partner_up == '1' ? '' : 'hide' }}">
    <div class="row">
        <div class="col-md-12">
            <h6><strong>For Partner Up</strong></h6>
        </div>
    </div>
    <?php
}
?>

<div class="row">
    <input type="hidden" id="est_repair_cost" name="est_repair_cost" />
    <div class="form-group col-md-3">
        <label for="">ARV: </label>
        <div class="input-group">
            <span class="input-group-addon" id="">$</span>
            <input type="text" class="form-control amountComma calc-trigger" name='arv' id='arv'>
        </div>
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
        <label for="investor">Total Misc Cost:</label>
        <div class="input-group">
            <span class="input-group-addon" >$</span>
            <input type="text" name="total_misc_cost" id="total_misc_cost"  class="form-control validate[required]" value="" readonly placeholder="">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="">Estimated Cost of Repairs: </label>
        <div class="input-group">
            <span class="input-group-addon" id="">$</span>
            <input type="text" class="form-control amountComma" name='estimated_cost_repairs' id='estimated_cost_repairs' readonly>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="70_rule">70% Rule: </label>
        <div class="input-group">
            <span class="input-group-addon" >%</span>
            <input type="number" name='rule_percentage' id='rule_percentage' class='form-control calc-trigger'>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="">Before Renovation Value: </label>
        <div class="input-group">
            <span class="input-group-addon" id="">$</span>
            <input type="text" class="form-control amountComma" name='brv' id='brv' readonly>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="">Seller's Profit Share: </label>
        <div class="input-group">
            <span class="input-group-addon" id="">%</span>
            <input type="text" class="form-control amountComma calc-trigger" name='seller_share' id='seller_share' value=''>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="">Invester's Partnership: </label>
        <div class="input-group">
            <span class="input-group-addon" id="">%</span>
            <input type="text" class="form-control amountComma" name='investor_partnership' id='investor_partnership' readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="">Estimated Increase to Seller: </label>
        <div class="input-group">
            <span class="input-group-addon" id="">$</span>
            <input type="text" class="form-control amountComma" name='est_increase_seller' id='est_increase_seller' readonly>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="">Partnership Offer to Seller: </label>
        <div class="input-group">
            <span class="input-group-addon" id="">$</span>
            <input type="text" class="form-control amountComma" name='partnership_offer_seller' id='partnership_offer_seller' readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="">Investor's Projected Profit (Partnership): </label>
        <div class="input-group">
            <span class="input-group-addon" id="">$</span>
            <input type="text" class="form-control amountComma" name='investor_projected_profit_partnership' id='investor_projected_profit_partnership' readonly>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="">Investor's Projected Profit (Flip): </label>
        <div class="input-group">
            <span class="input-group-addon" id="">$</span>
            <input type="text" class="form-control amountComma" name='investor_projected_profit_flip' id='investor_projected_profit_flip' readonly>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="">Investor's Return On Investment (Flip): </label>
        <div class="input-group">
            <span class="input-group-addon" id="">%</span>
            <input type="text" class="form-control amountComma" name='investor_roi_flip' id='investor_roi_flip' readonly>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="">Investor's Return On Investment (Partnership): </label>
        <div class="input-group">
            <span class="input-group-addon" id="">%</span>
            <input type="text" class="form-control amountComma" name='investor_roi_partnership' id='investor_roi_partnership' readonly>
        </div>
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
                        <td rowspan="2">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class="">Partnership Offer to Seller:</a>
                        </td>
                        <td rowspan="2">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_110" aria-expanded="true" aria-controls="collapse_110" class=""> $ <span class="partnership-offer-seller">58,931.52</span></a>
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
                    <label for="arv" class="col-sm-3 col-form-label">Investor's Projected Profit(Partnership)</label>
                    <div class="col-sm-3">$ <span id="seller_arv_110" class="investor-projected-profit-partnership">549,666</span></div>
                    <label for="arv" class="col-sm-3 col-form-label">Investor's Projected Profit(Flip)</label>
                    <div class="col-sm-3">$ <span id="seller_est_repair_cost_110" class="investor-projected-profit-flip">15,428</span></div>
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
                            asking_price_c3: str2Float(value.ask_price.replace(/,/g, "")),
                            arv_c9: str2Float(value.arv),
                            holding_cost_c10: str2Float(value.holding_cost),
                            resale_fees_c11: str2Float(value.resale_fee),
                            loan_cost_c12: str2Float(value.loan_cost),
                            rule_percentage_c15: str2Float(value.rule_percentage),
                            seller_profit_share_c17: str2Float(value.seller_share),
                            estimated_cost_repairs_c14: str2Float(value.est_repair_cost)
                        };

                        let calc = calcSellerInvestorProposal(calc_params);
                        calc_results = calc;

                        $(panel).find('.investor-projected-profit-partnership').text(numberWithCommas(calc.investor_projected_profit_partnership_c22));
                        $(panel).find('.investor-projected-profit-flip').text(numberWithCommas(calc.investor_projected_profit_flip_c23));
                        $(panel).find('.partnership-offer-seller').text(numberWithCommas(calc.partnership_offer_seller_c20));
                        
                        // $(panel).find('.investor-roi').text(numberWithCommas(calc.investor_roi_c30));
                        // $(panel).find('.arv').text(numberWithCommas(str2Float(value.arv)));
                        // $(panel).find('.est-repair-cost').text(numberWithCommas(str2Float(value.est_repair_cost)));
                        // $(panel).find('.wholesaler-fee').text(numberWithCommas(value.seller_share));

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
                        asking_price_c3: str2Float(details.investment_price),
                        arv_c9: str2Float(details.arv_price),
                        holding_cost_c10: str2Float(details.holding_cost),
                        resale_fees_c11: str2Float(details.resale_fees),
                        loan_cost_c12: str2Float(details.loan_cost),
                        rule_percentage_c15: str2Float(details.rule_percentage),
                        seller_profit_share_c17: str2Float(details.partnership_seller),
                        estimated_cost_repairs_c14: str2Float(details.estimated_repair_cost)
                    }
                    let calc = calcSellerInvestorProposal(calc_params);
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
        let calc = calcSellerInvestorProposal({
            asking_price_c3: data.asking_price_c3,
            arv_c9: data.arv_c9,
            holding_cost_c10: data.holding_cost_c10,
            resale_fees_c11: data.resale_fees_c11,
            loan_cost_c12: data.loan_cost_c12,
            rule_percentage_c15: data.rule_percentage_c15,
            seller_profit_share_c17: data.seller_profit_share_c17,
            estimated_cost_repairs_c14: data.estimated_cost_repairs_c14
        });

        $('#est_repair_cost').val(data.estimated_cost_repairs_c14);

        $('#ask_price').val(numberWithCommas(data.asking_price_c3));

        $('#arv').val(numberWithCommas(data.arv_c9));

        $('#holding_cost').val(numberWithCommas(data.holding_cost_c10));
        $('#resale_fees').val(numberWithCommas(data.resale_fees_c11));
        $('#loan_cost').val(numberWithCommas(data.loan_cost_c12));
        
        $('#total_misc_cost').val(numberWithCommas(calc.total_misc_cost_c13));
        $('#rule_percentage').val(data.rule_percentage_c15);

        $('#estimated_cost_repairs').val(numberWithCommas(data.estimated_cost_repairs_c14));

        $('#brv').val(numberWithCommas(calc.brv_c16));
        $('#seller_share').val(data.seller_profit_share_c17);
        $('#investor_partnership').val(calc.investor_partnership_c18);

        $('#est_increase_seller').val(numberWithCommas(calc.estimated_increase_seller_c19));
        $('#partnership_offer_seller').val(numberWithCommas(calc.partnership_offer_seller_c20));

        $('#investor_projected_profit_partnership').val(numberWithCommas(calc.investor_projected_profit_partnership_c22));
        $('#investor_projected_profit_flip').val(numberWithCommas(calc.investor_projected_profit_flip_c23));
        $('#investor_roi_flip').val(numberWithCommas(calc.investor_roi_flip_c24));
        $('#investor_roi_partnership').val(numberWithCommas(calc.investor_roi_partnership_c25));

        initRange = true;
    }
        
    $('.calc-trigger').on("keyup", function(){
        
        updateCalcFields({
            asking_price_c3: str2Float($('#ask_price').val().replace(/,/g, "")),
            arv_c9: str2Float($('#arv').val().replace(/,/g, "")),
            holding_cost_c10: str2Float($('#holding_cost').val().replace(/,/g, "")),
            resale_fees_c11: str2Float($('#resale_fees').val().replace(/,/g, "")),
            loan_cost_c12: str2Float($('#loan_cost').val().replace(/,/g, "")),
            rule_percentage_c15: str2Float($('#rule_percentage').val().replace(/,/g, "")),
            seller_profit_share_c17: str2Float($('#seller_share').val().replace(/,/g, "")),
            estimated_cost_repairs_c14: str2Float(calc_params.estimated_cost_repairs_d21)
        });
    });

    $('.range-trigger').on('input', function(){
       
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