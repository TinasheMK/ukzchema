@extends('master')

@section('page')
Sign In
@endsection

@section('content')
<div class="register-area section-padding-120-70">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <!-- Register Thumbnail-->
      <div class="d-none d-lg-block col-12 col-lg-6">
        <div class="register-thumbnail mb-50"><img src="{{asset('storage/bg/login.png')}}" alt=""></div>
      </div>
      <!-- Register Card-->
      <div class="col-12 col-lg-6">
       @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card register-card bg-gray p-1 p-sm-4 mb-50">
          <div class="card-body">
            <h5>Joining fee payment: </h5>
            <h4> {{$applicant->first_name}} {{$applicant->last_name}}</h4>
            <!-- <div class="collapse navbar-collapse justify-content-end" id="navigation"> -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a type="button" data-toggle="modal" data-target="#joiningPaymentModal"
                        class="nav-link btn btn-success btn-sm" href="javascript:;">
                        <i class="nc-icon nc-share-66"></i>
                        Make payment
                    </a>
                </li>
            </ul>
        <!-- </div> -->
            <!-- Register Form-->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<joining-payment-modal
            :user="{{$applicant}}"
            :client_id="'{{env('PAYPAL_CLIENT')}}'"
            :route="'{{route('application.submit_deposit', $applicant->id)}}'">
            @csrf
        </joining-payment-modal>
@endsection
