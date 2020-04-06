@extends('layouts.super_layout')

@section('manage_faculty')

    {{--Section for the cs_coordinator to add new faculty member--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-capitalize text-black-50">Manage Faculty Members</h2>

                <div class="container">
                    <div class="row my-2">
                        <div class="col-lg-8 order-lg-2">
                            <div class="tab-content py-4">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                    <div>
                                        <form id="limit" method="post">
                                    <label class="text-black-50">limit number of students per supervisor: </label>
                                    <input class="form-control" type="number"placeholder="Enter a number" id="limit_number" required></input>
                                            <button class="btn btn-primary btn-primary mt-2">Confirm</button>
                                        </form>
                                    </div>
                                    <div class="form-group row mt-5">
                                        <label class="col-lg-3 col-form-label form-control-label text-black-50">Faculty name: </label>
                                        <div class="col-lg-9">
                                            <input placeholder="Type faculty name . . ." name="search" id="search" class="form-control" type="text" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="form-group row ">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                    </div>
                                    <table class="table table-striped bg-light text-center mt-5 col-lg-4">
                                        <thead class="thead-dark">
                                        <tr class="text-muted">
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Number of Students</th>
                                            <th>View</th>
                                        </tr>
                                        </thead>
                                        <div id="hidden">
                                        <tbody id="tbody">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <!-- beginning of modal to view details -->
                                                <div class="modal fade " id="viewFaculty">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="modal-title font-weight-bold">Student Information
                                                                </p><br>

                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <div class="modal-body align-content-center" id="content">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end of modal to view details -->
                                            </tr>
                                        </tbody>
                                        </div>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
