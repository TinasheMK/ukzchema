@component('mail::message')
# Hello, {{$applicant->full_name}}.

{{$reason}}

@component('mail::button', ['url' => $link])
{{ $action }}
@endcomponent



@component('mail::subcopy')
@lang(
"If you’re having trouble clicking the \"{$action}\" button, copy and paste the URL below\n".
'into your web browser:',
[
'action' => $action,
]
) <span class="break-all">[{{ $link }}]({{ $link }})</span>
@endcomponent
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent