<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Capstone Management System </title>
</head>
<body>

<!-- beginning of nav-bar -->
<nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-targe="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="#myNavbar">
        <div class="container-fluid">
            <div class="row">

                <!-- sidebar begins here-->
                <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
                    <a href="/studentDashboard" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">Dashboard</a>
                    <div class="bottom-border pb-3">
                        <img src="images/avatar.png" alt="avatar" width="40" class="rounded-circle mr-3">
                        <a href="/studentProfile" class="text-white">{{Auth::user()->username}}</a>
                    </div>

                    <ul class="navbar-nav flex-column mt-4">
                        <li class="nav-item  {{'studentDashboard' == request()->path() ? 'current' : ''}}"><a href="/studentDashboard" class="nav-link text-white p-3 mb-2 ">
                                <i class="fas fa-home text-white text-light fa-lg mr-3"></i>Dashboard</a>
                        </li>

                        <li class="nav-item  {{'studentProfile' == request()->path() ? 'current' : ''}}"><a href="/studentProfile" class="nav-link text-white p-3 mb-2 sidebar-link ">
                                <i class="fas fa-user text-white text-light fa-lg mr-3"></i>Profile</a>
                        </li>

                        <li class="nav-item  {{'studentTopics' == request()->path() ? 'current' : ''}}"><a href="/studentTopics" class="nav-link text-white p-3 mb-2 sidebar-link ">
                                <i class="fas fa-book text-white text-light fa-lg mr-3"></i>Topics/Supervisor</a>
                        </li>
                        <li class="nav-item  {{'myProject' == request()->path() ? 'current' : ''}}"><a href="/myProject" class="nav-link text-white p-3 mb-2 sidebar-link ">
                                <i class="fas fa-tasks text-white text-light fa-lg mr-3 "></i>My Project</a>
                        </li>


                    </ul>

                </div>

                <!-- sidebar ends here -->

                <!-- top navigation begins here  -->
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-light text-uppercase mb-0">
                            <img src="images/ashesi.png" height="50" width="230">
                        </div>
                        <div class="col-md-5">
                            <form action="">
                                <div class="input-group">
                                    <input type="" class="form-control search-input" placeholder="search . .  .">
                                    <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-danger "></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <ul class="navbar-nav">
{{--                                <li class="nav-item icon-parent">--}}
{{--                                    <a href="" class="nav-link icon-bullet"><i class="fas fa-comments text-muted fa-lg"></i></a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item icon-parent">--}}
{{--                                    <a href="" class="nav-link icon-bullet"><i class="fas fa-bell text-muted fa-lg"></i></a>--}}
{{--                                </li>--}}
                                <li class="nav-item ml-md-auto mt-2">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                        <a class="text-danger" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </li>
                                <div class="fas fa-sign-out-alt fa-lg mt-2 text-danger ml-1"></div>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- top navigation ends here  -->

            </div>
        </div>
    </div>
</nav>

<!-- end of nav-bar -->

{{--Page layout arrangement --}}
<section>
    <div class="container-fluid">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-5 mt-md-3 mb-5">
                @yield('student_content')
                @yield('student_profile')
                @yield('student_topics')
                @yield('myProject')
{{--                @yield('milestones')--}}
            </div>
        </div>
    </div>
</section>


{{--End of page layout arrangement--}}


<!-- Footer starts here -->
<footer class="container-fluid bg-light ">
    <div class="row"></div>
    <div class="row col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row border-top pt-3">
            <div class="col-lg-6 text-center">
                <ul class="list-inline">
                    <li class="list-inline-item mr-2">
                        <a href="####" class="text-dark">Capstone System</a>
                    </li>
                    <li class="list-inline-item mr-2">
                        <a href="####" class="text-dark">About</a>
                    </li>
                    <li class="list-inline-item mr-2">
                        <a href="####" class="text-dark">Support</a>
                    </li>

                </ul>
            </div>
            <div class="col-lg-6 text-center">
                <p> &copy; 2020 Copyright. <span class="text-danger">Ashesi University</span></p>
            </div>

        </div>
    </div>
</footer>


<!-- Footer ends here  -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
