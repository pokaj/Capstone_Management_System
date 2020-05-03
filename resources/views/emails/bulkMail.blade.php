@component('mail::message')
# {{$subject}}

<p>{{$message}}</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
