@extends('member.master')

@section('page')
Next of Kin
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Edit Next of Kin</h5>
            </div>
            <div class="card-body">
                <form action="{{route('members-area.nok')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input required name="nok_full_name" type="text" class="form-control" value="{{$nok->full_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <dob-input :unlocked="true" :name="'nok_dob'" :val="'{{$nok->dob}}'"></dob-input>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input required name="nok_email" type="email" class="form-control" value="{{$nok->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input required name="nok_phone" type="text" class="form-control" value="{{$nok->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Street</label>
                                <input required name="nok_street" type="text" class="form-control" value="{{$nok->street}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                <input required name="nok_city" type="text" class="form-control" value="{{$nok->city}}">
                            </div>
                        </div> 
                        <country-picker classes="col-md-4" value="{{$nok->country}}" input_name="nok_country"></country-picker>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ZIP</label>
                                <input name="nok_zip" type="text" class="form-control" value="{{$nok->zip}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Update Next of Kin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection