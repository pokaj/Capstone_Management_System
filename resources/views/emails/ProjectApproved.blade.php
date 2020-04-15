@component('mail::message')
# Hello {{$student_username}}

{{$faculty_firstname}} {{$faculty_lastname}} has approved that you work on project:
{{$project_title}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
