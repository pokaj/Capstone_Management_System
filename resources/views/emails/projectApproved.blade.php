@component('mail::message')
# Hello {{$student}}

{{$first}} {{$last}} has agreed that you work on project:
<p>{{$project}}</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
