@extends('layouts.super_layout')

@section('contact_students')
    <div class="container-fluid">
        <div class="container">
    <div class="mt-3 card">
        <div class="card-header">
            <h4 class="text-capitalize text-black-50">Contact all students</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="modal-header">
                    <label class="text-white form-control" id="subject">Subject: </label>
                    <input class="form-control search-input" name="">
                </div>


                <div class="modal-header">
                    <label class="text-white form-control" id="subject">Message: </label>
                    <textarea class="form-control search-input" rows="4" name=""></textarea>
                </div>
                <button class="mt-3 btn btn-primary">Send</button>
            </form>
        </div>
    </div>
<br>
{{--            <div class="mt-5 card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="text-capitalize text-black-50">contact one student</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form>--}}
{{--                        <div class="modal-header">--}}
{{--                            <label class="text-white form-control" id="to">To: </label>--}}
{{--                            <input class="form-control search-input" name="">--}}
{{--                        </div>--}}

{{--                        <div class="modal-header">--}}
{{--                            <label class="text-white form-control" id="subject">Subject: </label>--}}
{{--                            <input class="form-control search-input" name="">--}}
{{--                        </div>--}}

{{--                        <div class="modal-header">--}}
{{--                            <label class="text-white form-control" id="subject">Message: </label>--}}
{{--                            <textarea class="form-control search-input" rows="4" name=""></textarea>--}}
{{--                        </div>--}}

{{--                        <button class="mt-3 btn btn-primary">Send</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

    @endsection
