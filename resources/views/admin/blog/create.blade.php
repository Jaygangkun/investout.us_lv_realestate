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

    .post-img{
      width: 50px;
      height: 50px;
      border-radius: 50%
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
                               <h2>Blog Post</h2>
                          </div>

                          <div class="ibox-content text-left" style='padding:2em'>
                            <div class="col-md-6">
                            {!! Form::open(['method' => 'POST', 'route' => 'admin.blog.store', 'class' => 'form-horizontal','files'=>true]) !!}
                                <h2 class='text-center text-success'>{{ session('filesuc') }}</h2>
                                <div class="form-group{{ $errors->has('heading') ? ' has-error' : '' }}">
                                    <label for="">Post heading</label> <br>
                                    <input required type="text" name='heading' class='form-control'>
                                    <small class="text-danger">{{ $errors->first('heading') }}</small>
                                </div>
                                <div style='width:900px' class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                    <label for="">Post Body</label> <br>
                                    <textarea required type="text" name='body' rows='5' class='form-control description'></textarea>
                                    <small class="text-danger">{{ $errors->first('body') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="">Post Image</label> <br>
                                    <input required type="file" name='image' class='form-control'>
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::submit("Submit", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']) !!}
                                </div>
                            {!! Form::close() !!}
                            </div>

                            <div class="ibox-content ">
                              <div class="row animated fadeInRight">
                                  <div class="panel blank-panel">
      
      
                                      <div class="panel-body">
                                        
                                          <div class="tab-content">
      
                                              <div class="tab-pane active" id="tab-1">
                                                  <h3>All Posts</h3>
                                                  <table class="table table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th style="width:50px !important">No</th>
                                                              <th>Image</th>
                                                              <th>Heading</th>
                                                              <th>Created At</th>
                                                              <th>Actions</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          @foreach ($posts as $key => $post )
                                                          <tr class="allproperty_row">
                                                              <td class="text_center no_size">{{$key+1}}</td>
                                                              <td>
                                                                  <img class='post-img'src="{{asset('blogpost/'.$post->image)}}"/>
                                                              </td>
                                                              <td>{{ $post->heading }}</td>
                                                              <td>{{ date('d-M-Y', strtotime($post->created_at)) }}</td>
                                                              <td>
                                                                  {!! Form::open(['method' => 'DELETE', 'route' => ['admin.blog.delete',$post->id], 'class' => 'form-horizontal']) !!}
                                                                  <button type="submit" name="button" class='delUserBtn' style='border:none;background:none'>
                                                                      <i class="fa fa-trash-o"></i>
                                                                  </button>
                                                                  {!! Form::close() !!}
                                                              </td>
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
    </div>


@endsection
@section('script')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('.content').summernote();
            $('.description').summernote(); 
        });    
    </script>
@endsection
