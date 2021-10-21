@extends('layouts.admin-layout')
@section('style')
    <style>
        table tr th,
        table tr td {
            text-align: center
        }

        .ibox-content {
            color: #0b2a4a !important
        }

        table thead tr th {
            font-family: unisansboldbold;
            font-weight: 100
        }

        table tbody tr td {
            font-family: unisansregularregular;
            font-weight: 100
        }

        .apply-button {
            background-color: #0b2a4a;
            color: white;
            font-family: unisansboldbold;
            border-radius: 6px;
            box-shadow: -3px 3px 3px 0px rgba(100, 100, 100, .24);
            border: none;
            width: 190px;
        }

        .apply-button:hover {
            color: white !important
        }

        .apply-button:focus {
            color: white;
        }

        /* Delete Modal CSS */
        .modal-confirm {
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }
        .modal-confirm .btn-info {
            background: #c1c1c1;
        }
        .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
        .modal-footer{
            text-align: left;
        }
        .deleteImage i{
            position: absolute;
            right: 25px;
            font-size: 22px;
            background: rgba(0,0,0,0.5);
            padding: 5px;
            color: rgba(255,0,0,0.8);
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('body')

    <div class="wrapper wrapper-content custom-container-a" style='width:100%;'>

        <div class="row animated fadeInRight allproperty_header">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>
                                Tinme-Slots</b></h2>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failure'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="ibox-content ">
                        <div class="row m-t-sm animated fadeInRight">
                            <div class="col-md-12">
                                <a href="{{ route('booking.add') }}" class="btn btn-primary dim">Add New Timeslots</a>
                            </div>
                            <div class="panel blank-panel">

                                <div class="panel-body">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab-1">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Total Time-slots</th>
                                                    <th colspan="2">Actions</th>
                                                    <!--<th>Is Active</th>-->
                                                </tr>
                                                </thead>
                                                <tbody>
                                               @if(isset($timeslots) && !empty($timeslots))
                                                   @foreach ($timeslots as $key=>$timeslot )
                                                       <tr class="allproperty_row">
                                                           <td class="text_center">{{$key+1}}</td>
                                                           <td>{{$timeslot['date']}}</td>
                                                           <td>{{ $timeslot['total'] }}</td>
                                                           <td><a href="{{route('booking.edit',$timeslot['date'])}}"><i class="fa fa-pencil-square-o" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                                                           <td><a  href="{{route('booking.delete',$timeslot['date'])}}" id="delProperty"><i class="fa fa-trash" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                                                       </tr>
                                                   @endforeach
                                                   @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#deleteConf" id="DeleteModalButton" class="trigger-btn" style="display:none;" data-toggle="modal">Modal</a>
    <div id="deleteConf" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fa fa-trash"></i>
                    </div>
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <a id="deleteButton" style="line-height: 30px;color:#fff;" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>


    <a href="#deleteImageConf" id="DeleteImageButton" class="trigger-btn" style="display:none;" data-toggle="modal">Modal</a>
    <div id="deleteImageConf" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fa fa-trash"></i>
                    </div>
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close closeDeleteModal" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these image? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <a id="delImageButton" style="line-height: 30px;color:#fff;" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection
{{--@section('script')--}}
    {{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--function DeleteModal(url){--}}
            {{--$("#deleteButton").attr('href',url);--}}
            {{--$("#DeleteModalButton").click();--}}
        {{--}--}}
        {{--$('body').on('click','.form-submit',function() {--}}
            {{--let ref = $(this).attr('ref');--}}
            {{--$(`#form${ref}`).submit();--}}
        {{--})--}}
        {{--$(document).ready(function() {--}}

            {{--$(document).on("change", "#is-active", function(){--}}
                {{--var pid  = parseInt($(this).attr('data-style'));--}}
                {{--var is_active_val = '';--}}
                {{--if ($(this).prop('checked') == true) {--}}
                    {{--is_active_val = 0;--}}
                {{--}--}}
                {{--else{--}}
                    {{--is_active_val = 1;--}}
                {{--}--}}
                {{--$.ajax({--}}
                    {{--type    : 'POST',--}}
                    {{--headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },--}}
                    {{--url     : '{{ route("IsActiveProerpty") }}',--}}
                    {{--data    : {pid:JSON.stringify(pid), is_active_val:JSON.stringify(is_active_val)},--}}
                    {{--success : function(response) {--}}
                        {{--if (response == true) {--}}
                            {{--console.log("upated");--}}
                        {{--}--}}
                        {{--else{--}}
                            {{--console.log("error");--}}
                        {{--}--}}
                    {{--}--}}
                {{--});--}}
            {{--})--}}
            {{--var pro_id = '';--}}
            {{--$(document).on("click", "#upload-gallery-images", function(){--}}
                {{--$('#gallery-img').empty();--}}
                {{--var propertyId = $(this).attr('data-id');--}}
                {{--$("#pid").val(propertyId);--}}
                {{--if ($('.alert-danger')) {--}}
                    {{--$(".alert-danger").remove();--}}
                {{--}--}}

                {{--$("#makecoverstatus").html('');--}}
                {{--// get all property images--}}
                {{--$.ajax({--}}
                    {{--type    : 'POST',--}}
                    {{--headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },--}}
                    {{--url     : '{{ route("getProerptyImages") }}',--}}
                    {{--data    : {pid: parseInt(propertyId)},--}}
                    {{--success : function(response) {--}}
                        {{--if (response.status == true) {--}}
                            {{--$('#gallery-img').append(response.data);--}}
                        {{--}--}}
                        {{--else{--}}
                            {{--console.log(response.data);--}}
                        {{--}--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
            {{--$(document).on("click", ".cover-img", function(){--}}
                {{--$("#makecoverstatus").html('Updating...').delay(3000);--}}
                {{--$.ajax({--}}
                    {{--type    : 'POST',--}}
                    {{--headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },--}}
                    {{--url     : '{{ route("makeCoverImg") }}',--}}
                    {{--data    : {id: parseInt($(this).val()), pid: parseInt($(this).attr('data-id'))},--}}
                    {{--success : function(response) {--}}
                        {{--if (response.status == true) {--}}
                            {{--$("#makecoverstatus").html('<div class="alert alert-success">'+response.data+'</div>');--}}
                        {{--}--}}
                        {{--else{--}}
                            {{--console.log("error");--}}
                        {{--}--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}

            {{--$(document).on("click", ".deleteImage", function(){--}}
                {{--$("#DeleteImageButton").click();--}}
                {{--var id = $(this).data('id');--}}
                {{--var dis = $(this);--}}
                {{--$('#delImageButton').attr('data-id',id);--}}
            {{--});--}}


            {{--$(document).on("click", "#delImageButton", function(){--}}
                {{--var id = $(this).data('id');--}}
                {{--var dis = $(this);--}}
                {{--$.ajax({--}}
                    {{--type    : 'POST',--}}
                    {{--headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },--}}
                    {{--url     : '{{ route("deletePropertyImg") }}',--}}
                    {{--data    : {id: id},--}}
                    {{--success : function(response) {--}}
                        {{--$(".close").click();--}}
                        {{--$("#makecoverstatus").html('<div class="alert alert-success">Image removed successfully</div>');--}}
                    {{--}--}}
                {{--});--}}

            {{--});--}}

        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}