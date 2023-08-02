@extends('member.master')

@section('page')
Member
@endsection

@section('content')
<div class="row">
    @if (Auth::user()->role_id==1)
        <div class="col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-single-02 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Members</p>
                                <p class="card-title">{{$members_count}}<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        Update Now
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-money-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Transactions</p>
                            <a href="{{route("members-area.deposits")}}" class="card-title">View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-calendar-o"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- column -->
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title"><i class="nc-icon nc-sound-wave"></i> Latest Obituaries</h4>
            </div>
            <div class="comment-widgets">
                @forelse ($obituaries as $key => $obituary)
                <div class="d-flex flex-row mb-3 mt-0">
                    <div class="p-2"><img src="{{asset('storage/'.$obituary->photo)}}" alt width="50"
                            class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">{{$obituary->full_name}}
                            @if ($obituary->hasPaid())
                                <span class="badge badge-success">Donated</span>
                            @endif
                        </h6>
                        <span class="m-b-15 d-block">
                            {{str_limit($obituary->biography)}}
                        </span>
                        <div class="comment-footer pr-2">
                            <span class="text-muted float-right">{{format_date($obituary->created_at, 'M d Y')}}</span>
                            <a href="{{route('members-area.obituary-show', $obituary->id)}}"
                                class="btn btn-info btn-sm">
                                @if ($obituary->hasPaid())
                                    View
                                @else
                                    Donate
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                    @if ($obituaries->count() > 1 && $key < $obituaries->count() - 1)
                    <hr>
                    @endif
                @empty
                    <div class="card-body">
                        <h4 >No obituaries found</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
