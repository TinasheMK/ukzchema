@extends('master')

@section('page')
Chema Constitution
@endsection

@section('content')
<bread-crumb :page="'Chema Constitution'" :bread="['Home', 'Chema Constitution']"></bread-crumb>
<div class="section-padding-120">
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-12 col-sm-10 col-md-8">
            <div class="single-blog-details-area">
                <div class="post-date mb-2"> <strong>Last Update:</strong> {{$constitution->updated_at->format('d M Y')}}</div>
                {!!$constitution->content!!}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection