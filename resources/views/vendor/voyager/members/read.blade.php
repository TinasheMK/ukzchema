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
    <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
        <span class="glyphicon glyphicon-pencil"></span>&nbsp;
        {{ __('voyager::generic.edit') }}
    </a>
    @endcan

    @can('delete', $dataTypeContent)
    @if($isSoftDeleted)
    <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}"
        title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore"
        data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
        Restore
        <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
    </a>
    jk
    <div>akjsdjkasdj</div>
    @else
    <a href="javascript:;" title="Terminate" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}"
        id="delete-{{ $dataTypeContent->getKey() }}">
        <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Terminate</span>
    </a>
    @endif
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
                <li role="presentation"><a href="#nok" aria-controls="nok" role="tab" data-toggle="tab">Next Of Kin</a>
                </li>
                <li role="presentation"><a href="#nominees" aria-controls="nominees" role="tab"
                        data-toggle="tab">Nominees</a>
                </li>
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
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Joined Date</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->created_at->format('Y-m-d')}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Date of Birth</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{$member->dob->format('d.m.Y')}}</p>
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
                    <div class="row">
                    <div class="col-12 col-md-4 px-0">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Balance</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>£{{$member->user->balanceFloat}}</p>
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
                                <p>{{$member->nok_dob->format('d.m.Y')}}</p>
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
                <div role="tabpanel" class="tab-pane" id="nominees">
                    <div class="row">
                        <div class="col-md-12 mx-0 px-0">
                            <div class="panel panel-bordered">
                                <div class="panel-body p-1">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-hover" style="min-height: 150px">
                                            <thead>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Zimbabwean By</th>
                                                    <th>Date of Birth</th>
                                                    <th>Updated At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($member->nominees as $nominee)
                                                    <tr>
                                                        <th scope="row" class="text-capitalize">{{$nominee->full_name}}</th>
                                                        <td>{{$nominee->email ?? ''}}</td>
                                                        <td class="text-capitalize">{{$nominee->zimbabwean_by}}</td>
                                                        <td>{{$nominee->dob}}</td>
                                                        <td>{{$nominee->updated_at}}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">No nominee added</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
