@extends('member.master')

@section('page')
My Profile
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="{{asset('storage/bg/profile-bg.jpg')}}" alt>
            </div>
            <div class="card-body">
                <div class="author">
                    <a href="javascript:;">
                        <img class="avatar border-gray" src="{{asset('storage/users/default.png')}}" alt="...">
                        <h5 class="title">{{Auth::user()->name}}</h5>
                    </a>
                    <p class="description">
                        Membership ID: <strong>{{$profile->id}}</strong>
                    </p>
                    <p class="description text-center">
                        {{$profile->bio}}
                    </p>
                </div>
            </div>
            {{-- <div class="card-footer">
                <hr>
                <div class="button-container">
                    <div class="row">
                        <div class="col-6">
                        <h5>{{$member->donated_count}}<br><small>Donation{{$member->donated_count === 1 ? '' : 's'}}</small></h5>
                        </div>
                        <div class="col-6">
                            <h5>£{{$member->balance}}<br><small>Balance</small></h5>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
    <div class="col-md-8">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card card-user mb-5">
            <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
            </div>
            <div class="card-body">
                <form action="{{route('members-area.profile')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Membership ID</label>
                                <input type="text" class="form-control" disabled="" value="{{$profile->id ?? 0}}">
                                <input type="hidden" name="membership_Id" value="{{$profile->id ?? 0}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" value="{{$profile->phone}}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input name="email" type="email" class="form-control" value="{{$profile->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="first_name" type="text" class="form-control"
                                    value="{{$profile->first_name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Middle Names</label>
                                <input name="middle_names" type="text" class="form-control"
                                    value="{{$profile->middle_names}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="last_name" type="text" class="form-control"
                                    value="{{$profile->last_name}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input name="street" type="text" class="form-control" value="{{$profile->dob}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Date of Registration</label>
                                <input name="street" type="text" class="form-control" value="{{$profile->created_at}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Street</label>
                                <input name="street" type="text" class="form-control" value="{{$profile->street}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                <input name="city" type="text" class="form-control" value="{{$profile->city}}">
                            </div>
                        </div>
                        <country-picker classes="col-md-4" value="{{$profile->country}}"></country-picker>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>POSTCODE</label>
                                <input name="zip" type="text" class="form-control" value="{{$profile->zip}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea name="bio" class="form-control textarea"
                                    placeholder="Your Bio...">{{$profile->bio}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection