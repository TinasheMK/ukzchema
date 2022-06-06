@component('mail::message')
# Payment received successfully.

Transaction Ref: #{{$trxn_ref}}

If you haven't setup your password you can complete below.

@component('mail::button', ['url' => $complete])
Setup Password
@endcomponent

@slot('subcopy')
### {{ config('app.name') }} Team
<small>Automated message, please do not reply</small>
@endslot

@endcomponent
