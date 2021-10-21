@extends('layouts.app-layout') 
@section('title') Blog
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
        background-image: url("{{asset('sitefront/Cover-inner.jpg')}}")
    }
    .blog-heading {
        padding: 1em;
        font-size: 1.6em;
        border: none !important;
        margin-bottom: 0px !important
    }
    .post-row .posted {
        background-color: transparent;
        padding-top: 0.22em;
        padding-bottom: 0.22em;
        padding-left: 1.4em
    }
    .image-cont {
        padding: .6em 1.4em
    }
    .image-cont img {
        height: 450px;
    }
</style>
@endsection
 
@section('body') {{-- main front image and call to action --}}
<div class="mainpic">
    <div class="container slider-main">
        <div class="main-text text-right col-lg-offset-6 col-lg-6">
            <div class="" style='line-height:54px;margin-bottom:-8px'>
                <h1 class='main-banner-text'>
                    Get the latest news<br>
                    <span style='color:#33a58e'>From our blog</strong></span>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- Controls -->
{{-- contact forms start --}}
<div class="container-main container">
    <div class="col-md-9">
        <h2>BLOG POST</h2>
        <div class="row post-row">
            <a href="{{route('blog.outer.view',[$post->id])}}" style='color:unset'>
                <h3 class='blog-heading'>{!!$post->heading!!}</h3>
                <div class="col-md-12 image-cont">
                    <img src="{{asset('blogpost/'.$post->image)}}" alt="">
                </div>
                <div class="col-md-12 posted">
                    <span><span style='color:#2c977d'>Posted</span> : {{$post->created_at->diffForHumans()}}</span>
                </div>
                <div class="col-md-6 content-container">
                    <p>{!!$post->description!!}</p>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 sidebar">
        <section class='widget widget-search'>
            <form action="{{route('blog.outer.search')}}" method='post'>
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Search" aria-label="Search For Posts">
                    <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit" aria-label=""><i class='fa fa-search'></i> </button>
                            </span>
                    <input type="hidden" value='2' name='page'>
                </div>
            </form>
            <span style='font-family:unisansregularregular' id='sea'>Search on the relevant words and phases. Enter a Search and <span style='font-family:unisansboldbold'>press Enter</span>            or the <span style='font-family:unisansboldbold'>search icon</span> </span>
        </section>
        @if(count($allpost) > 0)
        <h3>Recent Post</h3>
        @php $first = $allpost->first(); @endphp
        <section class='widget widget-recent'>
            <img src="{{asset('blogpost/'.$first->image)}}" alt="Recent Post Image"> {!!$first->description!!}
            <div class='recent-post-date'><span style='color:#2c977d'>Posted </span> : {{$first->created_at->diffForHumans()}}</div>
        </section>
        <h3>Photos</h3>
        <section class='widget widget-photos'>
            @foreach($allpost as $post )
            <img src="{{asset('blogpost/'.$post->image)}}" alt="Recents Posts images"> @endforeach
        </section>
        @endif
    </div>
</div>
@endsection
 
@section('template_script')
<script type="text/javascript">
</script>
@endsection