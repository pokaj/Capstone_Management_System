@extends('layout')

@section('students')


    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#approved" data-toggle="tab" class="nav-link active">Approved Students</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#pending" data-toggle="tab" class="nav-link">Pending Requests</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="approved">
                        <div class="row">

                             <h3 class="text-muted mb-3 mt-3">Supervised Students</h3>
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
                                                <a href=""><i class="fas fa-eye text-muted fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Munira Adam</td>
                                            <td>Thesis</td>
                                            <td>Cyber-Security</td>
                                            <td>
                                                <a href=""><i class="fas fa-eye text-muted fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Kojo Owusu</td>
                                            <td>Applied</td>
                                            <td>Machine Learning</td>
                                            <td>
                                                <a href=""><i class="fas fa-eye text-muted fa-lg"></i></a>
                                            </td>
                                        </tr>


                                        </tbody>

                                    </table>

                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="pending">

                                <h3 class="text-muted mb-3 mt-3">Students Pending Approval</h3>
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


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
