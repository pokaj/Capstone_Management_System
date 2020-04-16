@component('mail::message')
# Hello {{$student_username}},

<p>{{$faculty_firstname}} {{$faculty_lastname}} has approved that you work on project:</p>
<strong>{{$project_title}}</strong>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
