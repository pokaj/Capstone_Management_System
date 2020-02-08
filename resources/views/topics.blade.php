@extends('layout')

@section('topics')


    <!-- Tables -->


    <!-- Buttons to view different tables -->
    <div class="btn-group mb-4 pl-3 mt-3" role="group">
        <button type="button" class="btn btn-primary">Add Topic</button>
        <button type="button" class="btn btn-primary">My Topics</button>
        <button type="button" class="btn btn-primary">Student Topics</button>
    </div>

    <!-- End of buttons -->


    {{-- Button colors:[PRIMARY - SECONDARY - SUCCESS - DANGER - WARNING - INFO - LIGHT - DARK]--}}


{{--Starting of section for supervisor capstone topics--}}

{{--    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">--}}
                    <div class="col-xl-10 col-12 mb-4 mb-xl-0 pl-0">
                        <h3 class="text-muted text-center mb-3">Add a new Capstone Topic</h3>

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

{{--                        The section below creates the topics proposed by the lecturer--}}

                        <div class="col-xl-10 col-12 mt-5">
                            <h3 class="text-muted text-center mb-3">My Topics</h3>
                            <table class="table text-center table-dark table-hover">
                                <thead>
                                <tr class="text-muted">
                                    <th>Topic</th>
                                    <th>Student Name</th>
                                    <th>Field</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td>Hospital Management System</td>
                                    <td>Peter Parker</td>
                                    <td>Medicine</td>
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
                    </div>
    <!-- End of Section -->

                        <div class="col-xl-10 col-12 mt-5">

                            <h3 class="text-muted text-center mb-3">Student Topics</h3>
                            <table class="table text-center table-dark table-hover">
                                <thead>
                                <tr class="text-muted">
                                    <th>Topic</th>
                                    <th>Student Name</th>
                                    <th>Field</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td>Philip Owusu-Afriyie</td>
                                    <td>Applied</td>
                                    <td>Management System</td>
                                    <td>
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                    </td>

                                </tr>
                                <tr>

                                    <td>Munira Adam</td>
                                    <td>Thesis</td>
                                    <td>Cyber-security</td>
                                    <td>
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                    </td>

                                </tr>
                                <tr>

                                    <td>Kojo Owusu</td>
                                    <td>Applied</td>
                                    <td>Machine Learning</td>
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



@endsection


