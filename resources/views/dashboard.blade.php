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
                                            <h1 class="text-danger">{{$totalSupervisedStudents}}</h1>
                                        </div>
                                    </div>
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
                                            <h1 class="text-danger">{{$totalPending}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


    <!-- End of cards  -->

    <div class="col-xl-6 mt-3">
    </div>

    {{--    End of student notifications--}}


    <!-- Progress Bar starts her | List of tasks as well  -->

    <div class="col-xl-6 col-12 mb-4 mb-xl-0 mt-5">
        <div class="bg-dark text-white p-4 rounded">
            <h4 class="mb-5">Student Progress</h4>
            @foreach($projectDetails as $projectDetail)
            <div>
                <h6 class="mb-3">{{$projectDetail->first_name}} {{$projectDetail->last_name}} </h6>
                <div class="progress mb-4" style="height:15px">
                    <div class="progress-bar progress-bar-striped font-weight-bold bg-success" style="width: 5%; ">5%</div>
                </div>
            </div>
                @endforeach
        </div>



        <div id="accordion" class="mt-5">
            @foreach(Auth::user()->unreadNotifications as $notification)

                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseFirst">
                            <img src="images/avatar.png" width="50" class="mr-3 rounded" alt="customer image">
                            @include('notification.'.Str::snake(class_basename($notification->type)))
                            {{--                                            {{Str::snake(class_basename($notification->type))}}--}}
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
            @endforeach

        </div>
    </div>

    {{--    End of student notifications--}}
@endsection
