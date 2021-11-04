function getShareAmount()
{
    var askingP = $('#brv_price').val().replace(/,/g, '');
    var pShare = $("#partnership_seller").val();
    $("#partnership_seller_price").val(numberWithCommas(Math.round(parseInt(askingP)*(parseInt(pShare)/100))));

}

function numberWithCommas(number) {
    number = Math.round(number);
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}