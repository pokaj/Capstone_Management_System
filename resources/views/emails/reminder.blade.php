@component('mail::message')
# Hello {{$username}},

<p>Please be reminded of our meeting on {{$reminder}}</p>

Thanks,<br>
{{$first}} {{$last}}
@endcomponent
