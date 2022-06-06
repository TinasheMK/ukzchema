@extends('account.index')

@section('form')
<div class="contact-area">
    <h4 class="mb-5">Edit notifications</h4>
    <form class="contact-from" action="#" method="post">
        <div class="row">
            <div class="group mx-2 w-100">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="email_notify" type="checkbox">
                    <label class="custom-control-label" for="email_notify">Send me notifications</label>
                </div>
                <p>Receive email as soon as the admin publish</p>
            </div>
            <div class="group mx-2 w-100">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="another" type="checkbox">
                    <label class="custom-control-label" for="another">Events notifications</label>
                </div>
                <p>Receive email if there is any event</p>
            </div>
            <div class="group mx-2 w-100">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="text_msg" type="checkbox">
                    <label class="custom-control-label" for="text_msg">Text messages</label>
                </div>
                <p>Send me messages to my cell phone</p>
            </div>
            <div class="col-12 text-center">
                <button class="btn radix-btn" type="submit">Save Changes</button>
            </div>
        </div>
    </form>
</div>
@endsection