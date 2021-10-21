@extends('front_end.parent')
@section('body')
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h3>Pricing</h3>
                        <div class="breadcrumb-option">
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Pricing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- Seller Image Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="{{asset('assets/front_end/img/seller/seller.jpg')}}">
            </div>
            </div>
        </div>
        <div class="thumbnail-pic">
            <div class="thumbs owl-carousel" style="display: none;">
                
            </div>
        </div>
    </section>
    </br>
    <div class="col-sm-12 text-center" style="margin-bottom: 7em;">
        <div class="row">
        @foreach ($plans as $plan)
          <div class="col-md-4">
              <ul class="price">
                <li class="header">{{$plan['plan_name']}}</li>
                <li class="grey">$ <?php echo number_format($plan['amount'],2);?> / {{$plan['interval']}}</li>
                @foreach ($plan['features'] as $feature)
                    <?php
                        if($feature['id'] == 2){
                            if($feature['value'] == 0){
                                $feature['value'] = 'No';
                            }
                            else{
                                $feature['value'] = 'Yes';   
                            }
                        }
                        else if($feature['id'] == 1 || $feature['id'] == 3){
                            if($feature['value'] == 0){
                                $feature['value'] = 'Unlimited';
                            }
                        }
                    ?>
                <li>{{$feature['value'].' - '.$feature['name']}}</li>
                @endforeach
                <li class="grey"><a target="_blank" href="{{env('APP_URL')}}/register?plan={{$plan['plan_id']}}" class="btn btn-primary btn-block">Sign Up</a></li>
              </ul>
          </div>
        @endforeach
        </div>
    </div>
@endsection
