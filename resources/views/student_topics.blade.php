@extends('studentLayout')

@section('student_topics')



    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

{{--                Success Message--}}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

{{--                Beginning of navigation tabs--}}
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#my_topics" data-toggle="tab" class="nav-link active">My Topic</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#available_topics" data-toggle="tab" class="nav-link">Available Topics</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#propose_topic" data-toggle="tab" class="nav-link">Propose Topic</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#select_supervisor" data-toggle="tab" class="nav-link">Select Supervisor</a>
                    </li>
                </ul>
{{--                End of navigation tabs--}}
                <div class="tab-content py-4">

                    {{--                        Beginning of section for student topics--}}
                    <div class="tab-pane active" id="my_topics">
                        <h3 class="text-muted mb-3">My topic</h3>
                        <table class="table text-center table-dark table-hover">
                            <thead>
                            <tr class="text-muted">
                                <th>Project Title</th>
                                <th>Project Type</th>
                                <th>Field</th>
                                <th>Supervisor</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->project_title}}</td>
                                    <td>{{$user->project_type}}</td>
                                    <td>{{$user->project_field}}</td>
                                    <td>-</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#view_project"><i class="fas fa-eye text-muted"></i></a>
                                </td>
                                    <td>
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#{{$user->project_Id}}"><i class="fas fa-trash-alt text-danger "></i></a>
                                </td>
                            </tr>

                                <!-- beginning of modal to delete project-->
                                <div class="modal fade" id="{{$user->project_Id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title font-weight-bold">Are you sure you want to delete this project?
                                                </p><br>

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body align-content-center">
{{--                                                <button type="button" class="btn btn-muted" data-dismiss="modal">cancel</button>--}}
                                                <form method="post" action="{{route('deleteproject',$user->project_Id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger">Delete</button>
{{--                                                <a href="{{route('deleteproject',$user->project_Id)}}" class="btn btn-danger">Delete</a>--}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of modal to delete project-->
                                @endforeach
                            </tbody>
                        </table>



                        <!-- beginning of modal -->
                        <div class="modal fade" id="view_project">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title font-weight-bold">Ticketing and seat selection system to support activities
                                            at the SilverBird Cinemas
                                        </p><br>

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                        anim id est laboru.
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Apply</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Ignore </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- end of modal -->
                    {{--                    End of section for student topics--}}


                    {{--                    Beginning of section for available projects (faculty suggested projects)--}}
                    <div class="tab-pane" id="available_topics">
                        <h3 class="text-muted mb-3">Projects Proposed by Faculty</h3>
                        <table class="table text-center table-dark table-hover">
                            <thead>
                            <tr class="text-muted">
                                <th>Faculty</th>
                                <th>Project Type</th>
                                <th>Field</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($facultyProjects as $facultyProject)
                            <tr>
                                <td>{{$facultyProject->first_name}} {{$facultyProject->last_name}}</td>
                                <td>{{$facultyProject->project_type}}</td>
                                <td>{{$facultyProject->project_field}}</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#{{$facultyProject->project_Id}}"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>
                            </tr>
                            <!-- beginning of modal -->
                            <div class="modal fade" id="{{$facultyProject->project_Id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title">
                                                <strong> Title</strong>: {{$facultyProject->project_title}}
                                            </p><br>

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                           <strong>Description</strong>: {{$facultyProject->project_desc}}
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Apply</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Ignore </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

{{--                    End of section for faculty topics--}}

                    {{--               Beginning of section for student to propose topic--}}
                    <div class="tab-pane" id="propose_topic">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card  mt-3">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Propose a Topic</h4>

                                    </div>
                                    <div class="card-body">
                                        <form role="form" method="post" action="{{url('addproject')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Project Title: </label>
                                                        <input name="project_title" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Project Type: </label>
                                                        <select name="project_type" type="text" class="form-control">
                                                            <option value="uncertain">uncertain</option>
                                                            <option value="thesis">Thesis</option>
                                                            <option value="applied">Applied</option>
                                                            {{--                                                            <option value="entrepreneurship">Entrepreneurship</option>--}}

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Project Field: </label>
                                                        <input name="project_field" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Project Description: </label>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"> </label>
                                                            <textarea name="project_desc" class="form-control" rows="5" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary">Confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    End of section for students to propose topics--}}



                    {{--                        Beginning of section for student to select prefered supervisor--}}

                    <div class="tab-pane" id="select_supervisor">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card  mt-3">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Select Preferred Supervisor</h4>

                                    </div>
                                    <div class="card-body">

                                        <form role="form" method="post" action="{{url('studentTopics')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 1: </label>
                                                        <select name="super_one" type="text" class="form-control">
                                                            @foreach($facultyDropdown as $dropdown)
                                                            <option value="{{$dropdown->userId}}">
                                                                {{$dropdown->first_name}} {{$dropdown->last_name}}
                                                            </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 2: </label>
                                                        <select name="super_two" type="text" class="form-control">
                                                            @foreach($facultyDropdown as $dropdown)
                                                                <option value="{{$dropdown->userId}}">
                                                                    {{$dropdown->first_name}} {{$dropdown->last_name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 3: </label>
                                                        <select name="super_three" type="text" class="form-control">
                                                            @foreach($facultyDropdown as $dropdown)
                                                                <option value="{{$dropdown->userId}}">
                                                                    {{$dropdown->first_name}} {{$dropdown->last_name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary">Confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    End of section for students to select prefered supervisor--}}

                </div>
            </div>

        </div>
    </div>


@endsection





