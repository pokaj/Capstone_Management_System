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
                        <a href="" data-target="#my_topics" data-toggle="tab" class="nav-link active">My Topics</a>
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
{{--                        @if(session()->has('message'))--}}
{{--                            <div class="alert alert-success">--}}
{{--                                <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                                {{ session()->get('message') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <h3 class="text-muted mb-3">My topics</h3>
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

                                <td>Health System for the aged</td>
                                <td>Applied</td>
                                <td>Health</td>
                                <td>-</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#view_project"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>

                            </tr>

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


                    {{--                    Beginning of section for projects proposed by faculty--}}
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
                            <tr>

                                <td>Mr. David Sampah</td>
                                <td>Applied</td>
                                <td>Management System</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#view_project"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>

                            </tr>
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
                        <!-- end of modal -->
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
                                        <form role="form" method="post" action="{{url('studentTopics')}}">
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
                                            <button class="btn btn-primary">Propose</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    End of section for students to propose topics--}}



                    {{--                        Beginning of section for student to propose topic--}}

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
                                                            <option value="1">1st Supervisor </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 2: </label>
                                                        <select name="super_two" type="text" class="form-control">
                                                            <option value="2">2nd Supervisor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 3: </label>
                                                        <select name="super_three" type="text" class="form-control">
                                                            <option value="3">3rd Supervisor</option>
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

                    {{--                    End of section for students to propose topics--}}

                </div>
            </div>

        </div>
    </div>


@endsection





