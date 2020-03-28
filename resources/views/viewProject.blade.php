@extends('layout')

@section('viewProject')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

                @foreach($users as $user)
                <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                   <p> <span>Student ID: {{$user->student_Id}}</span></p>
                    <p><span>Major: {{$user->major_name}}</span></p>
                    <strong class="text-capitalize">{{$user->project_type}}: </strong> <span class="text-black-50">{{$user->project_title}}</span>

                    {{--                Success Message--}}
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                {{--                Beginning of navigation tab--}}
                <ul class="nav nav-tabs mt-3">
                    <li class="nav-item">
                        <a href="" data-target="#description" data-toggle="tab" class="nav-link active">Project Description</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#pastMeeting" data-toggle="tab" class="nav-link">Past Meetings</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#currentMeeting" data-toggle="tab" class="nav-link">Current Meeting</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#nextMeeting" data-toggle="tab" class="nav-link">Next Meeting</a>
                    </li>
                </ul>
                {{--                End of navigation tab--}}

                <div class="tab-content py-4">

                    {{--                        Beginning of section for viewing project description--}}
                    <div class="tab-pane active" id="description">
                        <p>
                            {{$user->project_desc}}
                            @endforeach
                        </p>

                    </div>
                    {{--                    End of section for viewing project description--}}


                        {{--                        Beginning of section for viewing past meetings--}}

                    <div class="tab-pane" id="pastMeeting">

                    <table class="table table-striped bg-light text-center">
                            <thead class="thead-dark">
                            <tr class="text-muted">

                                <th>Date</th>
                                <th>Deliverables</th>
                                <th>Details</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                @foreach($meetingInfo as $info)
                                <td>{{date("M jS, Y", strtotime($info->mt_date))}}</td>
                                <td>{{$info->mt_objective}} </td>
                                <td>{{$info->mt_sumofprogress}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
                    {{--                    End of section for viewing deliverables--}}


                        {{--                    Beginning of section for making changes to current meeting--}}
                    <div class="tab-pane" id="currentMeeting">

                        <div class="card">

                            <div class="card-body">
                                @foreach($users as $projectInfo)
                                <form action="{{route('createMeeting',['studentID'=>$projectInfo->student_user_id, 'projectID'=>$projectInfo->project_Id])}}" method="post">
                                    @csrf
                                    <span class="ml-3 ">Current Meeting Date:</span> <span class="text-danger">{{date("M jS, Y", strtotime(now()))}}</span>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Objective for Period: </label>
                                            <textarea type="text" class="form-control" name="currentObj" id="formWidth" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Progress Summary: </label>
                                            <textarea type="text" class="form-control" name="progress" id="formWidth" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Problem Areas & Suggested Solutions: </label>
                                            <textarea type="text" class="form-control" name="problems" id="formWidth" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Objectives for next meeting: </label>
                                            <textarea type="text" class="form-control" name="nextObj" id="formWidth" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Date of next meeting: </label>
                                            <input type="date" class="form-control" name="nextDate" required></input>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Venue: </label>
                                            <input type="text" class="form-control" name="venue" required></input>
                                        </div>
                                    </div>

                                    <a href="" class="btn btn-danger ml-3" data-toggle="modal" data-target="#{{$projectInfo->project_Id}}">Close Meeting</a>

                                    <!-- beginning of modal to delete project-->
                                    <div class="modal fade" id="{{$projectInfo->project_Id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title font-weight-bold">Are you sure you want to close this meeting?
                                                    </p><br>

                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body align-content-center">
                                                    <form method="post" action="">
                                                        @csrf
                                                        <button class="btn btn-danger">close</button>
                                                        <button class="btn btn-dark" data-dismiss="modal">cancel</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of modal to delete project-->

                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--                    End of section for making changes to current meeting--}}


                    {{--                    Beginning of section for settings next meeting--}}
                    <div class="tab-pane" id="nextMeeting">
                        <div class="card">
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="bmd-label-floating">Next Meeting Date:</span>
                                        <span class="text-danger">{{date("M jS, Y", strtotime($last->mt_nextDate))}}</span>
                                        <button class="btn btn-primary mt-2">Send Reminder</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        </div>

                    </div>
                    {{--                    End of section for settings next meeting--}}
                </div>
            </div>
        </div>
    </div>
@endsection
