<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('script')
    <title>Bootstrap 4 Starter</title>
</head>
<body>
<div class="mynavbar">
    <nav class="navbar bg-faded navbar-toggleable-md">

        <div class="container">
            <a href="" class="navbar-brand">Home</a>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#"  class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="">
        <div class="row">
            <div class="col-md-3 border-class bg-faded">
                <div class="input-group p-3">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn-secondary btn"><i class="fa fa-search"></i></button>
                    </span>
                </div>


                <a href="#" class="jscollapse"><h5 class="px-4 py-2"><i class="fa fa-dashboard "></i> Dashboard</h5></a>

                <a href="#" class="jscollapse1" id="collapse1"><h5 class="px-4 py-2 "><i class="fa fa-wrench"></i> Users <span class="fa fa-angle-down float-md-right "></span></h5></a>
                <div  class="collapse1">
                    <h6 class="pl-5"><a href="{{ route('users.index') }}">All Users</a></h6>
                    <h6 class="pl-5"><a href="{{ route('users.create') }}">Create User</a></h6>
                </div>

                <a href="#" class="jscollapse2" id="collapse2"><h5 class="px-4 py-2 "><i class="fa fa-wrench"></i> Posts <span class="fa fa-angle-down float-md-right "></span></h5></a>
                <div  class="collapse2">
                    <h6 class="pl-5"><a href="{{ route('posts.index') }}">All Posts</a></h6>
                    <h6 class="pl-5"><a href="{{ route('posts.create') }}">Create Post</a></h6>
                </div>

                <a href="#" class="jscollapse3" id="collapse3"><h5 class="px-4 py-2 "><i class="fa fa-wrench"></i> Categories<span class="fa fa-angle-down float-md-right "></span></h5></a>
                <div  class="collapse3">
                    <h6 class="pl-5"><a href="/admin/categories">All Categories</a></h6>
                </div>


            </div>
            <div class="col-md-9">
                <hr class="mt-5">
              @yield('content')
            </div>
        </div>

    </section>

</div>





<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/tether.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>