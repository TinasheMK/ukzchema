@extends('member.master')

@section('page')
Claims
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Claims</h4>
            </div>
            <div class="card-body">
                {{-- <deposits-table :deposits="{{$claims}}"></deposits-table> --}}
            </div>
        </div>
    </div>
</div>
@endsection
