@extends('layouts.dashboard-layout')

@section('style')

@endsection


@section('header')
  @include('partials.investor_header')
@endsection

@section('sidebar')
  @include('partials.investor_sidebar')
@endsection

@section('body')

@endsection

@section('template_script')
  <!-- Mainly scripts -->
  <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}" ></script>
  <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}" ></script>

  <!-- Custom and plugin javascript -->
  <script src="{{ asset('js/inspinia.js') }}" ></script>
  <script src="{{ asset('js/plugins/pace/pace.min.js') }}" ></script>
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
