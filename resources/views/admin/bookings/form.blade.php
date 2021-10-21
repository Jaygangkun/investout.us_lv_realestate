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

        .modal-footer {
            text-align: left;
        }

        .deleteImage i {
            position: absolute;
            right: 25px;
            font-size: 22px;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px;
            color: rgba(255, 0, 0, 0.8);
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
                        <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b
                                    style='font-weight:100;text-transform:capitalize'>
                                {{isset($timeslots) ? 'Update' : 'Add'}} Time-Slots</b></h2>
                    </div>
                    <div class="ibox-content ">
                        <div class="hr-line-dashed"></div>
                    </div>
                </div>
            </div>
            <div class="panel blank-panel">

                <div class="panel-body">
                    <div class="card card-custom gutter-b example example-compact">

                        <form class="form" action="{{isset($timeslots) ? route('booking.update') :route('booking.store')}}" method="POST" id="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Select Date</label>
                                        <input type="date" id="date" name="date"
                                               value="{{isset($timeslots) ? $date : (empty(old('date')) ? \Carbon\Carbon::today()->format('Y-m-d') : old('date'))}}"
                                               class="form-control mr-2">
                                    </div>
                                    <div class="col-lg-2 form-group" style="margin-top: 2%">
                                        <button type="button" class="btn btn-success font-weight-bold add_slots">Add slots</button>
                                    </div>
                                </div>
                                <div class="slot-box">
                                    <div class="row" style=" display: none" id="timeAdder">
                                        <div class="form-group col-lg-3">
                                            <label>Start time</label>
                                            <input type="time" id="start" value="09:00:00" class="form-control mr-2">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>End time</label>
                                            <div style="display: flex">
                                                <input type="time" id="end" value="16:00:00" class="form-control mr-2 ">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <br>
                                            <a
                                                    href="javascript:void(0)" class="trash-button"><i
                                                        class="fa fa-trash-o"
                                                        style="font-size: 30px;color: red; margin-top:5px "></i></a>
                                        </div>
                                    </div>
                                    @if(isset($timeslots) && empty(old('slots')) )
                                        @foreach($timeslots as $slot)
                                            <div class="row slots">
                                                <div class="form-group col-lg-3">
                                                    <label>Start time</label>
                                                    <input type="hidden" name="oldSlots[{{$loop->iteration-1}}][id]" value="{{$slot->id}}">
                                                    <input type="time" name="oldSlots[{{$loop->iteration-1}}][start]" class="form-control mr-2" value="{{$slot->start_time}}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label>End time</label>
                                                        <input type="time"
                                                               class="form-control mr-2 "
                                                               name="oldSlots[{{$loop->iteration-1}}][end]" value="{{$slot->end_time}}">
                                                </div>
                                                <div class="col-lg-1">
                                                    <br>
                                                    <a id="{{$slot->id}}" href="javascript:void(0)" class="trash-button-delete"><i
                                                                class="fa fa-trash-o"
                                                                style="font-size: 30px;color: red; margin-top:5px "></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if(!empty(old('slots')) && !empty($timeslots))
                                        @foreach($timeslots as $slot)
                                            <div class="row slots">
                                                <div class="form-group col-lg-3">
                                                    <label>Start time</label>
                                                    <input type="hidden" name="oldSlots[{{$loop->iteration-1}}][id]" value="{{$slot->id}}">
                                                    <input type="time" name="oldSlots[{{$loop->iteration-1}}][start]" class="form-control mr-2" value="{{$slot->start_time}}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label>End time</label>
                                                    <input type="time"
                                                           class="form-control mr-2 "
                                                           name="oldSlots[{{$loop->iteration-1}}][end]" value="{{$slot->end_time}}">
                                                </div>
                                                <div class="col-lg-1">
                                                    <br>
                                                    <a id="{{$slot->id}}" href="javascript:void(0)" class="trash-button-delete"><i
                                                                class="fa fa-trash-o"
                                                                style="font-size: 30px;color: red; margin-top:5px "></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach(old('slots') as $slot)
                                            <div class="row slots">
                                                <div class="form-group col-lg-3">
                                                    <label>start time</label>
                                                    <input type="time" name="slots[{{$loop->iteration-1}}][start]" class="form-control mr-2"
                                                           value="{{$slot['start']}}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label>End time</label>
                                                        <input type="time" class="form-control mr-2 " name="slots[{{$loop->iteration-1}}][end]" value="{{$slot['end']}}">
                                                </div>
                                                <div class="col-lg-1">
                                                    <br>
                                                    <a
                                                            href="javascript:void(0)" class="trash-button"><i
                                                                class="fa fa-trash-o"
                                                                style="font-size: 30px;color: red; margin-top:5px "></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if(!empty(old('slots')) && empty($timeslots))
                                        @foreach(old('slots') as $slot)
                                            <div class="row slots">
                                                <div class="form-group col-lg-3">
                                                    <label>start time</label>
                                                    <input type="time" name="slots[{{$loop->iteration-1}}][start]" class="form-control mr-2"
                                                           value="{{$slot['start']}}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label>End time</label>
                                                        <input type="time" class="form-control mr-2 " name="slots[{{$loop->iteration-1}}][end]" value="{{$slot['end']}}">
                                                </div>
                                                <div class="col-lg-1">
                                                    <br>
                                                    <a
                                                            href="javascript:void(0)" class="trash-button"><i
                                                                class="fa fa-trash-o"
                                                                style="font-size: 30px;color: red; margin-top:5px "></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if(isset($timeslots))
                                        <input type="hidden" value="{{$date}}" name="old_date">
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success font-weight-bold mr-2">Submit</button>
                                <button type="button" class="btn btn-light-success font-weight-bold"
                                        onclick="return window.location.href ='{{ route('booking.index') }}'">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script>

                var slotCount = `@php echo isset($timeslots) ? $count :  (old('slots', null) ? collect(old('slots'))->count() :null )  @endphp`;
              if(slotCount){
                  var count=slotCount;
              }else{
                  count=0;
              }
                $('.add_slots').click(function () {
                    var dummy = $('#timeAdder').clone();
                    $(dummy).attr('id', '');
                    $(dummy).addClass(' slots');
                    $(dummy).find('#start').attr('name', 'slots[' + count + '][start]');
                    $(dummy).find('#end').attr('name', 'slots[' + count + '][end]');
                    $(dummy).show();
                    $('.slot-box').append(dummy);
                    count++;
                });
                $(document).on('click', '.trash-button', function () {
                    $(this).parent().parent().remove();
                });
                $('.trash-button-delete').click(function () {
                    var id=$(this).attr('id');
                    console.log(id);
                    $.ajax({
                        url:'{{route('timeslot.delete')}}',
                        type:'post',
                        data:{id:id},
                        success:function () {
                            $('#'+id).parent().parent().remove();
                        }
                    })
                })
            </script>
@endsection