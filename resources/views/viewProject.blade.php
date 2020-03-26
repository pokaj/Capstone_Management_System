@extends('layout')

@section('viewProject')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

                @foreach($users as $user)
                <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                   <p> <span>Student ID: {{$user->student_Id}}</span></p>
                    <strong class="text-capitalize">{{$user->project_type}}: </strong> <span class="text-black-50">{{$user->project_title}}</span>

                {{--                Beginning of navigation tab--}}
                <ul class="nav nav-tabs mt-3">
                    <li class="nav-item">
                        <a href="" data-target="#description" data-toggle="tab" class="nav-link active">Project Description</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#pastMeeting" data-toggle="tab" class="nav-link">Past Meeting</a>
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
                    <div class="tab-pane" id="pastMeeting">
                        {{--                        Beginning of section for viewing past meetings--}}

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
                                <td>References</td>
                                <td>20/05/19</td>
                                <td>26/05/19</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    {{--                    End of section for viewing deliverables--}}


                        {{--                    Beginning of section for making changes to current meeting--}}
                    <div class="tab-pane" id="currentMeeting">

                        <div class="card">

                            <div class="card-body">
                                <form action="submit" method="post">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title: </label>
                                            <input type="text" class="form-control" name="title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Field: </label>
                                            <input type="text" class="form-control" name="project_field" required>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    {{--                    End of section for making changes to current meeting--}}



                    {{--                    Beginning of section for settings next meeting--}}
                    <div class="tab-pane" id="nextMeeting">

                        <p> SHEEP </p>
                    </div>
                    {{--                    End of section for settings next meeting--}}
                </div>
            </div>
        </div>
    </div>
@endsection
