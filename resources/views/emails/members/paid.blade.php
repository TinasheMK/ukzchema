@component('mail::message')
# Hello, {{$user->name}}!

Thank you for your {{$order->description}} of £{{$donation->amount}}

Payment Ref: {{$payment->orderID}}

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
