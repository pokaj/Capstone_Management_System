@extends('layouts.faculty_layout')

@section('profile')

{{--Section for the user to edit his or her information--}}

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="container">
                                        <div class="row my-2">
                                            <div class="col-lg-8 order-lg-2">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                                                    </li>
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

                                                    <div class="tab-pane active" id="profile">
                                                        <h4 class="mb-3">User Profile</h4>
                                                        <div class="row">
                                                            <form method="post" class="col-xs-6" enctype="multipart/form-data" action="{{route('upload_image')}}">
                                                                {{csrf_field()}}
                                                            <div class="row">
                                                                @if(Auth::user()->image == null)
                                                                    <img src="images/no_image.png" width="500" class="rounded-circle mr-3">
                                                                @else
                                                                    <div class="col-xs-6">
                                                                        <img src="images/{{Auth::user()->image}}" class="rounded-circle image">
                                                                    </div>
                                                                @endif
                                                                    <div class="col-xs-6">
                                                                        <input class="form-control search-input" type="file" name="picture" required>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                    <button class="btn btn-primary">Upload</button>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                <p class="mt-3 text-muted">jpeg, jpg, png</p>
                                                                </div>

                                                            </form>
                                                            @if(Auth::user()->image == null)
                                                                <p class="text-capitalize mt-3 text-danger">
                                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                                    Please Upload Profile picture</p>
                                                            @endif
                                                            <div class="col-md-8 mt-3">
                                                                <p><i class="fa fa-user" aria-hidden="true"></i>  {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                                                <p><i class="fa fa-envelope" aria-hidden="true"></i>  {{Auth::user()->email}} </p>
                                                                @foreach($depart as $dept)
                                                                <p><i class="fa fa-building" aria-hidden="true"></i> {{$dept->department_name}}</p>
                                                                @endforeach
                                                                <p><i class="fa fa-phone" aria-hidden="true"></i> {{Auth::user()->phone}} </p>
                                                                <h4>Research Interests</h4>
                                                                @foreach($interests as $about)
                                                                <p>{{$about->faculty_interests}}</p>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                    </div>


                                                    <div class="tab-pane" id="edit">
                                                        <form role="form" method="post" action="{{url('profile')}}">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="PUT">
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                                                <div class="col-lg-9">
                                                                    <input name="fname" class="form-control search-input" type="text" value="{{Auth::user()->first_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">

                                                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                                                <div class="col-lg-9">
                                                                    <input name="lname" class="form-control search-input" type="text" value="{{Auth::user()->last_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                                                <div class="col-lg-9">
                                                                    <input name="username" class="form-control search-input" type="text" value="{{Auth::user()->username}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                                <div class="col-lg-9">
                                                                    <input name="email" class="form-control search-input" type="email" value="{{Auth::user()->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                                                <div class="col-lg-9">
                                                                    <input name="phone" class="form-control search-input" type="number" value="{{Auth::user()->phone}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Department</label>
                                                                <div class="col-lg-9">
                                                                    <select name="department" class="form-control" type="text" value="">
                                                                        @foreach($depts as $dept)
                                                                            <option value="{{$dept->department_Id}}">{{$dept->department_name}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>

                                                                <label class="col-lg-3 col-form-label form-control-label">Research Interests</label>
                                                                <div class="col-lg-9">
                                                                    <textarea name="interests" class="form-control mt-3 search-input" type="text" rows="4"></textarea>
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
                                                </div>



                                            </div>
{{--                                            <div class="col-lg-4 order-lg-1 text-center">--}}
{{--                                                <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">--}}


{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

@endsection
