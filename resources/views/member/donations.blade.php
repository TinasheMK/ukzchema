@extends('member.master')

@section('page')
My Payments
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payments</h4>
                <p class="card-category">Total: £{{$total}}</p>
            </div>
            <div class="card-body">
                <donations-table :donations="{{$donations}}"></donations-table>
            </div>
        </div>
    </div>
</div>
@endsection
