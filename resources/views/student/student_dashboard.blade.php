@extends('layouts.studentLayout')

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

    @if($approvedProjects)
    @foreach($approvedProjects as $approvedProject)
    <span class="text-muted text-capitalize h3">{{$approvedProject->project_type}} : </span> <span class="">{{$approvedProject->project_title}}</span>
        @endforeach
        @endif
        <h4 class="text-muted mt-5">Up coming tasks</h4>
        @if($meetingDetails)
        <div class="row">
                        <div class="row mb-4 align-items-center">
                                <div class="col-xl6 col-12 ml-3">
                                    <div class="container-fluid bg-white">
                                        <div class="row py-3 mb-4 task-border align-items-center">

                                            <div class="col-lg-12">
                                                <p class="">Next Meeting Date:  <span class="text-danger"> {{date("M jS, Y H:i A", strtotime($meetingDetails->mt_nextDate))}}</span> </p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
        @endif


</div>
</div>

    @endsection
