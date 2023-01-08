@component('mail::message')
A claim has been submitted on the UKZChema online platform. Claimant is {{$claimant}} for the deceased person {{$deceased}}.


@component('mail::button', ['url' => $link, 'color' => "info"])
{{$action}}
@endcomponent

@slot('subcopy')
### {{ config('app.name') }} Team
<small>Message from ukzchema.co.uk contact us page. Do not reply this email.</small>
@endslot

@endcomponent
