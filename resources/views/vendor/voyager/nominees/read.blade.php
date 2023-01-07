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
    $nominee = $dataTypeContent;
@endphp

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">

                <hr style="margin:0;">
                <h4 class="panel-title info-title">Nominees Details</h4>

                {{-- @foreach ($applicant->nominees as $key=>$nominee) --}}

                    @php
                        $nominee = (object)$nominee;
                    @endphp

                    @if (isset($nominee->full_name))
                        {{-- @if (count($applicant->nominees) > 1)
                            <p class="panel-title">Nominee {{$key + 1}}</p>
                        @endif --}}
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
                {{-- @endforeach --}}


                <div class="panel-footer">
                    {{-- <p class="panel-title" style="font-weight: bold">Applicant has already been {{ $applicant->status }}
                        <i class="voyager-check"></i>
                    </p> --}}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" id="accept_applicant" class="btn btn-danger">{{ __(' Mark Deceased') }}</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {{-- <button type="button" id="accept_applicant_paid" class="btn btn-primary">{{ __('Accept Without Payment') }}</button> --}}
                    <br>
                    <small>NOMINEE WILL BE MOVED TO DECEASED MEMBERS</small>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Deceased Form --}}
{{-- <form action="{{route('nominee.deceased')}}" method="POST" id="accept_form">
    @csrf
    <input type="hidden" name="nominee_id" value="{{$nominee->id}}">
</form> --}}

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
                <h4 class="modal-title"><i class="voyager-warning"></i> Marking Nominee As Deceased <strong>{{$applicant->first_name}} {{$applicant->last_name}}</strong></h4>
            </div>

            <div class="modal-body">
                <h4>Please enter the date of death:</h4>
                <form action="{{route('nominee.deceased')}}" method="POST" id="deceased_form">
                    @csrf
                    <div class="form-group">
                        <input type="date" name="dod" required>
                        <input type="hidden" name="nominee_id" value="{{$nominee->id}}">
                        <small>Required</small>
                    </div>
                </form>
                <p>The nominee will be automatically removed from the member's nominees and from the nominees list.</p>
                {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="re_apply" value="" id="re_reg">
                    <label class="form-check-label" for="re_reg">Include re application link</label>
                </div> --}}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger" id="confirm_deceased">Confirm Deceased
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
            // $('form#accept_form').submit();
            $('#enter_reject_reason').modal('show');
        });

        $('#confirm_deceased').on('click', function(){
            $('form#deceased_form').submit();
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
