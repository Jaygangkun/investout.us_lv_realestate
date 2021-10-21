  @extends(session('layout')) 
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
              Contracted Prpoerties
            </h2>
          </div>
          <div class="ibox-content ">
            <div class="row m-t-sm animated fadeInRight">
              <div class="panel blank-panel">

                <div class="panel-body">

                  <div class="tab-content">
                    <div class="tab-pane active" id="tab-1">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Owner Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Property Address</th>
                            <th>Property City</th>
                            <th>Property State</th>
                            <th>Property Zip</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($ContractedProperties as $key=>$contracted )
                          <tr class="allproperty_row">
                            <td style="font-size: 24px;font-weight: bold;" class="text_center"><a href="{{route('investors.property.show',$contracted->property_id)}}">{{$contracted->property_id}}</a></td>
                            <td>{{$contracted->first_name." ".$contracted->last_name}}</td>
                            <td>{{$contracted->email}}</td>
                            <td>{{$contracted->phone}}</td>
                            <td>{{$contracted->address}}</td>
                            <td>{{$contracted->city}}</td>
                            <td>{{$contracted->state}}</td>
                            <td>{{$contracted->zip}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

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
  