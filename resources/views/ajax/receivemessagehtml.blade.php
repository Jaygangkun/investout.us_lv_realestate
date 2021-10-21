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
