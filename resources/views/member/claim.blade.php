@extends('member.master')

@section('page')
Claims
@endsection

@section('content')
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- @if ($message)
    <div class="alert alert-info" role="alert">
        <ul>
            <li>{{ $message }}</li>
        </ul>
    </div>
    @endif --}}
    <div class="card card-user mb-12">
        <div class="card-header">
            <h5 class="card-title">Claim Form</h5>
        </div>
        <div class="card-body">
            <form action="{{route('members-area.claimStore')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Membership ID</label>
                            <input type="text"  name="member_number" class="form-control" disabled="" value="{{$member->id}}" required>
                            <input type="hidden"  name="member_number" class="form-control" value="{{$member->id}}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fullname of Claimant </label>
                            <input name="claimant_fullname" type="text" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="email">Member Fullname</label>
                            <input name="member_fullname" type="text" class="form-control" value="{{$member->first_name .' '. $member->middle_names.' '. $member->last_name}}" disabled required>
                            <input name="member_fullname" type="hidden" value="{{$member->first_name .' '. $member->middle_names.' '. $member->last_name}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Deceased Person Fullname</label>
                            <input name="deceased_name" type="text" class="form-control"
                                value="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Relationship With Deceased</label>
                            <input name="relationship" type="text" class="form-control"
                                value="" required>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country of Death</label>
                            <input name="country_death" type="text" class="form-control"
                                value="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Town of Death</label>
                            <input name="town_death" type="text" class="form-control"
                                value="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date of Death</label>
                            <input name="date_death" type="date" class="form-control"
                                value="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Claimant Phone Number</label>
                            <input name="claimant_phone" type="text" class="form-control"
                                value="" required>
                                <input name="amount" type="hidden" class="form-control"
                                    value="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Proof of ID</label>
                            <input name="proof_id" type="file" class="form-control-file"  value="" required multiple="multiple">
                            {{-- <input type="file" class="form-control-file" name="image[]" id="exampleFormControlFile1"  multiple="multiple" > --}}

                                <small>Required</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Proof of Address</label>
                            <input name="proof_address" type="file" class="form-control"
                                value="" required>
                                <small>Required</small>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Air Tickets</label>
                            <input name="air_tickets" type="file" class="form-control"
                                value="" >
                                <small>Leave blank if not applicable</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Passport Date Stamp</label>
                            <input name="passport_date" type="file" class="form-control"
                                value="" >
                                <small>Leave blank if not applicable</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label>Death Certificate</label>
                            <input name="death_certificate" type="file" class="form-control"
                                value="" >
                                <small>Provide later if unavailable</small>
                        </div>
                    </div>
                </div>

                <div class="m-3">
                    <h3>DECLARATION</h3>
                    <p>
                        Read this declaration of UKZCHEMA updated constitution using the link provided: UKZCHEMA Constitution.
                    </p>
                    <p>
                        This declaration will be used as proof of your consent for us to investigate and process your claim.
                    </p>
                    <ol>
                        <li>
                            I declare that I am the person referred to in this claim form and to the best of my knowledge and belief the information provided is true and complete. I undertake to give further assistance to UKZCHEMA in the processing of this claim.
                        </li>
                        <li>
                            I recognise that submission of this claim form does not in any way presume that UKZCHEMA will honour the claim by way of payment. Payment is subject to satisfaction of claims due process.
                        </li>
                        <li>
                            I authorise UKZCHEMA and its representatives and certain third parties using my personal and sensitive information in the processing of this claim. I confirm that I have read and understood the privacy policy.
                        </li>
                        <li>
                            I confirm that where I have provided personal data about a third party, including the deceased. I have obtained and freely given agreement of the individual(s) consent to enable UKZCHEMA and relevant third parties to use the personal data.
                        </li>
                        <li>
                            This includes any categories of personal data where practicable.
                        </li>
                        <li>
                            I have told them who UKZCHEMA are and the purpose for which their personal data will be used.
                        </li>
                        <li>
                            In the event I am made aware the agreement of the individual or individual(s) consent is withdrawn or amended for any reason I shall notify UKZCHEMA at the earliest convenience.
                        </li>
                        <li>
                            By signing this form, I am confirming that I agree with all the statements above and confirm that I have read the UKZCHEMA constitution and agree with the privacy policy document and protocol.
                        </li>
                    </ol>
                </div>

                <div class="m-3 ml-4 pl-4">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" required>
                    I agree.
                  </label>
                </div>









                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Submit Claim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
