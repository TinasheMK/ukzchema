@extends('voyager::bread.edit-add')

@php
    $claim = $dataTypeContent;
@endphp

@section('content')
@php
    use App\Models\Member;
    $member = Member::all();
    // dd($member[0]);
@endphp
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">

                    <h2 class="panel-title info-title">Admin Notification
                    </h2>
                    <div class="row">
                        <form action="/admin/admin-notifications" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 col-lg-12">

                                <div class="form-group">
                                <label for="">Target Group</label>
                                <select class="form-control" name="target_group" id="" required>
                                    <option value="selected" selected>Only Send To Select Members</option>
                                    <option value="all">Broadcast To All Members</option>
                                    <option value="board_members">Broadcast To Board Members</option>
                                    <option value="non_board_members">Broadcast To Non-Board Members</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <label for="">Title</label>
                                <input name="title" type="text" class="form-control" required>

                            </div>
                            <div class="col-12 col-lg-12">
                                <label for="">Message</label>
                                <input name="message" type="text" class="form-control" required>

                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="form-group">
                                <label for="">Target Group</label>
                                <select class="form-control" name="admin_notification_belongstomany_member_relationship[]" id="" multiple required>
                                    @foreach ($member as $m)
                                        <option value="{{$m->id}}">{{$m->first_name}} {{$m->last_name}} ({{$m->email}})</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <hr style="margin:0;">
                            <!-- <div class="col-12 col-lg-12">
                                <h4>Generate Invoice With Notification</h4>
                            </div>
                            <div class="col-12 col-lg-12">
                                <label for="">Invoice Description</label>
                                <input name="invoice_title" type="text" class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-12">
                                <label for="">Amount</label>
                                <input name="amount" type="number" class="form-control" required>
                            </div>-->
                            <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-success">{{ __('Publish Notification') }}</button>
                            </div>
                        </form>
                    </div>


                </div>

                <hr style="margin:0;">
            </div>
        </div>
    </div>
</div>

{{-- Reject Modal --}}
<div class="modal fade modal-danger" id="enter_reject_reason">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                {{-- <h4 class="modal-title"><i class="voyager-warning"></i> Rejecting <strong>{{$claim->first_name}} {{$claim->last_name}}</strong></h4> --}}
            </div>
            <form action="{{route('claim.reject')}}" method="POST" id="accept_form_paid">
                @csrf

                <div class="modal-body">
                    <h4>Please enter rejection reason and instruction:</h4>
                    <div class="form-group">
                        <textarea class="form-control" name="rejection_reason" id="rejection_reason" rows="3"></textarea>
                        <input type="hidden" name="claim_id" value="{{$claim->id}}">
                        <small>Required</small>
                    </div>
                    {{-- <p>The user will automatically deleted after 48 hours and they can re apply again</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="re_apply" value="" id="re_reg">
                        <label class="form-check-label" for="re_reg">Include re application link</label>
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="submits" class="btn btn-danger" id="">Submit & Reject
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END of reject modal --}}
@endsection
@section('javascript')
    @parent
    <script>
        $('select.select2-ajax').on('select2:open', function(){
            const res = setInterval(() => {
                $('li.select2-results__option').each(function(){
                    const text = $(this).text();
                    if(text !== 'Searching…') {
                        setTimeout(() => {
                            clearInterval(res);
                        }, 500);
                    }
                    if(text == 'not_found') $(this).remove();
                })
            }, 100);
        });
    </script>
@endsection
