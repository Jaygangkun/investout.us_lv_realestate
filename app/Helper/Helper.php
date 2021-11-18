<?php
namespace App\Helper;

class Helper
{
    public static function numberWithCommas($val){
        return rtrim(rtrim(number_format($val, 2, '.', ','), '0'), '.');
    }

    public static function calcWholesaler($data) {
        // data = {
        //     arv_c17: str2Float(details.arv),
        //     est_repair_cost_c18: str2Float(details.estimated_repair_cost),
        //     rule_percentage_c24: str2Float(details.rule_percentage),
        //     holding_cost_c19: str2Float(details.holding_cost),
        //     resale_fees_c20: str2Float(details.resale_fees),
        //     loan_cost_c21: str2Float(details.loan_cost),
        //     wholesaler_fee_c26: str2Float(details.partnership_seller),
        // }

        $gross_profit_c22 = $data['arv_c17'] - ($data['est_repair_cost_c18'] + $data['holding_cost_c19'] + $data['resale_fees_c20'] + $data['loan_cost_c21']);
        $max_offer_seller_c25 = $data['rule_percentage_c24'] * $gross_profit_c22 / 100;
        $wholesaler_profit_c27 = $data['wholesaler_fee_c26'] * $data['arv_c17'] / 100;
        $asking_price_investor_c28 = $max_offer_seller_c25 + $wholesaler_profit_c27;
        $investor_projected_profit_c29 = $data['arv_c17'] - ($max_offer_seller_c25 + $wholesaler_profit_c27 + $data['est_repair_cost_c18'] + $data['holding_cost_c19'] + $data['resale_fees_c20'] + $data['loan_cost_c21']);
        $investor_roi_c30 = $investor_projected_profit_c29 / ($asking_price_investor_c28 + $data['est_repair_cost_c18'] + $data['holding_cost_c19'] + $data['resale_fees_c20'] + $data['loan_cost_c21']) * 100;

        $c14_2 = $data['arv_c17'];
        $c15_2 = $data['holding_cost_c19'];
        $c16_2 = $data['resale_fees_c20'];
        $c17_2 = $data['loan_cost_c21'];
        $c19_2 = $data['est_repair_cost_c18'];
        $c20_2 = $data['rule_percentage_c24'];
        $total_misc_cost_c18_2 = $c15_2 + $c16_2 + $c17_2;
        $max_offer_price_c21_2 = ($c14_2 - ($total_misc_cost_c18_2 + $c19_2)) * $c20_2 / 100;
        $c22_2 = $data['wholesaler_fee_c26'];

        $estimated_offer_c23_2 = ($c14_2 - ($total_misc_cost_c18_2 + $c19_2)) * $c20_2 / 100 + $c22_2 * $c14_2 / 100;
        $investors_projected_profit_c24_2 = $c14_2 - ($c15_2 + $c16_2 + $c17_2 + $c19_2 + $estimated_offer_c23_2);

        return array(
            'gross_profit_c22' => $gross_profit_c22,
            'max_offer_seller_c25' => $max_offer_seller_c25,
            'wholesaler_profit_c27' => $wholesaler_profit_c27,
            'asking_price_investor_c28' => $asking_price_investor_c28,
            'investor_projected_profit_c29' => $investor_projected_profit_c29,
            'investor_roi_c30' => $investor_roi_c30,

            'total_misc_cost_c18_2' => $total_misc_cost_c18_2,
            'max_offer_price_c21_2' => $max_offer_price_c21_2,
            'estimated_offer_c23_2' => $estimated_offer_c23_2,
            'investors_projected_profit_c24_2' => $investors_projected_profit_c24_2
        );
    }
}

?>