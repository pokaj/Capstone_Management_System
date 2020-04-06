@extends('layouts.super_layout')

@section('addFaculty')

    {{--Section for the cs_coordinator to add new faculty member--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-capitalize text-black-50">add new faculty member</h2>

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


                                    <form method="POST" action="{{route('newFaculty')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">First name: </label>
                                            <div class="col-lg-9">
                                                <input name="fname" id="fname" class="form-control" type="text" value="{{old('fname')}}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Last name: </label>
                                            <div class="col-lg-9">
                                                <input name="lname" id="lname" class="form-control" type="text" value="{{old('lname')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Department: </label>
                                            <div class="col-lg-9">
                                                    <select name="dept" id="dept" class="form-control" required>
                                                        <option id="" class="form-control">Select Department</option>
                                                        @foreach($dept as $department)
                                                            <option value="{{$department->department_Id}}">{{$department->department_name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Email: </label>
                                            <div class="col-lg-9">
                                                <input name="email" id="email" class="form-control" type="email" value="{{old('email')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Username: </label>
                                            <div class="col-lg-9">
                                                <input name="username" id="username" class="form-control" type="text" value="{{old('username')}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Password: </label>
                                            <div class="col-lg-9">
                                                <input name="password" id="password" class="form-control" type="password" required>
                                                <br>
                                            </div>


                                        </div>


                                        <div class="form-group row ">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                                <button class="btn btn-primary text-capitalize" >add faculty</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>







@endsection

