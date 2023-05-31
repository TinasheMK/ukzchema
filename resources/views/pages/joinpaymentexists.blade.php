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
            <h4> Applicant already approved. Please login or contact admin.</h4>
            <!-- <div class="collapse navbar-collapse justify-content-end" id="navigation"> -->

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
