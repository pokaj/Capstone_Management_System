@extends('layout')

@section('students')
    <!-- Tables -->


                        <!-- Buttons to view different tables -->
                        <div class="btn-group mb-4 pl-3 mt-3" role="group">
                            <button type="button" class="btn btn-primary" name="approved" onclick="approved()">Approved Students</button>
                            <button type="button" class="btn btn-primary" name="pending" onclick="pending()">Pending Requests</button>
                        </div>

                        <!-- End of buttons -->
                        <div class="container-fluid">
                            <div class="row mb-9">
                                <div class="col-xl-10 col-lg-9 col-md-8 mt-3">

                                        <div id="approved_students">
                                        <div class="col-xl-10 col-12 mb-4 mb-xl-0 pl-0">
                                            <h3 class="text-muted text-center mb-3">Supervised Students</h3>
                                            <table class="table table-striped bg-light text-center">
                                                <thead class="thead-dark">
                                                <tr class="text-muted">
                                                    <th>Name</th>
                                                    <th>Project Type</th>
                                                    <th>Field</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr>
                                                    <td>Kwabena Owusu-Afriyie</td>
                                                    <td>Applied</td>
                                                    <td>Management System</td>
                                                    <td>
                                                        <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-eye text-muted fa-lg"></i></a>                                            </td>
                                                </tr>
                                                <tr>

                                                    <td>Munira Adam</td>
                                                    <td>Thesis</td>
                                                    <td>Cyber-Security</td>
                                                    <td>
                                                        <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>Kojo Owusu</td>
                                                    <td>Applied</td>
                                                    <td>Machine Learning</td>
                                                    <td>
                                                        <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                                    </td>
                                                </tr>


                                                </tbody>

                                            </table>


                                        </div>
                                        </div>

{{--                                    End of Approved student section--}}

{{--                                    Beginning of pending students section--}}

                                        <div id="pending_students">
                                        <div class="col-xl-10 col-12 mt-5">
                                            <h3 class="text-muted text-center mb-3">Students Pending Approval</h3>
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
                                                <tr>

                                                    <td>Janet Fuah</td>
                                                    <td>Thesis</td>
                                                    <td>Poverty Reduction</td>
                                                    <td>
                                                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                                    </td>
                                                    <td><span class="badge badge-warning w-80 py-2">Pending</span></td>
                                                </tr>
                                                <tr>

                                                    <td>Akosua Kissiedu</td>
                                                    <td>Applied</td>
                                                    <td>Feedback System</td>
                                                    <td>
                                                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                                    </td>
                                                    <td><span class="badge badge-warning w-80 py-2">Pending</span></td>
                                                </tr>
                                                <tr>

                                                    <td>Papa darfoor</td>
                                                    <td>Applied</td>
                                                    <td>Ticketing System</td>
                                                    <td>
                                                        <a href="" class="nav-link" data-toggle="modal" data-target="#request"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                                    </td>
                                                    <td><span class="badge badge-danger w-80 py-2">Declined</span></td>
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

                                            <!-- end of modal -->

                                            <!-- Pagination begins here  -->
                                            <nav>
                                                <ul class="pagination justify-content-center">
                                                    <li class="page-item">
                                                        <a href="" class="page-link py-2 px-3">
                                                            <span>&laquo</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="" class="page-link py-2 px-3">
                                                            1
                                                        </a>
                                                    </li>
                                                    <li class="page-item" >
                                                        <a href="" class="page-link py-2 px-3">
                                                            2
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="" class="page-link py-2 px-3">
                                                            3
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="" class="page-link py-2 px-3">
                                                            <span>&raquo</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <!-- Pagination ends here -->

                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>

    <!-- End of tables -->


@endsection
