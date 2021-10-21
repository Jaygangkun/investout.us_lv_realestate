@extends(session('layout'))

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
  </style>

@endsection

@section('body')

    <div id="" class="seller_detail min_height_974px">

        <div class="wrapper wrapper-content custom-container-a">

                <div class="row animated fadeInRight allproperty_header">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                 <h2>Admin Uploaded Documents</h2>
                            </div>
                            <div class="ibox-content ">
                                <div class="row animated fadeInRight">
                                    <div class="panel blank-panel">


                                        <div class="panel-body">

                                            <div class="tab-content">

                                                <div class="tab-pane active" id="tab-1">

                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:50px !important">No</th>
                                                                <th>Document</th>
                                                                <th>Name</th>
                                                                <th>Created At</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          @foreach ($documents as $key => $doc )
                                                                      <tr class="allproperty_row">
                                                                          <td class="text_center no_size">{{$key+1}}</td>
                                                                          <td><a download href="{{ asset('adminDocument/'.$doc->document) }}"><i style='font-size:4.4em' class='fa fa-folder-o'></i></a></td>
                                                                          <td>{{ $doc->name }}</td>
                                                                          <td>{{ date('d-M-Y', strtotime($doc->created_at)) }}</td>
                                                                      </tr>
                                                          @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                        </div>

                    </div>

                </div>

            </div>
            </div>
    </div>

@endsection

@section('script')

@endsection
