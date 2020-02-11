@extends('studentLayout')

@section('student_topics')



    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

{{--                Beginning of navigation tabs--}}
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#available_topics" data-toggle="tab" class="nav-link active">Available Topics</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#propose_topic" data-toggle="tab" class="nav-link">Propose Topic</a>
                    </li>
                </ul>

{{--                End of navigation tabs--}}
                <div class="tab-content py-4">

{{--                    Beginning of section for projects proposed by faculty--}}
                    <div class="tab-pane active" id="available_topics">
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
                            <tr>

                                <td>Dr. Ayorkor Korsah</td>
                                <td>Thesis</td>
                                <td>Deep Learning</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#view_project"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>

                            </tr>
                            <tr>

                                <td>Dr. Stephane Nwolley</td>
                                <td>Thesis</td>
                                <td>Cyber-Security</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#view_project"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>

                            </tr>
                            <tr>

                                <td>Mr. Ato Yawson</td>
                                <td>Applied</td>
                                <td>Networks</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#view_project"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                </td>

                            </tr>

                            <tr>

                                <td>Dr. Nathan Amankwah</td>
                                <td>Applied</td>
                                <td>System Dynamics</td>
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
                    <div class="tab-pane" id="propose_topic">

{{--                        Beginning of section for student to propose topic--}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card  mt-5">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Propose a Topic</h4>

                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Project Title: </label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Project Type: </label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Project Description: </label>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"> </label>
                                                            <textarea class="form-control" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 1: </label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 2: </label>
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Preferred Supervisor 3: </label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
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





