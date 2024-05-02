@component('mail::message')
<h3>{{$details['introduction']}}</h3>

{{$details['body']}}

@component('mail::button', ['url' => $details['link']])
Proceed To Password Reset
@endcomponent

<br>
Note : This is an auto generated email from {{ config('app.name') }}
@endcomponent
