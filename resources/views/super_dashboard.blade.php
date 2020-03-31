@extends('super_layout')

@section('content')

<!-- Beginning of cards  -->
<div class="col-xl-3 col-sm-6 p-2 mt-3">
    <div class="card card-common">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <i class="fas fa-users fa-3x text-info"></i>
                <div class="text-right text-secondary">
                    <h6>Total Faculty: </h6>
                    <h1 class="text-danger">{{$facultyCount}}</h1>
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
                    <h6>Total Student: </h6>
                    <h1 class="text-danger">{{$studentCount}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End of cards  -->

    @endsection
