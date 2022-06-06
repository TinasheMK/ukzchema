@extends('master')

@section('page')
About Us
@endsection

@section('content')
<bread-crumb :page="'About Us'" :bread="['Home', 'About Us']"></bread-crumb>
<div class="section-padding-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8">
                <div class="single-blog-details-area">
                    <p>About UKZ Chema</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection