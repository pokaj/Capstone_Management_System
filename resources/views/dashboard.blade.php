@extends('layout')

@section('content')




    <!-- Beginning of cards  -->
                        <div class="col-xl-3 col-sm-6 p-2 mt-3">
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

                        <div class="col-xl-3 col-sm-6 p-2 mt-3">
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


    <!-- End of cards  -->

{{--    Begining of student notifications--}}
                        <div class="col-xl-6 mt-3">
{{--                            <h4 class="text-muted mb-4">Recent Student Activities</h4>--}}
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

{{--    End of student notifications--}}

    <!-- Progress Bar starts her | List of tasks as well  -->

    <div class="col-xl-6 col-12 mb-4 mb-xl-0 mt-5">
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

    <!-- Progress bar ends here  -->
@endsection
