@extends('member.master')

@section('page')
Notifications
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-3">
        <h4 class="mt-0">Notifications</h4>
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                aria-controls="v-pills-home" aria-selected="true">Admin Notifications</a>
            {{-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                aria-controls="v-pills-profile" aria-selected="false">Payment Notification</a> --}}
        </div>
    </div>
    <div class="col-sm-12 col-md-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <notifications-table :notifications="{{$admin ?? '[]'}}" :type="'Admin'"></notifications-table>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <notifications-table :notifications="{{$payment ?? '[]' }}" :type="'Payment'"></notifications-table>
            </div>
        </div>

    </div>
</div>




@endsection
