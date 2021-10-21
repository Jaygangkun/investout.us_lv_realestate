@extends('front_end.parent')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <style>

        .fc-past {
            background-color: #e6e6e6 !important;
        }

        .marker {
            background-color: #762B85;
            background-size: cover;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
        }

        .sr .feature-section.spad .owl-carousel .owl-item .feature-item img.rounded-circle {
            object-fit: cover;
            object-position: top;
        }

        .hide {
            display: none !important;
        }

        .fc-day:hover {
            background: lightblue;
            cursor: pointer;
        }

        .fc-day-grid-event {
            padding: 5px;
            font-size: 15px;
        }

        .fc-day-grid-event {
            border-radius: 0px;
            padding: 5px;
            font-size: 15px;
        }

        .fc-day-grid-event:hover {
            border-radius: 10px
        }

        #state-name .nice-select {
            width: 200px !important;
        }

        .mapboxgl-popup-content h2 {
            font-size: 16px !important;
        }

        .mapboxgl-popup-content p {
            font-size: 30px !important;
        }

        @media only screen and (max-width: 480px) {
            .fc-day-grid-event {
                padding: 0px;
                font-size: 10px;
            }
        }

        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .fc-day-grid-event {
                padding: 0px;
                font-size: 11px;
            }
        }

        #zipSearch{
            background: white;
            border-radius: 30px;
            text-align: center;
        }
        #zipSearch td{
            border-top: 0px;
            width: 50%;
        }
        #zipSearch tr{
            background-color: transparent !important;
            border-top: 0px;
            width: 50%;
        }
        #inquiry-button{background: white;color: #666}

    </style>
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h3>Envoy</h3>
                        <div class="breadcrumb-option">
                            <a href="{{ url('/') }}"><i class="fa fa-map"></i> Home</a>
                            <span>Envoy</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->
    <!-- Writing Section Begin -->
    <section class="hero-section">
        <div>
            <div style="border-top:15px #002060 solid;border-bottom:15px #002060 solid">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{asset('assets/front_end/img/envoy/Picture2.png')}}" style="width: 100%" alt=""
                             height="auto">
                    </div>
                    <div class="col-lg-8">
                        <img src="{{asset('assets/front_end/img/envoy/Picture1.png')}}" style="width: 100%;"
                             height="auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Writing Section End -->
    <!-- How It Works Section Begin -->
    <section class="feature-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>DO YOU HAVE ALL OF THE TOOLS NECESSARY,
                            TO ACHIEVE YOUR DREAMS IN REAL ESTATE INVESTING?
                        </h3>
                    </div>
                    <div class="section-title">
                        <h3>Start creating your own Real Estate Enterprise,
                            one zip code at a time.
                        </h3>
                    </div>
                    <div class="col-lg-12 mb-5">
                        <p style="color: #8C8AA4">What does the Envoy mean for you as a Realtor? It means you also have
                            more options to grow your business, faster with less effort. 85% of all Realtors fail within
                            the first 5 years while the 15% of successful realtors benefit from the 94% of buyers and
                            sellers who routinely receive referrals for their services. There are two reasons for the
                            challenges you are experiencing:</p>
                    </div>
                    <div class="mb-5" style="display: flex">
                        <div class="col-lg-4">
                            <ul>
                                <li>
                                    <p style="color: #8C8AA4;font-weight:bold">Differentiation of services:</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            <p style="color: #8C8AA4">Everything you offer is offered by everyone else. You are no
                                different from the rest. This makes separating yourself from the pack very difficult,
                                leaving you struggling, without income, to try to create your unique brand.</p>
                        </div>
                    </div>
                    <div class="mb-5" style="display: flex">
                        <div class="col-lg-4">
                            <ul>
                                <li>
                                    <p style="color: #8C8AA4;font-weight:bold">Network of buyers/sellers</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            <p style="color: #8C8AA4">You don’t have an established network of friends, family and
                                connections from which to build your business.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3"><p style="color: #8C8AA4">With the Invest Out Envoy program Realtors®
                            represent the homeowners associated with their zip code territories and support the
                            homeowners through the Partner Up process. This process can add 10s of thousands of dollars
                            to the sale price of the home, at no cost to you or the homeowners and once the home is
                            sold, you earn not just the original value of the home’s selling price but additional
                            share of the increased value you assisted your client in earning. Additionally, you earn an
                            additional percentage based on your facilitation of the Partner Up improvements.</p></div>
                    <div class="col-lg-12">
                        <p style="color: #8C8AA4">And with territories limited in total available opportunities per Zip
                            Code,
                            select your targeted zip codes today before they are all gone.
                        </p></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- How It Works Section End -->

    <section class="howit-works spad">
        <div class="row">
            <div class="col-lg-12" style="padding: 0px;">
                <div class="section-title">
                    <img src="{{asset('affiliate/2.png')}}" alt="How it Works">
                    <a class="btn btn-primary btn-block" href="https://investout.leaddyno.com/" style="padding: 10px 30px">Apply Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Begin -->

    <div class="video-section set-bg" data-setbg="{{asset('assets/front_end/img/envoy/Picture3.png')}}"
         style="background-image: url({{asset('assets/front_end/img/envoy/Picture3.png')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <a href="https://www.youtube.com/watch?v=2UR0QqCsVtM" class="play-btn video-popup"><i
                                    class="fa fa-play"></i></a>
                        <!--<a href="https://www.youtube.com/watch?v=U-v2lc2Mxvs" class="play-btn video-popup"><i class="fa fa-play"></i></a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('inquiry.store')}}" method="post" id="formID"
          class="form m-form m-form--fit m-form--label-align-right">
        @csrf
        <section class="feature-section spad">

            <div class="row">
                <div class="col-lg-12">
                    <div style="text-align: center; margin-bottom: 65px">
                        <h2>CHOOSE YOU EXCLUSIVE ACCESS TODAY</h2>
                        <h3 class="m-4">(Territories are limited)</h3>
                    </div>
                </div>
                <div class="col-lg-5" id="">

                    <div style="position: relative; background-color: rgb(66 163 144); height: 100%; overflow-y: auto;"
                         class='details-section-main'>
                        <div class="form-group pt-4 row" style="margin: 0 !important; display: flex">
                            <div class="col-xl-8">
                                <label>Enter Zipcode</label>
                                <input id="zipcode" class="zipCode form-control">
                            </div>
                            <div class="col-xl-4" style="padding:32px;">
                                <a class="btn" style="background-color: #0b2a4a; color: white;padding:10px 20px;" id="searchByZip">Search</a>
                            </div>
                            <!--<div class="col-xl-6">
                                <select id="stateName" class="stateName form-control">
                                    <option value="">Select state</option>
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <select id="cityName" class="cityName form-control">
                                    <option value="">Select city</option>
                                </select>
                            </div>-->
                        </div>
                        <section style="padding: 10px;max-width: 450px;margin: 0 auto;background: white;border-radius: 50px;"
                                 id="details_container" class='details-container-updated'>

                            <section class="details-container-updated-alt">
                                <div style="flex-direction: column; -webkit-font-smoothing: antialiased;"
                                     class="detail-box-update">
                                    <p>Search above to find the clubs around you or browse through the map.</p>
                                </div>
                                <p style="color: red;display: none" id="errorCLick">Please select marker on map before
                                    registration!</p>
                            </section>
                        </section>

                        <div class='center-btn text-center mt-3 mb-3'>
                            <button type="button" class="btn btn-secondary btn-change" id="inquiry-button" style="display: none">Get Inquiries
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div id="map" class="map_geo" style="height:600px"></div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <img src="" alt="">
                </div>
            </div>
        </section>
        <section class="feature-section spad">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class='image-section'>
                        <img src="{{asset('assets/front_end/img/envoy/Picture6.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </section>
        <section class="feature-section spad">
            <div class='wrapper'>
                <div class="row">

                    <div class="col-lg-12">
                        <div style="text-align: center; margin-bottom: 30px">
                            <h2 style='font-weight:700; letter-spacing: 0.025em'>Schedule an appointment to today</h2>
                            <h3 class="m-4">(Territories are limited)</h3>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-10 two-col-section"
                         style="display: flex;margin-left: 2.5%;    border-top: #2e2e2e solid 60px; border-bottom: #2e2e2e solid 60px; border-left: #2e2e2e solid; border-right: #2e2e2e solid; margin:0 auto;">
                        <div class="col-lg-9 col-md-9">
                            <div>
                                <div class="loading-icon"></div>
                            </div>
                            <div class="widget">
                                <div class="widget-body">
                                    <div id='calendar'></div>
                                </div>
                            </div>{{-- widget-body End --}}
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">TimeSlots</div>

                                </div>
                                <div class="widget-body">
                                    <ul class="list-group" id="slot-container"
                                        style="text-align: center; list-style: none;">
                                        <li style="color: #42a390;">Click on date for inquiry</li>

                                    </ul>
                                </div>
                            </div>{{-- widget-body End --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-10 form-box" style='margin-left:2.5%; margin:0 auto;'>
                        <div class="col-xl-12" style="background-color:#1B2638;height: 60px;display: table;">
                            <p style="color:#ffff; text-align:center; vertical-align: middle; display: table-cell;">
                                Create Inquiry</p>
                            @include('admin.includes.notifications')
                        </div>

                        <div class="row mt-4">
                            <div class="form-group col-lg-12">
                                <label class="form-control-label">First Name</label>
                                <input type="text" class="form-control validate[required]" name="first_name"
                                       id="first_name" data-validation-engine="validate[required]"/>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                          <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-control-label">Last Name</label>
                                <input type="text" class="form-control validate[required]" name="last_name"
                                       id="last_name" data-validation-engine="validate[required]"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-control-label">Email</label>
                                <input type="email" class="form-control validate[required,custom[email]]" name="email"
                                       id="email" data-validation-engine="validate[required,custom[email]]"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-control-label">Mobile No.</label>
                                <input type="number" class="form-control validate[required]" name="mobile_number"
                                       id="mobile_number" data-validation-engine="validate[required,custom[number]]"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-control-label">Description</label>
                                <textarea class="form-control validate[required]" name="description" id="description"
                                          data-validation-engine="validate[required]">
                                </textarea>
                            </div>
                        </div>
                        <input type="hidden" class="validate[required]" name="slot_id"
                               data-validation-engine="validate['required']">
                        <input type="hidden" class="validate[required]" name="date"
                               data-validation-engine="validate['required']">
                        <input type="hidden" class="validate[required]" name="zipcode"
                               data-validation-engine="validate['required']">
                        <div class="form-group">
                            <div class='submit-btn'>
                                <button type="submit" id="submitButton" onclick="clickChecked()"
                                        class="btn btn-success font-weight-bold mr-2 button-style-2">Register
                                </button>
                            </div>
                        </div>

                        <div class="col-xl-12" style="background-color:#1B2638;height: 60px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <li class="slots" style="border:1px solid #eeeeee;height:50px;display: none">

    </li>
    <div style="display: flex; flex-direction: column; -webkit-font-smoothing: antialiased; display: none"
         id="details_box" class='detail-box-update'>
        <!-- <h2 id="metro" style="font-size: 1.5em; margin: 0px 0px 10px; text-align: left; color: rgb(118, 43, 133);">
            Spring Field 19</h2>
        <br> -->
        <div class="col-md-12" style="text-align: center;">
            <img style="width: 50%;margin: 20px 0px;" src="{{asset('assets/front_end/img/envoy/Envoy_Logo_final.png')}}">
        </div>
        <table id="zipSearch" class="table mb-0">
            <tr>
                <td>Municipality</td>
                <td id="address"></td>
            </tr>
            <tr>
                <td>Envoy Market Potential</td>
                <td id="envoy"></td>
            </tr>
            <tr>
                <td>Four Month Average Listing</td>
                <td id="commision"></td>
            </tr>
            <tr>
                <td>Representative Positions Available</td>
                <td id="rep"></td> 
            </tr>
            <tr>
                <td>Average Monthly Listings</td>
                <td id="total_rep_profit"></td>
            </tr>
            <tr>
                <td>Territory Cost</td>
                <td id="cost_zip"></td>
            </tr>
        </table>
    </div>
    <!-- Testimonial End -->

@endsection
@section('script')
    <script type="text/javascript">$("#envoyFront").addClass('active');</script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css" rel="stylesheet"/>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    <script src="{{ asset('js/jquery.validationEngine.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validationEngine-en.min.js') }}"></script>
    <link href="{!! asset('assets/user/css/new.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! asset('assets/user/css/style.css') !!}" rel="stylesheet" type="text/css"/>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js"></script>
    <script src="{!! asset('assets/user/js/fullcalendar/moment.min.js') !!}"></script>
    <script src="{!! asset('assets/user/js/fullcalendar/fullcalendar.min.js') !!}"></script>
    <script src="{!! asset('assets/user/js/fullcalendar/locale-all.js') !!}"></script>

    <script src="https://js.stripe.com/v3/"></script>
    <script>


        var clicked = false;
        var mapboxglMap;
        var city_name = '';
        var state_name = '';
        if (!clicked) {
            reloadMap();
        }

        function reloadMap() {
            mapboxgl.accessToken = 'pk.eyJ1IjoiZGlwZXNoMzQiLCJhIjoiY2tpbHJid3psMG1paDJ4cWpoYzE1eXRmayJ9.ZMZT6lb0BHg-IFAw716rSw';
            mapboxglMap = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [-100.04, 38.907],
                type: 'vector',
                zoom: 4,
                buffer: 4,
                pitch: 0,
            });
        }


        $.ajax({
            url: '{{route('envoy.state-name')}}',
            type: "get",
            dataType: "json",
            async: false,
            success: function (response) {
                $('.stateName').css('display', 'none');
                $('.cityName').css('display', 'none');
                $('#stateName').css('display', 'block');
                $('#cityName').css('display', 'block');
                $.each(response.data, function (key, value) {
                    if (key != '') {
                        $('#stateName').append('<option value="' + key + '">' + value + '</option>');
                    }
                });
            }
        });

        function clickChecked() {
            if (!clicked) {
                $('html, body').animate({
                    scrollTop: $("#details_container").offset().top
                }, 2000);
                $('#errorCLick').show();
                if ($('.selectedSlot').length < 1) {
                    $('#slot-container').append('<li style="color: red">' + 'Select Time for inquiry!' + '</li>');
                }
            } else {
                if ($('.selectedSlot').length < 1) {
                    $('#slot-container').append('<li style="color: red">' + 'Select Time for inquiry!' + '</li>');
                }
            }
        }

    </script>

    <script>

        $(document).ready(function () {
            $('#formID').validationEngine();
            $(document).on('click', '#inquiry-button', function () {
                $('html, body').animate({
                    scrollTop: $("#calendar").offset().top
                }, 2000);
            });
            var mydate = new Date();
            var d = mydate.getDate();
            var m = mydate.getMonth() + 1;
            var y = mydate.getFullYear();
            var currDate = y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                editable: true,
                disableDragging: true,
                disableResizing: true,
                defaultDate: moment(),
                defaultView: 'month',
                nowIndicator: true,
                showNonCurrentDates: true,
                allDaySlot: true,
                allDayDefault: true,
                eventLimit: true,
                forceEventDuration: true,
                unselectAuto: true,
                dropAccept: '*',
                handleWindowResize: true,
                events: function (start, end, timezone, callback) {
                    $.ajax({
                        url: '{{route('reservation.calendar')}}',
                        dataType: 'json',
                        cache: false,
                        data: {
                            // our hypothetical feed requires UNIX timestamps
                            //start: start.unix(),
                            //end: end.unix()
                        },
                        success: function (events) {
                            callback(events);
                        }
                    });
                },
                eventRender: function (event, eventElement) {
                    if (event.title) {
                        eventElement.find("div.fc-content").prepend("<i class='fa fa-hand-pointer-o'></i>");
                    }
                },
                eventClick: function (date, info) {
                    $('#slot-container').empty();
                    var start = date.date;
                    $('.selectedSlot').css('background-color', '#48a390').removeClass(' slotSelected');
                    $.ajax({
                        url: "{{route('booking.slots')}}",
                        type: 'post',
                        dataType: 'json',
                        data: {
                            date: start,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            $('#slot-container').empty();
                            if (data.timeSlots.length < 1) {
                                $('#slot-container').empty();
                                $('#slot-container').append('<li style="color: red">' + 'No Time Slot Available!' + '</li>');
                                return false;
                            }
                            for (var i = 0; i < data.timeSlots.length; i++) {
                                var dummy = $('.slots').clone();
                                $(dummy).removeClass('slots');
                                $(dummy).addClass(' selectedSlot');
                                $(dummy).attr('id', data.timeSlots[i]['id']);
                                $(dummy).text(data.timeSlots[i]['start_time'] + ' - ' + data.timeSlots[i]['end_time']);
                                $(dummy).show();
                                $('#slot-container').append(dummy);
                            }
                            $('input[name=date]').val(data.timeSlots[0]['date']);
                        }

                    })

                },
                dayClick: function (date, allDay, jsEvent, view) {
                    $('#slot-container').empty();
                    var selctedDate = new Date(date.valueOf());
                    var month = selctedDate.getMonth() + 1;
                    var year = selctedDate.getFullYear();
                    var day = selctedDate.getDate();
                    var selectedDate = year + '-' + month + '-' + day;
                    var today = moment().format('YYYY-MM-D');
                    var tomorow = moment().add(1, 'day').format('YYYY-MM-D');
                    var today_date = today.split('-');
                    var current_date = today_date[0] + '-' + today_date[1] + '-' + today_date[2];
                    var tomorow = tomorow.split('-');
                    var tomorow_date = tomorow[0] + '-' + tomorow[1] + '-' + tomorow[2];
                    console.log(tomorow_date, selectedDate, current_date);
                    if (current_date == selectedDate || selectedDate == tomorow_date) {
                        return false
                    }
                    if (new Date(today) > new Date(selectedDate)) {
                        return false
                    }
                    //else {
                    //  if(today_array[0] == date_array[0] && today_array[1] == date_array[1] && today_array[1] == date_array[2]) {
                    //    return false
                    //}
                    //}
                    $('.selectedSlot').css('background-color', '#48a390').removeClass(' slotSelected');
                    $.ajax({
                        url: "{{route('booking.slots')}}",
                        type: 'post',
                        dataType: 'json',
                        data: {
                            date: selectedDate,
                            "_token": "{{ csrf_token() }}",
                        },

                        success: function (data) {

                            $('#slot-container').empty();
                            if (data.timeSlots.length < 1) {
                                $('#slot-container').empty();
                                $('#slot-container').append('<li style="color: red">' + 'No Time Slot Available!' + '</li>');
                                return false;
                            }
                            for (var i = 0; i < data.timeSlots.length; i++) {
                                var dummy = $('.slots').clone();
                                $(dummy).removeClass('slots');
                                $(dummy).addClass(' selectedSlot');
                                $(dummy).attr('id', data.timeSlots[i]['id']);
                                $(dummy).text(data.timeSlots[i]['start_time'] + ' - ' + data.timeSlots[i]['end_time']);
                                $(dummy).show();
                                $('#slot-container').append(dummy);
                            }
                            $('input[name=date]').val(data.timeSlots[0]['date']);
                        }

                    })
                },
                select: function (start, end) {
                    $('#slot-container').empty();
                    if (start.isBefore(moment())) {
                        $('#calendar').fullCalendar('unselect');
                        return false;
                    }
                },
                dayRender: function (moment, cell) {
                    var tomorrow = moment.add(2, 'day');
                    var day = moment.add(-1, 'day').date();
                    var date = new Date();
                    var today = new Date(date.getTime() + 48 * 60 * 60 * 1000);
                    if (tomorrow < today) {
                        console.log(cell);
                        cell.css("background-color", "#e6e6e6");
                        cell.parent().css("background-color", "#e6e6e6");
                        cell.css('cursor','unset');
                    }
                    $('.fc-day-top .fc-day-number').attr('data-goto','');
                    $('.fc-day-top .fc-day-number').attr('href','javascript::void(0)');

                },
                loading: function (bool) {
                    $("#loading-overlay").toggle(bool);
                }
            });

            $(document).on('click', '.selectedSlot', function () {
                $('.selectedSlot').css('background-color', '#48a390').removeClass('slotSelected');
                $(this).css('background-color', '#ccc').addClass(' slotSelected');
                var id = $('input[name=slot_id]').val($(this).attr('id'));
            });
            /*
            var geojson = [];
            $('#stateName').change(function () {
                state_name = $(this).val();
                $('#cityName').children('option').remove();
                $('#cityName').append('<option value="">Select City</option>');
                $.ajax({
                        url: '{{route('envoy.city-name')}}',
                        type: "post",
                        data: {state: state_name},
                        dataType: "json",
                        async: false,
                        success: function (response) {
                            $.each(response.data, function (key, value) {
                                $('#cityName').append('<option value="' + value + '">' + value + '</option>');
                            });
                        }
                    }
                );
            });

            $('#cityName').change(function () {
                city_name = $(this).val();
                $.ajax({
                    url: '{{route('envoy.coordinates')}}',
                    type: "POST",
                    data: {city: city_name, state: state_name},
                    dataType: "json",
                    async: false,
                    success: async function (data) {
                        geojson = data;
                        if(mapboxglMap.getSource('places')!=undefined){
                            mapboxglMap.removeLayer('places');
                            mapboxglMap.removeSource('places');
                        }
                        await mapboxglMap.addSource('places', {
                            'type': 'geojson',
                            'data': geojson
                        });
                        await mapboxglMap.addLayer({
                            'id': 'places',
                            'type': 'circle',
                            'source': 'places',
                            "paint": {
                                "circle-radius": 5,
                                "circle-color": '#9F1B96'
                            },
                        });
                        var easingFunctions = {
                            easeOutQuint: function (t) {
                                return 1 - Math.pow(1 - t, 5);
                            },
                        };
                        var easingFn =
                            easingFunctions[
                                'easeOutQuint'
                                ];
                        var duration = parseInt(2000);
                        var animationOptions = {
                            duration: duration,
                            easing: easingFn,
                            offset: [0, 0],
                            animate: 1,
                            zoom: 10,
                            essential: true // animation will happen even if user has `prefers-reduced-motion` setting on
                        };
                        var center = geojson.features[0]['geometry']['coordinates'];
                        animationOptions.center = center;
                        mapboxglMap.flyTo(animationOptions);
                        // Add a layer showing the places.
                        var popup = new mapboxgl.Popup({
                            closeButton: false,
                            closeOnClick: false
                        });
                        mapboxglMap.on('click', 'places', function (e) {
                            var zipcode = e.features[0].properties[1];
                            // var long = e.features[0].geometry.coordinates[1];
                            $.ajax({
                                url: '{{route('get_data.zip')}}',
                                data: {
                                    zip: zipcode,
                                    "_token": "{{ csrf_token() }}"
                                },
                                dataType: 'json',
                                type: 'post',
                                success: function (data) {
                                    $('#details_container').empty();
                                    var dummy = $('#details_box').clone();
                                    $(dummy).attr('id', '');
                                    $(dummy).find('#metro').text(data.zip['metro']);
                                    $(dummy).find('#address').text(data.zip['city'] + ' ' + data.zip['state'] + ', ' + data.zip['zipcode']);
                                    $(dummy).find('#envoy').text('Envoy: ' + data.zip['envoy']);
                                    $(dummy).find('#commision').text('Envoy Comission: ' + data.zip['envoy_commision']);
                                    $(dummy).find('#four_month_sales').text('Four month sales: ' + data.zip['four_month_sales']);
                                    $(dummy).find('#total_rep_profit').text('Total Rep Profit: ' + data.zip['total_rep_profit']);
                                    $(dummy).find('#rep').text('Rep: ' + data.zip['rep']);
                                    $(dummy).find('#cost_zip').text('Cost/Zip: ' + data.zip['cost_zip']);
                                    $(dummy).show();
                                    $('#details_container').append(dummy);
                                    $('input[name=zipcode]').val(data.zip['zipcode']);
                                    $('#inquiry-button').show();
                                    clicked = true;
                                },

                            });

                        });
                        mapboxglMap.on('mouseenter', 'places', function (e) {
                            mapboxglMap.getCanvas().style.cursor = 'pointer';
                            var coordinates = e.features[0].geometry.coordinates.slice();
                            var description = e.features[0].properties[0];
                            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                            }
                            popup.setLngLat(coordinates).setHTML(description).addTo(mapboxglMap);
                        });

                        mapboxglMap.on('mouseleave', 'places', function () {
                            mapboxglMap.getCanvas().style.cursor = '';
                            popup.remove();
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        toastr.error('Select City!');
                    }
                });
            });*/
            $('#searchByZip').click(function () {
                zipcode = $("#zipcode").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{route('envoy.coordinates')}}',
                    type: "POST",
                    data: {zipcode: zipcode},
                    dataType: "json",
                    async: false,
                    success: async function (data) {
                        geojson = data;
                        if(mapboxglMap.getSource('places')!=undefined){
                            mapboxglMap.removeLayer('places');
                            mapboxglMap.removeSource('places');
                        }
                        await mapboxglMap.addSource('places', {
                            'type': 'geojson',
                            'data': geojson
                        });
                        await mapboxglMap.addLayer({
                            'id': 'places',
                            'type': 'circle',
                            'source': 'places',
                            "paint": {
                                "circle-radius": 10,
                                "circle-color": '#2A3851'
                            },
                        });
                        var easingFunctions = {
                            easeOutQuint: function (t) {
                                return 1 - Math.pow(1 - t, 5);
                            },
                        };
                        var easingFn =
                            easingFunctions[
                                'easeOutQuint'
                                ];
                        var duration = parseInt(2000);
                        var animationOptions = {
                            duration: duration,
                            easing: easingFn,
                            offset: [0, 0],
                            animate: 1,
                            zoom: 10,
                            essential: true // animation will happen even if user has `prefers-reduced-motion` setting on
                        };
                        var center = geojson.features[0]['geometry']['coordinates'];
                        animationOptions.center = center;
                        mapboxglMap.flyTo(animationOptions);
                        // Add a layer showing the places.
                        var popup = new mapboxgl.Popup({
                            closeButton: false,
                            closeOnClick: false
                        });
                        mapboxglMap.on('click', 'places', function (e) {
                            var zipcode = e.features[0].properties[1];
                            // var long = e.features[0].geometry.coordinates[1];
                            $.ajax({
                                url: '{{route('get_data.zip')}}',
                                data: {
                                    zip: zipcode,
                                    "_token": "{{ csrf_token() }}"
                                },
                                dataType: 'json',
                                type: 'post',
                                success: function (data) {
                                    $('#details_container').empty();
                                    var dummy = $('#details_box').clone();
                                    $(dummy).attr('id', '');
                                    $(dummy).find('#metro').text(data.zip['metro']);
                                    $(dummy).find('#address').text(data.zip['city'] + ' ' + data.zip['state'] + ', ' + data.zip['zipcode']);
                                    $(dummy).find('#envoy').text("$"+numberWithCommas(data.zip['envoy']));
                                    $(dummy).find('#commision').text("$"+numberWithCommas(data.zip['envoy_commision']));
                                    $(dummy).find('#four_month_sales').text(data.zip['four_month_sales']);
                                    $(dummy).find('#total_rep_profit').text(data.zip['total_rep_profit']);
                                    $(dummy).find('#rep').text(data.zip['rep']);
                                    $(dummy).find('#cost_zip').text("$"+numberWithCommas(data.zip['cost_zip']));
                                    $(dummy).show();
                                    $('#details_container').append(dummy);
                                    $('input[name=zipcode]').val(data.zip['zipcode']);
                                    $('#inquiry-button').show();
                                    clicked = true;
                                },

                            });

                        });
                        mapboxglMap.on('mouseenter', 'places', function (e) {
                            mapboxglMap.getCanvas().style.cursor = 'pointer';
                            var coordinates = e.features[0].geometry.coordinates.slice();
                            var description = e.features[0].properties[0];
                            console.log("description",description);
                            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                            }
                            popup.setLngLat(coordinates).setHTML(description).addTo(mapboxglMap);
                        });

                        mapboxglMap.on('mouseleave', 'places', function () {
                            mapboxglMap.getCanvas().style.cursor = '';
                            popup.remove();
                        });
                    }
                    // ,
                    // error: function (xhr, ajaxOptions, thrownError) {
                    //     toastr.error('Select City!');
                    // }
                });
            });

        });
        $(document).ready(function () {
            var today = $(document).find('.fc-today');
            $(today).addClass('fc-past');
            $(today).next('.fc-future').addClass('fc-past');
        });

        function numberWithCommas(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

    </script>
@endsection
