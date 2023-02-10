@component('mail::message')
# {{$moreData['type']}}

Your four-digit verification code is <h4>{{$moreData['otp']}}</h4>
<p>Please do not share your One Time Pin With Anyone. You made a request to reset your password. Please discard if this wasn't you.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
