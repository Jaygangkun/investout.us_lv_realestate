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
    </style>
@endsection

@section('body')

    <div class="wrapper wrapper-content custom-container-a">

        <div class="row animated fadeInRight allproperty_header">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b
                                    style='font-weight:100;text-transform:capitalize'>Inquiry Reservations</b></h2>
                    </div>
                    <div class="ibox-content ">
                        <div class="row m-t-sm animated fadeInRight">
                            <div class="panel blank-panel">


                                <div class="panel-body">

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab-1">

                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile number</th>
                                                    <th>Zip code</th>
                                                    <th>Date</th>
                                                    <th>Start time</th>
                                                    <th>End time</th>
                                                    <th colspan="2" style="text-align: left">Status</th>
                                                    <th colspan="2" style="text-align: left">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($inquiries as $key=> $inquiry)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$inquiry->first_name.' '.$inquiry->last_name}}</td>
                                                        <td>{{$inquiry->email}}</td>
                                                        <td>{{$inquiry->mobile_number}}</td>
                                                        <td>{{$inquiry->zipcode}}</td>
                                                        <td>{{$inquiry->date}}</td>
                                                        <td>{{$inquiry->bookings->start_time}}</td>
                                                        <td>{{$inquiry->bookings->end_time}}</td>
                                                        @if($inquiry->is_approved==0)
                                                            <td style="text-align: left">
                                                                <a href="{{route('inquiry.accept',$inquiry->id)}}">
                                                                    <button class="btn btn-sm btn-primary">Approve</button>
                                                                </a>
                                                                <a href="{{route('inquiry.reject',$inquiry->id)}}">
                                                                    <button class="btn btn-sm btn-primary">Reject</button>
                                                                </a>
                                                            </td>
                                                        @else
                                                            @if($inquiry->is_approved==1)
                                                            <td style="text-align: left"> <button class="btn btn-sm btn-primary">Approved</button></td>
                                                                @else
                                                                <td style="text-align: left"> <button class="btn btn-sm btn-primary">Rejected</button></td>
                                                                @endif
                                                        @endif
                                                        <td><a href="{{route('inquiry.edit',$inquiry->id)}}"><i class="fa fa-pencil-square-o" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                                                        <td><a onclick="DeleteModal('{{route('delete.inquiry',$inquiry->id)}}');return false;" href="#" id="delProperty"><i class="fa fa-trash" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>


                                                    </tr>
                                                @endforeach
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
@endsection
@section('script')
    <script>
        function DeleteModal(url){
            $("#deleteButton").attr('href',url);
            $("#DeleteModalButton").click();
        }
    </script>
@endsection