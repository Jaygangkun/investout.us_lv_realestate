@extends('front_end.parent')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section contact-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb-option">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d195600.53491226843!2d-75.2584587708038!3d40.00267626974815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c6b7d8d4b54beb%3A0x89f514d88c3e58c1!2sPhiladelphia%2C%20PA%2C%20USA!5e0!3m2!1sen!2s!4v1581955582275!5m2!1sen!2s"
                            height="700" style="border:0;" allowfullscreen=""></iframe>
                        <div class="map-inside">
                            <i class="icon_pin"></i>
                            <div class="inside-widget">
                                <h4>Philadelphia, PA</h4>
                                <ul>
                                    <!-- <li>Phone: (+1) 800 9358220</li> -->
                                    <li>Add: Philadelphia, PA</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-7 offset-lg-1">
                            <div class="contact-text">
                                <div class="section-title">
                                    <span>Contact</span>
                                    <h2>Get In Touch</h2>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('contact.send') }}" class="contact-form" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" placeholder="Name" class="form-control validate[required,custom[onlyLetterSp]]" name="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control validate[required,custom[email]]" name="email" placeholder="Email" value="{{ old('email') }}" />
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>                                    
                                    <div class="form-group">
                                        <textarea name="message" class="form-control validate[required]" cols="30" rows="6" placeholder="Message">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                        @endif
                                    </div>                                   
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_SITEKEY')}}"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>Please ensure that you are a human!</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="site-btn" name="button">Get in Touch</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
@section('script')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
$("#contact").addClass('active');
$(".contact-form").validationEngine();

</script>
@endsection

