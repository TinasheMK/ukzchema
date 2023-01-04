@extends('master')

@section('page')
Home
@endsection

@section('content')
<section class="welcome-area hero2" id="home">
  <!-- Background Shape-->
  <div class="hero-background-shape"><img src="img/core-img/hero-2.png" alt=""></div>
  <!-- Background Animation-->
  <div class="background-animation">
    <div class="star-ani"></div>
    <div class="circle-ani"></div>
    <div class="box-ani"></div>
  </div>
  <!-- Hero Circle-->
  <div class="hero2-big-circle"></div>
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-between">
      <div class="col-12 col-md-6">
        <!-- Content-->
        <div class="welcome-content pr-3">
          <h2 class="wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms">{{setting('site.landing_title')}}
          </h2>
          <p class="mb-4 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
            {{setting('site.landing_description')}} </p>
          <div class="btn-group-one wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms"><a
              class="btn radix-btn white-btn mt-3" href="{{route('apply')}}">Join Now</a>
          </div>
        </div>
      </div>
      <div class="col-10 col-md-6">
        <div class="welcome-thumb wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms"><img
            src="{{asset('storage/img/hero-2.png')}}" alt=""></div>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="border-dashed"></div>
</div>
<!-- About Area-->
<section class="about-area about2 section-padding-120">
  <div class="container">
    <!-- About Content Area-->
    <div class="about-content">
      <div class="row justify-content-between">
        <!-- Single About Area-->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-about-area text-center wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms">
            <div class="icon mx-auto"><i class="lni-pound"></i></div>
            <h4>Raise Money</h4>
            <p>UKZCHEMA pays funeral costs as per the constitution to eligible bereaved members .
                The objective is to help members meet funeral costs locally (Uk) or via the repatriation pathway to Zimbabwe.</p>
          </div>
        </div>
        <!-- Single About Area-->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-about-area text-center wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
            <div class="icon mx-auto"><i class="lni-network"></i></div>
            <h4>Social</h4>
            <p>A support network that socially encourages Zimbabwean tradition to prevail even in the UK.</p>
          </div>
        </div>
        <!-- Single About Area-->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-about-area text-center wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
            <div class="icon mx-auto"><i class="fa fa-handshake-o" aria-hidden="true"></i></div>
            <h4>Unity</h4>
            <p>UKZ encourages social cohesion by creating the spirit of togetherness (ubuntu) among Zimbabweans,
              particularly at times of
              bereavement.</p>
          </div>
        </div>
        <!-- Single About Area-->
        {{-- <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-about-area text-center wow fadeInUp" data-wow-delay="700ms" data-wow-duration="1000ms">
            <div class="icon mx-auto"><i class="lni-cart"></i></div>
            <h4>Ecommerce Solution</h4>
            <p>It's crafted with the latest trend of design & coded with all modern approaches.</p>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="border-dashed"></div>
</div>
<div class="feature-area feature4">
  <div class="feature-box-one section-padding-120-40">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-12 col-lg-6">
          <div class="feature--thumb mb-80"><img src="{{asset('storage/bg/form.png')}}" alt=""></div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="feature--text mb-80">
            <h2>Joining UKZ</h2>
            <h6>STEPS TO FOLLOW:</h6>
            <p class="mb-4" style="line-height: 1.5">
              Please read and understand UKZ's <a href="{{route('constitution')}}">Constitution</a> before submitting
              your application to join
            </p>
            <ul>
              <li class="mb-3"><i class="mr-3 lni-check-mark-circle"></i>Enter your personal details</li>
              <li class="mb-3"><i class="mr-3 lni-check-mark-circle"></i>Enter next of kin's details</li>
              <li class="mb-3"><i class="mr-3 lni-check-mark-circle"></i>Enter the list of your nominees (optional)</li>
              <li class="mb-3"><i class="mr-3 lni-check-mark-circle"></i>Accept UKZ's Terms of use & Privacy policy set
                out in our <a href="{{route('constitution')}}">constitution</a></li>
              <li class="mb-3"><i class="mr-3 lni-check-mark-circle"></i>Proceed to pay an application fee of £{{setting('member.join_fee', '13')}}
              </li>
            </ul>
            <a class="btn radix-btn white-btn mt-5" href="{{route('apply')}}">Join Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="border-dashed"></div>
  </div>
</div>

<!-- Portfolio Area-->
<section
  class="client-feedback-area d-md-flex align-items-center justify-content-between section-padding-120 bg-img bg-overlay jarallax"
  style="background-image: url('img/bg-img/7.jpg');">
  <!-- Client Feedback Heading-->
  <div class="client-feedback-heading">
    <div class="section-heading mb-0 text-right white">
      <h6>Testimonials</h6>
      <h2 class="mb-0">Our Members Feedback</h2>
    </div>
  </div>
  <!-- Client Feedback Content-->
  <div class="client-feedback-content">
    <div class="client-feedback-slides owl-carousel">
      <!-- Single Feedback Slide-->
      @foreach ($testimonials as $testimonial)
      <div class="card feedback-card bg-white">
        <div class="card-body"><i class="lni-quotation"></i>
          <p>{{$testimonial->testimony}}</p>
          <div class="client-info d-flex align-items-center">
            <div class="client-thumb"><img src="{{asset('storage/'.$testimonial->photo)}}" alt=""></div>
            <div class="client-name">
              <h6>{{$testimonial->full_name}}</h6>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Partner Area-->
<div class="container">
  <div class="border-top"></div>
</div>
<!-- Related Project Area-->
<div class="related-project-area section-padding-120">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-9 col-lg-7">
        <div class="section-heading mb-4">
          <h4>UKZ ASSOCIATION EXECUTIVE & SUPERVISORY BOARD</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- Related Project Slide-->
        <div class="related-project-slide owl-carousel">
          <!-- Single Slide-->
          @foreach ($board_members as $board)
          <div class="single-portfolio-area no-boxshadow border mt-3">
            <img src="{{asset('storage/'.$board->photo)}}" alt="">
            <div class="overlay-content">
              <div class="portfolio-title">
                <a href="portfolio-details-one.html">{{$board->member->full_name}}</a>
              </div>
              <div class="portfolio-links">
                <a class="image-popup" href="{{asset('storage/'.$board->photo)}}" data-effect="mfp-zoom-in"
                  title="{{$board->member->full_name ?? ''}}">
                  <i class="lni-play"></i></a>
                  <a href="{{$board->fb_username}}"><i class="lni-facebook-filled"></i></a>
                  <a href=""><i class="lni-telegram"></i></a>
                </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
