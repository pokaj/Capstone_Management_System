@component('mail::message')
# Hello {{$facutly_username}},

<p> <span class="text-capitalize">{{$student_first_name}} {{$student_last_name}}</span> just applied for the project with title:</p>
<strong>{{$project_title}}</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
