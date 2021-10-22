@extends(session('layout')) 
@section('style')
<link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">
<style media="screen">
</style>
@endsection
 
@section('body')
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins custom-container-a padding-all white-bg">
        <div class="col-md-12">
            <p style="text-transform:capitalize"><a onclick="window.history.back();"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
        </div>
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <form id="userProfileInfo" enctype="multipart/form-data" action="{{ route('admin.users.update_other_admin_profile') }}" method="post">
            {{ csrf_field() }}
            <div class="edit-profile-title">
                <H1>Edit User Information</H1>
                @if($user_info->hasRole('admin'))
                    
                @else
                <h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;margin:auto;width:200px"><i class="fa fa-user"></i>&nbsp;&nbsp;{{session('userTxt')}}</h3>
                @endif
            </div>
            <br>
            <h3 class="custom-color-green">Profile Photo</h3>
            <div class="ibox-content dropzone-content text_center">
                <img class="profile-img toggle-img media-object" id='pro_img' src="{{ asset('profilepic/'.$profile_data->image) }}"
                    width="250" height="250" />

                    <input type="hidden" name="profile_img" value="{{ $profile_data->image or 'strange' }}" />

                <div class="" style='margin:10px auto;width:28%;'>
                    <input type="file" name="profile_image" id='profile-input' class='' value="">
                    <small class="text-danger">{{ $errors->first('profile_image') }}</small>
                </div>

            </div>
            <br>
            <h3 class="custom-color-green">Personal Details:</h3>
            <br>
            <div class="input-group  col-md-12">
                <div class="ibox-content profile-content">
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">First Name:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" autocomplete='given-name' name="first_name" class="form-control" value="{{$user_info->first_name}}">
                            <small class="text-danger">{{ $errors->first('first_name') }}</small>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Last Name:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" autocomplete='family-name' name="last_name" class="form-control" value="{{$user_info->last_name}}">
                            <small class="text-danger">{{ $errors->first('last_name') }}</small>
                        </div>
                    </div>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Address:</h3>
                        </div>
                        <div class="col-md-9 col-sm-6 m-b">
                            <input type="text" name="location" autocomplete="address-line1" class="form-control" value="{{$profile_data->location}}">
                            <small class="text-danger">{{ $errors->first('location') }}</small>
                        </div>
                    </div>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">City:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="city" autocomplete="city" class="form-control" value="{{$profile_data->city}}">
                            <small class="text-danger">{{ $errors->first('city') }}</small>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">State:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="state" autocomplete="state" class="form-control" value="{{$profile_data->state}}">
                            <small class="text-danger">{{ $errors->first('state') }}</small>
                        </div>
                    </div>
                   <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">ZipCode:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="zipCode" autocomplete="zipCode" class="form-control" value="{{$profile_data->zipCode}}">
                            <small class="text-danger">{{ $errors->first('zipCode') }}</small>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Company:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="company" autocomplete="company" class="form-control" value="{{$profile_data->company}}">
                            <small class="text-danger">{{ $errors->first('company') }}</small>
                        </div>
                    </div>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Phone Number:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="phone" autocomplete="tel-national" class="form-control" value="{{$profile_data->phone}}">
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Email:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="email" name="email" autocomplete="email" class="form-control" value="{{$user_info->email}}">
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                    </div>
                    <br>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">About me:</h3>
                        </div>
                        <small class="text-danger">{{ $errors->first('aboutme') }}</small>
                        <textarea type="text" name="aboutme" autocomplete='' maxlength="500" multiple="" class="col-md-12 well" placeholder="About me..." style="height:140px;margin-bottom:0px;">{{$profile_data->aboutme}}</textarea>
                        <small style="float:left;">Maximum length 500 characters</small>
                    </div>
                    <br>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Experience:</h3>
                        </div>
                        <small class="text-danger">{{ $errors->first('experience') }}</small>
                        <textarea type="text" name="experience" multiple="" maxlength="500" class="col-md-12 well" placeholder="Experience..." style="height:140px;margin-bottom:0px;">{{$profile_data->experience}}</textarea>
                        <small style="float:left;">Maximum length 500 characters</small>
                    </div>
                    <br>
                    <!-- Social media -->
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 ">
                            <h3 class="control-label">Social Media:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-right" style='padding-top:7px'>
                            <label class="ng-binding">facebook</label>
                        </div>
                        <div class="col-md-5">
                            <input type="url" class="form-control" name="socialmedia" placeholder="" value="{{$profile_data->socialmedia}}">
                            <small class="text-danger">{{ $errors->first('socialmedia') }}</small>
                        </div>
                    </div>
                    <br><br>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6">
                            <h3 class="control-label">Input Video:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-12 m-b col-md-offset-2">
                            <input type="url" name="inputvideo" class="form-control profile-video-edit" placeholder="https://" value="{{$profile_data->inputvideo}}">
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
            <input type="hidden" name="hi_user_id" value="{{$user_info->id}}">
            <div class="text_right"><button class="btn btn-primary dim" type="submit">Publish</button></div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="http://demo.expertphp.in/js/dropzone.js"></script>
<script type="text/javascript">
    function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#pro_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
              }
            }
            $("#profile-input").change(function() {
              readURL(this);
            });
            $('option').mousedown(function(e) {
          e.preventDefault();
          $(this).prop('selected', !$(this).prop('selected'));
          return false;
      });
</script>
@endsection
