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
                                                <input id="limit_number"  type="number" class="form-control search-input" placeholder="Enter a number" required>
                                            <button class="btn btn-primary mt-2 float-right">Confirm</button>
                                        </form>
                                    </div>
                                    <div class="form-group row mt-5">
                                        <label class="col-lg-3 col-form-label form-control-label text-black-50">Faculty name: </label>
                                        <div class="col-lg-9">
                                            <div class="input-group">
                                                <input id="search"  type="text" class="form-control search-input" placeholder="Type faculty name . . ." name="search" value="{{old('name')}}">
                                            </div>
                                        </div>

                                    </div>
                                    <p></p>
                                    <div class="form-group row ">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                    </div>
                                    <table class="table table-striped bg-light text-center mt-5 col-lg-4">
                                        <thead class="thead-dark">
                                        <tr class="text-muted">
                                            <th class="text-capitalize">name</th>
                                            <th class="text-capitalize">department</th>
                                            <th class="text-capitalize">number of students</th>
                                            <th class="text-capitalize">view students</th>
                                        </tr>
                                        </thead>
                                        <div>
                                        <tbody id="faculty_information">
                                        @foreach($faculty_info as $data)
                                            <tr>
                                                <td>{{$data->first_name}} {{$data->last_name}}</td>
                                                <td>{{$data->department_name}}</td>
                                                <td>{{$data->number_of_students}}</td>
                                                <td><a href=""  class="nav-link" data-toggle="modal" onclick="run({{$data->userId}})" data-target="#viewFaculty"><i class="fas fa-eye text-muted"></i></a></td>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                        </div>
                                    </table>
                                    <div class="col-12 d-flex pt-3 justify-content-center">
                                        {{$faculty_info->links()}}

                                    </div>

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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
