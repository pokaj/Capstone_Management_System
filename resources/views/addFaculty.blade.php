@extends('super_layout')

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

                                    <form role="form" method="post" action="{{route('newFaculty')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">First name: </label>
                                            <div class="col-lg-9">
                                                <input name="fname" class="form-control" type="text" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Last name: </label>
                                            <div class="col-lg-9">
                                                <input name="lname" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Email: </label>
                                            <div class="col-lg-9">
                                                <input name="email" class="form-control" type="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Username: </label>
                                            <div class="col-lg-9">
                                                <input name="username" class="form-control" type="text" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Password: </label>
                                            <div class="col-lg-9">
                                                <input name="password" class="form-control" type="password" required>
                                                <br>
                                            </div>


                                        </div>


                                        <div class="form-group row ">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                                <button class="btn btn-primary text-capitalize">add faculty</button>

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
    </div>





@endsection

