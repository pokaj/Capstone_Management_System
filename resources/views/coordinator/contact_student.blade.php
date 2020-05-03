@extends('layouts.super_layout')

@section('contact_students')
    <div class="container-fluid">
        <div class="container">
    <div class="mt-3 card">
        <div class="card-header">
            <h4 class="text-capitalize text-black-50">Contact all students</h4>
        </div>
        <div class="card-body">
            <form id="contact_all">
                <div class="modal-header">
                    <label class="text-white form-control" id="subject">Subject: </label>
                    <input class="form-control search-input" name="subject" id="mail_subject" required>
                </div>


                <div class="modal-header">
                    <label class="text-white form-control" id="subject">Message: </label>
                    <textarea class="form-control search-input" rows="4" id="mail_message" required></textarea>
                </div>
                <button class="mt-3 btn btn-primary float-right">Send</button>
            </form>
            <div id="loader"></div>
        </div>
    </div>
<br>
        </div>
    </div>

    @endsection
