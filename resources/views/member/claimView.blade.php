@extends('member.master')

@section('page')
Claims
@endsection

@section('content')
<div class="row">
    <div class="card card-user mb-12">
        <div class="card-header">
            <h5 class="card-title">Claim Form</h5>
        </div>
        <div class="card-body">
            <form action="{{route('members-area.profile')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Membership ID</label>
                            <input type="text" class="form-control" disabled="" value="">
                            <input type="hidden" name="membership_Id" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fullname of Claimant </label>
                            <input name="phone" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="email">Member Fullname</label>
                            <input name="email" type="email" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Deceased Person Fullname</label>
                            <input name="first_name" type="text" class="form-control"
                                value="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Relationship With Deceased</label>
                            <input name="middle_names" type="text" class="form-control"
                                value="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country of Death</label>
                            <input name="last_name" type="text" class="form-control"
                                value="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date of Death</label>
                            <input name="last_name" type="text" class="form-control"
                                value="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Claimant Phone Number</label>
                            <input name="last_name" type="text" class="form-control"
                                value="" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Proof of ID</label>
                            <input name="last_name" type="file" class="form-control"
                                value="" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Proof of Address</label>
                            <input name="last_name" type="file" class="form-control"
                                value="" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Air Tickets</label>
                            <input name="last_name" type="file" class="form-control"
                                value="" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Passport Date Stamp</label>
                            <input name="last_name" type="file" class="form-control"
                                value="" >
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
