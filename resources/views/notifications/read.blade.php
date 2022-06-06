@extends('member.master')


@section('page')
 Read - {{$notification['title'] ?? 'Notification'}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-header">
                <h4 class="card-title">{{$notification['title'] ?? 'Notification'}}</h4>
            </div>
            <div class="card-body">
                <p>{!!$notification['message']!!}</p>

                <div class="row">
                    <div>
                        <a class="btn btn-info btn-round ml-2" href="{{route('members-area.notifications')}}">Back to List</a>
                        <a class="btn btn-danger btn-round ml-2" href="{{route('members-area.notifications.delete', $notif_id)}}">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection