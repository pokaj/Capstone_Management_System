@component('mail::message')
# Hello {{$facutly_username}},

<p class="text-capitalize">{{$student_first_name}} {{$student_last_name}}</p> just applied for the project with title
<strong>{{$project_title}}</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
