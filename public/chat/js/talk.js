$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.chat-history').scrollTop($('.chat-history')[0].scrollHeight);;


    $('#message-data').keyup(function (event) {
        event.preventDefault()
        if (event.keyCode === 13) {
            $("#talkSendMessage").submit();
        }
    })

    function newMessage() {
        var url, request, tag, data;
        tag = $(this);
        url = __baseUrl + '/ajax/message/latest';
        var fd = new FormData();
        
        fd.append('user', $('input[name=_id]').val())

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
                for (let index = 0; index < response.html.length; index++) {
                    $('#talkMessages').append(response.html[index]);
                }
                $('.chat-history').scrollTop($('.chat-history')[0].scrollHeight);;
            }
        });

        request.error(function (response) {
            console.log(response);
        });
    }

    setInterval(function () {
        newMessage();
    }, 4000);

    $('#talkSendMessage').on('submit', function (e) {
        e.preventDefault();
        var url, request, tag, data;
        tag = $(this);
        url = __baseUrl + '/ajax/message/send';
        var fd = new FormData(this);
        // data = new FormData($('#talkSendMessage'));
        // console.log(fd);

        request = $.ajax({
            method: "post",
            url: url,
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
        });

        request.done(function (response) {
            // console.log(response);
            if (response.status == 'success') {
                $('#talkMessages').append(response.html);
                $('.chat-history').scrollTop($('.chat-history')[0].scrollHeight);;
                $('#message-data').val('');
                tag[0].reset();
            }
        });

        request.error(function (response) {
            console.log(response);
        });

    });


    $('body').on('click', '.talkDeleteMessage', function (e) {
        e.preventDefault();
        var tag, url, id, request;

        tag = $(this);
        id = tag.data('message-id');
        url = __baseUrl + '/ajax/message/delete/' + id;

        if (!confirm('Do you want to delete this message?')) {
            return false;
        }

        request = $.ajax({
            method: "post",
            url: url,
            data: {
                "_method": "DELETE"
            }
        });

        request.done(function (response) {
            if (response.status == 'success') {
                $('#message-' + id).hide(500, function () {
                    $(this).remove();
                });
            }
        });
    })
});
