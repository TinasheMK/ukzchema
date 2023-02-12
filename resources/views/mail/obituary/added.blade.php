@component('mail::message')
# Hello {{$member->first_name}},

UKZ Chema Board Member has added an Obituary. Details:

<p align="center">
    <img src="{{asset('storage/'.$obituary->photo)}}" height="84" alt="{{$obituary->full_name}}">
</p>

## Members are paying £{{$obituary->donated_amount()}} excluding transaction charges

<br>**Total Amount For The Claim: £{{$obituary->goal_amount}}**
<br>**Member ID:** {{$obituary->member_id}}
<br>**Deceased Membership Type:** {{$obituary->member_type}}
<br>**Deceased Name:** {{$obituary->full_name}}
<br>**Contact** {{$obituary->phone}}
<br>
<br>**Date of Death:** <br>
{{$obituary->dod}}
<br>
Please Login to your dashboard and complete your payment.

@component('mail::button', ['url' => $link])
{{$action}}
@endcomponent

Thank You,<br>
{{ config('app.name') }} Team
@endcomponent
