@extends('layouts.seller-layout')

@section('style')
    <link rel="stylesheet" href="{{asset('chat/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('chat/css/style.css')}}">
@endsection

@section('body')
<div class="container clearfix body">
   @include('partials.peoplelist')
    <div class="chat">
      <div class="chat-header clearfix">
        @if(isset($msguser))
            <img src="{{$msguser->avatar}}" alt="avatar" />
        @endif
        <div class="chat-about">

            @if(isset($msguser))
                <div class="chat-with">{{'Chat with ' .$msguser->name()}}</div>
            @else
                <div class="chat-with">No Thread Selected</div>
            @endif
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->

      <div class="chat-history">
        <ul id="talkMessages">

            @foreach($messages as $message)
                @if($message->sender->id == auth()->user()->id)
                    <li class="clearfix" id="message-{{$message->id}}">
                        <div class="message-data align-right">
                            <span class="message-data-time" >{{$message->humans_time}} ago</span> &nbsp; &nbsp;
                            <span class="message-data-name" >{{$message->sender->name()}}</span>
                            <a href="#" class="talkDeleteMessage" data-message-id="{{$message->id}}" title="Delete Message"><i class="fa fa-close"></i></a>
                        </div>
                        <div class="message other-message float-right">
                            {{$message->message}}
                            @if($message->filename)
                                <br>
                                <a download href="{{asset('messagedoc/'.$message->filename)}}"><small>{{$message->filename}}</small></a>
                            @endif
                        </div>
                    </li>
                @else
                <li id="message-{{$message->id}}">
                    <div class="message-data">
                        <span class="message-data-name"> <a href="#" class="talkDeleteMessage" data-message-id="{{$message->id}}" title="Delete Messag"><i class="fa fa-close" style="margin-right: 3px;"></i></a>{{$message->sender->name()}}</span>
                        <span class="message-data-time">{{$message->humans_time}} ago</span>
                    </div>
                    <div class="message my-message">
                        {{$message->message}}
                        @if($message->filename)
                            <br>
                            <a download href="{{asset('messagedoc/'.$message->filename)}}"><small>{{$message->filename}}</small></a>
                        @endif
                    </div>
                </li>
                @endif
            @endforeach


        </ul>

    </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
      <form action="" method="post" id="talkSendMessage" enctype="multipart/form-data">
            <textarea name="message-data" {{isset($msguser) ? '' : 'disabled'}} id="message-data" placeholder ="Type your message" rows="4"></textarea>
            <input type="hidden" name="_id" {{isset($msguser) ? '' : 'disabled'}} value="{{@request()->route('id')}}">
            <div class='sending-msg-btn'>
                <button type="submit">Send</button>
                <input type="file" name="file" id="file" {{isset($msguser) ? '' : 'disabled'}} class="inputfile" data-multiple-caption="{count} files selected"   />
                <label for="file">Choose a file</label>
            </div>
      </form>

      </div> <!-- end chat-message -->

    </div> <!-- end chat -->

  </div> <!-- end container -->

@endsection

    


@section('script')
      <script>
          var __baseUrl = "{{url('/')}}"
      </script>
    {{-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> --}}
<script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script>


    <script src="{{asset('chat/js/talk.js')}}"></script>
    {{-- <script src="{{asset('chat/js/index.js')}}"></script> --}}

    <script>
        // var show = function(data) {
        //     alert(data.sender.name + " - '" + data.message + "'");
        // }

        // var msgshow = function(data) {
        //     let filename = ''
        //     if(data.filename)
        //         filename = data.filename
        //     var html = '<li id="message-' + data.id + '">' +
        //     '<div class="message-data">' +
        //     '<span class="message-data-name"> <a href="#" class="talkDeleteMessage" data-message-id="' + data.id + '" title="Delete Messag"><i class="fa fa-close" style="margin-right: 3px;"></i></a>' + data.sender.name + '</span>' +
        //     '<span class="message-data-time">1 Second ago</span>' +
        //     '</div>' +
        //     '<div class="message my-message">' +
        //     data.message +'<br>'+
        //     '<a download href="messagedoc/$message->filename"'+filename +'""><small>'+filename+'</small></a>'
        //     +
        //     '</div>' +
        //     '</li>';

        //     $('#talkMessages').append(html);
        // }

        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input )
        {
            var label    = input.nextElementSibling,
                labelVal = label.innerHTML;


            input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                    $(label).text(fileName);
                else
                    label.innerHTML = labelVal;
            });
        });

    </script>
    {{-- {!! talk_live(['user'=>["id"=>auth()->user()->id, 'callback'=>['msgshow']]]) !!} --}}
@endsection
