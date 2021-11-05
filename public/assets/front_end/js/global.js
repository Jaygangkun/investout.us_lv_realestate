function numberWithCommas(number) {
    number = Math.round(number * 100) / 100;
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function str2Float(str) {
    return str == '' ? 0 : parseFloat(str);
}