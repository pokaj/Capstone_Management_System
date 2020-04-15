@component('mail::message')
# Hello {{$student}}

Your project has been approved by {{$first}} {{$last}}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
