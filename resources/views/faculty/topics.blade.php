@extends('layouts.faculty_layout')

@section('topics')

    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

{{--                Beginning of navigation tab--}}
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#my_topics" data-toggle="tab" class="nav-link active">My Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#add_topic" data-toggle="tab" class="nav-link">Add Project</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#project_proposals" data-toggle="tab" class="nav-link">Project Proposals
                            <span class="text-danger">[{{$proposedCount}}]</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#pending_projects" data-toggle="tab" class="nav-link">Pending Requests
                            <span class="text-danger">[{{$pendingCount}}]</span></a>
                    </li>


                </ul>
                {{--                End of navigation tab--}}

                <div class="tab-content py-4">

                    {{--                        Beginning of section for viewing and editing capstone topics--}}

                    <div class="tab-pane active" id="my_topics">

                        {{--                Success Message--}}
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif

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
                                    <td>-</td>
                                    <td>{{$faculty_project->project_field}}</td>
                                    <td>{{$faculty_project->project_type}}</td>

                                    <td>
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#edit_topic"><i class="fas fa-eye text-muted "></i></a>
                                    </td>
                                    <td>
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#{{$faculty_project->project_Id}}"><i class="fas fa-trash-alt text-danger "></i></a>
                                    </td>
                            </tr>

                            <!-- beginning of modal to delete project-->
                            <div class="modal fade" id="{{$faculty_project->project_Id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title font-weight-bold">Are you sure you want to delete this project?
                                            </p><br>

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body align-content-center">
                                            <form method="post" action="{{route('deleteproject',$faculty_project->project_Id)}}">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of modal to delete project-->

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

                    <div class="tab-pane" id="add_topic">
                        {{--                    Beginning of section for adding a new capstone topic--}}

                        <h3 class="text-muted mb-3 mt-3">Add a new Capstone Project</h3>
                        <div class="card">

                            <div class="card-body">
                                <form action="submit" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Project Title: </label>
                                                <input name="project_title" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Type: </label>
                                            <select name="project_type" type="text" class="form-control">
                                                <option value="uncertain">Uncertain</option>
                                                <option value="thesis">Thesis</option>
                                                <option value="applied">Applied</option>
                                                {{--                                                            <option value="entrepreneurship">Entrepreneurship</option>--}}

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Project Field: </label>
                                            <input type="text" class="form-control" name="project_field" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Project Description: </label>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> </label>
                                                <textarea class="form-control" rows="5" name="project_description" required></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">ADD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--                    End of section for adding new capstone topic--}}

                    {{--                        Beginning of section for projects proposed by students--}}

                    <div class="tab-pane" id="project_proposals">

                        <h3 class="text-muted mb-3 mt-3">Projects proposed by students</h3>
                        <table class="table text-center table-dark table-hover">
                            <thead>
                            <tr class="text-muted">
                                <th>Name</th>
                                <th>Project Type</th>
                                <th>Field</th>
                                <th>Actions</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($studentProjects as $studentProject)
                            <tr>
                                <td>{{$studentProject->first_name}} {{$studentProject->last_name}}</td>
                                <td>{{$studentProject->project_type}}</td>
                                <td>{{$studentProject->project_field}}</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#{{$studentProject->project_Id}}"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>
                                <td><span class="badge badge-warning w-80 py-2">Pending</span></td>
                            </tr>

                            <!-- beginning of modal -->
                            <div class="modal fade" id="{{$studentProject->project_Id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title font-weight-bold">
                                                {{$studentProject->project_title}}
                                            </p><br>

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            {{$studentProject->project_desc}}
                                        </div>

                                        <div class="modal-footer">
                                            <form action="{{route('acceptProject',$studentProject->project_Id)}}">
                                                <button class="btn btn-success">Accept</button>
                                            </form>
                                            <span>
                                                <form>
                                                <a href="" class="btn btn-danger">Decline</a>
                                                    </form>
                                                </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--                    --}}{{--                    End of section for projects proposed by students--}}


                    {{--                        Beginning of section for pending student projects--}}

                    <div class="tab-pane" id="pending_projects">
                        <h3 class="text-muted mb-3 mt-3">Students awaiting approval</h3>
                        <table class="table text-center table-dark table-hover">
                            <thead>
                            <tr class="text-muted">
                                <th>Name</th>
                                <th>Project </th>
                                <th>Accept</th>
                                <th>Decline</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($showapplied as $appliedinfo)
                                <tr>
                                    <td>{{$appliedinfo->first_name}} {{$appliedinfo->last_name}}</td>
                                    <td>{{$appliedinfo->project_title}}</td>
                                    <td>
                                        <form>
                                       <a href="{{route('acceptProposal',['project_ID'=>$appliedinfo->project_Id, 'student_ID' => $appliedinfo->userId])}}"> <i class="fas fa-check text-success"></i></a>
{{--                                            <a class="btn btn-success" href="{{route('post.show',['id'=>$post->id,'name'=>$post->title])}}">Show</a>--}}
                                        </form>
                                    </td>
                                    <td>
                                       <a href="####"><i class="fas fa-times text-danger"></i></a>
                                    </td>
                                </tr>

                                <!-- beginning of modal -->
                                <div class="modal fade" id="">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title font-weight-bold">
{{--                                                head here--}}
                                                </p><br>

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
{{--                                       body here--}}
                                            </div>

                                            <div class="modal-footer">
                                                <form action="">
                                                    <button class="btn btn-success">Accept</button>
                                                </form>
                                                <span>
                                                <form>
                                                <a href="" class="btn btn-danger">Decline</a>
                                                    </form>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- end of modal -->
                            </tbody>
                        </table>

                        <label>These students chose you but dont have projects yet: </label>
                        @foreach($select as $selected)
                           <p> {{$selected->first_name}} {{$selected->last_name}}</p>
                            @endforeach
                    </div>
                    {{--                    --}}{{--                    End of section for pending student projects--}}

                </div>
            </div>
        </div>
    </div>
@endsection
