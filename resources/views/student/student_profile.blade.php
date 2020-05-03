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
                                        @if($dummy->student_Id != null)
                                    <li class="nav-item">
                                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" data-target="#change_password" data-toggle="tab" class="nav-link">Change Password</a>
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
                                        @if(session()->has('error'))
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                {{ session()->get('error') }}
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

                                        @foreach($dummydata as $dummy)
                                            @if($dummy->student_Id == null)
                                        <div>
                                            <span class="mb-3 h4 text-danger">Complete your Profile</span>
                                            <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                                            <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                            <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                            <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                        <form role="form" method="post" action="{{route('complete')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input name="_method" type="hidden" value="PUT" >
                                                     <div class="form-group row col-lg-9">
                                                            <label>Student ID: </label>
                                                         <input name="student_Id" type="number" class="form-control search-input"  value="{{old('student_Id')}}" required>


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
                                                        <input name="yearGroup" type="number" class="form-control search-input"  value="{{old('yearGroup')}}" required>

                                                    </div>

                                                    <label class="text-capitalize">choose profile picture</label>

                                            <input name="picture" type="file" class="form-control search-input" required>



                                            <div class="mt-3">
                                            <button class="btn btn-primary">Complete</button>
                                            </div>
                                        </form>
                                  </div>
                                            @endif
                                        @endforeach


                                    @foreach($dummydata as $dummy)
                                        @if($dummy->student_Id != null)
                                    <div class="tab-pane active" id="profile">
                                            <h4 class="mb-3">User Profile</h4>
                                    <div class="row">
                                        <div class="col-md-8">
                                                        <div class="mt-3">
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

                                            <h4>Interests</h4>
                                            @foreach($studentData as $interest)
                                            <p>
                                                {{$interest->interests}}
                                            </p>
                                                @endforeach
                                                        </div>
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
                                                    <input name="fname"  id="fname"  type="text" class="form-control search-input" value="{{Auth::user()->first_name}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                                <div class="col-lg-9">
                                                    <input name="lname"  id="lname"  type="text" class="form-control search-input" value="{{Auth::user()->last_name}}" required>

                                                </div>
                                            </div>

                                            @foreach($studentData as $ID)
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">ID Number</label>
                                                <div class="col-lg-9">
                                                    <input name="id" id="id"class="form-control search-input" type="number" value="{{$ID->student_Id}}">
                                                </div>
                                            </div>
                                            @endforeach

                                        @foreach($studentData as $yearGroup)
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Year Group</label>
                                                <div class="col-lg-9">
                                                    <input name="yearGroup" id="yearGroup" class="form-control search-input" type="number" value="{{$yearGroup->student_yeargroup}}">
                                                </div>
                                            </div>
                                            @endforeach

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                                <div class="col-lg-9">
                                                    <input name="username" id="username" class="form-control search-input" type="text" value="{{Auth::user()->username}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input name="email" id="email" class="form-control search-input" type="email" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                                <div class="col-lg-9">
                                                    <input name="phone" id="phone" class="form-control search-input " type="number" value="{{Auth::user()->phone}}">
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
                                                <label class="col-lg-3 col-form-label form-control-label">Interests</label>
                                                <div class="col-lg-9">
                                                    @foreach($studentData as $interests)
                                                    <textarea class="form-control search-input" name="interests" value="{{$interests->interests}}" rows="4" ></textarea>
                                                        @endforeach
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                                <div class="col-lg-9">
                                                    <button class="btn btn-primary float-right">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                        @endif @endforeach
                                        <div class="tab-pane" id="change_password">
                                            <form role="form" method="post" action="{{route('changePassword')}}">
                                                @csrf
                                                <input name="_method" type="hidden" value="PUT">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Current Password</label>
                                                    <div class="col-lg-9">
                                                        <input name="current_password" class="form-control search-input" type="password" placeholder="Enter current password"  value="{{old('current_password')}}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                                    <div class="col-lg-9">
                                                        <input name="new_password" class="form-control search-input" type="password" placeholder="Enter new password"  value="{{old('new_password')}}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Confirm Password</label>
                                                    <div class="col-lg-9">
                                                        <input name="confirm_password" class="form-control search-input" type="password" placeholder="confirm new password"  value="{{old('confirm_password')}}" required>
                                                    </div>
                                                </div>
                                                <button class="btn btn-danger float-right">Confirm</button>
                                            </form>
                                        </div>
                                </div>
                            </div>
                            @foreach($dummydata as $dummy)
                                @if($dummy->student_Id != null)
                            <div class="col-lg-4 order-lg-1 text-center">
                                <form method="post" class="col-xs-6" enctype="multipart/form-data" action="{{route('upload_image')}}">
                                    {{csrf_field()}}
                                    <div class="row">
                                        @if(Auth::user()->image != null)
                                            <div class="col-xs-6">
                                                <img src="/images/{{Auth::user()->image}}" class="mx-auto img-fluid d-block rounded-circle">
                                            </div>
                                        @endif
                                        <div>
                                            @if(Auth::user()->image == null)
                                                <p class="text-capitalize mt-3 text-danger">
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                    Please Upload Profile picture
                                                </p>
                                            @endif
                                            <p class="mt-3 ml-5 text-center text-muted">  Image Format: jpeg| jpg|  png</p>
                                        </div>
                                        <div class="col-xs-6 mt-3">
                                            <input class="form-control search-input" type="file" name="picture" required>
                                        </div>
                                        <div class="col-xs-6 mt-3">
                                            <button class="btn btn-primary float-right">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                @endif @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
{{--    </div>--}}



    @endsection
