@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .mt-1{
        margin-top: 0.2rem;
    }
    .info-title{
        font-weight: bold;
    }
</style>
@stop

@section('page_title', "UKZ - Review ".$dataType->display_name_singular)

@section('page_header')
<h1 class="page-title">
    <i class="{{ $dataType->icon }}"></i>
    {{ "Review ".$dataType->display_name_singular }}
</h1>
@endsection

@php
    $applicant = $dataTypeContent;
@endphp

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <h4 class="panel-title info-title">Member Details</h4>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">First Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->first_name}}</p>
                            </div>
                        </div>
                        @if ($applicant->middle_name)
                            <div class="col-12 col-lg-4">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Middle Name</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p>{{$applicant->middle_name}}</p>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Last Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->last_name}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Date of Birth</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->dob->format('d.m.Y')}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Email</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->email}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Phone</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->phone}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Address Line 1</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->street}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Address Line 2</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->apartment}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">City</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->city}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">ZIP</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->zip}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Country</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->country}}</p>
                            </div>
                        </div>
                    </div>


                    <hr style="margin:0;">
                    <h4 class="panel-title info-title">Next of Kin Details</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Full Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_full_name}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Date of Birth</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_dob->format('d.m.Y')}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Email</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_email}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Phone</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_phone}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Address Line 1</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_street}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Address Line 2</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_apartment}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">City</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_city}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">ZIP</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_zip ?? "--"}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Country</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$applicant->nok_country}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="margin:0;">
                <h4 class="panel-title info-title">Nominees Details</h4>

                @foreach ($applicant->nominees as $key=>$nominee)

                    @php
                        $nominee = (object)$nominee;
                    @endphp

                    @if (isset($nominee->full_name))
                        @if (count($applicant->nominees) > 1)
                            <p class="panel-title">Nominee {{$key + 1}}</p>
                        @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Full Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$nominee->full_name}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Email</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$nominee->email ?? ""}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Date of Birth</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ date('d.m.Y', strtotime($nominee->dob)) }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Zimbabwean By</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p style="text-transform: capitalize">{{$nominee->zimbabwean_by}}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="panel-body" style="border-bottom:0;">
                                <p style="margin-right: 15px">0 Nominees added</p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

                @if ($applicant->status === "pending")
                    <div class="panel-footer text-center">
                        {{-- Change to Approved --}}
                        <button type="button" id="accept_applicant" class="btn btn-primary">{{ __('Accept & Request Payment') }}</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" id="accept_applicant_paid" class="btn btn-primary">{{ __('Accept Without Payment') }}</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" id="reject_applicant" class="btn btn-danger">{{ __('Reject Applicant') }}</button>
                    </div>
                @else
                <div class="panel-footer">
                    <p class="panel-title" style="font-weight: bold">Applicant has already been {{ $applicant->status }}
                        <i class="voyager-check"></i>
                    </p>
                    @if ($applicant->status === "accepted")
                        <small>Waiting for the user to send payment and confirm their account</small>
                        @else
                        <small>Entry will be removed 48 hours after rejection</small>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Accept Form --}}
<form action="{{route('applicant.accept')}}" method="POST" id="accept_form">
    @csrf
    <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
</form>

{{-- Accept Form --}}
<form action="{{route('applicant.acceptpaid')}}" method="POST" id="accept_form_paid">
    @csrf
    <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
</form>

{{-- Reject Modal --}}
<div class="modal fade modal-danger" id="enter_reject_reason">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-warning"></i> Rejecting <strong>{{$applicant->first_name}} {{$applicant->last_name}}</strong></h4>
            </div>

            <div class="modal-body">
                <h4>Please enter rejection reason and instruction:</h4>
                <div class="form-group">
                    <textarea class="form-control" id="rejection_reason" rows="3"></textarea>
                    <small>Required</small>
                </div>
                <p>The user will automatically deleted after 48 hours and they can re apply again</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="re_apply" value="" id="re_reg">
                    <label class="form-check-label" for="re_reg">Include re application link</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger" id="confirm_reject">Submit & Reject
                </button>
            </div>
        </div>
    </div>
</div>
{{-- END of reject modal --}}
@endsection

@section('javascript')
<script>
    $('document').ready(function () {

        var params = {
            slug: '{{ $dataType->slug }}',
            applicant_id: '{{ $applicant->id }}',
            _token: '{{ csrf_token() }}'
        }

        $("#rejection_reason").on("keyup", function() {
            params['rejection_reason'] = $(this).val();
        });

        $('#reject_applicant').on('click', function(){
            $('#enter_reject_reason').modal('show');
        });


        $('#accept_applicant').on('click', function(){
            $('form#accept_form').submit();
        });

        $('#accept_applicant_paid').on('click', function(){
            $('form#accept_form_paid').submit();
        });

        $('#confirm_reject').on('click', function(){

            if(!params.rejection_reason || params.rejection_reason == ""){
                toastr.error("Rejection reason is required");
                return;
            }

            $.post('{{ route('applicant.reject') }}', params, function (response) {
                if(response.error){
                    toastr.error(response.message || "Error rejecting.");
                }else if(response.success){
                    toastr.success(response.message);
                    window.location.href = response.route;
                }
            });

            $('#enter_reject_reason').modal('hide');
    });
});
</script>
@endsection
