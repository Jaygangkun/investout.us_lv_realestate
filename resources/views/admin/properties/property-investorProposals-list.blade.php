@extends('layouts.admin-layout')
@section('style')
<style>
    .quicksummary{
        background: #f6f6f6;
        padding: 15px;
        border: 1px solid #e5e5e5;
    }
    .OwnerDetailsClass{
        border-top: 1px solid #e5e5e5;
        padding-top: 15px;
        margin-top: 15px;
    }

    .btn.btn-primary{
        background-color: #2cbdb8;
        border-color: #2cbdb8;
    }
    .btn.btn-primary:hover{
        background-color: #2cbdb8;
        border-color: #2cbdb8;
    }
    .lbl_partnership{

        position: absolute;
        right: 22px;
        top: 0;
        font-weight: bold;
    }

    .intro-single .property-price {
        padding: 1rem 0 1rem 2rem;
    }

    #main .property-proposals-list {
        padding-bottom: 3rem;
    }

    .best-deal {
        height: 60px;
        width: 240px;
        background-image: url("/assets/front_end/img/seller/add_property/bestdeal.png");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        margin-left: 30px;
        display: inline-block;
    }
    .panel-group .panel {
        margin-bottom: 0;
        border-radius: 4px;
    }
    .panel-default {
        border-color: #ddd !important;
    }
    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    /* .panel-default>.panel-heading {
        color: #333;
        background-color: #f5f5f5;
        border-color: #ddd;
    } */
    .panel-default>.proposal_send{
        color: #fff;
        background-color: #0b2a4a;
        border-color: #ddd;
    }
    .panel-default>.proposal_received{
        color: #fff;
        background-color: #2cbdb8;
        border-color: #ddd;
    }
    .panel-group .panel-heading {
        border-bottom: 0;
    }
    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px;
        color: inherit;
    }

    .panel-title a {
        color: #fff!important;
    }

    .panel-body {
        padding: 15px;
    }

    .form-group{
        margin-bottom: 0rem;
    }

    .table_panel_heading tr td .proposal_document a{
        font-size: 20px;
        color: white;
        padding: 3px;
    }
    /* div[class^="col-md"]{
        margin: auto;
    } */
    .font-weight-bold, .font-weight-bold h4{
        font-weight: bold!important;
    }
    .align-items-center {
        -ms-flex-align: center!important;
        align-items: center!important;
    }
    .justify-content-start {
        -ms-flex-pack: start!important;
        justify-content: flex-start!important;
    }
    .d-flex {
        display: -ms-flexbox!important;
        display: flex!important;
    }
    h5{
        font-size: 18px;
    }
    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        /* -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075); */
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
    .form-control-plaintext {
        display: block;
        width: 100%;
        margin-bottom: 0;
        line-height: 1.5;
        color: #212529;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
    }
    label{
        margin-bottom: 0px;
    }
    input#send_proposal{
        margin-top: 20px;
        color: white;
    }
    .margin-0{
        margin: 0;
    }
    #property_seller_suggested_offer label, #property_seller_suggested_offer div span{
        font-size: 15px;
    }
    
    input[type=range] {
    -webkit-appearance: none;
    width: 100%;
    height: 10px;
    background: #0B2A4A;
    outline: none;
    opacity: 1;
    -webkit-transition: .2s;
    transition: opacity .2s;
    margin-top: 10px;
    }

    input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: #008A8A;
    cursor: pointer;
    }

    input[type=range]::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: #008A8A;
    cursor: pointer;
    }

    table{
        width:100%;
    }

    table tr td{
        width: 19%
    }
    table tr td:first-child
    {
        width: 5% !important
    }

    .table_panel_heading tr td:nth-child(4) {
        width: 10%;
    }

    .table_panel_heading tr td a{
        color: #fff;
        font-size: 15px;
    }
    
</style>
@endsection

@section('body')

    <div class="wrapper wrapper-content">

        @php $details = $property->detail()->first(); @endphp

        <!-- ======= Intro Single ======= -->
        <div class="container-fluid" style="padding-top: 10px;">
            <div class="row">
                <div class="col-md-8">
                    <p style="text-transform:capitalize"><a href="{{ URL::previous() }}"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
                </div>
            </div>
        </div>
        <section class="intro-single">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <?php
                                $title = '';
                                // if(isset($details) && $details->bedroom != '')
                                // {
                                //   $title .= $details->bedroom."BHK ";
                                // }
                                if(isset($details) && $details->property_type != '')
                                {
                                    $title .= $details->property_type;
                                }
                            ?>
                            <h1 class="title-single">{{$title}}</h1>
                            <div class="color-text-a">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Property ID</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5>: {{ $property->id }}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Location:</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5>: {{ $property->address ?? '-' }}, {{ $property->city ?? '-' }}, {{ $property->state ?? '-' }} {{ $property->zip ?? '-' }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="property-price d-flex justify-content-center foo">
                            <div class="card-header-c d-flex">
                                <div class="card-title-c align-self-center">
                                    <h5>Asking Price</h5>
                                    <h5 class="title-c">$ <span class="priceNew">{{ number_format($details->investment_price) ?? '0' }}</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-single-box d-flex justify-content-start align-items-center">
                            <h2 class="margin-0"><strong>Property Seller Suggested Offer</strong></h2>
                            <span class="best-deal"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="title-single-box">
                            <form id="property_seller_suggested_offer">
                                <div class="form-group row">
                                    <label for="arv" class="col-sm-3 col-form-label">Seller's Estimated ARV - Selling Price</label>
                                    <div class="col-sm-3">
                                        $ <span id="seller_arv">{{ number_format($details->arv_price) ?? '0' }}</span>
                                    </div>
                                    <label for="arv" class="col-sm-3 col-form-label">Seller's Estimated Before Renovation Value</label>
                                    <div class="col-sm-3">
                                        $ <span id="seller_brv">{{ number_format($details->brv_price) ?? '0' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="arv" class="col-sm-3 col-form-label">Seller's Estimated Repair Cost</label>
                                    <div class="col-sm-3">
                                        $ <span id="seller_est_repair_cost">{{ number_format($details->estimated_repair_cost) ?? '0' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="arv" class="col-sm-3 col-form-label">Seller's Profit Share(%)</label>
                                    <div class="col-sm-3">
                                        <span id="seller_partnership_seller">{{ $details->partnership_seller ?? '0' }}</span> %
                                    </div>
                                    <label for="arv" class="col-sm-3 col-form-label">Investor's Profit Share(%)</label>
                                    <div class="col-sm-3">
                                        <span id="seller_partnership_investor">{{ $details->partnership_investor ?? '0' }}</span> %
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <hr>
        <section class="property-proposals-list">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5><strong>Start the conversation with an offer</strong></h5>
                    </div>
                </div>
                <div class="row proposals-list">
                    <div class="col-md-12 text-center">
                        <span>You not send any proposal for this property yet.</span><br/>
                    </div>
                </div>
                <hr>
            </div>
        </section>
        
    </div>
  
@endsection

@section('script')
<script src="{{ URL::asset('assets/front_end/js/Chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/front_end/js/chartjs-gauge.js') }}"></script>
<script src="{{ URL::asset('assets/front_end/js/chartjs-plugin-datalabels.js') }}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="{!! asset('assets/user/js/fullcalendar/moment.min.js') !!}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7yZbRv_jMqu_BRVZQHbUMFKe8C3jQ2DE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
<script>
    function getOwnerDetails(id) {
        $("#preloder").css({"display": "block", "opacity": "0.7"});
        $(".loader").css({"display": "block", "opacity": "0.7"});
        $("#Details").html("");
        $.ajax({
            url    : '{{ route("getOwnerDetails") }}',
            method : "POST",
            data : {id:id, _token:"{{csrf_token()}}"},
            dataType : "text",
            success : function (responses)
            {
            console.log(responses)
            var response = JSON.parse(responses);
            $("#Details").html(response.data);
            $("#OwnerDetailModalButton").click();
            },
            complete: function(){
            $("#preloder").css({"display": "none"});
            $(".loader").css({"display": "none"});
            }
        });
    }
</script>
<script>
    var chart;
    var chartOne;
    var chartTwo;
    $(document).ready(function(){
        let property_id = <?php echo $property->id;?>;
        let investor_id = <?php echo $investor->id;?>;
        console.log("property_id", property_id);
        $.ajax({
            url    : '{{ route("admin.property.investorProposals.list") }}',
            method : "POST",
            data : {id:property_id, investor_id: investor_id, _token:"{{csrf_token()}}"},
            dataType : "text",
            success : function (responses)
            {
                var response = JSON.parse(responses);
                console.log(response.data);
                console.log(response.data.length);
                if(response.data.length >0)
                {
                    let html = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
                    let send_proposal_div = false;
                    let is_accepted;
                    $.each(response.data, function(index, value){
                        html += '<div class="panel panel-default">'
                                    +'<div class="panel-heading '+(<?php echo $investor->id;?> === value.from_user ? "proposal_received" : "proposal_send")+'" role="tab" id="headingOne">'
                                        +'<table class="table_panel_heading">'
                                            +'<tr>'
                                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">'
                                                    + (<?php echo $investor->id;?> === value.from_user ? 'From:</a></td><td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+value.sender_name+' <sub>(Investor)</sub>' : 'From:</a></td><td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+value.sender_name+' <sub>(Seller)</sub>')
                                                +'</a></td>'
                                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> Seller\'s Profit: </a></td>'
                                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">'+ value.seller_share +'%</a></td>'
                                                +'<td rowspan="2"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">Sent At: '+ moment(value.created_at).format("MM/DD/YYYY hh:mm:ss A") + '</a></td>'
                                                +'<td rowspan="2">'
                                                    +'<div class="proposal_document">';

                                                    if(value.document !== null)
                                                    {
                                                        html += '<a download href="{{ asset("proposal") }}/'+ value.document+'">'
                                                                    +'<i class="glyphicon glyphicon-save-file"></i>'
                                                                +'</a>';
                                                    }
                                                    if(<?php echo (isset($accepted_proposal) ? 1 : 0)?> == 1 && value.is_accepted == 1)
                                                    {
                                                        html += '<a href="javascript:void(0);" class="accepted_proposal">Accepted</a>';
                                                    }
                                                html+= '</td>'
                                            +'</tr>'
                                            +'<tr>'
                                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">'
                                                    + (<?php echo $investor->id;?> === value.from_user ? 'To:</a></td><td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+value.receiver_name+' <sub>(Investor)</sub>' : 'To:</a></td><td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> '+value.receiver_name+' <sub>(Seller)</sub>')
                                                +'</a></td>'
                                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'"> Investor\'s Profit: </a></td>'
                                                +'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ value.id +'" aria-expanded="true" aria-controls="collapse_'+ value.id +'">'+ value.investor_share +'%</a></td>'
                                            +'</tr>'
                                        +'</table>'
                                    +'</div>'
                                    +'<div id="collapse_'+ value.id +'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">'
                                        +'<div class="panel-body">'
                                            +'<form>'
                                                +'<div class="form-group row">'
                                                    +'<label for="arv" class="col-sm-3 col-form-label">Seller\'s Estimated ARV - Selling Price</label>'
                                                    +'<div class="col-sm-3">'
                                                        +'$ <span id="seller_arv_'+value.id+'">'+numberWithCommas(value.arv)+'</span>'
                                                    +'</div>'
                                                    +'<label for="arv" class="col-sm-3 col-form-label">Seller\'s Estimated Before Renovation Value</label>'
                                                    +'<div class="col-sm-3">'
                                                        +'$ <span id="seller_brv_'+value.id+'">'+numberWithCommas(value.brv)+'</span>'
                                                    +'</div>'
                                                +'</div>'
                                                +'<div class="form-group row">'
                                                    +'<label for="arv" class="col-sm-3 col-form-label">Seller\'s Estimated Repair Cost</label>'
                                                    +'<div class="col-sm-3">'
                                                        +'$ <span id="seller_est_repair_cost_'+value.id+'">'+numberWithCommas(value.est_repair_cost)+'</span>'
                                                    +'</div>'
                                                +'</div>'
                                                +'<div class="form-group row">'
                                                    +'<label for="arv" class="col-sm-3 col-form-label">Seller\'s Profit Share(%)</label>'
                                                    +'<div class="col-sm-3">'
                                                       +'<span id="seller_partnership_seller_'+value.id+'">'+value.seller_share+'</span> %'
                                                    +'</div>'
                                                    +'<label for="arv" class="col-sm-3 col-form-label">Investor\'s Profit Share(%)</label>'
                                                    +'<div class="col-sm-3">'
                                                        +'<span id="seller_partnership_investor_'+value.id+'">'+value.investor_share+'</span> %'
                                                    +'</div>'
                                                +'</div>'
                                            +'</form>'
                                        +'</div>'
                                    +'</div>'
                                +'</div>';
                                    

                    });

                    html +='</div>';

                    console.log('html',html);

                    $('.proposals-list .col-md-12').empty();
                    $('.proposals-list .col-md-12').removeClass('text-center');
                    $('.proposals-list .col-md-12').append(html);
                    $(".collapse").collapse('hide');
                }
                
            },
            complete: function(){
                $("#preloder").css({"display": "none"});
                $(".loader").css({"display": "none"});
            }
        });

        
    });

   

    $('#arv, #brv, #est_repair_cost, #seller_share, #investor_share').on("input", function(){
        console.log($(this).attr("id"));
        console.log("value", $(this).val());
        
        if($(this).attr("id") === 'seller_share')
        {
            $('#'+$(this).attr("id")+'_range_value').text($(this).val());
            $('#investor_share').val(100 - parseInt($(this).val()));
            $('#investor_share_range_value').text(100 - parseInt($(this).val()));
        }
        else if($(this).attr("id") === 'investor_share')
        {
            $('#'+$(this).attr("id")+'_range_value').text($(this).val());
            $('#seller_share').val(100 - parseInt($(this).val()));
            $('#seller_share_range_value').text(100 - parseInt($(this).val()));
        }
        else
        {
            $('#'+$(this).attr("id")+'_range_value').text(numberWithCommas($(this).val()));
        }

        setTimeout(() => {
            var arv = parseInt($("#arv").val());
            console.log("arv", arv);
            var brv = parseInt($("#brv").val());
            var est_repair_cost = parseInt($("#est_repair_cost").val());
            var seller_share = parseInt($("#seller_share").val());
            console.log("seller_share", seller_share);
            var investor_share = parseInt($("#investor_share").val());
            var total_profit = arv - (brv + est_repair_cost);
            console.log("total_profit", total_profit);
            var seller_share_profit = Math.round((total_profit * seller_share) / 100);
            var investor_share_profit = Math.round((total_profit * investor_share) / 100);
            var flip_total_cost = brv + est_repair_cost;
            var flip_profit = total_profit;
            var partner_total_cost = est_repair_cost;
            var partner_profit = investor_share_profit;
            var flip_roi = Math.round(flip_profit/flip_total_cost);
            console.log("flip_roi", flip_roi);
            var partner_roi = Math.round(partner_profit/partner_total_cost);
            console.log("partner_roi", partner_roi);

            chart.data.datasets[0].data = [brv, seller_share_profit];
            chart.data.datasets[1].data = [0, brv];
            chart.update();

            chartOne.data.datasets[0].data = [flip_total_cost, 0, partner_total_cost, 0];
            chartOne.data.datasets[1].data = [0, total_profit, 0, 0];
            chartOne.data.datasets[2].data = [0, 0, 0, partner_profit, 350000];
            chartOne.update();

            chartTwo.data.datasets[0].data = [flip_roi, 0, 10];
            chartTwo.data.datasets[1].data = [0, partner_roi];
            chartTwo.update();


        }, 2000);
    });


    function numberWithCommas(number) {
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
</script>
<script>
      // In this example, we center the map, and add a marker, using a LatLng object
      // literal instead of a google.maps.LatLng object. LatLng object literals are
      // a convenient way to add a LatLng coordinate and, in most cases, can be used
      // in place of a google.maps.LatLng object.
      let map;

      function initMap() {
        const mapOptions = {
          zoom: 12,
          center: { lat: {{$property->lat}}, lng: {{$property->long}} },
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        const marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng({{$property->lat}}, {{$property->long}})
          position: { lat: {{$property->lat}}, lng: {{$property->long}} },
          map: map,
        });
        // You can use a LatLng literal in place of a google.maps.LatLng object when
        // creating the Marker object. Once the Marker object is instantiated, its
        // position will be available as a google.maps.LatLng object. In this case,
        // we retrieve the marker's position using the
        // google.maps.LatLng.getPosition() method.
        const infowindow = new google.maps.InfoWindow({
          content: "<p>Marker Location:" + marker.getPosition() + "</p>",
        });
        google.maps.event.addListener(marker, "click", () => {
          infowindow.open(map, marker);
        });
      }
    </script>
@endsection