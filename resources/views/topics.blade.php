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

                        @if(count($projects) > 1)

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
                            @foreach($projects as $project)
                                <tr>
                                <td>{{$project->project_user}}</td>
                                <td>{{$project->project_type}}</td>
                                <td>{{$project->project_field}}</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#view"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h4>There are no student Topics yet</h4>
                    @endif

                        <!-- beginning of modal -->

                        @if(count($projects) > 1)
                            @foreach($projects as $row)
                        <div class="modal fade" id="view">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title font-weight-bold">
                                            {{$row->project_title}}
                                        </p><br>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                    {{$row->project_desc}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Decline </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif


                    <!-- End of modal -->
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

                                <td>Hospital Management System</td>
                                <td>Peter Parker</td>
                                <td>Medicine</td>
                                <td>Applied</td>

                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#edit_topic"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <!-- beginning of modal -->

                        <div class="modal fade" id="edit_topic">
                            <form>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p><strong>Project Title: </strong></p>
                                        <input class="form-control">

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <p><strong>Project Field: </strong></p>
                                        <input class="form-control">

                                        <p><strong>Project Type: </strong></p>
                                        <input class="form-control">

                                        <p><strong>Project Description: </strong></p>
                                        <textarea class="form-control"></textarea>



                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Update </button>

                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- End of Modal -->
                    </div>

                    {{--                    End of section for viewing and editing capstone topics--}}

                    <div class="tab-pane" id="add_topic">
                        {{--                    Beginning of section for adding a new capstone topic--}}

                        <h3 class="text-muted mb-3 mt-3">Add a new Capstone Project</h3>


                        <div class="card">

                            <div class="card-body">
                                <form>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Title: </label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Field: </label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Type: </label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Project Description: </label>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> </label>
                                                <textarea class="form-control" rows="5"></textarea>
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

