@extends('layouts.studentLayout')


@section('student_project_feedback')

    <div class="container">
{{--        <div class="row my-2">--}}
            <div id="faculty_comment">
                @include("student/faculty_comments")
            </div>


{{--        </div>--}}
    </div>



@endsection
