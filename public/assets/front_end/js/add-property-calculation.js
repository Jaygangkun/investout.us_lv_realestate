function new_calculations() {
    // Get Sell Price.
    let sell_price = ($("#investment_price").val() == "" ? "0" : $("#investment_price").val()); //Property selling price.
    sell_price = sell_price.replace(/,/g, "");
    sell_price = parseFloat(parseFloat(sell_price).toFixed(2));
    console.log("sell_price", sell_price);

    // Get Square|_footage
    let sqr_ft = ($("#square_footage").val() == "" ? "0" : $("#square_footage").val()); //Total sqare footage. 
    sqr_ft = sqr_ft.replace(/,/g, ""); //Total sqare footage.
    sqr_ft = parseFloat(parseFloat(sqr_ft).toFixed(2)); //Total sqare footage. 
    console.log("sqr_ft", sqr_ft);

    // Calculate Price per Sqrt.
    console.log("(sell_price / sqr_ft).toFixed(2)", (sell_price / sqr_ft).toFixed(2));
    let price_per_sqft = (sell_price != 0 && sqr_ft != 0 ? parseFloat((sell_price / sqr_ft).toFixed(2)) : 0); //Calculate the price per square footage.
    console.log("price_per_sqft", price_per_sqft);

    // Get Home Condition type.
    let home_condition = (typeof $('[name="home_condition"]:checked').val() == 'undefined' ? 0 : $('[name="home_condition"]:checked').val());
    console.log("home_condition", home_condition);

    // Get Home Condition Price
    let home_condition_price = (parseInt(home_condition) == 0 ? 0 : (parseInt(home_condition) == 1 ? 25 : (parseInt(home_condition) == 2 ? 50 : (parseInt(home_condition) == 3 ? 75 : parseFloat(Number($("#other_home_condition_value").val()).toFixed(2))))));
    console.log("home_condition_price", home_condition_price);

    // Calculate the Estimated repair cost using the Squaare Footage and Home Condition Price.
    let estimated_repair_cost = $("#estimated_repair_cost").val();
    estimated_repair_cost = (sqr_ft != 0 && home_condition_price != 0 ? parseFloat((sqr_ft * home_condition_price).toFixed(2)) : estimated_repair_cost );
    console.log("estimated_repair_cost", estimated_repair_cost);

    //purchase Rule value is 70%.
    let purchase_rule = 0.70;
    console.log("purchase_rule", purchase_rule);

    // Get ARV value
    let arv = ($("#arv_price").val() == "" ? "0" : $("#arv_price").val());
    arv = arv.replace(/,/g, "");
    arv = parseFloat(parseFloat(arv).toFixed(2));
    console.log("arv", arv);

    let holding_cost    = $("#holding_cost").val();
    holding_cost = holding_cost.replace(/,/g, "");
    let resale_fees     = $("#resale_fees").val();
    resale_fees = resale_fees.replace(/,/g, "");
    let loan_cost       = $("#loan_cost").val();
    loan_cost = loan_cost.replace(/,/g, "");
    let rule_percentage = parseFloat($("#rule_percentage").val());

    // Calculate the BRV value using the ARV, Estimated Repair Cost and Purchase Rule
    //let brv = (arv != 0 && estimated_repair_cost != 0 ? parseFloat(((arv * purchase_rule) - estimated_repair_cost).toFixed(2)) : 0);
    let brv = (arv != 0 ? (parseFloat(arv - (parseFloat(estimated_repair_cost) + parseFloat(holding_cost) + parseFloat(resale_fees) + parseFloat(loan_cost)))*parseFloat(rule_percentage/100)) : '0');
    console.log("brv", brv);

    let partnership_seller = parseFloat($("#partnership_seller").val());
    let partnership_seller_price = parseFloat(arv * parseFloat(partnership_seller/100).toFixed(2));
    $("#partnership_seller_price").val(partnership_seller_price);

    // Calculate the Total Profit using the ARV, BRV, Estimated Repair Cost.
    let total_profit = (arv != 0 && brv != 0 && estimated_repair_cost != 0 ? parseFloat((arv - (brv + estimated_repair_cost)).toFixed(2)) : 0);
    console.log("total_profit", total_profit);

    // Calculate thee ROI using the Estimated Repair Cost and Total Profit.
    let roi = (estimated_repair_cost != 0 && total_profit != 0 ? parseFloat((estimated_repair_cost / total_profit).toFixed(2)) : 0);
    console.log("roi", roi);

    // Get Seller's Profit Share percentage.
    let seller_profit_share = parseFloat(($("#partnership_seller").val() == "" ? 0 : parseFloat($("#partnership_seller").val()).toFixed(2)));
    console.log("seller_profit_share", seller_profit_share);


    let investor_profit_share = 0;
    let total_profit_share = 0;

    if (seller_profit_share > 0) {
        // Calculate the Investor's Profit share using the Seller Profit share.
        investor_profit_share = 100 - seller_profit_share;
        console.log("investor_profit_share", investor_profit_share);

        // Calculate the Total Profit Share using the Seller Profit share and Investor Profit Share.
        total_profit_share = seller_profit_share + investor_profit_share;
        console.log("total_profit_share", total_profit_share);

    }

    // Calculate the Seller's Profit using the Total Profit and Seller's Profit share.
    let seller_profit = (total_profit != 0 && seller_profit_share != 0 ? parseFloat((total_profit * (seller_profit_share / 100)).toFixed(2)) : 0);
    console.log("seller_profit", seller_profit);

    // Calculate the Investor's Profit using the Total Profit and Investor's Profit share.
    let investor_profit = (total_profit != 0 && investor_profit_share != 0 ? parseFloat((total_profit * (investor_profit_share / 100)).toFixed(2)) : 0);
    console.log("investor_profit", investor_profit);

    // Calculate Seller's Incresed Profit using the BRV and Seller's Profit.
    let increased_seller_profit = parseFloat((brv + seller_profit).toFixed(2));
    console.log("increased_seller_profit", increased_seller_profit);

    // Calculate the vallue of Investors' Increased Profit using the Investor's Profit. 
    let increased_investor_profit = investor_profit;
    console.log("increased_investor_profit", increased_investor_profit);

    // Calculate the Incresed ROI for Seller usign the BRV, Seller's Profit.
    let increased_roi_seller = (brv != 0 ? parseFloat((total_profit / (brv + estimated_repair_cost) * 100).toFixed(2)) : 0);
    console.log("increased_roi_seller", increased_roi_seller);

    // Calculate the Incresed ROI for Investor usign the Investor's Incresed Profit and Estimated Repair Cost.
    let increased_roi_investor = (increased_investor_profit != 0 && estimated_repair_cost != 0 ? parseFloat(((increased_investor_profit / estimated_repair_cost) * 100).toFixed(2)) : 0);
    console.log("increased_roi_investor", increased_roi_investor);

    // Set Calculated Values.
    $("#price_per_sqft").val(numberWithCommas(price_per_sqft));
    $("#brv_price").val(numberWithCommas(Math.round(brv)));
    $("#estimated_repair_cost").val(numberWithCommas(estimated_repair_cost));
    $("#partnership_investor").val(investor_profit_share);
    $("#total_profit_share").val(total_profit_share);
    $("#increased_profit").val(numberWithCommas(increased_seller_profit));
    $("#total_profit").val(numberWithCommas(total_profit));
    $("#seller_profit").val(numberWithCommas(seller_profit));
    $("#increased_roi").val(numberWithCommas(increased_roi_seller));

    
    let gross_profit    = parseFloat(parseFloat(arv) - (parseFloat(estimated_repair_cost) + parseFloat(resale_fees) + parseFloat(holding_cost) + parseFloat(loan_cost)));
    $("#gross_profit").val(numberWithCommas(gross_profit));


    //let partnership_seller_price    = $("#partnership_seller_price").val();
    let investor_asking             = parseFloat(parseFloat(brv) + parseFloat(partnership_seller_price));
    $("#investor_asking").val(numberWithCommas(investor_asking));

    let investor_projected_profit   = parseFloat(parseFloat(arv) - parseFloat(investor_asking));
    $("#investor_projected_profit").val(numberWithCommas(investor_projected_profit));

    let investor_roi = (parseFloat(parseFloat(investor_projected_profit)/parseFloat(arv))*100);
    $("#investor_roi").val(Math.round(investor_roi));

}

function new_calculations1() {

    // Get the value of Estimated Repair Cost.
    let estimated_repair_cost = ($("#estimated_repair_cost").val() == "" ? "0" : $("#estimated_repair_cost").val());
    estimated_repair_cost = estimated_repair_cost.replace(/,/g, "");
    estimated_repair_cost = parseFloat(parseFloat(estimated_repair_cost).toFixed(2));
    console.log("estimated_repair_cost", estimated_repair_cost);

    //purchase Rule value is 70%.
    let purchase_rule = 0.70;
    console.log("purchase_rule", purchase_rule);

    // Get ARV value
    let arv = ($("#arv_price").val() == "" ? "0" : $("#arv_price").val());
    arv = arv.replace(/,/g, "");
    arv = parseFloat(parseFloat(arv).toFixed(2));
    console.log("arv", arv);

    let holding_cost    = $("#holding_cost").val();
    holding_cost = holding_cost.replace(/,/g, "");
    let resale_fees     = $("#resale_fees").val();
    resale_fees = resale_fees.replace(/,/g, "");
    let loan_cost       = $("#loan_cost").val();
    loan_cost = loan_cost.replace(/,/g, "");
    let rule_percentage = parseFloat($("#rule_percentage").val());

    // Calculate the BRV value using the ARV, Estimated Repair Cost and Purchase Rule
    //let brv = (arv != 0 && estimated_repair_cost != 0 ? parseFloat(((arv * purchase_rule) - estimated_repair_cost).toFixed(2)) : 0);
    let brv = (arv != 0 ? (parseFloat(arv - (parseFloat(estimated_repair_cost) + parseFloat(holding_cost) + parseFloat(resale_fees) + parseFloat(loan_cost)))*parseFloat(rule_percentage/100)) : '0');

    let partnership_seller = parseFloat($("#partnership_seller").val());
    let partnership_seller_price = parseFloat(arv * parseFloat(partnership_seller/100).toFixed(2));
    $("#partnership_seller_price").val(partnership_seller_price);

    // Calculate the Total Profit using the ARV, BRV, Estimated Repair Cost.
    let total_profit = (arv != 0 && brv != 0 && estimated_repair_cost != 0 ? parseFloat((arv - (brv + estimated_repair_cost)).toFixed(2)) : 0);
    console.log("total_profit", total_profit);

    // Calculate thee ROI using the Estimated Repair Cost and Total Profit.
    let roi = (estimated_repair_cost != 0 && total_profit != 0 ? parseFloat((estimated_repair_cost / total_profit).toFixed(2)) : 0);
    console.log("roi", roi);

    // Get Seller's Profit Share percentage.
    let seller_profit_share = parseFloat(($("#partnership_seller").val() == "" ? 0 : parseFloat($("#partnership_seller").val()).toFixed(2)));
    console.log("seller_profit_share", seller_profit_share);


    let investor_profit_share = 0;
    let total_profit_share = 0;

    if (seller_profit_share > 0) {
        // Calculate the Investor's Profit share using the Seller Profit share.
        investor_profit_share = 100 - seller_profit_share;
        console.log("investor_profit_share", investor_profit_share);

        // Calculate the Total Profit Share using the Seller Profit share and Investor Profit Share.
        total_profit_share = seller_profit_share + investor_profit_share;
        console.log("total_profit_share", total_profit_share);

    }

    // Calculate the Seller's Profit using the Total Profit and Seller's Profit share.
    let seller_profit = (total_profit != 0 && seller_profit_share != 0 ? parseFloat((total_profit * (seller_profit_share / 100)).toFixed(2)) : 0);
    console.log("seller_profit", seller_profit);

    // Calculate the Investor's Profit using the Total Profit and Investor's Profit share.
    let investor_profit = (total_profit != 0 && investor_profit_share != 0 ? parseFloat((total_profit * (investor_profit_share / 100)).toFixed(2)) : 0);
    console.log("investor_profit", investor_profit);

    // Calculate Seller's Incresed Profit using the BRV and Seller's Profit.
    let increased_seller_profit = parseFloat((brv + seller_profit).toFixed(2));
    console.log("increased_seller_profit", increased_seller_profit);

    // Calculate the vallue of Investors' Increased Profit using the Investor's Profit. 
    let increased_investor_profit = investor_profit;
    console.log("increased_investor_profit", increased_investor_profit);

    // Calculate the Incresed ROI for Seller usign the BRV, Seller's Profit.
    let increased_roi_seller = (brv != 0 ? parseFloat((total_profit / (brv + estimated_repair_cost) * 100).toFixed(2)) : 0);
    console.log("increased_roi_seller", increased_roi_seller);

    // Calculate the Incresed ROI for Investor usign the Investor's Incresed Profit and Estimated Repair Cost.
    let increased_roi_investor = (increased_investor_profit != 0 && estimated_repair_cost != 0 ? parseFloat(((increased_investor_profit / estimated_repair_cost) * 100).toFixed(2)) : 0);
    console.log("increased_roi_investor", increased_roi_investor);

    // Set Calculated Values.
    $("#brv_price").val(numberWithCommas(Math.round(brv)));
    $("#partnership_investor").val(investor_profit_share);
    $("#total_profit_share").val(total_profit_share);
    $("#increased_profit").val(numberWithCommas(increased_seller_profit));
    $("#total_profit").val(numberWithCommas(total_profit));
    $("#seller_profit").val(numberWithCommas(seller_profit));
    $("#increased_roi").val(numberWithCommas(increased_roi_seller));

    let gross_profit    = parseFloat(parseFloat(arv) - (parseFloat(estimated_repair_cost) + parseFloat(resale_fees) + parseFloat(holding_cost) + parseFloat(loan_cost)));
    $("#gross_profit").val(numberWithCommas(gross_profit));

    //let partnership_seller_price    = $("#partnership_seller_price").val();
    let investor_asking             = parseFloat(parseFloat(brv) + parseFloat(partnership_seller_price));
    $("#investor_asking").val(numberWithCommas(investor_asking));

    let investor_projected_profit   = parseFloat(parseFloat(arv) - parseFloat(investor_asking));
    $("#investor_projected_profit").val(numberWithCommas(investor_projected_profit));

    let investor_roi = (parseFloat(parseFloat(investor_projected_profit)/parseFloat(arv))*100);
    $("#investor_roi").val(Math.round(investor_roi));

}

function new_calculations2() {

    // Get the value of Estimated Repair Cost.
    let estimated_repair_cost = ($("#estimated_repair_cost").val() == "" ? "0" : $("#estimated_repair_cost").val());
    estimated_repair_cost = estimated_repair_cost.replace(/,/g, "");
    estimated_repair_cost = parseFloat(parseFloat(estimated_repair_cost).toFixed(2));
    console.log("estimated_repair_cost", estimated_repair_cost);

    //purchase Rule value is 70%.
    let purchase_rule = 0.70;
    console.log("purchase_rule", purchase_rule);

    // Get ARV value
    let arv = ($("#arv_price").val() == "" ? "0" : $("#arv_price").val());
    arv = arv.replace(/,/g, "");
    arv = parseFloat(parseFloat(arv).toFixed(2));
    console.log("arv", arv);

    // Get BRV value
    // let brv = ($("#brv_price").val() == "" ? "0" : $("#brv_price").val());
    // brv = brv.replace(/,/g, "");
    // brv = parseFloat(parseFloat(brv).toFixed(2));
    // console.log("brv", brv);

    let holding_cost    = $("#holding_cost").val();
    holding_cost = holding_cost.replace(/,/g, "");
    let resale_fees     = $("#resale_fees").val();
    resale_fees = resale_fees.replace(/,/g, "");
    let loan_cost       = $("#loan_cost").val();
    loan_cost = loan_cost.replace(/,/g, "");
    let rule_percentage = parseFloat($("#rule_percentage").val());

    // Calculate the BRV value using the ARV, Estimated Repair Cost and Purchase Rule
    //let brv = (arv != 0 && estimated_repair_cost != 0 ? parseFloat(((arv * purchase_rule) - estimated_repair_cost).toFixed(2)) : 0);
    let brv = (arv != 0 ? (parseFloat(arv - (parseFloat(estimated_repair_cost) + parseFloat(holding_cost) + parseFloat(resale_fees) + parseFloat(loan_cost)))*parseFloat(rule_percentage/100)) : '0');

    let partnership_seller = parseFloat($("#partnership_seller").val());
    let partnership_seller_price = parseFloat(arv * parseFloat(partnership_seller/100).toFixed(2));
    $("#partnership_seller_price").val(partnership_seller_price);

    // Calculate the Total Profit using the ARV, BRV, Estimated Repair Cost.
    let total_profit = (arv != 0 && brv != 0 && estimated_repair_cost != 0 ? parseFloat((arv - (brv + estimated_repair_cost)).toFixed(2)) : 0);
    console.log("total_profit", total_profit);

    // Calculate thee ROI using the Estimated Repair Cost and Total Profit.
    let roi = (estimated_repair_cost != 0 && total_profit != 0 ? parseFloat((estimated_repair_cost / total_profit).toFixed(2)) : 0);
    console.log("roi", roi);

    // Get Seller's Profit Share percentage.
    let seller_profit_share = parseFloat(($("#partnership_seller").val() == "" ? 0 : parseFloat($("#partnership_seller").val()).toFixed(2)));
    console.log("seller_profit_share", seller_profit_share);


    let investor_profit_share = 0;
    let total_profit_share = 0;

    if (seller_profit_share > 0) {
        // Calculate the Investor's Profit share using the Seller Profit share.
        investor_profit_share = 100 - seller_profit_share;
        console.log("investor_profit_share", investor_profit_share);

        // Calculate the Total Profit Share using the Seller Profit share and Investor Profit Share.
        total_profit_share = seller_profit_share + investor_profit_share;
        console.log("total_profit_share", total_profit_share);

    }

    // Calculate the Seller's Profit using the Total Profit and Seller's Profit share.
    let seller_profit = (total_profit != 0 && seller_profit_share != 0 ? parseFloat((total_profit * (seller_profit_share / 100)).toFixed(2)) : 0);
    console.log("seller_profit", seller_profit);

    // Calculate the Investor's Profit using the Total Profit and Investor's Profit share.
    let investor_profit = (total_profit != 0 && investor_profit_share != 0 ? parseFloat((total_profit * (investor_profit_share / 100)).toFixed(2)) : 0);
    console.log("investor_profit", investor_profit);

    // Calculate Seller's Incresed Profit using the BRV and Seller's Profit.
    let increased_seller_profit = parseFloat((brv + seller_profit).toFixed(2));
    console.log("increased_seller_profit", increased_seller_profit);

    // Calculate the vallue of Investors' Increased Profit using the Investor's Profit. 
    let increased_investor_profit = investor_profit;
    console.log("increased_investor_profit", increased_investor_profit);

    // Calculate the Incresed ROI for Seller usign the BRV, Seller's Profit.
    let increased_roi_seller = (brv != 0 ? parseFloat((total_profit / (brv + estimated_repair_cost) * 100).toFixed(2)) : 0);
    console.log("increased_roi_seller", increased_roi_seller);

    // Calculate the Incresed ROI for Investor usign the Investor's Incresed Profit and Estimated Repair Cost.
    let increased_roi_investor = (increased_investor_profit != 0 && estimated_repair_cost != 0 ? parseFloat(((increased_investor_profit / estimated_repair_cost) * 100).toFixed(2)) : 0);
    console.log("increased_roi_investor", increased_roi_investor);

    // Set Calculated Values.
    $("#brv_price").val(numberWithCommas(Math.round(brv)));
    $("#partnership_investor").val(investor_profit_share);
    $("#total_profit_share").val(total_profit_share);
    $("#increased_profit").val(numberWithCommas(increased_seller_profit));
    $("#total_profit").val(numberWithCommas(total_profit));
    $("#seller_profit").val(numberWithCommas(seller_profit));
    $("#increased_roi").val(numberWithCommas(increased_roi_seller));

    
    let gross_profit    = parseFloat(parseFloat(arv) - (parseFloat(estimated_repair_cost) + parseFloat(resale_fees) + parseFloat(holding_cost) + parseFloat(loan_cost)));
    $("#gross_profit").val(numberWithCommas(gross_profit));

    //let partnership_seller_price    = $("#partnership_seller_price").val();
    let investor_asking             = parseFloat(parseFloat(brv) + parseFloat(partnership_seller_price));
    $("#investor_asking").val(numberWithCommas(investor_asking));

    let investor_projected_profit   = parseFloat(parseFloat(arv) - parseFloat(investor_asking));
    $("#investor_projected_profit").val(numberWithCommas(investor_projected_profit));

    let investor_roi = (parseFloat(parseFloat(investor_projected_profit)/parseFloat(arv))*100);
    $("#investor_roi").val(Math.round(investor_roi));
}