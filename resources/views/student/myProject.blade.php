@extends('layouts.studentLayout')

@section('myProject')

    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

                <div class="ml-3">
                    @foreach($projectDetails as $projectDetail)
                        <label class="h3 text-black-50"> Supervisor </label><span class="h5"> : {{$projectDetail->first_name}} {{$projectDetail->last_name}}</span><br>
                        <label class="h3 text-black-50">Topic </label> <span class="h5"> : {{$projectDetail->project_title}}</span>
                        @endforeach
                </div>

                {{--                Beginning of navigation tab--}}
                <ul class="nav nav-tabs mt-3 ml-2">
                    <li class="nav-item">
                        <a href="" data-target="#description" data-toggle="tab" class="nav-link active">Project Description</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#pastMeeting" data-toggle="tab" class="nav-link">Past Meetings</a>
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
                            @foreach($projectDetails as $projectDetail)
                            {{$projectDetail->project_desc}}
                            @endforeach
                        </p>

                    </div>
                    {{--                    End of section for viewing project description--}}


                    {{--                        Beginning of section for viewing past meetings--}}

                    <div class="tab-pane" id="pastMeeting">
                        <form method="POST" id="meetingDets">
                            @csrf


                            <div class="col">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Select date to view details </label>
                                    <select id="meetID" name="meetingID" type="text" class="form-control">
                                        @foreach($meetingInfo as $meetingInfos)
                                            <option value="{{$meetingInfos->mt_id}}">
                                                {{date("M jS, Y", strtotime($meetingInfos->mt_date))}}
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



                    {{--                    Beginning of section for settings next meeting--}}
                    <div class="tab-pane" id="nextMeeting">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    @csrf
                                    <div class="">
                                        <div class="form-group">
                                            <label class="bmd-label-floating text-danger text-capitalize h5">next meeting date & time:</label><br>
                                            @if(count($meetingInfo) > 0)
                                                <span>{{date("M jS, Y H:i A", strtotime($nextMeeting->mt_nextDate))}} </span>
                                            <br><br>

                                            <p class="text-capitalize text-danger h5">Objectives for next meeting: </p>
                                            <span>{{$nextMeeting->mt_objnxtperiod}}</span>
                                                @endif



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


