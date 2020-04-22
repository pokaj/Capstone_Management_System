@extends('layouts.faculty_layout')

@section('viewProject')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

                <div class="ml-3">
                @foreach($users as $user)
                <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                   <p> <span>Student ID: {{$user->student_Id}}</span></p>
                    <p><span>Major: {{$user->major_name}}</span></p>
                    <strong class="text-capitalize">{{$user->project_type}}: </strong> <span class="text-black-50">{{$user->project_title}}</span>
                </div>

                    {{--                Success Message--}}
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                {{--                Beginning of navigation tab--}}
                <ul class="nav nav-tabs mt-3 ml-2">
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
                        <p class="ml-3">
                            {{$user->project_desc}}
                            @endforeach
                        </p>

                    </div>
                    {{--                    End of section for viewing project description--}}


                        {{--                        Beginning of section for viewing past meetings--}}

                    <div class="tab-pane" id="pastMeeting">
                        <form method="POST" id="meetingDetails">
                            @csrf


                            <div class="col">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Select date to view details </label>
                                    <select id="meetingID" name="meetingID" type="text" class="form-control">
                                        @foreach($meetingInfo as $info)
                                        <option value="{{$info->mt_id}}">
                                                {{date("M jS, Y", strtotime($info->mt_date))}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ml-3" >Search</button>
                        </form>

                        <div class="card mt-4 ml-3">
                            <div class="card-body">
                                        <div>
                                            <label class="text-capitalize text-danger h5">Meeting Objectives:</label>
                                            <p id="objectives"></p>

                                            <label class="text-capitalize text-danger h5">Meeting Challenges:</label>
                                            <p id="challenges"></p>

                                            <label class="text-capitalize text-danger h5">Progress Summary:</label>
                                            <p id="summary"></p>

                                            <label class="text-capitalize text-danger h5">Next meeting objectives:</label>
                                            <p id="nextObjectives"></p>

                                            <label class="text-capitalize text-danger h5">Next meeting date & time:</label>
                                            <p id="nextDate"></p>
                                        </div>
                            </div>
                        </div>
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
                                            <textarea type="text" class="form-control search-input" name="currentObj" id="formWidth" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Progress Summary: </label>
                                            <textarea type="text" class="form-control search-input" name="progress" id="formWidth" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Problem Areas & Suggested Solutions: </label>
                                            <textarea type="text" class="form-control search-input" name="problems" id="formWidth" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Objectives for next meeting: </label>
                                            <textarea type="text" class="form-control search-input" name="nextObj" id="formWidth" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Next meeting date & time: </label>
                                            <input type="datetime-local" class="form-control search-input" name="nextDate" required/>
                                        </div>
                                    </div>


                                    <a href="" class="btn btn-danger ml-3" data-toggle="modal" data-target="#{{$projectInfo->project_Id}}">Close Meeting</a>

                                    <!-- modal to confirm closure of meeting-->
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
                                    <!-- end of modal to confirm closure of meeting--->

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
                                <div class="col-md-5">
                                        <form id="next" method="post">
                                            @csrf
                                        <label class="bmd-label-floating">Next Meeting Date & Time:</label>
                                        <input id="reminder" class="form-control text-danger search-input" value=" @if(count($meetingInfo) > 0) {{date("M jS, Y H:i A", strtotime($last->mt_nextDate))}}   @endif">
                                            @foreach($users as $student_ID)
                                            <input type="hidden" id="student" value="{{$student_ID->student_user_id}}">
                                            @endforeach
                                        <button class="btn btn-primary mt-2">Send Reminder</button>
                                        </form>
                                </div>
                        </div>
                        </div>

                    </div>
                    {{--                    End of section for settings next meeting--}}
                </div>
            </div>
        </div>
    </div>
@endsection
