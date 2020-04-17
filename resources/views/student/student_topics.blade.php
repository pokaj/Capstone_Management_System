@extends('layouts.studentLayout')

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
                        <a href="" data-target="#my_topics" data-toggle="tab" class="nav-link active">My Capstone</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#faculty_topics" data-toggle="tab" class="nav-link">Faculty Projects @if($count > 0)<span class="text-danger">[{{$count}}]</span>@endif</a>

                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#propose_topic" data-toggle="tab" class="nav-link">Submit Topic @if($usersProjects > 0)<span class="text-danger">[{{$usersProjects}}]</span> @endif</a>

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

                            @foreach($approvedProjects as $approvedProject)
                                <tr>
                                    <td>{{$approvedProject->project_title}}</td>
                                    <td>{{$approvedProject->project_type}}</td>
                                    <td>{{$approvedProject->project_field}}</td>
                                    <td>{{$approvedProject->first_name}} {{$approvedProject->last_name}}</td>

                                <td>
                                    <a href="/myProject" class="nav-link" ><i class="fas fa-eye text-muted"></i></a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{--                    End of section for student topics--}}


                    {{--                    Beginning of section for available projects (faculty suggested projects)--}}
                    <div class="tab-pane" id="faculty_topics">
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
                                            <button class="btn btn-success" onclick="application({{$facultyProject->project_Id}})">Apply</button>
                                            <span>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Ignore</button>
                                                </span>

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
                                @if($usersProjects > 0)
                                <h3 class="text-muted mb-3">Your proposed topics</h3>
                                <table class="table text-center table-dark table-hover">
                                    <thead>
                                    <tr class="text-muted">
                                        <th>Project Title</th>
                                        <th>Project Type</th>
                                        <th>Field</th>
                                        <th>Status</th>
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
                                            <td class="text-danger">Pending approval</td>

                                            <td>
                                                <a href="" class="nav-link" data-toggle="modal" data-target="#{{$user->project_Id}}"><i class="fas fa-eye text-muted"></i></a>
                                            </td>
                                            <td>
                                                <a href="" class="nav-link" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt text-danger "></i></a>
                                            </td>
                                        </tr>

                                        <!-- beginning of modal for viewing and editing project details-->
                                        <div class="modal fade" id="{{$user->project_Id}}">
                                            <form>
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <p><strong>Project Title: </strong></p>
                                                            <input class="form-control" value="{{$user->project_title}}">

                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <p><strong>Project Field: </strong></p>
                                                            <input class="form-control" value="{{$user->project_field}}">

                                                            <p><strong>Project Type: </strong></p>
                                                            <input class="form-control" value="{{$user->project_type}}">

                                                            <p><strong>Project Description: </strong></p>
                                                            <textarea class="form-control" placeholder="{{$user->project_desc}}"></textarea>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Update </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End of Modal -->


                                        <!-- beginning of modal to delete project-->
                                        <div class="modal fade" id="delete">
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
                                @endif

                                <div class="card  mt-5">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Propose a Topic</h4>

                                    </div>
                                    <div class="card-body">
                                        <form role="form" method="post" action="submit">
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
                                                            <textarea name="project_description" class="form-control" rows="5" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary pull-right">Confirm</button>
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
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Search Faculty : </label>
                                    <div class="col-lg-9">
                                        <input placeholder="Type faculty name . . ." name="find" id="find" class="form-control" type="text" value="{{old('find')}}">
                                    </div>

                                </div>
                                <table class="table table-striped bg-light text-center mt-5 col-lg-4">
                                    <thead class="thead-dark">
                                    <tr class="text-muted">
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>View Bio</th>
                                    </tr>
                                    </thead>
                                    <div id="hidden">
                                        <tbody id="faculty_details">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </div>
                                </table>
                                <div class="card  mt-3">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Select Preferred Supervisor</h4>

                                    </div>
                                    <div class="card-body">

                                        <form role="form" method="post" action="{{route('studentTopics')}}">
                                            @csrf


                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Select Project: </label>
                                                        <select name="project" type="text" class="form-control" >
                                                            @foreach($users as $user)
                                                                <option value="{{$user->project_Id}}">
                                                                    {{$user->project_title}}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 1: </label>
                                                        <select name="super_one" type="text" class="form-control">
                                                            <option>Select First Faculty</option>
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
                                                            <option>Select Second Faculty</option>
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
                                                            <option>Select Third Faculty</option>
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
                        <div class="row">
                        <table class="table table-striped bg-light text-center mt-5">
                            <h4 class="mt-5 text-capitalize text-muted">chosen faculty members</h4>

                            <thead class="thead-dark">
                            <tr class="text-muted">
                                <th>Name</th>
                                <th>Department</th>
                            </tr>
                            </thead>
                            <div>
                                <tbody>
                                @foreach($selected as $faculty)
                                <tr>

                                    <td>{{$faculty->first_name}} {{$faculty->last_name}}</td>
                                    <td>{{$faculty->department_name}}</td>

                                </tr>
                                @endforeach
                                </tbody>
                            </div>
                        </table>
                        </div>
                    </div>

                    {{--                    End of section for students to select prefered supervisor--}}

                </div>
            </div>

        </div>
    </div>


@endsection





