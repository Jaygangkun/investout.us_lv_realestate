@extends(session('layout'))

@section('style')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">


<style>
    body{
        background-color:#0b2a4a
    }
    .container-main>.col-md-3{
        /* padding-left: 1em; */
    }
    .widget-recent,.widget-photos{
        padding:0px
    }

    .container-main{
        width:90%;
        margin: auto;
        padding-top: 4em
    }
    .content-container p{
        max-height: 83px
    }

    .container-main h2{
        color:#0b2a49
    }

    .widget-search{
    padding: 0;
    margin-top: 3px;
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
    <div class="wrapper wrapper-content container-main row">
            <div class="col-md-9">
                <h2>InvestOut Training</h2>
                <div class="row " style='margin:0px;'>
                    @foreach($videos as $video)
                        <div class="vid-container col-md-3">
                            <a href="#" data-toggle="modal" data-target="#myModal{{$video->id}}">
                            <section class='widget widget-recent '>
                                <img src="{{asset('training/img/'.$video->image)}}" alt="">
                                  <!--  {{$video->description}} -->
                                {!!$video->description!!}     
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
                <form action="{{route('training.search',auth()->user()->roles()->first()->slug)}}" method='post'>
                @csrf
                    <div class="input-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Search" aria-label="">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit" aria-label=""><i class='fa fa-search'></i> </button>
                            </span>
                            <input type="hidden" value='1' name='page'>
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
                    <img src="{{asset('blogpost/default-property.png')}}" alt="">
                    <!--  {{$first->description}} -->
                    {!!$first->description!!}     
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

@section('script')
@endsection
