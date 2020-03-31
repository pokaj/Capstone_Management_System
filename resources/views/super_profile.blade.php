@extends('super_layout')

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
                                </ul>
                                <div class="tab-content py-4">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <div class="tab-pane active" id="profile">
                                        <h4 class="mb-3">User Profile</h4>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p><i class="fa fa-user" aria-hidden="true"></i>  {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                                <p><i class="fa fa-envelope" aria-hidden="true"></i>  {{Auth::user()->email}} </p>
                                                <p><i class="fa fa-phone" aria-hidden="true"></i> {{Auth::user()->phone}} </p>


                                                <h4>Interests</h4>
                                                <p>
                                                    Indie music, skiing and hiking. I love the great outdoors.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->

                                    <div class="tab-pane" id="edit">
                                        <form role="form" method="post" enctype="multipart/form-dataupload" action="{{url('studentProfile')}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="PUT">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                                <div class="col-lg-9">
                                                    <input name="fname" class="form-control" type="text" value="{{Auth::user()->first_name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                                <div class="col-lg-9">
                                                    <input name="lname" class="form-control" type="text" value="{{Auth::user()->last_name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                                <div class="col-lg-9">
                                                    <input name="username" class="form-control" type="text" value="{{Auth::user()->username}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input name="email" class="form-control" type="email" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                                <div class="col-lg-9">
                                                    <input name="phone" class="form-control" type="number" value="{{Auth::user()->phone}}">
                                                    <br>
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

                        </div>
                    </div>
                </div>

            </div>
        </div>




@endsection