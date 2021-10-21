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
