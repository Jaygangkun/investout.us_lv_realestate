$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // message notification ajax function
    function newAlert(sentinal = 0) {
        var max_val = APP_URL;
        var url, request, tag, data;
        tag = $(this);
        url = max_val+'/alert/message';
        //var fd = new FormData(this);
        var fd = new FormData();
        fd.append('initial', sentinal)

        request = $.ajax({
            method: "post",
            url: url,
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
        });


        request.done(function (response) {

            //console.log(response);
            if (response.status == 'success') {

                if (response.html.length > 0) {
                    $("#message-alerts").empty()
                    if (response.count) {
                        let count = parseInt($('.msg-count').text()) + response.count
                        $('.msg-count').text(count)
                    }
                    // we used append because data is already coming descending order so 
                    for (let index = 0; index < response.html.length; index++) {
                        $("#message-alerts").append(response.html[index])
                    }
                }
            }
        });

        request.error(function (response) {
            console.log(response);
        });
    }


    // Other types of notification ajax function
    function newNotification(sentinal = 0) {
        var max_val = APP_URL;
        var url, request, tag, data;
        tag = $(this);
        url = max_val+'/alert/notification';
        //var fd = new FormData(this);
        var fd = new FormData();
        fd.append('initial', sentinal)

        request = $.ajax({
            method: "post",
            url: url,
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
        });


        request.done(function (response) {
            if (response.status == 'success') {
                if (response.html.length > 0) {
                    $('#notification-alerts').empty()
                    if (response.count) {
                        let count = parseInt($('.notification-count').text()) + response.count
                        $('.notification-count').text(count)
                    }

                    // we used append because data is already coming descending order so 
                    for (let index = 0; index < response.html.length; index++) {
                        $("#notification-alerts").append(response.html[index])
                    }
                }
            }
        });

        request.error(function (response) {
            console.log(response);
        });
    }

    newNotification(1);
    newAlert(1);

    /*
    setTimeout(function () {
        newNotification();
        newAlert();
    }, 1000)

    setInterval(function () {
        newNotification(1);
        newAlert(1);
    }, 4000)
    */

    $('.count-info-notification').click(function () {
        var max_val = APP_URL;
        var url, request, tag, data;
        tag = $(this);
        url = max_val+'/alert/readAll';
        //var fd = new FormData(this);
        var fd = new FormData();
        fd.append('type', 2)

        request = $.ajax({
            method: "post",
            url: url,
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
        });

        request.done(function (response) {
            if (response.status == 'success') {
                $(tag).find('span').text('0');
            }
        });
    });

    $('.count-info-alert').click(function () {
        var max_val = APP_URL;
        var url, request, tag, data;
        tag = $(this);
        url = max_val+'/alert/readAll';
        //var fd = new FormData(this);
        var fd = new FormData();
        fd.append('type', 1)

        request = $.ajax({
            method: "post",
            url: url,
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
        });

        request.done(function (response) {
            if (response.status == 'success') {
                $(tag).find('span').html('0');
            }
        });
    })

})
