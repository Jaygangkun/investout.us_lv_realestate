@extends('layouts.app-layout')


@section('title')
Training
@endsection


@section('style')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">

<style>
       .mainpic {
       background-size: cover;
       background-position: center;
       background-attachment: fixed;
       background-repeat: no-repeat;
       height: 75%;
       background-image: url({{asset('sitefront/Cover-inner.jpg')}})
   }

   .vid-container{
       padding-left:0px;
       padding-right:10px;
   }
   .vid-container > a,.sidebar  a{
       color:#0b2a4a
   }

   .vid-container > a:hover,.sidebar  a:hover{
       text-decoration:none
   }

   .widget-recent p{
       height:100px;
   }

   .video-container {
  position: relative;
  padding-bottom: 56.25%;
  padding-top: 30px;
  height: 0;
  overflow: hidden;
}

.video-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}

@media (min-width: 768px) {
  .modal-dialog {
    width: 745px;
    margin: 10px auto;
  }
}

.modal-dialog{
    top:10%
}

</style>
@endsection

@section('body')


{{-- main front image and call to action --}}
  <div class="mainpic">
    <div class="container slider-main">
      <div class="main-text text-right col-lg-offset-6 col-lg-6">
        <div class="" style='line-height:54px;margin-bottom:-8px'>
            <h1 class='main-banner-text'>
                  Educate Yourself,<br>
                  <span style='color:#33a58e'>With our Tutorials</strong></span>
            </h1>
        </div>
      </div>
    </div>

  </div>
  <!-- Controls -->

  {{-- contact forms start --}}

  <div class="container-main container">
        <div class="col-md-9" style='padding:0px'>
            <h2>InvestOut Training</h2>


            <div class="row " style='margin:0px;'>
            @foreach($videos as $video)
                <div class="vid-container col-md-3">
                    <a href="#" data-toggle="modal" data-target="#myModal{{$video->id}}">
                    <section class='widget widget-recent '>
                        <img src="{{asset('training/img/'.$video->image)}}" alt="Training Video Image">
                        <p>{{$video->description}}</p>
                        <div class='recent-post-date'><span style='color:#2c977d'>Posted </span> : {{$video->created_at->diffForHumans()}}</div>
                    </section>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-body" style='padding:0px'>
                        <div class="video-container" style='padding-top:0px;'>
                           @if(str_contains($video->url,'youtube'))
                                <iframe width="640" height="360"  frameborder="0" src='{{$video->url}}' allowfullscreen>
                                </iframe>
                            @else
                                <video style='width:100%;padding-bottom:22px' src="{{asset('training/video/'.$video->url)}}" width="520" height="440" controls="controls" preload="metadata">
                                </video>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
                </div>
        </div>
        <div class="col-md-3 sidebar">
            <section class='widget widget-search'>
                <form action="{{route('training.outer.search')}}" method='post'>
                @csrf
                    <div class="input-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Search" aria-label="">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit" aria-label=""><i class='fa fa-search'></i> </button>
                            </span>
                            <input type="hidden" value='2' name='page'>
                    </div>
                </form>
                <span style='font-family:unisansregularregular' id='sea'>Search on the relevant words and phases. Enter a Search and <span style='font-family:unisansboldbold'>press Enter</span> or the <span style='font-family:unisansboldbold'>search icon</span> </span>
            </section>

        @if(count($allvideos) > 0)
        <h3>Recent Post</h3>
            @php
            $first = $allvideos;
            @endphp

            <a href="#" data-toggle="modal" data-target="#myModal{{$first->id}}">
                <section class='widget widget-recent '>
                    <img src="{{asset('blogpost/default-property.png')}}" alt="Training Video Image">
                    <p>{{$first->description}}</p>
                    <div class='recent-post-date'><span style='color:#2c977d'>Posted </span> : {{$first->created_at->diffForHumans()}}</div>
                </section>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="myModal{{$first->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-body" style='padding:0px'>
                    <div class="video-container" style='padding-top:0px;'>
                    @if(str_contains($first->url,'youtube'))
                            <iframe width="640" height="360"  frameborder="0" src='{{$first->url}}' allowfullscreen>
                            </iframe>
                        @else
                            <video style='width:100%;padding-bottom:22px' width="520" height="440" controls="controls" preload="metadata">
                                <source  src="{{asset($first->url.'#t=141')}}" type="video/mp4">
                            </video>
                        @endif
                    </div>
                </div>
                </div>
            </div>
            </div>
        @endif
        </div>


  </div>




@endsection


@section('template_script')
@endsection
