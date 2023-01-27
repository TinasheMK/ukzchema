@extends('member.master')

@section('page')
Claims
@endsection

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <h4 class="panel-title info-title">Claim Form
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
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Date Submitted</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->date}}</p>
                            </div>
                        </div>
                        @if ($claim->date_death)
                            <div class="col-12 col-lg-4">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Date of Death</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p>{{$claim->date_death}}</p>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Claimant Fullname</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->claimant_fullname}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Relationship with Deceased</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                {{-- <p>{{$claim->dob->format('d.m.Y')}}</p> --}}
                                <p>{{$claim->relationship}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Country Of Death</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->country_death}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Town Of Death</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->town_death}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Claimant Phone Number</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->claimant_phone}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <form action="{{route('members-area.claimUpdate')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12 ">
                                <div class="">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">Claim Amount (	&#163;)</h3>
                                    </div>
                                    <div class="ml-4">
                                        <input name="amount" type="number" style="width:120px" class="form-control col-3"
                                            value="" required value="{{$claim->amount}}" placeholder="{{$claim->amount}}">

                                    </div>
                                    <input name="id" type="hidden" class="form-control"
                                        value="{{$claim->id}}" required>
                                </div>
                                <div class="update ml-auto ml-4 mr-auto">
                                    <button type="submit" class="btn btn-primary btn-sm">Set Claim Amount</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Member Fullname</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->member_fullname}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Member Number</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->member_number}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Deceased Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->deceased_name}}</p>
                            </div>
                        </div>
                    </div>


                    <hr style="margin:0;">

                </div>

                <hr style="margin:0;">

                <div class="panel-footer">
                    <p class="panel-title" style="font-weight: bold">Claim Documents
                        <i class="voyager-check"></i>
                    </p>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    @if ($claim->proof_address)
                        <a href="/store/app/public/uploads/{{$claim->member_number}}/{{$claim->proof_address}}"  class="btn btn-primary">{{ __('Proof of Address') }}</a>
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    @if ($claim->proof_id)

                        <a href="/store/app/public/uploads/{{$claim->member_number}}/{{$claim->proof_id}}"  class="btn btn-primary">{{ __('Proof of Identification') }}</a>
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    @if ($claim->passport_date)

                        <a href="/store/app/public/uploads/{{$claim->member_number}}/{{$claim->passport_date}}"  class="btn btn-primary">{{ __('Passport Stamp Date') }}</a>
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    @if ($claim->death_certificate)

                        <a href="/store/app/public/uploads/{{$claim->member_number}}/{{$claim->death_certificate}}"  class="btn btn-primary">{{ __('Death Certificate') }}</a>
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    @if ($claim->air_tickets)

                        <a href="/store/app/public/uploads/{{$claim->member_number}}/{{$claim->air_tickets}}"  class="btn btn-primary">{{ __('Air Tickets') }}</a>
                    @endif
                    <br>

                </div>

                <hr style="margin:0;">

                @if ($claim->claim_verified== false)

                    <div class="panel-footer">
                        <p class="panel-title" style="font-weight: bold">Approve Claim
                            {{-- <i class="voyager-check"></i> --}}
                        </p>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{route('claim.approve', 1)}}"  class="btn btn-success">{{ __('Approve Claim') }}</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="reject_claim"  class="btn btn-danger">{{ __('Reject Claim') }}</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            {{-- <a href=""  class="btn btn-success">{{ __('Decline Claim') }}</a> --}}

                        <br>

                    </div>
                @endif
                @if($claim->claim_verified=='1')
                    <div class="panel-footer">
                        <p class="panel-title" style="font-weight: bold">Claim Approved
                            <i class="voyager-check"></i>
                        </p>

                        <br>

                    </div>

                @endif
                @if($claim->claim_verified=='rejected')
                    <div class="panel-footer">
                        <div class="col-12 col-lg-4">
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
            </div>
        </div>
    </div>
</div>

{{-- Reject Modal --}}
<div class="modal fade modal-danger" id="enter_reject_reason">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                {{-- <h4 class="modal-title"><i class="voyager-warning"></i> Rejecting <strong>{{$claim->first_name}} {{$claim->last_name}}</strong></h4> --}}
            </div>
            <form action="{{route('claim.reject')}}" method="POST" id="accept_form_paid">
                @csrf

                <div class="modal-body">
                    <h4>Please enter rejection reason and instruction:</h4>
                    <div class="form-group">
                        <textarea class="form-control" name="rejection_reason" id="rejection_reason" rows="3"></textarea>
                        <input type="hidden" name="claim_id" value="{{$claim->id}}">
                        <small>Required</small>
                    </div>
                    {{-- <p>The user will automatically deleted after 48 hours and they can re apply again</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="re_apply" value="" id="re_reg">
                        <label class="form-check-label" for="re_reg">Include re application link</label>
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="submits" class="btn btn-danger" id="">Submit & Reject
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END of reject modal --}}
@endsection
@section('javascript')
    @parent
    <script>
        $('select.select2-ajax').on('select2:open', function(){
            const res = setInterval(() => {
                $('li.select2-results__option').each(function(){
                    const text = $(this).text();
                    if(text !== 'Searching…') {
                        setTimeout(() => {
                            clearInterval(res);
                        }, 500);
                    }
                    if(text == 'not_found') $(this).remove();
                })
            }, 100);
        });
    </script>
@endsection
