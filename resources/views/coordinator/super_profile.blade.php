@extends('layouts.super_layout')

@section('super_profile')


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

                                    <li class="nav-item">
                                        <a href="" data-target="#change_password" data-toggle="tab" class="nav-link">Change Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content py-4">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            {{ session()->get('message')}}
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
                                    <div class="tab-pane active" id="profile">
                                        <h4 class="mb-3">User Profile</h4>
                                        <div class="row mt-3">
                                            <div class="col-md-8">
                                                <p><i class="fa fa-user" aria-hidden="true"></i>  {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                                <p><i class="fa fa-envelope" aria-hidden="true"></i>  {{Auth::user()->email}} </p>
                                                <p><i class="fa fa-phone" aria-hidden="true"></i> {{Auth::user()->phone}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->

                                    <div class="tab-pane" id="edit">
                                        <form enctype="multipart/form-data" action="{{url('coord_update')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                                <div class="col-lg-9">
                                                    <input name="fname" type="text"  class="form-control search-input" value="{{Auth::user()->first_name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                                <div class="col-lg-9">
                                                    <input name="lname" type="text"class="form-control search-input" value="{{Auth::user()->last_name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                                <div class="col-lg-9">
                                                    <input name="username" type="text"class="form-control search-input" value="{{Auth::user()->username}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input name="email" type="email"class="form-control search-input" value="{{Auth::user()->email}}">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                                <div class="col-lg-9">
                                                    <input name="phone" type="number"class="form-control search-input" value="{{Auth::user()->phone}}">
                                                    <br>
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

                        </div>
                    </div>
                </div>

            </div>
        </div>




@endsection
