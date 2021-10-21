  @extends('layouts.admin-layout') 
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

    /* Delete Modal CSS */
    .modal-confirm {    
    color: #636363;
    width: 400px;
  }
  .modal-confirm .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
        text-align: center;
    font-size: 14px;
  }
  .modal-confirm .modal-header {
    border-bottom: none;   
        position: relative;
  }
  .modal-confirm h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -10px;
  }
  .modal-confirm .close {
        position: absolute;
    top: -5px;
    right: -2px;
  }
  .modal-confirm .modal-body {
    color: #999;
  }
  .modal-confirm .modal-footer {
    border: none;
    text-align: center;   
    border-radius: 5px;
    font-size: 13px;
    padding: 10px 15px 25px;
  }
  .modal-confirm .modal-footer a {
    color: #999;
  }   
  .modal-confirm .icon-box {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    border-radius: 50%;
    z-index: 9;
    text-align: center;
    border: 3px solid #f15e5e;
  }
  .modal-confirm .icon-box i {
    color: #f15e5e;
    font-size: 46px;
    display: inline-block;
    margin-top: 13px;
  }
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
    background: #60c7c1;
    text-decoration: none;
    transition: all 0.4s;
        line-height: normal;
    min-width: 120px;
        border: none;
    min-height: 40px;
    border-radius: 3px;
    margin: 0 5px;
    outline: none !important;
    }
  .modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
  .trigger-btn {
    display: inline-block;
    margin: 100px auto;
  }
  .modal-footer{
    text-align: left;
  }
  .deleteImage i{
    position: absolute;
    right: 25px;
    font-size: 22px;
    background: rgba(0,0,0,0.5);
    padding: 5px;
    color: rgba(255,0,0,0.8);
    cursor: pointer;
    border-radius: 5px;
  }
  </style>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  @endsection
   
  @section('body')

  <div class="wrapper wrapper-content custom-container-a" style='width:100%;'>

    <div class="row animated fadeInRight allproperty_header">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          
          <div class="ibox-content ">
            <div class="row m-t-sm animated fadeInRight">
              <div class="panel blank-panel">

                <div class="panel-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab-1">
                      <form action="{{route('admin.importData')}}" method="post" id="property-form">
                        {{ csrf_field() }}
                        <input type="hidden" name="file_name" value="{{$file_name}}">
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                        <input type="hidden" name="bulk_import_id" value="{{$id}}">
                        <table class="table table-striped">
                          <thead>
                            @if (isset($csv_header_fields))
                            <tr>
                                @foreach ($csv_header_fields as $csv_header_field)
                                  @if(strtolower($csv_header_field) === "investment price")
                                    <th style="min-width: 150px;">Ask Price</th>
                                  @else
                                    <th style="min-width: 150px;">{{ $csv_header_field }}</th>
                                  @endif
                                @endforeach
                            </tr>
                            @endif
                          </thead>
                          <tbody>
                            @foreach ($csv_data as $row)
                                <tr>
                                @foreach ($row as $key => $value)
                                    <td width="20%">{{ $value }}</td>
                                @endforeach
                                </tr>
                            @endforeach
                            <tr>

                              @foreach ($csv_data[0] as $key => $value)
                                <td style="min-width: 150px;">
                                  <select class="form-control" name="fields[{{ $key }}]">
                                    @foreach ($db_fields as $db_field)
                                      <?php 
                                        $arr = explode('.', $db_field); 
                                        $val = $arr[0];
                                        $val = str_replace("_"," ",$val);

                                      if(strtolower($csv_header_fields[$key]) === "brv")
                                      {
                                      ?>
                                        <option value="{{ $loop->index }}" <?php echo ($val === "brv price" ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      else if(strtolower($csv_header_fields[$key]) === "arv")
                                      {
                                      ?>
                                        <option value="{{ $loop->index }}" <?php echo ($val === "arv price" ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      else if(strtolower($csv_header_fields[$key]) === "seller share")
                                      {
                                      ?>
                                        <option value="{{ $loop->index }}" <?php echo ($val === "partnership seller" ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      else if(strtolower($csv_header_fields[$key]) === "investor share")
                                      {
                                      ?>
                                        <option value="{{ $loop->index }}" <?php echo ($val === "partnership investor" ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      else
                                      {
                                      ?>
                                        <option value="{{ $loop->index }}" <?php echo ($val === strtolower($csv_header_fields[$key]) ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      ?>
                                    @endforeach
                                  </select>
                                </td>
                              @endforeach
                            </tr>
                          </tbody>
                        </table>
                        <div class="col-md-12">
                          <div class="form-group" style="text-align: center;">
                              {!! Form::submit("Import", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']) !!}
                          </div>
                        </div>
                      </form>
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
    function DeleteModal(url){
      $("#deleteButton").attr('href',url);
      $("#DeleteModalButton").click();
    }
    $('body').on('click','.form-submit',function() {
          let ref = $(this).attr('ref');
          $(`#form${ref}`).submit();
      })
    $(document).ready(function() {
      
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
      var pro_id = '';
      $(document).on("click", "#upload-gallery-images", function(){
          $('#gallery-img').empty();
          var propertyId = $(this).attr('data-id');
          $("#pid").val(propertyId);
          if ($('.alert-danger')) {
            $(".alert-danger").remove();
          }

          $("#makecoverstatus").html('');
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
      $(document).on("click", ".cover-img", function(){
        $("#makecoverstatus").html('Updating...').delay(3000);
        $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '{{ route("makeCoverImg") }}',
            data    : {id: parseInt($(this).val()), pid: parseInt($(this).attr('data-id'))},
            success : function(response) {
              if (response.status == true) {
                $("#makecoverstatus").html('<div class="alert alert-success">'+response.data+'</div>');
              }
              else{
                console.log("error");  
              }
            }    
        });
      }); 
      
      $(document).on("click", ".deleteImage", function(){
        $("#DeleteImageButton").click();
        var id = $(this).data('id');
        var dis = $(this);
        $('#delImageButton').attr('data-id',id);
      });


      $(document).on("click", "#delImageButton", function(){
        var id = $(this).data('id');
        var dis = $(this);
        $.ajax({
          type    : 'POST',
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url     : '{{ route("deletePropertyImg") }}',
          data    : {id: id},
          success : function(response) {
            $(".close").click();
            $("#makecoverstatus").html('<div class="alert alert-success">Image removed successfully</div>');
          }
        });
        
      });
 
    });
  </script>
  @endsection