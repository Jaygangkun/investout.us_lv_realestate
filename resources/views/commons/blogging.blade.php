@extends(session('layout')) 
@section('style')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">
<style>
    body {
        background-color: #0b2a4a
    }
    .container-main>.col-md-3 {
        /* padding-left: 1em; */
    }
    .widget-recent,
    .widget-photos {
        padding: 0px
    }
    .container-main {
        width: 90%;
        margin: auto;
        padding-top: 4em
    }
    .container-main h2 {
        color: #0b2a49
    }
    .widget-search {
        padding: 0;
        margin-top: 3px;
    }
    @media (min-width:1240px) {
        .container-main {
            max-width: 1150px
        }
    }
</style>
@endsection
 
@section('body')
<div class="wrapper wrapper-content container-main row">
    <div class="col-md-9">
        <h2>BLOG</h2>
        @foreach($posts as $post)
        <div class="row post-row">
            <a href="{{route('blog.view',[auth()->user()->roles()->first()->slug,$post->id])}}" style='color:unset'>
                <div class="col-md-6 image-cont">
                    <img src="{{asset('blogpost/'.$post->image)}}" alt="">
                </div>
                <div class="col-md-6 content-container">
                    <h3>{!!$post->heading!!}</h3>
                    {!!$post->description!!}
                </div>
                <div class="col-md-12 posted">
                    <span><span style='color:#2c977d'>Posted</span> : {{$post->created_at->diffForHumans()}}</span>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="col-md-3 sidebar">
        <section class='widget widget-search'>
            <form action="{{route('blog.search',auth()->user()->roles()->first()->slug)}}" method='post'>
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Search" aria-label="">
                    <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit" aria-label=""><i class='fa fa-search'></i> </button>
                                        </span>
                    <input type="hidden" name='page' value='1'>
                </div>
            </form>
            <span style='font-family:unisansregularregular' id='sea'>Search on the relevant words and phases. Enter a Search and <span style='font-family:unisansboldbold'>press Enter</span>            or the <span style='font-family:unisansboldbold'>search icon</span> </span>
        </section>
        <h3>Recent Post</h3>
        @if(count($allpost) > 0) @php $first = $allpost->first(); @endphp
        <section class='widget widget-recent'>
            <img src="{{asset('blogpost/'.$first->image)}}" alt=""> {!!$first->description!!}
            <div class='recent-post-date'><span style='color:#2c977d'>Posted </span> : {{$first->created_at->diffForHumans()}}</div>
        </section>
        <h3>Photos</h3>
        <section class='widget widget-photos'>
            @foreach($allpost as $post )
            <img src="{{asset('blogpost/'.$post->image)}}" alt=""> @endforeach
        </section>
    </div>
    @endif
</div>
@endsection
 
@section('script')
@endsection