$(document).ready(function() {
    $(".amountComma").on('keyup', function(){
        var num = $(this).val().replace(/,/g , '');
        num = num.replace(/[^0-9.]/g,'');
        var commaNum = numberWithCommas(num);
        $(this).val(commaNum);
    });

})