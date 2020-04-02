@extends('super_layout')

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


                                <form method="" action="">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Faculty name: </label>
                                        <div class="col-lg-9">
                                            <input name="name" id="name" class="form-control" type="text" value="{{old('name')}}" >
                                        </div>
                                    </div>


                                    <div class="form-group row ">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button class="btn btn-primary text-capitalize" >Search</button>

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
