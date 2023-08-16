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

@section('page_title', "UKZ - Review Deposit")

@section('page_header')
<h1 class="page-title">
    {{-- <i class="{{ $dataType->icon }}"></i> --}}
    {{ "Review "."Deposit" }}
</h1>
@endsection

@php
    $claim = $member;
@endphp

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <h4 class="panel-title info-title">Deposit Form
                        {{-- @if ($claim->claim_verified=='1')
                            <span class="btn btn-success">Approved</span>
                        @endif
                        @if ($claim->claim_verified==null)
                            <span class="btn btn-info">Pending Approval</span>
                        @endif
                        @if ($claim->claim_verified=='rejected')
                            <span class="btn btn-danger">Rejected</span>
                        @endif --}}
                    </h4>

                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Name Of Member</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                {{-- <p>{{$claim->dob->format('d.m.Y')}}</p> --}}
                                <p>{{$claim->first_name}} {{$claim->last_name}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Id</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$claim->id}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Current Balance</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>£ {{$claim->user->balanceFloat}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <form action="{{route('deposit.manually')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12 ">
                                <div class="">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">Deposit Amount (	&#163;)</h3>
                                    </div>
                                    <div class="ml-4">
                                        <input name="amount" step=".01" type="number" style="width:120px" class="form-control col-3"
                                            value="" required value="{{$claim->amount}}" placeholder="{{$claim->amount}}">

                                    </div>
                                    <input name="id" type="hidden" class="form-control"
                                        value="{{$claim->id}}" required>
                                    {{-- <small>A deposit invoice will automatically be generated</small> --}}
                                    <div class="update ml-auto ml-4 pl-4 mr-auto">
                                        <button type="submit" class="btn btn-primary btn-sm">Deposit Amount</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <hr style="margin:0;">

                </div>

                <hr style="margin:0;">


                <hr style="margin:0;">

            </div>
        </div>
    </div>
</div>

{{-- Accept Form --}}
{{-- <form action="{{route('claim.accept')}}" method="POST" id="accept_form">
    @csrf
    <input type="hidden" name="claim_id" value="{{$claim->id}}">
</form> --}}

{{-- Accept Form --}}
{{-- <form action="{{route('claim.acceptpaid')}}" method="POST" id="accept_form_paid">
    @csrf
    <input type="hidden" name="claim_id" value="{{$claim->id}}">
</form> --}}

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
{{-- <script>
    $('document').ready(function () {

        var params = {
            slug: '{{ $dataType->slug }}',
            claim_id: '{{ $claim->id }}',
            _token: '{{ csrf_token() }}'
        }

        $("#rejection_reason").on("keyup", function() {
            params['rejection_reason'] = $(this).val();
        });

        $('#reject_claim').on('click', function(){
            $('#enter_reject_reason').modal('show');
        });


        $('#accept_claim').on('click', function(){
            $('form#accept_form').submit();
        });

        $('#accept_claim_paid').on('click', function(){
            $('form#accept_form_paid').submit();
        });

        $('#confirm_reject').on('click', function(){

            if(!params.rejection_reason || params.rejection_reason == ""){
                toastr.error("Rejection reason is required");
                return;
            }

            $.post('{{ route('claim.reject', $claim->id) }}', params, function (response) {
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
</script> --}}
@endsection
