<li class=''>
    <div class='noti-link'>
        <div class="col-md-3 text-left msg-alert-pic" style='padding:0px'>
            <img src="{{asset('profilepic/'.$notify->fromImage)}}" style='width:55px;display:inline' class='img-rounded img-responsive'
                alt="">
        </div>
        <div class="col-md-9 nav-msg-item">
            <a href="{{$notify->link}}">
                <h3>{{$notify->fromName}}</h3>
                <div>{!!$notify->text!!}</div>
                <span>{{$notify->created_at->diffForHumans()}}</span>
            </a>
        </div>
        </a>
</li>