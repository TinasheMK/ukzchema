@component('mail::message')
# Hello {{$member->first_name}},

#### New Message from UKZ Board

## {{$notification->title}}
<br>
{{$notification->message}}

@component('mail::button', ['url' => $link, 'color' => "info"])
{{$action}}
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent