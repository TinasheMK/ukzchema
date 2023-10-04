@component('mail::message')
# Hi {{$applicant->first_name}}, thank you for joining us,

On behalf of the **UKZ Chema Board** we welcome you to the family.

<br>
If you have not already paid click the button below to pay your Joining fee of £{{setting('member.join_fee', '100')}} and you will be redirected
to create your login password.

@component('mail::button', ['url' => route('joinpay', $applicant->id), 'color' => 'success'])
Pay Joining Fee
@endcomponent


@slot('subcopy')
### {{ config('app.name') }} Team
<small>Automated message, please do not reply</small>
@endslot

@endcomponent
