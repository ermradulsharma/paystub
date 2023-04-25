@component('mail::message')
<table style="text-aling:center; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tr>
        <th style="width: 30%; border: 1px solid black; text-align: left;">Name:</th>
        <td style="width: 70%; border: 1px solid black; text-align: left;">{{$details['name']}}</td>
    </tr>
    <tr>
        <th style="width: 30%; border: 1px solid black; text-align: left;">Email:</th>
        <td style="width: 70%; border: 1px solid black; text-align: left;">{{$details['email']}}</td>
    </tr>
    <tr>
        <th style="width: 30%; border: 1px solid black; text-align: left;">Messages:</th>
        <td style="width: 70%; border: 1px solid black; text-align: left;">{{$details['message']}}</td>
    </tr>
</table>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
