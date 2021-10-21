@extends('layouts.admin-layout')
@section('style')
    <style media="screen">
        .seller_detail{
            padding: 2em;
            background: white !important;
            color: #0b2a4a;
        }
        .ibox-title{
            padding: 0px;
            border: none;
            margin-left: 1em;
            font-family: unisansboldbold
        }

        .ibox-title h2{
            font-weight: 100;
            font-size: 2.5em;
        }

        .ibox-content{
            margin: 1em;
            margin-top:1em;
            padding: 0px;
            color: #0b2a4a !important;
        }
        .table{
            font-size: 1.1em;
        }
        .table thead tr th{
            padding-bottom: 23px;
        }
        .table tr th,.table tr td{
            text-align: center !important;
            font-family: unisansboldbold;
            font-weight: 100 !important;
        }

        .table tbody tr td{
            font-family: unisansregularregular;
            font-weight: 100 !important;
        }

        .table tr td{
            color: #34a691
        }
        .table-striped>tbody>tr:nth-of-type(odd){
            background-color: #dbddde
        }
        .button.dim{
            margin:0px !important
        }
        .fa-eye{
            color: #34a691 !important;
            font-size: 1.5em;
        }
        .fa-trash-o{
            color: #34a691 !important;
        }

        .input-group{
            display: inline-block
        }
        .frm-grp{
            margin-bottom: 15px;
        }
        input[type=checkbox]{
            height: 20px;
            width: 20px;
            margin: 0px;
            float: left;
        }
        .amenities_label{
            vertical-align: top;
            margin-left: 5px;
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
        #gallery-img{
            margin-top: 10px;
        }
        .radio{
            display: none;
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
        .input-group-append{
            display: -ms-flexbox;
            display: flex;
            position: absolute;
            z-index: 9;
            right: 16px;
            top: 1px;
        }
        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: .375rem .75rem;
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: 7.5px;
        }
        .input-group-append {
            margin-left: -1px;
        }

    </style>

@endsection
@section('body')
    <div id="" class="seller_detail min_height_974px">
        <div class="wrapper wrapper-content custom-container-a">
            <div class="row animated fadeInRight allproperty_header">
                <div class="col-md-12">
                    <p style="text-transform:capitalize"><a href="{{ URL::previous() }}"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
                </div>

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h2>
                                 Edit Inquiry

                            </h2>
                        </div>
                        <div class="ibox-content text-left" style='padding:2em'>
                            <div class="col-md-8">
                                <form action="{{ route('update.inquiry',$inquiries->id) }}" method="post" id="property-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="frm-grp{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="">first_name</label> <br>
                                                <input type="text" name='first_name' value='{{ $inquiries->first_name ?? ""}}' class='form-control validate[required]'>
                                                <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label for="">last_name*</label> <br>
                                                <input type="text" name='last_name' value='{{$inquiries->last_name ?? ""}}' class='form-control validate[required]'>
                                                <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="">email*</label> <br>
                                                <input type="email" name="email" value="{{$inquiries->email?? ""}}" class="form-control validate[required]">
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                                                <label for="">Mobile Number*</label> <br>
                                                <input type="number" name='mobile_number' value='{{$inquiries->mobile_number ?? ""}}' class='form-control validate[required]'>
                                                <small class="text-danger">{{ $errors->first('mobile_number') }}</small>
                                            </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                                <label for="">Zip Code*</label> <br>
                                                <input type="number" name='zipcode' value='{{$inquiries->zipcode ?? ""}}' class='form-control validate[required]'>
                                                <small class="text-danger">{{ $errors->first('zipcode') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('date') ? ' has-error' : '' }}">
                                                <label for="">Inquiry Date*</label> <br>
                                                <input type="date" name='date' value='{{$inquiries->date ?? ""}}' class='form-control validate[required,min[0],maxSize[2]]' readonly>
                                                <small class="text-danger">{{ $errors->first('date') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('booking_date') ? ' has-error' : '' }}">
                                                <label for="">Reservation Date*</label> <br>
                                                <input type="date"  name='booking_date' value='{{$inquiries->bookings->date ?? ""}}' class='form-control validate[required]' readonly>
                                                <small class="text-danger">{{ $errors->first('booking_date') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('start_time') ? ' has-error' : '' }}">
                                                <label for="">Start Time</label> <br>
                                                <input type="time"  name='start_time' value='{{$inquiries->bookings->start_time ?? ""}}' readonly class='form-control amountComma validate[required]'>
                                                <small class="text-danger">{{ $errors->first('start_time') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('end_time') ? ' has-error' : '' }}">
                                                <label for="">End Time</label> <br>
                                                <input type="time"  name='end_time' value='{{$inquiries->bookings->end_time ?? ""}}' readonly class='form-control validate[reuired]'>
                                                <small class="text-danger">{{ $errors->first('end_time') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="frm-grp{{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label for="">Description</label> <br>
                                                <textarea  name='description'  class='form-control validate[reuired]'> {{$inquiries->description ?? ""}}</textarea>
                                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 20px">
                                            <div class="form-group">
                                                {!! Form::submit("Update", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
@section('script')
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

@endsection