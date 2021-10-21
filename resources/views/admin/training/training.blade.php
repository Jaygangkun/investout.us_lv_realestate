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
  </style>


@endsection

@section('body')
  <div id="" class="seller_detail min_height_974px">

      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2>Upload Training Video</h2>
                          </div>

                          @if(session('vidsuc'))
                            <h3 class='text-primary'>{{session('vidsuc')}}</h3>
                           @endif
                          <div class="ibox-content text-left" style='padding:2em'>

                            <div class="col-md-6">
                            {!! Form::open(['method' => 'POST', 'route' => 'admin.training.store', 'class' => 'form-horizontal','files'=>true]) !!}
                                <h2 class='text-center text-success'>{{ session('filesuc') }}</h2>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="">Video Description</label> <br>
                                    <textarea required type="text" name='description' rows='5' class='form-control description'></textarea>
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }}">
                                    <label for="">Video Thumbnail</label> <br>
                                    <input type="file" name='thumbnail' required class='form-control'>
                                    <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Video Type</label> <br>
                                    <select required name="type" id="" class='form-control'>
                                        <option value="0">Free</option>
                                        <option value="1">Paid</option>
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
                                    <label for="">Upload Video</label> <br>
                                    <input type="file" name='video' class='form-control'>
                                    <small class="text-danger">{{ $errors->first('video') }}</small>
                                                    <span>Or</span>
                                    <input type="text" name='link' placeholder='Paste a youtube embed link' class='form-control'>
                                </div>
                                <div class="form-group">
                                    {!! Form::submit("Upload", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']) !!}
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
            $('.description').summernote(); 
        });    
    </script>

@endsection
