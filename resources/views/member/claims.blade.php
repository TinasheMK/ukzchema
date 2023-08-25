@extends('member.master')

@section('page')
Claims
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="update mr-auto ml-2">
                        <h4 class="card-title">Claims</h4>
                    </div>
                    <div class="update ml-auto mr-2">
                        <a href="{{route('members-area.claim')}}" class="btn btn-primary btn-round">New Claim</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- <deposits-table :deposits="{{$claims}}"></deposits-table> --}}
                <claims-table :deposits="{{$claims}}"></claims-table>
            </div>
        </div>
    </div>
</div>
@endsection
