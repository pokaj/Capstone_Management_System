@extends('layouts.faculty_layout')

@section('feedback')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="container">
                    <div class="row my-2">
                        <div class="col-lg-8 order-lg-2">
                            <label>Enter Student Name: </label>
                                    <input class="form-control">
                            <button class="btn btn-primary mt-3">Send feedback</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
