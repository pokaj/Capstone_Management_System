@extends('studentLayout')

@section('student_content')

<div class="content">
    <div class="container-fluid">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    @if($count = 0)
        <h6></h6>
        @else
    @foreach($approvedProjects as $approvedProject)
    <span class="text-muted text-capitalize h2">{{$approvedProject->project_type}} : </span> <span class="h5">{{$approvedProject->project_title}}</span>
        @endforeach
        @endif
        <!-- Progress Bar starts her | List of tasks as well  -->
        <section>
            <div class="container-fliud">
                <div class="row">
                        <div class="row mb-4 align-items-center">

                                <div class="col-xl6 col-12 ">
                                    <h4 class="text-muted p-3 mb-3 ">UP Coming Tasks</h4>
                                    <div class="container-fluid bg-white">
                                        <div class="row py-3 mb-4 task-border align-items-center">
                                            <div class="col-1">
                                                <input type="checkbox" >
                                            </div>
                                            <div class="col-sm-9 col-8">
                                                This is supposed to be some kind of random test for testing.
                                                <p class="text-danger">24th February 2020</p>

                                            </div>
                                            <div class="col-1">
                                                <a href="####" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container-fluid bg-white">
                                        <div class="row py-3 mb-4 task-border align-items-center">
                                            <div class="col-1">
                                                <input type="checkbox" >
                                            </div>
                                            <div class="col-sm-9 col-8">
                                                This is supposed to be some kind of random test for testing.
                                                <p class="text-primary">24th February 2020</p>

                                            </div>
                                            <div class="col-1">
                                                <a href="####" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container-fluid bg-white">
                                        <div class="row py-3 mb-4 task-border align-items-center">
                                            <div class="col-1">
                                                <input type="checkbox">
                                            </div>
                                            <div class="col-sm-9 col-8">
                                                This is supposed to be some kind of random test for testing.
                                                <p class="text-success">16th March 2020</p>

                                            </div>
                                            <div class="col-1">
                                                <a href="####" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                        </div>
                </div>
            </div>
        </section>


        <!-- Progress bar ends here  -->

</div>
</div>

    @endsection
