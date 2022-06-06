@extends('account.index')

@section('form')
<div class="contact-area">
    <h4 class="mb-5">Edit basic information</h4>
    <form class="contact-from" action="#" method="post">
        <div class="row">
            <div class="col-12 col-lg-6">
                <input class="form-control mb-30" type="text" name="message-name" placeholder="First Name">
            </div>
            <div class="col-12 col-lg-6">
                <input class="form-control mb-30" type="text" name="message-name" placeholder="Surname">
            </div>
            <div class="col-12">
                <textarea class="form-control mb-30" name="message" placeholder="Residential Address"></textarea>
            </div>
            <div class="col-12 col-lg-6">
                <input class="form-control mb-30" type="email" name="message-email" placeholder="Date of Birth">
            </div>
            <div class="col-12 col-lg-6">
                <input class="form-control mb-30" type="text" name="message-name" placeholder="Mobile Number">
            </div>
            <div class="col-12 text-center">
                <button class="btn radix-btn" type="submit">Save Changes</button>
            </div>
        </div>
    </form>
</div>
@endsection