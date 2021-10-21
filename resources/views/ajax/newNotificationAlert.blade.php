<li class=''>
    <div class='noti-link'>
        <div class="col-md-3 text-left msg-alert-pic" style='padding:0px'>
            <img src="{{asset('sitefront/blacklog.png')}}" style='width:55px;display:inline' class='img-rounded img-responsive' alt="">
        </div>
        <div class="col-md-9 nav-msg-item">
            <a href="{{$notify->link}}">
                <h3>InvestOut Support</h3>
                <p style=''>{{$notify->text}}</p>
                <span>{{$notify->created_at->diffForHumans()}}</span>
            </a>
        </div>
    </div>
</li>