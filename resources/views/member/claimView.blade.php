@extends('member.master')

@section('page')
Claims
@endsection

@section('content')
<div class="row">
    <div class="card card-user mb-12">
        <div class="card-header">
            <h5 class="card-title">Claim Form</h5>
            <h4 class="panel-title info-title">
            @if ($claim->claim_verified=='1')
                <span class="btn btn-success">Approved</span>
            @endif
            @if ($claim->claim_verified==null)
                <span class="btn btn-info">Pending Approval</span>
            @endif
            @if ($claim->claim_verified=='rejected')
                <span class="btn btn-danger">Rejected</span>
            @endif
            </h4>
        </div>
        <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Membership ID</label>
                            <input type="text" class="form-control" disabled="" disabled value="{{$claim->member_number}}">
                            <input type="hidden" name="membership_Id" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fullname of Claimant </label>
                            <input name="phone" type="text" class="form-control" disabled value="{{$claim->claimant_fullname}}">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="email">Member Fullname</label>
                            <input name="email" type="email" class="form-control" disabled value="{{$claim->member_fullname}}">
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Deceased Person Fullname</label>
                            <input name="first_name" type="text" class="form-control"
                                disabled value="{{$claim->deceased_name}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Relationship With Deceased</label>
                            <input name="middle_names" type="text" class="form-control"
                                disabled value="{{$claim->relationship}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country of Death</label>
                            <input name="last_name" type="text" class="form-control"
                                disabled value="{{$claim->country_death}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date of Death</label>
                            <input name="last_name" type="text" class="form-control"
                                disabled value="{{$claim->date_death}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Claimant Phone Number</label>
                            <input name="last_name" type="text" class="form-control"
                                disabled value="{{$claim->claimant_phone}}" >
                        </div>
                    </div>

                    @if($claim->claim_verified=='rejected')
                        <div class="col-md-12 panel-footer">
                            <div class="col-12">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Rejection Reason</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p>{{$claim->rejection_reason}}</p>
                                </div>
                            </div>

                            <br>

                        </div>

                    @endif


                    <form action="{{route('members-area.claimUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="">
                                <label>Upload Death Certificate</label>
                                <input name="death_certificate" type="file" class="form-control"
                                    value="" required>
                                <input name="id" type="hidden" class="form-control"
                                    value="{{$claim->id}}" required>
                                    {{-- <small>Leave blank if not applicable</small> --}}
                            </div>
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-sm">Upload Death Certificate</button>
                            </div>
                        </div>
                    </form>


                    {{-- <div class="col-md-6">
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
                    </div> --}}
                </div>


        </div>
    </div>
</div>
@endsection
