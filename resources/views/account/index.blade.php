@extends('master')

@section('page')
Account | jmunapo
@endsection
{{-- http://mythemestore.com/friend-finder/edit-profile-basic.html --}}
@section('content')
<bread-crumb></bread-crumb>
<div class="radix--blog--area py-5">
    <div class="container">
        <div class="row justify-content-center justify-content-between">
            <div class="col-12 col-md-4 mb-2 mb-md-0">
                <account-sidebar></account-sidebar>
            </div>
            <div class="col-12 col-md-8">
                @yield('form')
            </div>
        </div>
    </div>
</div>
@endsection