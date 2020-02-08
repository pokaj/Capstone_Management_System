@extends('layout')

@section('content')
    <!-- beginning of modal -->

    <div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Want to leave?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    Press Logout to leave.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">stay</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Logout </button>

                </div>
            </div>
        </div>
    </div>

    <!-- end of modal -->

    <!-- Beginning of cards  -->

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row pt-5 mt-md-3 mb-5">

                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-users fa-3x text-info"></i>
                                        <div class="text-right text-secondary">
                                            <h6>Students Supervised: </h6>
                                            <h1 class="text-danger">3</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Updated now</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-users fa-3x text-info"></i>
                                        <div class="text-right text-secondary">
                                            <h6>Pending Requests: </h6>
                                            <h1 class="text-danger">2</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Updated now</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>

    <!-- End of cards  -->


    <!-- Progress Bar starts her | List of tasks as well  -->

    <section>
        <div class="container-fliud">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-4 align-items-center">
                        <div class="col-xl-6 col-12 mb-4 mb-xl-0">
                            <div class="bg-dark text-white p-4 rounded">
                                <h4 class="mb-5">Individual Progress</h4>
                                <h6 class="mb-3">Philip Owusu-Afriyie</h6>
                                <div class="progress mb-4" style="height:20px">
                                    <div class="progress-bar progress-bar-striped font-weight-bold" style="width: 91%;">91%</div>
                                </div>

                                <div>
                                    <h6 class="mb-3">Munira Adam</h6>
                                    <div class="progress mb-4" style="height:20px">
                                        <div class="progress-bar progress-bar-striped font-weight-bold bg-success" style="width: 85%;">85%</div>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-3">Bridget Boateng</h6>
                                    <div class="progress mb-4" style="height:20px">
                                        <div class="progress-bar progress-bar-striped font-weight-bold bg-danger" style="width: 50%;">50%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


    <!-- Progress bar ends here  -->

    <!-- Activities and quick posts start here -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center mb-5">
                        <div class="col-xl-6">
                            <h4 class="text-muted mb-4">Recent Student Activities</h4>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseFirst">
                                            <img src="images/avatar.png" width="50" class="mr-3 rounded" alt="customer image">
                                            Akosua Somoah Just submitted Chapter 1.
                                        </button>
                                    </div>
                                    <div class="collapse" id="collapseFirst" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseOne">
                                            <img src="images/avatar.png" width="50" class="mr-3 rounded" alt="customer image">
                                            Munira Just submitted Chapter 2.
                                        </button>
                                    </div>
                                    <div class="collapse" id="collapseOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
