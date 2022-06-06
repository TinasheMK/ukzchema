@extends('member.master')

@section('page')
Obituaries
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-header">
                <h4 class="card-title">Obituaries</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled team-members">
                    @foreach ($obituaries as $obituary)
                        <obituary-view
                            :obituary="{{$obituary}}"
                            :lifespan="'{{format_date($obituary->dob, 'd M Y').' ~ '.format_date($obituary->dod, 'd M Y')}}'"
                            :donated="'{{$obituary->hasPaid()}}'"
                            :user="{{$user}}"
                            :route="'{{route('members-area.obituary')}}'"></obituary-view>
                    @endforeach
                    @if ($obituaries->total() === 0)
                        <li>No obituaries available</li>
                    @endif
                </ul>
                @if ($obituaries->total() > 0)
                    <div class="justify-content-center">
                        {{ $obituaries->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
