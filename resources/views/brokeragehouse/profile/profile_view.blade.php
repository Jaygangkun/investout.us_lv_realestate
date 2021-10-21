@extends('layouts.brokeragehouse-layout')
@section('style')

  <style media="screen">
    .padding-all{
      padding-bottom: 0px;
    }
  </style>
@endsection

@section('body')
    <div class="wrapper wrapper-content">
        <div class="ibox float-e-margins custom-container-a padding-all white-bg" >
            <div class="edit-profile-title" >
                <H1>Personal Information</H1>
                <h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;background-color:#1ab394;text-align:center;padding:7px 0px;width:200px;margin: auto;"><i class="fa fa-user"></i>&nbsp;&nbsp;I am Brokeragehouse</h3>
            </div>
            <br>

            <h3 class="custom-color-green">Profile Photo</h3>
            <div class="ibox-content dropzone-content text_center">
                <img class="profile-img toggle-img media-object" src="{{ asset('profilepic/'.$member->profile->image) }}" width="250" height="250">
            </div>
            <br><br><br>

                <h3 class="custom-color-green">Personal Details:</h3>
                <br><br>
                <div class="p-group  col-md-12">
                    <div class="ibox-content profile-content">
                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">First Name:</h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <p>{{$member->first_name}}</p>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Last Name:</h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <p>{{$member->last_name}}</>
                            </div>

                        </div>
                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Location:</h3>
                            </div>
                            <div class="col-md-9 col-sm-6 m-b">
                                <p >{{$member->profile->location}}</p>
                            </div>
                        </div>

                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Phone Number:</h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <p>{{$member->profile->phone}}</p>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Email:</h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <p>{{$member->email}}</p>
                            </div>
                        </div>

                        <br><br>
                        <h3>&nbsp;</h3>
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">About me:</h3>
                            </div>
                            <p class="col-md-12 well" style="height:140px">{{$member->profile->aboutme}}</p>
                        </div>
                        <br>
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Experience:</h3>
                            </div>
                            <p class="col-md-12 well" style="height:140px" >{{$member->profile->experience}}</p>
                        </div>
                        <br>
                        <!-- Social media -->
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Social Media:</h3>
                            </div>

                        </div>
                        <div class="row padding-all">
                            <div class="col-md-2 col-md-offset-1">
                                <label class="ng-binding">facebook</label>
                            </div>
                            <div class="col-md-5">
                                <a href="{{session('profile')->socialmedia}}" target="_blank">{{session('profile')->socialmedia}}</a>
                            </div>
                        </div>
                        <br>
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-2 col-sm-6 m-b">
                                <h3 class="control-label"> Video:</h3>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-md-10 col-sm-6 m-b col-md-offset-1 padding-all">
                            <a href="{{session('profile')->inputvideo}}" target="_blank">{{session('profile')->inputvideo}}</a>
                            </div>
                            <h3>&nbsp;</h3>
                            <div class="profile-video-view padding-all" style="text-align:center;">
                                <div class="container-fluid">
                                <?php
                                    $video_url = $member->profile->inputvideo;
                                    if (strlen($video_url) > 11) {
                                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match)) {
                                            $video_url = "https://www.youtube.com/embed/".$match[1];
                                        }
                                    }
                                ?>
                                    <iframe class="mbr-embedded-video" src="{{$video_url}}" width="610px" height="350px" frameborder="0" allowfullscreen="" {{isset($video_url)==true?'':'hidden'}}></iframe>
                                </div>
                            </div>
                        </div>
                        <br><br>

                    </div>
                </div>
                <?php
                    // $credits = DB::table('profile_credit')->where('user_id', $userid)->get();
                    // $portfolios = DB::table('profile_portfolio')->where('user_id', $userid)->get();
                ?>

            {{-- <div class="row panel blank-panel">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h3 class="custom-color-green">Credit card:</h3>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="feed-activity-list">
                            <div class="feed-element property-submission-content">
                                <div class="media-body ">
                                    <div class="col-lg-12" >
                                        <div class="ibox float-e-margins">
                                            <div class="lightBoxGallery">
                                                @foreach($credits as $key=>$image)
                                                    <a href="{{url('assets/img/profile_credit/'.$image->credit)}}" title="Image from Unsplash" data-gallery=""><img src="{{url('assets/img/profile_credit/'.$image->credit)}}" style="width:250px"></a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h3 class="custom-color-green">Profile Portfolio:</h3>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="feed-activity-list">
                            <div class="feed-element property-submission-content">
                                <div class="media-body ">
                                    <div class="col-lg-12" >
                                        <div class="ibox float-e-margins">
                                            <div class="lightBoxGallery">
                                                @foreach($portfolios as $key=>$portfolio)
                                                    <a href="{{url('assets/img/profile_portfolio/'.$portfolio->portfolio)}}" title="Image from Unsplash" data-gallery=""><img src="{{url('assets/img/profile_portfolio/'.$portfolio->portfolio)}}" style="width:250px;height:183px"></a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}

            <br>
            <p>&nbsp;</p>

        </div>
    </div>
@endsection
