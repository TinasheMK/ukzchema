@extends('voyager::bread.browse')

@section('css')
@parent
<style>
    #dataTable_wrapper .row:first-child, #dataTable_wrapper  .row:last-child {
        display: none !important;
    }
</style>
@stop

@php
    $constitution = $dataTypeContent;
@endphp

@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
    </h1>
    @if (isset($constitution) && $constitution->count() === 0)
        @can('add', app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-edit"></i> <span>Write Constitution</span>
            </a>
        @endcan
    @endif
    
</div>
@stop