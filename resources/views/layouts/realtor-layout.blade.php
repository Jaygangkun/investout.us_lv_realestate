@extends('layouts.dashboard-layout')

@section('style')

@endsection


@section('header')
  @include('partials.admin_header')
@endsection

@section('sidebar')
  @include('partials.realtor_sidebar')
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

    </script>

  @yield('script')
@endsection

@section('footer')

@endsection
