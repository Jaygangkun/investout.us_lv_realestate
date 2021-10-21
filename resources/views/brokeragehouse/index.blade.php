@extends('layouts.brokeragehouse-layout') 
@section('style')
<link rel="stylesheet" href="{{asset('css/investor-index.css')}}">

<style>
</style>
@endsection
 
@section('body')

<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="product-banner-container">
                <!-- <div class="row"> -->
                <div class="realtor-image  col-md-12">
                    <div class="product-banner-title col-md-12">
                        <h1>Featured Houses</h1>
                    </div>
                    <div class="product-banner-text col-md-6">
                        <h2>Oppurtunities are abundant. <br>Find your ideal investment and make your mark. </h2>
                    </div>
                    <div class="offset-md-3 col-md-8 search-filter" style='margin-top:3em;margin-left:3em'>
                        
                        <!-- <div class="col-sm-2 text-right" style='padding:0px;padding-top:.5em;'>
                            <label for="" style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100;font-size:15px'>Search By :</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="search" name="q" class="search-input form-control" style='' placeholder="Address, City, State, ZipCode" autocomplete="on">
                                <span class="input-group-btn"> <button type="button" style='background:#0b2a4a !important' class="btn btn-primary search-btn mainSearch"><i class="fa fa-search"></i></button> </span> 
                            </div>
                            
                        </div> -->
                        
                    
                    </div>

                </div>

            </div>

            <!-- Set background for slide in css -->
            <div class="header-back banner"></div>
        </div>
    </div>
</div>

@endsection
 
@section('script')

<script src='{{asset(' js/typeahead.bundle.min.js ')}}'></script>
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script> --}}

<script>
    jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/investor/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="/investor/property/' + data.id + '" class="list-group-item">' + `<img src='/properties/${data.id}/images/${data.images[0].image}' style='width:50px;height:50px'/> ${data.address}, ${data.city}, ${data.state}, ${data.zip}` + '</a>'
              }
                }
            });
        });
</script>
@endsection