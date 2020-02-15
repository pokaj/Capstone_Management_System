@extends('layout')

@section('topics')

    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

{{--                Beginning of navigation tab--}}
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#student_topics" data-toggle="tab" class="nav-link active">Student Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#my_topics" data-toggle="tab" class="nav-link">My Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#add_topic" data-toggle="tab" class="nav-link">Add Project</a>
                    </li>
                </ul>
                {{--                End of navigation tab--}}

                <div class="tab-content py-4">

                    <div class="tab-pane active" id="student_topics">
                        {{--                        Beginning of section for viewing student topics--}}

                        <h3 class="text-muted mb-3 mt-3">Student Projects</h3>

                        <table class="table text-center table-dark table-hover">
                            <thead>
                            <tr class="text-muted">
                                <th>Student Name</th>
                                <th>Type</th>
                                <th>Field</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                <td>{{$user->project_type}}</td>
                                <td>{{$user->project_field}}</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#{{$user->project_user}}"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>

                            </tr>
                                <!-- beginning of modal -->

                                <div class="modal fade" id="{{$user->project_user}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title font-weight-bold">
                                                    {{$user->project_title}}
                                                </p><br>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                {{$user->project_desc}}

                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{route('viewProject',$user->project_Id)}}" class="btn btn-primary">View Project</a>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{--                    <!-- End of modal -->--}}
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{--                    End of section for viewing student topics--}}
                    <div class="tab-pane" id="my_topics">
                        {{--                        Beginning of section for viewing and editing capstone topics--}}

                        <h3 class="text-muted mb-3 mt-3">My Projects</h3>
                        <table class="table text-center table-dark table-hover">
                            <thead>
                            <tr class="text-muted">
                                <th>Topic</th>
                                <th>Student Name</th>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    @foreach($faculty_projects as $faculty_project)
                                <td>{{$faculty_project->project_title}}</td>
                                <td>Peter Parker</td>
                                <td>{{$faculty_project->project_field}}</td>
                                <td>{{$faculty_project->project_type}}</td>

                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#edit_topic"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>
                            </tr>

                            <!-- beginning of modal -->

                            <div class="modal fade" id="edit_topic">
                                <form>
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p><strong>Project Title: </strong></p>
                                                <input class="form-control" value="{{$faculty_project->project_title}}">

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <p><strong>Project Field: </strong></p>
                                                <input class="form-control" value="{{$faculty_project->project_field}}">

                                                <p><strong>Project Type: </strong></p>
                                                <input class="form-control" value="{{$faculty_project->project_type}}">

                                                <p><strong>Project Description: </strong></p>
                                                <textarea class="form-control" placeholder="{{$faculty_project->project_desc}}"></textarea>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Update </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End of Modal -->

                            @endforeach

                            </tbody>
                        </table>


                    </div>

                    {{--                    End of section for viewing and editing capstone topics--}}

                    <div class="tab-pane" id="add_topic">
                        {{--                    Beginning of section for adding a new capstone topic--}}

                        <h3 class="text-muted mb-3 mt-3">Add a new Capstone Project</h3>
                        <div class="card">

                            <div class="card-body">
                                <form action="submit" method="post">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Title: </label>
                                            <input type="text" class="form-control" name="project_title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Field: </label>
                                            <input type="text" class="form-control" name="project_field">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Type: </label>
                                            <input type="text" class="form-control" name="project_type">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Project Description: </label>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> </label>
                                                <textarea class="form-control" rows="5" name="project_description"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">ADD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--                    End of section for adding new capstone topic--}}
                </div>
            </div>
        </div>
    </div>
@endsection

