@extends('layouts.whole-seller-layout')
@section('style')
<link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">
<style media="screen">
</style>
<style>
div[class^="category_"], div[class^="speciality_"] {
  border-bottom: 1px solid;
  margin-top: 15px; 
}

.work-category-image{
    max-width: 100%;
}

.image-area {
}

.remove-image {
display: none;
position: absolute;
top: -10px;
right: -10px;
border-radius: 10em;
padding: 2px 6px 3px;
text-decoration: none;
font: 700 21px/20px sans-serif;
background: #555;
border: 3px solid #fff;
color: #FFF;
box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 2px 4px rgba(0,0,0,0.3);
  text-shadow: 0 1px 2px rgba(0,0,0,0.5);
  -webkit-transition: background 0.5s;
  transition: background 0.5s;
}
.remove-image:hover {
 background: #E54E4E;
  padding: 3px 7px 5px;
  top: -11px;
right: -11px;
}
.remove-image:active {
 background: #E54E4E;
  top: -10px;
right: -11px;
}
</style>
@endsection
 
@section('body')
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins custom-container-a padding-all white-bg">
        <form id="userProfileInfo" enctype="multipart/form-data" action="{{ route('profile.update') }}" method="post">
            {{ csrf_field() }}
            <div class="edit-profile-title">
                <H1>Edit User Information</H1>
                @php
                    $selected_work_categories = [];
                @endphp
                @if($user->hasRole('admin'))
                    
                @else
                <h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;margin:auto;width:200px"><i class="fa fa-user"></i>&nbsp;&nbsp;{{session('userTxt')}}</h3>
                @endif
            </div>
            <br>
            
            <div class="input-group  col-md-12">
                <div class="ibox-content profile-content">
                    <h2>Profile Photo</h2>
                    <div class="ibox-content dropzone-content text_center">
                        <img class="profile-img toggle-img media-object" id='pro_img' src="{{ asset('profilepic/'.session('profile')->image) }}"
                            width="250" height="250">
                        <input type="hidden" name="profile_img" value="{{ session('profile')->image or 'strange' }}">
                        <div class="" style='margin:10px auto;width:28%;'>
                            <input type="file" name="profile_image" id='profile-input' class='' value="">
                            <small class="text-danger">{{ $errors->first('profile_image') }}</small>
                        </div>
                    </div>
                    <br>
                    <h2>Personal Details:</h2>
                    <br>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">First Name:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" autocomplete='given-name' name="first_name" class="form-control" value="{{$user->first_name}}">
                            <small class="text-danger">{{ $errors->first('first_name') }}</small>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Last Name:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" autocomplete='family-name' name="last_name" class="form-control" value="{{$user->last_name}}">
                            <small class="text-danger">{{ $errors->first('last_name') }}</small>
                        </div>
                    </div>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Address:</h3>
                        </div>
                        <div class="col-md-9 col-sm-6 m-b">
                            <input type="text" name="location" autocomplete="address-line1" class="form-control" value="{{session('profile')->location}}">
                            <small class="text-danger">{{ $errors->first('location') }}</small>
                        </div>
                    </div>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">City:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="city" autocomplete="city" class="form-control" value="{{session('profile')->city}}">
                            <small class="text-danger">{{ $errors->first('city') }}</small>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">State:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="state" autocomplete="state" class="form-control" value="{{session('profile')->state}}">
                            <small class="text-danger">{{ $errors->first('state') }}</small>
                        </div>
                    </div>
                   <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">ZipCode:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="zipCode" autocomplete="zipCode" class="form-control" value="{{session('profile')->zipCode}}">
                            <small class="text-danger">{{ $errors->first('zipCode') }}</small>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Company:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="company" autocomplete="company" class="form-control" value="{{session('profile')->company}}">
                            <small class="text-danger">{{ $errors->first('company') }}</small>
                        </div>
                    </div>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Phone Number:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="text" name="phone" autocomplete="tel-national" class="form-control" value="{{session('profile')->phone}}">
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Email:</h3>
                        </div>
                        <div class="col-md-3 col-sm-6 m-b">
                            <input type="email" name="email" autocomplete="email" class="form-control" value="{{$user->email}}">
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                        
                    </div>
                    <div class="input-group col-md-12">
                        <div class="col-md-3 cl-sm-6 m-b">
                            <h3 class="control-label">Licence No:</h3>
                        </div>
                        <div class="col-md-3 cl-sm-6 m-b">
                        <input type="text" class="form-control" name="licence_number" id="licence_number" value="{{session('profile')->licence_number}}">
                        </div>
                    </div>
                    <div class="input-group col-md-12">
                        <div class="col-md-3 col-sm-3 m-b">
                            <h3 class="control-label">Languages:</h3>
                        </div>
                        <div class="col-md-9 col-sm-9 m-b">
                        <input type="text" name="languages" autocomplete="languages" class="form-control" value="{{session('profile')->languages}}" placeholder="Enter multiple languages with comma saperate like: English, Spanish, Etc.">
                            <small class="text-danger">{{ $errors->first('languages') }}</small>
                        </div>
                    </div>
                    <br>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">About me:</h3>
                        </div>
                        <div class="col-md-9 col-sm-9 m-b">
                            <small class="text-danger">{{ $errors->first('aboutme') }}</small>
                            <textarea type="text" name="aboutme" autocomplete='' maxlength="500" multiple="" class="col-md-12 well" placeholder="About me..." style="height:140px;margin-bottom:0px;">{{session('profile')->aboutme}}</textarea>
                            <small style="float:left;">Maximum length 500 characters</small>
                        </div>
                    </div>
                    <br>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">Experience:</h3>
                        </div>
                        <div class="cool-md-9 col-sm-9 m-b">
                            <small class="text-danger">{{ $errors->first('experience') }}</small>
                            <textarea type="text" name="experience" multiple="" maxlength="500" class="col-md-12 well" placeholder="Experience..." style="height:140px;margin-bottom:0px;">{{session('profile')->experience}}</textarea>
                            <small style="float:left;">Maximum length 500 characters</small>
                        </div>
                    </div>
                    <br>
                    @if($user->hasRole('investor'))
                    <h2>My Story</h2>
                    <div class="input-group col-md-12">
                        <!-- <div class="col-md-3 col-sm-6 m-b">
                            <h3 class="control-label">My Story:</h3>
                        </div> -->
                        <div class="col-md-3 col-sm-3 m-b">
                            <h3 class="control-label">Story Heading:</h3>
                        </div>
                        <div class="col-md-9 col-sm-9 m-b">
                        <input type="text" name="my_story_heading" autocomplete="my_story_heading" class="form-control" value="{{session('profile')->my_story_heading}}" placeholder="Enter story heading...">
                            <small class="text-danger">{{ $errors->first('my_story_heading') }}</small>
                        </div>
                    </div>
                    <div class="input-group col-md-12">
                        <div class="col-md-3 col-sm-3 m-b">
                            <h3 class="control-label">Story Image:</h3>
                        </div>
                        <div class="col-md-9 col-sm-9 m-b">
                        <input type="file" name="my_story_image" class="form-control" >
                            <small class="text-danger">{{ $errors->first('my_story_image') }}</small>
                        </div>
                    </div>
                    <div class="input-group col-md-12">
                        <div class="col-md-9 col-md-offset-3 m-b">
                        <img class="toggle-img media-object" id='pro_img' src="{{ asset('upload/'.session('profile')->my_story_image) }}"
                            width="285" height="160">
                        </div>
                    </div>
                    <div class="input-group col-md-12">
                        <div class="col-md-3 col-sm-3 m-b">
                            <h3 class="control-label">Description:</h3>
                        </div>
                        <div class="col-md-9 col-sm-9 m-b">
                            <small class="text-danger">{{ $errors->first('experience') }}</small>
                            <textarea type="text" name="my_story" multiple="" maxlength="500" class="col-md-12 well" placeholder="My story..." style="height:140px;margin-bottom:0px;">{{session('profile')->experience}}</textarea>
                            <small style="float:left;">Maximum length 500 characters</small>
                        </div>
                    </div>
                    <br>
                    <h2>My Body Of Work</h2>
                    <div class="user-categories-list">
                    @if($user_body_of_work->count() > 0)
                        @foreach($user_body_of_work as $key=>$user_work)
                            @php
                                array_push($selected_work_categories, $user_work->work_category_id);
                            @endphp
                            <div class="category_<?php echo $key+1; ?>">
                                <div class="input-group col-md-12">
                                    <div class="col-md-3 col-sm-3 m-b">
                                        <h3 class="control-label">Select Category:</h3>
                                    </div>
                                    <div class="col-md-3 ol-sm-6 m-b">
                                        <select class="form-control" name="work_category_name[]" id="work_category_<?php echo $key+1; ?>">
                                            @foreach($work_categories_list as $work_category)
                                                <option value="<?php echo $work_category->id?>" <?php echo $work_category->id == $user_work->work_category_id ? "selected" : ""; ?>><?php echo $work_category->name; ?></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group col-md-12">
                                    <div class="col-md-3 col-sm-3 m-b">
                                        <h3 class="control-label">Work Image:</h3>
                                    </div>
                                    <div class="col-md-9 col-sm-9 m-b">
                                        <input type="file" name="work_category_image_<?php echo $user_work->work_category_id; ?>[]" id="work_category_image_input_1" class="form-control" value="{{$user->work_category_image_input_1}}" multiple>
                                        <small class="text-danger">{{ $errors->first('work_category_image_input_1') }}</small>
                                    </div>
                                </div>
                                <div class="input-group col-md-12 work-category-image-list">
                                    @foreach($user_body_of_work_images as $key1=>$image)
                                        @if($image->work_category_id == $user_work->work_category_id)
                                            <div class="col-md-3 m-b image-area">
                                                <img class="toggle-img media-object work-category-image" id='work_category_image_preview_<?php echo $image->id?>' src="{{ asset('upload/'.$image->image_url) }}"
                                                width="285" height="160">
                                                <a class="remove-image" href="javascript:deleteWorkCategoryImage({{$image->id}})" style="display: inline;">&#215;</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="input-group col-md-12">
                                    <div class="col-md-3 m-b work_category_actions">
                                        @if($user_body_of_work->count() == 1)
                                            <button type="button" class="btn btn-primary" id="add_new_work_category"><i class="glyphicon glyphicon-plus"></i> Add New Work</button>
                                        @elseif($user_body_of_work->count() == $key + 1)
                                            <button type="button" class="btn btn-danger" id="delete_work_category_<?php echo $key+1; ?>" data-id="<?php echo $user_work->work_category_id; ?>"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                            <button type="button" class="btn btn-primary" id="add_new_work_category"><i class="glyphicon glyphicon-plus"></i> Add New Work</button>
                                        @else
                                            <button type="button" class="btn btn-danger" id="delete_work_category_<?php echo $key+1; ?>" data-id="<?php echo $user_work->work_category_id; ?>"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="category_1">
                            <div class="input-group col-md-12">
                                <div class="col-md-3 col-sm-3 m-b">
                                    <h3 class="control-label">Select Category:</h3>
                                </div>
                                <div class="col-md-3 ol-sm-6 m-b">
                                    <select class="form-control" name="work_category_name[]" id="work_category_1">
                                        @foreach($work_categories_list as $work_category)
                                            <option value="<?php echo $work_category->id?>"><?php echo $work_category->name; ?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-group col-md-12">
                                <div class="col-md-3 col-sm-3 m-b">
                                    <h3 class="control-label">Work Image:</h3>
                                </div>
                                <div class="col-md-9 col-sm-9 m-b">
                                    <input type="file" name="work_category_image_1[]" id="work_category_image_input_1" class="form-control" value="{{$user->work_category_image_input_1}}" multiple>
                                    <small class="text-danger">{{ $errors->first('work_category_image_input_1') }}</small>
                                </div>
                            </div>
                            <div class="input-group col-md-12">
                                <div class="col-md-9 col-md-offset-3 m-b">
                                    <img class="toggle-img media-object" id='work_category_image_preview_1' src="{{ asset('profilepic/no_image_available.jpg') }}"
                                    width="285" height="160">
                                </div>
                            </div>
                            <div class="input-group col-md-12">
                                <div class="col-md-3 col-md-offset-3 m-b work_category_actions">
                                    <button type="button" class="btn btn-primary" id="add_new_work_category"><i class="glyphicon glyphicon-plus"></i> Add New Work</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>
                    <br>
                    <h2>My Speciality</h2>
                    <div class="user-specialities-list">
                        @if($user_specialities->count() > 0)
                            @foreach($user_specialities as $key=>$user_speciality)
                                <div class="speciality_<?php echo $key+1;?>">
                                    <div class="input-group col-md-12">
                                        <div class="col-md-3 col-sm-3 m-b">
                                            <h3 class="control-label">Title:</h3>
                                        </div>
                                        <div class="col-md-3 ol-sm-6 m-b">
                                            <input type="hidden" class="form-control" name="speciality_id[]" id="speciality_id_<?php echo $key+1; ?>" value="{{$user_speciality->id}}">
                                            <input type="text" class="form-control" name="speciality_title[]" id="speciality_title_<?php echo $key+1; ?>" value="{{$user_speciality->title}}">
                                        </div>
                                    </div>
                                    <div class="input-group col-md-12">
                                        <div class="col-md-3 col-sm-3 m-b">
                                            <h3 class="control-label">Speciality Image:</h3>
                                        </div>
                                        <div class="col-md-9 col-sm-9 m-b">
                                            <input type="file" name="speciality_image_<?php echo $key+1; ?>" id="speciality_image_<?php echo $key+1; ?>" class="form-control">
                                            <small class="text-danger">{{ $errors->first('speciality_image_'.($key+1)) }}</small>
                                        </div>
                                    </div>
                                    <div class="input-group col-md-12 speciality-image-list">
                                        <div class="col-md-3 m-b">
                                            <img class="toggle-img media-object speciality-image" id='speciality_image_preview_<?php echo $image->id?>' src="{{ asset('upload/'.$user_speciality->image_url) }}"
                                            width="285" height="160">
                                        </div>
                                    </div>
                                    <div class="input-group col-md-12">
                                        <div class="col-md-3 m-b speciality_actions">
                                            @if($user_specialities->count() == 1)
                                                <button type="button" class="btn btn-primary" id="add_new_speciality"><i class="glyphicon glyphicon-plus"></i> Add New Speciality</button>
                                            @elseif($user_specialities->count() == $key + 1)
                                                <button type="button" class="btn btn-danger" id="delete_speciality_<?php echo $key+1; ?>" data-id="<?php echo $user_speciality->id; ?>"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                                <button type="button" class="btn btn-primary" id="add_new_speciality"><i class="glyphicon glyphicon-plus"></i> Add New Speciality</button>
                                            @else
                                                <button type="button" class="btn btn-danger" id="delete_speciality_<?php echo $key+1; ?>" data-id="<?php echo $user_speciality->id; ?>"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="speciality_1">
                                <div class="input-group col-md-12">
                                    <div class="col-md-3 col-sm-3 m-b">
                                        <h3 class="control-label">Title:</h3>
                                    </div>
                                    <div class="col-md-3 ol-sm-6 m-b">
                                        <input type="hidden" class="form-control" name="speciality_id[]" id="speciality_id_1">
                                        <input type="text" class="form-control" name="speciality_title[]" id="speciality_title_1">
                                    </div>
                                </div>
                                <div class="input-group col-md-12">
                                    <div class="col-md-3 col-sm-3 m-b">
                                        <h3 class="control-label">Speciality Image:</h3>
                                    </div>
                                    <div class="col-md-9 col-sm-9 m-b">
                                        <input type="file" name="speciality_image_1" id="speciality_image_1" class="form-control">
                                        <small class="text-danger">{{ $errors->first('speciality_image_1') }}</small>
                                    </div>
                                </div>
                                <div class="input-group col-md-12 speciality-image-list">
                                    <div class="col-md-3 m-b">
                                        <img class="toggle-img media-object speciality-image" id='speciality_image_preview_1' src="{{ asset('profilepic/no_image_available.jpg') }}"
                                        width="285" height="160">
                                    </div>
                                </div>
                                <div class="input-group col-md-12">
                                    <div class="col-md-3 m-b speciality_actions">
                                        <button type="button" class="btn btn-primary" id="add_new_speciality"><i class="glyphicon glyphicon-plus"></i> Add New Speciality</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <br>
                    @endif
                    <!-- Social media -->
                    <h2>Social Media:</h2>
                    <div class="input-group  col-md-12">
                        <div class="col-md-3 col-sm-3 m-b">
                            <h3 class="control-label">Facebook</h3>
                        </div>
                        <div class="col-md-9 col-sm-9 m-b">
                            <input type="url" class="form-control" name="socialmedia" placeholder="" value="{{session('profile')->socialmedia}}">
                            <small class="text-danger">{{ $errors->first('socialmedia') }}</small>
                        </div>
                    </div>
                    <h2>Input Video:</h2>
                    <div class="input-group  col-md-12">
                        <div class="col-md-12 col-sm-12 m-b">
                            <input type="url" name="inputvideo" class="form-control profile-video-edit" placeholder="https://" value="{{session('profile')->inputvideo}}">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-5 col-sm-12 m-b col-md-offset-2">
                            <input type="url" name="inputvideo" class="form-control profile-video-edit" placeholder="https://" value="{{session('profile')->inputvideo}}">
                        </div>
                        <br><br>
                    </div> -->
                </div>
            </div>
            <div class="text_right"><button class="btn btn-primary dim" type="submit">Publish</button></div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="http://demo.expertphp.in/js/dropzone.js"></script>
<script type="text/javascript">
let categories_count = 1;
let specialities_count = 1;
    $(document).ready(function(){
        categories_count = $("[class^='category_']").length;
        specialities_count = $("[class^='speciality_']").length;
        let selected = <?php echo json_encode($selected_work_categories); ?>;
        console.log("categories_count", categories_count, "specialities_count", specialities_count);
    });
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

      $(document).on("click", "#add_new_work_category", function(){
        console.log("yesyes", categories_count);
        // let categories_count = $("[class^='category_']").length;
        let new_category_id = categories_count + 1;
        
        console.log("categories_count", categories_count);
        console.log("new_category_id", new_category_id);
        let last_div = ($('.user-categories-list').children().last().attr('class')).split("_");
        console.log("last_div", last_div);
        let new_category_clone = $('.user-categories-list').children().last().clone();
        new_category_clone.attr("class", "category_"+new_category_id);
        new_category_clone.find("#work_category_"+last_div[1]).attr("id", "work_category_"+new_category_id).prop("selectedIndex", 0);
        new_category_clone.find("#work_category_image_input_"+last_div[1]).val("");
        new_category_clone.find("#work_category_image_input_"+last_div[1]).attr("id", "work_category_image_input_"+new_category_id);
        let no_image = '<div class="col-md-9 m-b">'
                            +'<img class="toggle-img media-object" id="work_category_image_preview_1" src="{{ URL::asset("profilepic/no_image_available.jpg") }}" width="285" height="160">'
                        +'</div>';
        new_category_clone.find(".work-category-image-list").html(no_image);
        new_category_clone.find("#work_category_image_preview_"+last_div[1]).attr("id", "work_category_image_preview_"+new_category_id);
        new_category_clone.find("#delete_work_category_"+last_div[1]).attr("data-id", "");
        new_category_clone.find("#delete_work_category_"+last_div[1]).attr("id", "delete_work_category_"+new_category_id);
        console.log(new_category_clone.find("#work_category_2"));
        console.log("new_category_clone",new_category_clone);
        $(".category_"+last_div[1]).find("#add_new_work_category").remove();
        $(".user-categories-list").append(new_category_clone);
        if($("[class^='category_']").length == 2)
        {
            let delete_button = '<button type="button" class="btn btn-danger" id="delete_work_category_'+last_div[1]+'" data-id=""><i class="glyphicon glyphicon-trash"></i> Delete</button>';
            $(".category_"+last_div[1]+" .work_category_actions").append(delete_button);
            delete_button = '<button type="button" class="btn btn-danger" id="delete_work_category_'+new_category_id+'" data-id=""><i class="glyphicon glyphicon-trash"></i> Delete</button>';
            $(".category_"+new_category_id+" .work_category_actions").prepend(delete_button);
        }
        categories_count = categories_count + 1;
      });

      $(document).on("click", "[id^='delete_work_category_']", function(){
        console.log("yesyes", $(this).attr("id"));
        let delete_category = $(this).attr("id");
        let delete_category_id = $(this).attr("data-id");
        $.ajax({
            url: '{{ route("profile.workCategory.delete") }}',
            type: 'POST',
            data: { category_id: delete_category_id},
            datatype: 'json',
            success: function(response) {
                console.log("Response", response);
                if(response.status)
                {
                    let add_new_btn = '<button type="button" class="btn btn-primary" id="add_new_work_category"><i class="glyphicon glyphicon-plus"></i> Add New Work</button>';
                    delete_category = delete_category.split("_");
                    console.log("delete_category", delete_category);
                    $(".category_"+delete_category[3]).remove();
                    let last_div = $('.user-categories-list').children().last().attr('class');
                    if($("#add_new_work_category").length == 0)
                    {
                        $("."+last_div+" .work_category_actions").append(add_new_btn);
                    }
                    if($("[class^='category_']").length == 1)
                    {
                        last_div = last_div.split("_");
                        console.log("#delete_work_category_"+last_div[1]);
                        $("#delete_work_category_"+last_div[1]).remove();
                    }
                    console.log("last_div", last_div);
                }
            }
        });
      });

      $(document).on("change", "[id^='work_category_']", function() {
        let changed_input_id = ($(this).attr("id")).split("_");
        $("#work_category_image_input_"+changed_input_id[2]).attr("name", "work_category_image_"+$(this).val()+"[]"); 
      });

      $(document).on("click", "#add_new_speciality", function(){
        console.log("yesyes", specialities_count);
        // let specialities_count = $("[class^='speciality_']").length;
        let new_speciality_id = specialities_count + 1;
        
        console.log("specialities_count", specialities_count);
        console.log("new_speciality_id", new_speciality_id);
        let last_div = ($('.user-specialities-list').children().last().attr('class')).split("_");
        console.log("last_div", last_div);
        let new_speciality_clone = $('.user-specialities-list').children().last().clone();
        new_speciality_clone.attr("class", "speciality_"+new_speciality_id);
        new_speciality_clone.find("#speciality_id_"+last_div[1]).attr("id", "speciality_id_"+new_speciality_id).val("");
        new_speciality_clone.find("#speciality_title_"+last_div[1]).attr("id", "speciality_title_"+new_speciality_id).val("");
        new_speciality_clone.find("#speciality_image_"+last_div[1]).val("");
        new_speciality_clone.find("#speciality_image_"+last_div[1]).attr("name", "speciality_image_"+new_speciality_id);
        new_speciality_clone.find("#speciality_image_"+last_div[1]).attr("id", "speciality_image_"+new_speciality_id);
        let no_image = '<div class="col-md-9 m-b">'
                            +'<img class="toggle-img media-object" id="speciality_image_preview_1" src="{{ URL::asset("profilepic/no_image_available.jpg") }}" width="285" height="160">'
                        +'</div>';
        new_speciality_clone.find(".speciality-image-list").html(no_image);
        new_speciality_clone.find("#speciality_image_preview_"+last_div[1]).attr("id", "speciality_image_preview_"+new_speciality_id);
        new_speciality_clone.find("#delete_speciality_"+last_div[1]).attr("data-id", "");
        new_speciality_clone.find("#delete_speciality_"+last_div[1]).attr("id", "delete_speciality_"+new_speciality_id);
        console.log(new_speciality_clone.find("#speciality_2"));
        console.log("new_speciality_clone",new_speciality_clone);
        $(".speciality_"+last_div[1]).find("#add_new_speciality").remove();
        $(".user-specialities-list").append(new_speciality_clone);
        if($("[class^='speciality_']").length == 2)
        {
            let delete_button = '<button type="button" class="btn btn-danger" id="delete_speciality_'+last_div[1]+'" data-id=""><i class="glyphicon glyphicon-trash"></i> Delete</button>';
            $(".speciality_"+last_div[1]+" .speciality_actions").append(delete_button);
            delete_button = '<button type="button" class="btn btn-danger" id="delete_speciality_'+new_speciality_id+'" data-id=""><i class="glyphicon glyphicon-trash"></i> Delete</button>';
            $(".speciality_"+new_speciality_id+" .speciality_actions").prepend(delete_button);
        }
        specialities_count = specialities_count + 1;
        $("[id^='speciality_id_']").each(function(index) {
            let current_id = ($(this).attr("id")).split("_");
            $(this).attr("id", "speciality_id_"+(index+1));
            $("#speciality_title_"+current_id[2]).attr("id", "speciality_title_"+(index+1));
            $("#speciality_image_"+current_id[2]).attr("id", "speciality_image_"+(index+1));
            $("#speciality_image_"+current_id[2]).attr("name", "speciality_image_"+(index+1));
        });
      });

      $(document).on("click", "[id^='delete_speciality_']", function(){
        console.log("yesyes", $(this).attr("id"));
        let delete_category = $(this).attr("id");
        let delete_category_id = $(this).attr("data-id");
        $.ajax({
            url: '{{ route("profile.Speciality.delete") }}',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { id: delete_category_id },
            datatype: 'json',
            success: function(response) {
                console.log(response);
                if(response.status)
                {
                    let add_new_btn = '<button type="button" class="btn btn-primary" id="add_new_speciality"><i class="glyphicon glyphicon-plus"></i> Add New Work</button>';
                    delete_category = delete_category.split("_");
                    console.log("delete_category", delete_category);
                    console.log(".speciality_"+delete_category[2]);
                    $(".speciality_"+delete_category[2]).remove();
                    let last_div = $('.user-specialities-list').children().last().attr('class');
                    if($("#add_new_speciality").length == 0)
                    {
                        $("."+last_div+" .speciality_actions").append(add_new_btn);
                    }
                    if($("[class^='speciality_']").length == 1)
                    {
                        last_div = last_div.split("_");
                        console.log("#delete_speciality_"+last_div[1]);
                        $("#delete_speciality_"+last_div[1]).remove();
                    }
                    console.log("last_div", last_div);
                    $("[id^='speciality_id_']").each(function(index) {
                        let current_id = ($(this).attr("id")).split("_");
                        $(this).attr("id", "speciality_id_"+(index+1));
                        $("#speciality_title_"+current_id[2]).attr("id", "speciality_title_"+(index+1));
                        $("#speciality_image_"+current_id[2]).attr("name", "speciality_image_"+(index+1));
                        $("#speciality_image_"+current_id[2]).attr("id", "speciality_image_"+(index+1));
                    });
                }
            }
        });
      });

      function deleteWorkCategoryImage(id)
      {
            $.ajax({
                url: '{{ route("profile.WorkCategoryImage.delete") }}',
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { id: id },
                datatype: 'json',
                success: function(response) {
                    if(response.status)
                    {
                        console.log($("#work_category_image_preview_"+id).parent(".image-area").html());
                        $("#work_category_image_preview_"+id).parent(".image-area").remove();
                    }
                }
            })
      }
</script>
@endsection
