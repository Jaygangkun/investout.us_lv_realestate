
<div class="col-md-12" style="margin-top:20px;">
    <p style="text-transform:capitalize"><a href="{{ URL::previous() }}"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
</div>
<div id="detail-progress" style='width:90%'>
  <div class="row state_title property_details_header" style="padding-left: 10px;margin:0px">
      <h1 style='color:#34a691;margin-top:15px'><b>Detail Information for ID : {{$property->id}}</b></h1>
  </div>
  <div class="row border-bottom white-bg verifybar"  style="margin:0px">
      <!--<div class="breadcrumb breadcrumb-lg m-0">

          <a class= {{ $property->acceptance_level >= 1? 'active':''}}>
              <div><span><strong>Seller Validation</strong></span></div>
          </a>
          <a class= {{ $property->acceptance_level >= 2? 'active':''}}>
              <div>
                  <span><strong>Property</strong></span>
                  <span class="active"><strong>Evaluation</strong></span>
              </div>
          </a>
          <a class= {{ $property->acceptance_level >= 3? 'active':''}}>
              <div>
                  <span><strong>Title & lines</strong></span>
                  <span ><strong>Search</strong></span>
              </div>
          </a>
          <a class= {{ $property->acceptance_level >= 4? 'active':''}}>
              <div>
                  <span><strong>Property Market</strong></span>
                  <span ><strong>Evaluation</strong></span>
              </div>
          </a>
      </div>-->
  </div>
</div>
