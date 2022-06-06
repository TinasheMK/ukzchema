@extends('member.master')

@section('page')
Deposits
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Deposits</h4>
            </div>
            <div class="card-body">
                <deposits-table :deposits="{{$deposits}}"></deposits-table>
            </div>
        </div>
    </div>
</div>
@endsection