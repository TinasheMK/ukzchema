@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .mt-1 {
        margin-top: 0.2rem;
    }

    .info-title {
        font-weight: bold;
    }

    .nav-tabs>li.active>a:hover {
        color: #1f1e1e;
        background-color: #62a8ea;
        border-color: transparent transparent #62a8ea;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        border: none !important;
    }
</style>
@stop

@section('page_title', "UKZ - Members ".$dataType->display_name_singular)

@php
$member = $dataTypeContent;
@endphp

@section('page_header')
<h1 class="page-title" style="margin-bottom: 20px;">
    <i class="{{ $dataType->icon }}"></i>
    {{ $dataType->display_name_singular }} - {{$member->id}}
    <br>
    @can('edit', $dataTypeContent)
    <a href="{{ route('voyager.'.'members'.'.show', $dataTypeContent->getKey()) }}" class="btn btn-success mx-4">
        <span class="glyphicon glyphicon-pencil"></span>&nbsp;
        Restore
    </a>
    @endcan

    @can('delete', $dataTypeContent)
    @endcan
</h1>

@endsection



@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab"
                        data-toggle="tab">Member Details</a></li>

            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">First Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->first_name}}</p>
                            </div>
                        </div>
                        @if ($member->middle_name)
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Middle Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->middle_name}}</p>
                            </div>
                        </div>
                        @endif
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Last Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->last_name}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Date of Birth</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                {{-- <p>{{$member->dob->format('d.m.Y')}}</p> --}}
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Email</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->email}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Phone</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->phone}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Address Line 1</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->street}}</p>
                            </div>
                        </div>
                        <div class="col-md-12 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Address Line 2</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->apartment}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">City</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->city}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">ZIP</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->zip}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Country</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->country}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="nok">
                    <div class="row">
                        <div class="col-md-12 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Full Name</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->nok_full_name}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Date of Birth</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                @if ($member->nok_dob)
                                {{-- <p>{{$member->nok_dob->format('d.m.Y')}}</p> --}}
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Email</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->nok_email}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Phone</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->nok_phone}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Address Line 1</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->nok_street}}</p>
                            </div>
                        </div>
                        <div class="col-md-12 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Address Line 2</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->nok_apartment}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">City</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->nok_city}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">ZIP</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->nok_zip ?? "--"}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Country</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->nok_country}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @if($isSoftDeleted)
        <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}"
            title="{{ __('voyager::generic.restore') }}" class="btn btn-success restore"
            data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
        </a>
        @endif
    </div>
</div>


{{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to terminate this
                        {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    {{-- <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST"> --}}
                    <form action="{{ route('delete.member',$member->id) }}" id="delete_form" method="POST">
                        {{-- {{ method_field('DELETE') }} --}}
                        {{-- {{ csrf_field() }}
                         --}}
                         @csrf
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                            value="Yes terminate! {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection


@section('javascript')
<script>
    var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            // form.action = deleteFormAction.match(/\/[0-9]+$/)
            //     ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
            //     : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

</script>
@stop
