@extends('layout')

@section('profile')

{{--Section for the user to edit his or her information--}}


                    <div class="content">
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
                                                    <div class="tab-pane active" id="profile">
                                                        <h4 class="mb-3">User Profile</h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p><i class="fa fa-user" aria-hidden="true"></i>  {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                                                <p><i class="fa fa-envelope" aria-hidden="true"></i>  {{Auth::user()->email}} </p>
                                                                <p><i class="fa fa-phone" aria-hidden="true"></i> 0{{Auth::user()->phone}} </p>


                                                                <h4>Interests</h4>
                                                                <p>
                                                                    Indie music, skiing and hiking. I love the great outdoors.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                    </div>
                                                    <div class="tab-pane" id="edit">
                                                        <form role="form">
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                                                <div class="col-lg-9">
                                                                    <input class="form-control" type="text" value="{{Auth::user()->first_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                                                <div class="col-lg-9">
                                                                    <input class="form-control" type="text" value="{{Auth::user()->last_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                                                <div class="col-lg-9">
                                                                    <input class="form-control" type="text" value="{{Auth::user()->username}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                                <div class="col-lg-9">
                                                                    <input class="form-control" type="email" value="{{Auth::user()->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                                                <div class="col-lg-9">
                                                                    <input class="form-control" type="number" value="{{Auth::user()->phone}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Department</label>
                                                                <div class="col-lg-9">
                                                                    <input class="form-control" type="text" value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label">Interests</label>
                                                                <div class="col-lg-9">
                                                                    <textarea class="form-control" type="text" value=""></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                                                <div class="col-lg-9">
                                                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                                                    <input type="button" class="btn btn-primary" value="Save Changes">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 order-lg-1 text-center">
                                                <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                                                <h6 class="mt-2">Upload a different photo</h6>
                                                <label class="custom-file">
                                                    <input type="file" id="file" class="custom-file-input">
                                                    <span class="custom-file-control">Choose file</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

@endsection
