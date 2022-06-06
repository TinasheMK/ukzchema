@extends('member.master')

@section('page')
Nominees
@endsection

@section('content')
<div class="col-12">
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <nominees-form :maximum_nominees="{{setting('member.max_nominees', 4)}}" :can_update="'{{ $can_update }}'" :route="'{{route('members-area.nominees')}}'" :nominees="{{$nominees}}">
        @csrf
    </nominees-form>
</div>

@endsection