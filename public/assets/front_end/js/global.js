function numberWithCommas(number) {
    number = Math.round(number);
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function numberWithCommasAndDecimals(number) {
    number = Math.round(number * 100) / 100;
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function str2Float(str) {
    return str == '' || str == null ? 0 : parseFloat(typeof str == 'string' ? str.replace(/,/g, "") : str);
}

function calcWholesaler(data) {
    // data = {
    //     arv_c17: str2Float(details.arv),
    //     est_repair_cost_c18: str2Float(details.estimated_repair_cost),
    //     rule_percentage_c24: str2Float(details.rule_percentage),
    //     holding_cost_c19: str2Float(details.holding_cost),
    //     resale_fees_c20: str2Float(details.resale_fees),
    //     loan_cost_c21: str2Float(details.loan_cost),
    //     wholesaler_fee_c26: str2Float(details.partnership_seller),
    // }

    let gross_profit_c22 = data.arv_c17 - (data.est_repair_cost_c18 + data.holding_cost_c19 + data.resale_fees_c20 + data.loan_cost_c21);
    let max_offer_seller_c25 = data.rule_percentage_c24 * gross_profit_c22 / 100;
    let wholesaler_profit_c27 = data.wholesaler_fee_c26 * data.arv_c17 / 100;
    let asking_price_investor_c28 = max_offer_seller_c25 + wholesaler_profit_c27;
    let investor_projected_profit_c29 = data.arv_c17 - (max_offer_seller_c25 + wholesaler_profit_c27 + data.est_repair_cost_c18 + data.holding_cost_c19 + data.resale_fees_c20 + data.loan_cost_c21);
    let investor_roi_c30 = investor_projected_profit_c29 / (asking_price_investor_c28 + data.est_repair_cost_c18 + data.holding_cost_c19 + data.resale_fees_c20 + data.loan_cost_c21) * 100;

    let c14_2 = data.arv_c17;
    let c15_2 = data.holding_cost_c19;
    let c16_2 = data.resale_fees_c20;
    let c17_2 = data.loan_cost_c21;
    let c19_2 = data.est_repair_cost_c18;
    let c20_2 = data.rule_percentage_c24;
    let total_misc_cost_c18_2 = c15_2 + c16_2 + c17_2;
    let max_offer_price_c21_2 = (c14_2 - (total_misc_cost_c18_2 + c19_2)) * c20_2 / 100;
    let c22_2 = data.wholesaler_fee_c26;

    let estimated_offer_c23_2 = (c14_2 - (total_misc_cost_c18_2 + c19_2)) * c20_2 / 100 + c22_2 * c14_2 / 100;
    let investors_projected_profit_c24_2 = c14_2 - (c15_2 + c16_2 + c17_2 + c19_2 + estimated_offer_c23_2);

    return {
        gross_profit_c22: gross_profit_c22,
        max_offer_seller_c25: max_offer_seller_c25,
        wholesaler_profit_c27: wholesaler_profit_c27,
        asking_price_investor_c28: asking_price_investor_c28,
        investor_projected_profit_c29: investor_projected_profit_c29,
        investor_roi_c30: investor_roi_c30,

        total_misc_cost_c18_2: total_misc_cost_c18_2,
        max_offer_price_c21_2: max_offer_price_c21_2,
        estimated_offer_c23_2: estimated_offer_c23_2,
        investors_projected_profit_c24_2: investors_projected_profit_c24_2
    }
}

function calcWholesalerFeeFromRevisedAskingPrice(data) {
    // data = {
    //     new_asking_price_investor_h28: str2Float($('#revised_price_range_value').val().replace(/,/g, "")),
    //     asking_price_investor_c28: calc_results.asking_price_investor_c28,
    //     wholesaler_fee_c26: calc_params.wholesaler_fee_c26,
    //     arv_c17: data.arv_c17
    // }
    let divide_new_old_asking_price_h29 = (data.new_asking_price_investor_h28 - data.asking_price_investor_c28) / data.asking_price_investor_c28 * 100;
    let updated_wholesaler_fee_h30 = data.wholesaler_fee_c26 + divide_new_old_asking_price_h29;
    let updated_wholesaler_profit_h31 = updated_wholesaler_fee_h30 * data.arv_c17 / 100;

    return {
        divide_new_old_asking_price_h29: divide_new_old_asking_price_h29,
        updated_wholesaler_fee_h30: updated_wholesaler_fee_h30,
        updated_wholesaler_profit_h31: updated_wholesaler_profit_h31
    }
}

function calcSellerInvestorProposal(data) {
    // var data = {
    //     asking_price_c3: '',
    //     arv_c9: '',
    //     holding_cost_c10: '',
    //     resale_fees_c11: '',
    //     loan_cost_c12: '',
    //     rule_percentage_c15: '',
    //     seller_profit_share_c17: '',
    //     estimated_cost_repairs_c14: ''
    // }

    console.log('calcSellerInvestorProposal >> data:', data);
    let total_misc_cost_c13 = data.holding_cost_c10 + data.resale_fees_c11 + data.loan_cost_c12;
    let brv_c16 = (data.arv_c9 - (total_misc_cost_c13 + data.estimated_cost_repairs_c14)) * data.rule_percentage_c15 / 100;
    let investor_partnership_c18 = 100 - data.seller_profit_share_c17;
    let estimated_increase_seller_c19 = (data.arv_c9 - (data.holding_cost_c10 + data.resale_fees_c11 + data.loan_cost_c12 + data.estimated_cost_repairs_c14 + brv_c16)) * data.seller_profit_share_c17 / 100;
    let partnership_offer_seller_c20 = brv_c16 + estimated_increase_seller_c19;
    let investor_projected_profit_partnership_c22 = data.arv_c9 - (data.estimated_cost_repairs_c14 + total_misc_cost_c13 + partnership_offer_seller_c20);
    let investor_projected_profit_flip_c23 = data.arv_c9 - (data.asking_price_c3 + total_misc_cost_c13 + data.estimated_cost_repairs_c14);
    let investor_roi_flip_c24 = investor_projected_profit_flip_c23 / (data.asking_price_c3 + data.estimated_cost_repairs_c14 + data.holding_cost_c10 + data.resale_fees_c11 + data.loan_cost_c12) * 100;
    let investor_roi_partnership_c25 = investor_projected_profit_partnership_c22 / (data.estimated_cost_repairs_c14 + total_misc_cost_c13 + partnership_offer_seller_c20) * 100;

    return {
        total_misc_cost_c13: total_misc_cost_c13,
        brv_c16: brv_c16,
        investor_partnership_c18: investor_partnership_c18,
        estimated_increase_seller_c19: estimated_increase_seller_c19,
        partnership_offer_seller_c20: partnership_offer_seller_c20,
        investor_projected_profit_partnership_c22: investor_projected_profit_partnership_c22,
        investor_projected_profit_flip_c23: investor_projected_profit_flip_c23,
        investor_roi_flip_c24: investor_roi_flip_c24,
        investor_roi_partnership_c25: investor_roi_partnership_c25
    }
}

function calcInvestorSellerProposal(data) {
    // var data = {
    //     asking_price_d10: '',
    //     arv_d16: '',
    //     estimated_cost_repair_d21: '',
    //     rule_percentage_d22: '',
    //     seller_profit_share_d24: '',
    // }
    console.log('calcInvestorSellerProposal >> data:', data);
    let brv_d23 = (data.arv_d16 - data.estimated_cost_repair_d21) * data.rule_percentage_d22 / 100;
    let investor_partnership_d25 = 100 - data.seller_profit_share_d24;
    let seller_increased_profit_d26 = (data.arv_d16 - (data.estimated_cost_repair_d21 + brv_d23)) * data.seller_profit_share_d24 / 100;
    let seller_total_profit_d27 = brv_d23 + seller_increased_profit_d26;
    let increased_roi_d28 = 100 - (data.asking_price_d10 / seller_total_profit_d27) * 100;
    
    return {
        brv_d23: brv_d23,
        investor_partnership_d25: investor_partnership_d25,
        seller_increased_profit_d26: seller_increased_profit_d26,
        seller_total_profit_d27: seller_total_profit_d27,
        increased_roi_d28: increased_roi_d28
    }
}