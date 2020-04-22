@extends('layouts.faculty_layout')

@section('feedback')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                        <div class="col-lg-8 order-lg-2" >
                            <label><strong>Select Student: </strong></label>
                            <select id='selUser' class="form-control">
                                @foreach($details as $student)
                                    <option value='{{$student->student_user_id}}'>{{$student->first_name}} {{$student->last_name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-lg-8 order-lg-2">
                            <label class="mt-3 "><strong>Feedback: </strong></label>
                            <textarea id="feedback" class="form-control search-input" rows="10" required></textarea>
                            <button  id='but_read' class="btn btn-primary mt-3">Send feedback</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--https://makitweb.com/make-a-dropdown-with-search-box-using-jquery/--}}
