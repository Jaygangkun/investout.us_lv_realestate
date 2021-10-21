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
  </style>

@endsection

@section('body')
  <div id="" class="seller_detail min_height_974px">

      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2>Content Management System</h2>
                          </div>
                                <div class="input-group">
                                    <button style='color:white;width:120px;padding:.8em' class='btn btn-primary'><a style='color:White' href="{{route('admin.cms.index','1')}}">Seller</a></button>
                                </div>
                                <div class="input-group">
                                    <button style='color:white;width:120px;padding:.8em' class='btn btn-primary'><a style='color:White' href="{{route('admin.cms.index','2')}}">Realtor</a></button>
                                </div>
                                <div class="input-group">
                                    <button style='color:white;width:120px;padding:.8em' class='btn btn-primary'><a style='color:White' href="{{route('admin.cms.index','3')}}">Investor</a></button>
                                </div>

                          <div class="ibox-content text-left" style='padding:2em'>

                            <div class="col-md-6">
                            {!! Form::open(['method' => 'POST', 'route' => 'admin.cms.update', 'class' => 'form-horizontal','files'=>true]) !!}
                                <h2 class='text-center text-success'>{{ session('filesuc') }}</h2>
                                <input type="hidden" name='page' value='{{$page->id}}'>
                                <div class="form-group{{ $errors->has('topimage') ? ' has-error' : '' }}">
                                    <label for="">Top Banner Image</label> <br>
                                    <input type="file" name='topimage' class='form-control'>
                                    <small class="text-danger">{{ $errors->first('topimage') }}</small>
                                </div>
                                <div style='width:900px' class="form-group{{ $errors->has('textbelow') ? ' has-error' : '' }}">
                                    <label for="">Text below banner</label> <br>
                                    <textarea type="text" name='textbelow' rows='5' class='form-control textbelow'>{{$page->textbelow}}</textarea>
                                    <small class="text-danger">{{ $errors->first('textbelow') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('headingcontent') ? ' has-error' : '' }}">
                                    <label for="">Heading for content</label> <br>
                                    <input type="text" name='headingcontent' value='{{$page->headingcontent}}' class='form-control'>
                                    <small class="text-danger">{{ $errors->first('headingcontent') }}</small>
                               </div>
                                <div style='width:900px' class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="">Page Content</label> <br>
                                    <textarea type="text" name='content' rows='5' value='{{$page->content}}' class='form-control'>{{$page->content}}</textarea>
                                    <small class="text-danger">{{ $errors->first('content') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('contentimage') ? ' has-error' : '' }}">
                                    <label for="">Content Image</label> <br>
                                    <input type="file" name='contentimage' class='form-control'>
                                    <small class="text-danger">{{ $errors->first('contentimage') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::submit("Post", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']) !!}
                                </div>
                            {!! Form::close() !!}

                            </div>

                        </div>
                  </div>

              </div>

            </div>
          </div>
    </div>


@endsection
@section('script')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('.content').summernote();
            $('.textbelow').summernote(); 
        });    
    </script>

@endsection
