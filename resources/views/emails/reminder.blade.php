@component('mail::message')
# Hello {{$username}},

Please be reminded of our meeting on {{$reminder}}

Thanks,<br>
{{$first}} {{$last}}
@endcomponent
