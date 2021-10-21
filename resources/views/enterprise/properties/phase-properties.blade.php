  @extends('layouts.enterprise-layout') 
  @section('style')
  <style>
    table tr th,
    table tr td {
      text-align: center
    }

    .ibox-content {
      color: #0b2a4a !important
    }

    table thead tr th {
      font-family: unisansboldbold;
      font-weight: 100
    }

    table tbody tr td {
      font-family: unisansregularregular;
      font-weight: 100
    }

    .apply-button {
      background-color: #0b2a4a;
      color: white;
      font-family: unisansboldbold;
      border-radius: 6px;
      box-shadow: -3px 3px 3px 0px rgba(100, 100, 100, .24);
      border: none;
      width: 190px;
    }

    .apply-button:hover {
      color: white !important
    }

    .apply-button:focus {
      color: white;
    }
  </style>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  @endsection
   
  @section('body')

  <div class="wrapper wrapper-content custom-container-a" style='width:100%;'>

    <div class="row animated fadeInRight allproperty_header">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>
              @if ($phase == 1)
              Seller Validation
              @elseif($phase == 2)
              Evaluation
              @elseif($phase == 3)
              Title & lines Search
              @elseif($phase == 4)
              Property Market Evaluation
              @else
              New
              @endif
              Properties</b></h2>
          </div>
          <div class="ibox-content ">
            <div class="row m-t-sm animated fadeInRight">
              <div class="col-md-12">
                @if (session('status'))
                    <div class="alert">
                        <h3>{{ session('status') }}</h3>
                    </div>
                @endif
                <a href="{{ route('AddProperty',['id'=>$phasenum]) }}" class="btn btn-primary dim">Add New Property</a>
              </div>
              <div class="panel blank-panel">

                <div class="panel-body">

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab-1">
                      <a href="{{route('enterprise.property.phase-index',0)}}"><button type="button" class='btn apply-button' name="button">New Properties</button></a>
                      <a href="{{route('enterprise.property.phase-index',1)}}"><button type="button" class='btn apply-button' name="button">Seller Validation</button></a>
                      <a href="{{route('enterprise.property.phase-index',2)}}"><button type="button" class='btn apply-button' name="button">Evaluation</button></a>
                      <a href="{{route('enterprise.property.phase-index',3)}}"><button type="button" class='btn apply-button' name="button">Title & lines Search</button></a>
                      <a href="{{route('enterprise.property.phase-index',4)}}"><button type="button" class='btn apply-button' name="button">Property Market Evaluation</button></a>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Property ID</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Zip Code</th>
                            <th>Budget</th>
                            <th>Date Listed</th>
                            <th>Listing Duration</th>
                            <th>Building Type</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($properties as $key=>$property )
                          <tr class="allproperty_row">
                            <td class="text_center">{{$key+1}}</td>
                            @if(isset($property->images()->first()->image))
                            <td class="client-avatar"><a href="{{ route('enterprise.property.show',$property->propertiesID) }}"><img alt="image" src="{{ asset('properties/'.$property->propertiesID.'/images/'.$property->images()->first()->image)}}"> </a>
                            </td>
                            @else
                            <td class="client-avatar"><a href="{{ route('enterprise.property.show',$property->propertiesID) }}"><img alt="image" src="{{ asset('dashboard/seller/default-property.jpg')}}"/> </td>
                            @endif
                            <td>{{$property->propertiesID}}</td>
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->city }}</td>
                            <td>{{ $property->zip }}</td>
                            <td>{{ isset($property->details->brv_price) ? $property->details->brv_price : 'Not Entered' }}</td>
                            <td>{{ date('d-M-Y', strtotime($property->created_at)) }}</td>
                            <td>{{ isset($property->details->during_date) ? $property->details->during_date : 'Not Entered' }}</td>
                            <td>{{ $property->building_type }}</td>
                            
                            <td><a target="_blank" href="{{ route('property_single_page',['pid'=>$property->propertiesID]) }}"><i class="fa fa-eye" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                            <td><a href="{{ route('EditProperty',['id'=>$phasenum, 'pid'=>$property->propertiesID]) }}"><i class="fa fa-pencil-square-o" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                            <td><a href="javascript:void(0);" tooltip="Upload gallery image" id='upload-gallery-images' data-id="{{$property->propertiesID}}"><i class="fa fa-upload"  data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                            <td><a href="{{ route('DeleteProperty',['id'=>$phasenum, 'pid'=>$property->propertiesID]) }}" id="delProperty"><i class="fa fa-trash" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                  </div>

                </div>

              </div><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel">Upload Gallery Image</h5>
                      </div>
                      <div class="modal-body">                        
                        <form class="form-inline" id="gallery-images-frm" action="{{ route('StoreProerptyImages') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                              <div class="col-md-12">                                  
                              </div>
                              <div class="input-group control-group increment" >
                                <input type="file" required name="filename[]" class='form-control validate[required]' multiple>                                
                                <input type="hidden" name="pid" id="pid">
                              </div>

                              <button type="submit" id="upload-btn" class="btn btn-primary">Submit</button>
                        </form>   
                      </div>
                      <div class="modal-footer">
                        <div class="row" id="gallery-img">

                        </div>                        
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>

          </div>

        </div>

      </div>

    </div>
  </div>
  @endsection
  @section('script')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script type="text/javascript">
    $('body').on('click','.form-submit',function() {
          let ref = $(this).attr('ref');
          $(`#form${ref}`).submit();
      })
    $(document).ready(function() {
      $(document).on("click", "#delProperty", function(){
        var checkstr =  confirm('are you sure you want to delete this?');
        if(checkstr == true){
          console.log("deleted");
        }else{
          return false;
        }
      });
      $(document).on("change", "#is-active", function(){
        var pid  = parseInt($(this).attr('data-style'));
        var is_active_val = '';
        if ($(this).prop('checked') == true) {
          is_active_val = 0;
        }
        else{
          is_active_val = 1;
        }
        $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '{{ route("IsActiveProerpty") }}',
            data    : {pid:JSON.stringify(pid), is_active_val:JSON.stringify(is_active_val)},
            success : function(response) {
              if (response == true) {
                console.log("upated");
              }
              else{
                console.log("error");
              }
            }    
        });
      })
    });

      var pro_id = '';
      $(document).on("click", "#upload-gallery-images", function(){
          $('#gallery-img').empty();
          var propertyId = $(this).attr('data-id');
          $("#pid").val(propertyId);
          if ($('.alert-danger')) {
            $(".alert-danger").remove();
          }
          // get all property images
          $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '{{ route("getProerptyImages") }}',
            data    : {pid: parseInt(propertyId)},
            success : function(response) {
              if (response.status == true) {
                $('#gallery-img').append(response.data);
              }
              else{
                console.log(response.data);  
              }
            }    
        });
      });
  </script>
  @endsection