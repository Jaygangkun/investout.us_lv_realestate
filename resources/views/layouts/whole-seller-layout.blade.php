@extends('layouts.dashboard-layout')

@section('style')

@endsection


@section('header')
  @include('partials.whole_seller_header')
@endsection
  
@section('sidebar')
  @include('partials.whole_seller_sidebar')
@endsection

@section('body')


@endsection

@section('template_script')
    <script type='text/javascript'>
      
    @if(Session::has('newmsg'))
          alert("{{Session::get('newmsg')}}")
                  {{Session::forget('newmsg')}}
    @endif

    @if(Session::has('member'))
          alert("{{Session::get('member')}}")
        {{Session::forget('member')}}
    @endif

    @if(Session::has('acceptance'))
          alert("{{Session::get('acceptance')}}")
        {{Session::forget('acceptance')}}
    @endif

    </script>

  @yield('script')
@endsection

@section('footer')

@endsection
