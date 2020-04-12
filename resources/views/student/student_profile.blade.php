@extends('layouts.studentLayout')

@section('student_profile')

    {{--Section for the user to edit his or her information--}}




{{--    <div class="content">--}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="container">
                        <div class="row my-2">
                            <div class="col-lg-8 order-lg-2">
                                <ul class="nav nav-tabs">
                                    @foreach($dummydata as $dummy)
                                    @if($dummy->student_Id == null)
                                            <li class="nav-item">
                                                <a href="" data-target="#updateProfile" data-toggle="tab" class="nav-link text-danger">
                                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Complete Profile
                                                    <i class="fa fa-exclamation" aria-hidden="true"></i>
                                                    <i class="fa fa-exclamation" aria-hidden="true"></i>
                                                    <i class="fa fa-exclamation" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach

                                    @foreach($dummydata as $dummy)
                                        @if($dummy->student_Id != null)
                                    <li class="nav-item">
                                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                                    </li>
                                        @endif
                                        @endforeach
                                    </ul>
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
                                        <div class="tab-pane" id="updateProfile">

                                            <h4 class="mb-3">Complete your Profile</h4>
                                        <form role="form" method="post" action="{{route('complete')}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="PUT">
                                                     <div class="form-group row col-lg-9">
                                                            <label>Student ID: </label>
                                                            <input class="form-control " name="student_Id" type="number" value="{{old('student_Id')}}" required>
                                                    </div>

                                                    <div class="form-group row col-lg-9">
                                                             <label>Major: </label>
                                                            <select class="form-control" name="major" required>
                                                                <option value="">Choose your major</option>
                                                                @foreach($majorDropdown as $major)
                                                                    <option value="{{$major->major_Id}}">{{$major->major_name}}</option>
                                                                @endforeach
                                                             </select>
                                                    </div>

                                                    <div class="form-group row col-lg-9">
                                                            <label>Year Group: </label>
                                                            <input class="form-control" name="yearGroup" type="number"  value="{{old('yearGroup')}}" required>
                                                    </div>

                                            <div>
                                            <button class="btn btn-primary">Complete</button>
                                            </div>
                                        </form>
                                  </div>

                                    @foreach($dummydata as $dummy)
                                        @if($dummy->student_Id != null)
                                    <div class="tab-pane active" id="profile">
                                            <h4 class="mb-3">User Profile</h4>
                                    <div class="row">
                                        <div class="col-md-8">

                                            <p><i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                            <p ><i class="fa fa-envelope" aria-hidden="true"></i>  {{Auth::user()->email}} </p>
                                        @foreach($studentData as $user)
                                                @if($user->student_major != null)
                                                    <p><i class="fa fa-address-card" aria-hidden="true"></i> {{$user->student_Id}}</p>
                                                    <p><i class="fa fa-university" aria-hidden="true"></i> {{$user->major_name}}</p>
                                                    <p><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{$user->student_yeargroup}}</p>
                                                @endif
                                            @endforeach
                                                        <p><i class="fa fa-phone" aria-hidden="true"></i> {{Auth::user()->phone}} </p>


{{--                                            <h4>Interests</h4>--}}
{{--                                            <p>--}}
{{--                                                Indie music, skiing and hiking. I love the great outdoors.--}}
{{--                                            </p>--}}
                                        </div>
                                    </div>
                                    </div>
                                    <!--/row-->
                                    <div class="tab-pane" id="edit">
                                        <form method="post" id="edit_profile" action="{{route('update')}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="PUT">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                                <div class="col-lg-9">
                                                    <input name="fname" id="fname" class="form-control" type="text" value="{{Auth::user()->first_name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                                <div class="col-lg-9">
                                                    <input name="lname" id="lname" class="form-control" type="text" value="{{Auth::user()->last_name}}">
                                                </div>
                                            </div>

                                            @foreach($studentData as $ID)
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">ID Number</label>
                                                <div class="col-lg-9">
                                                    <input name="id" id="id"class="form-control" type="number" value="{{$ID->student_Id}}">
                                                </div>
                                            </div>
                                            @endforeach

                                        @foreach($studentData as $yearGroup)
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Year Group</label>
                                                <div class="col-lg-9">
                                                    <input name="yearGroup" id="yearGroup" class="form-control" type="number" value="{{$yearGroup->student_yeargroup}}">
                                                </div>
                                            </div>
                                            @endforeach

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                                <div class="col-lg-9">
                                                    <input name="username" id="username" class="form-control" type="text" value="{{Auth::user()->username}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input name="email" id="email" class="form-control" type="email" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                                <div class="col-lg-9">
                                                    <input name="phone" id="phone" class="form-control" type="number" value="{{Auth::user()->phone}}">
                                                    <br>
                                                </div>


                                                <label class="col-lg-3 col-form-label form-control-label">Major</label>
                                                <div class="col-lg-9">

                                                    <select name="major" id="major" class="form-control" type="text" value="">
                                                        @foreach($studentData as $major)
                                                            @if($major->student_major != null)
                                                            <option value="{{$major->major_Id}}">{{$major->major_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                                <div class="col-lg-9">
                                                    <button class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                        @endif
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
{{--    </div>--}}



    @endsection
