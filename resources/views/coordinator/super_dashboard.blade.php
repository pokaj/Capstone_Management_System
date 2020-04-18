@extends('layouts.super_layout')

@section('content')


<!-- Beginning of cards  -->

<div class="col-lg-5 order-lg-5">
    {{--                Success Message--}}
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session()->get('message') }}
        </div>
    @endif
</div>

<div class="col-xl-3 col-sm-6 p-2 mt-3">
    <a href="" data-toggle="modal" data-target="#faculty">
    <div class="card card-common">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <i class="text-success fas fa-users fa-3x text-info"></i>
                <div class="text-right text-secondary">
                    <h6 class="text-capitalize">faculty fembers: </h6>
                    <h1 class="text-danger">{{$facultyCount ?? ''}}</h1>
                </div>
            </div>
        </div>
    </div></a>
</div>

<div class="modal fade" id="faculty">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <input class="form-control" placeholder="Search for faculty . . .">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="font-weight-bold"></p>
            </div>

            <div class="modal-body">
                <div class="table-responsive" id="table_data">
                    @include('coordinator/faculty_pagination')
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-xl-3 col-sm-6 p-2 mt-3">
    <a href="" data-toggle="modal" data-target="#supervised">
    <div class="card card-common">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <i class="fas fa-users fa-3x text-success"></i>
                <div class="text-right text-secondary">
                    <h6 class="text-capitalize">supervised students: </h6>
                    <h1 class="text-danger">{{$supervisedCount}}</h1>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>

<div class="modal fade" id="supervised">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <input class="form-control" placeholder="Search for student . . .">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="font-weight-bold"></p>
            </div>

            <div class="modal-body">
                <div class="table-responsive" id="supervised_student">
                    @include('coordinator/supervised_students')
                </div>
            </div>

        </div>
    </div>
</div>




<div class="col-xl-3 col-sm-6 p-2 mt-3">
    <a href="" data-toggle="modal" data-target="#unsuper">
    <div class="card card-common">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <i class="fas fa-users fa-3x text-danger"></i>
                <div class="text-right text-secondary">
                    <h6 class="text-capitalize">unsupervised students: </h6>
                    <h1 class="text-danger">{{$unsuperCount ?? ''}}</h1>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>

<div class="modal fade" id="unsuper">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <input class="form-control" placeholder="Search for student . . .">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="font-weight-bold"></p>
            </div>

            <div class="modal-body">
                <div class="table-responsive" id="unsupervised_student">
                    @include('coordinator/unsupervised_students')
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
