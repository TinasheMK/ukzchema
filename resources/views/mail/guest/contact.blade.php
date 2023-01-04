@component('mail::message')
# Message From:  {{$from}},
# Email   From:  {{$email}},

{{$content}}





@slot('subcopy')
### {{ config('app.name') }} Team
<small>Message from ukzchema.co.uk contact us page. You may reply this email.</small>
@endslot

@endcomponent
