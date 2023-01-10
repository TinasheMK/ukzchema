@component('mail::message')
{{$message}}.


@component('mail::button', ['url' => $link, 'color' => "info"])
{{$action}}
@endcomponent

@slot('subcopy')
### {{ config('app.name') }} Team
<small>Message from ukzchema.co.uk contact us page. Do not reply this email.</small>
@endslot

@endcomponent
