@extends('member.master')

@section('page')
{{$obituary->full_name}} - Obituary
@endsection

@section('content')
<div class="alert alert-primary alert-dismissible fade show">
    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <i class="nc-icon nc-simple-remove"></i>
    </button>
    <span>Members are paying <strong class="ml-2 h6">£{{$obituary->minAmount()}}</strong></span>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="obituary-img" style="background: url({{asset('storage/'.$obituary->photo)}})"></div>
            <div class="card-body text-center pb-0">
                <h5 class="h6 mb-3">{{format_date($obituary->dob, 'd M Y').' ~ '.format_date($obituary->dod, 'd M Y')}}</h5>
            </div>
            @if (!$obituary->hasPaid())
                <div class="card-footer pt-0">
                    <donate-button :client_id="'{{env('PAYPAL_CLIENT')}}'" :min="{{$obituary->minAmount()}}" :obituary="{{$obituary}}"
                        :route="'{{route('members-area.submit_donation')}}'" :user="{{$user}}">
                        @csrf
                    </donate-button>
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-7 mb-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{$obituary->full_name}}</h5>
            </div>
            <div class="card-body">
                <p class="description">{{$obituary->biography}}</p>
                <hr>
                <h6>Funeral Information:</h6>
                <p class="description">{{$obituary->funeral_info}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
