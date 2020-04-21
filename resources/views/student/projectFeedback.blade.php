@extends('layouts.studentLayout')


@section('student_project_feedback')

    <div class="container">
        <div class="row my-2">
{{--            <div class="col-lg-8 order-lg-2">--}}

        <h3 class="text-muted mb-3 mt-3">Feedback from faculty</h3>
        <table class="table text-center table-hover">
            <thead class="table-dark">
            <tr>
                <th class="text-capitalize"> faculty name</th>
                <th class="text-capitalize">department</th>
                <th class="text-capitalize">view comments</th>
                <th class="text-capitalize">date</th>
            </tr>

            </thead>
            <tbody id="faculty_comment">
            @foreach($feedback as $faculty_feedback)
                <tr>
                <td class="text-capitalize"> {{$faculty_feedback->first_name}} {{$faculty_feedback->last_name}} </td>
                <td class="text-capitalize">{{$faculty_feedback->department_name}}</td>
                <td class="text-capitalize"><a href="###" data-toggle="modal" data-target="#{{$faculty_feedback->feedback_Id}}" ><i class="fas fa-eye text-muted"></i></a></td>
                <td class="text-capitalize">{{date("M jS, Y", strtotime($faculty_feedback->date))}}</td>
            </tr>

                <div class="modal fade" id="{{$faculty_feedback->feedback_Id}}">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                               <p class="text-capitalize">{{$faculty_feedback->first_name}} {{$faculty_feedback->last_name}}</p>

                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body align-content-center">

                                {{$faculty_feedback->comments}}

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>

{{--            </div>--}}
        </div>
    </div>



@endsection
