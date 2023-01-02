@extends('master')

@section('page')
Contact Us
@endsection

@section('content')
<bread-crumb :page="'Contact Us'" :bread="['Home', 'Contact Us']"></bread-crumb>
<div class="radix-contact-us-area my-5">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Contact Side Info-->
            <div class="col-12 col-lg-5 col-xl-4">
                {{-- <div class="contact-side-info mb-80">
                    <h5>Email: {{setting('site.contact_us_email')}}</h5>
                    <h5>Phone: {{setting('site.contact_us_phone')}}</h5>
                    <h4 class="my-4">Write to us or give us a call. We will reply to you as soon as possible. But yes,
                        it can take up to 24 hours.</h4>
                </div> --}}
            </div>
            <!-- Contact Form-->
            {{-- <div class="col-12 col-lg-7"> --}}
            <div class="col-12 col-lg-12">
                <div class="contact-form mb-80">
                    <form id="main_contact_form" action="{{route('contact.us')}}" method="POST">
                        @csrf
                        <div id="success_fail_info"></div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="name">Name:</label>
                                <input class="form-control mb-30" id="name" type="text" placeholder="Name"
                                    value="" name="name" required>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="email">Email:</label>
                                <input class="form-control mb-30" id="email" type="email"
                                    placeholder="user@example.com" name="email" value="" required>
                            </div>
                            <div class="col-12">
                                <label for="message">Message:</label>
                                <textarea name="message" class="form-control mb-30" id="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn radix-btn" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
