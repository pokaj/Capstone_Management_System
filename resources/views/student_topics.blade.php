@extends('studentLayout')

@section('student_topics')



    <!-- Tables -->


    <!-- Buttons to view different tables -->
    <div class="btn-group mb-4 pl-3 mt-3" role="group">
        <button type="button" class="btn btn-primary">Propose Topic</button>
        <button type="button" class="btn btn-primary">Available Topics</button>
    </div>

    <!-- End of buttons -->


    {{-- Button colors:[PRIMARY - SECONDARY - SUCCESS - DANGER - WARNING - INFO - LIGHT - DARK]--}}


    {{--Starting of section for supervisor capstone topics--}}

    {{--    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">--}}
    <div class="col-xl-10 col-12 mb-4 mb-xl-0 pl-0">

        {{--                        The section below creates the topics proposed by the lecturer--}}

        <div class="col-xl-10 col-12 mt-5">

            <h3 class="text-muted text-center mb-3">Project Proposed by Faculty and Supervisors</h3>
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
                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                    </td>

                </tr>
                <tr>

                    <td>Dr. Ayorkor Korsah</td>
                    <td>Thesis</td>
                    <td>Deep Learning</td>
                    <td>
                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                    </td>

                </tr>
                <tr>

                    <td>Dr. Stephane Nwolley</td>
                    <td>Thesis</td>
                    <td>Cyber-Security</td>
                    <td>
                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                    </td>

                </tr>
                <tr>

                    <td>Mr. Ato Yawson</td>
                    <td>Applied</td>
                    <td>Networks</td>
                    <td>
                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                    </td>

                </tr>

                <tr>

                    <td>Dr. Nathan Amankwah</td>
                    <td>Applied</td>
                    <td>System Dynamics</td>
                    <td>
                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                    </td>

                </tr>


                </tbody>
            </table>

            <!-- beginning of modal -->

            <div class="modal fade" id="request">
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
                            <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Decline </button>

                        </div>
                    </div>
                </div>
            </div>


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





@endsection





