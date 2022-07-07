@extends('member.master')

@section('page')
Change Password
@endsection

@section('content')
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
            <h5 class="card-title">Change Password</h5>
        </div>
        <div class="card-body">
            <form action="{{route('members-area.password')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input required name="old_password" type="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>New Password (Password should containa at least a number, upper case and lower case letters )</label>
                            <input required name="new_password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input required name="new_password_confirmation" type="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Change Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
