
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta value='{!! csrf_field() !!}'>
<!-- This script got from frontendfreecode.com -->
<title>Payments</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<style>
body {
    background: #f5f5f5;
    margin: 20px;
}
.rounded {
    border-radius: 1rem;
}
.nav-pills .nav-link {
    color: #555;
}
.nav-pills .nav-link.active {
    color: white;
}
input[type="radio"] {
    margin-right: 5px;
}
.bold {
    font-weight: bold;
}

</style>
@yield('header')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-info ">
        <a class="navbar-brand text-white" href="#">U Tech</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-white" href="{{route('logout')}}">Logout</a>
      <h5 class="navbar-brand text-white"><a class="navbar-brand text-white" href="{{route('users.edit',Auth::user()->id)}}">{{Auth::user()->name}}</a></h5>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">

                {{-- <li class="nav-item active pr-3">
                    <a class="nav-link text-white" href="{{route('payment')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pr-3">
                    <a class="nav-link text-white" href="{{route('email.view')}}">Email</a>
                </li>
                <li class="nav-item pr-3">
                    <a class="nav-link text-white" href="{{route('users.show')}}">Users</a>
                </li>
                <li class="nav-item pr-3">
                    <a class="nav-link text-white" href="{{route('role.show')}}">User Roles</a>
                </li>
                <li class="nav-item pr-3">
                    <a class="nav-link text-white" href="{{route('permission.show')}}">User Permissions</a>
                </li>
                <li class="nav-item pr-3">
                    <a class="nav-link text-white" href="{{route('import.export')}}">Import Export</a>
                </li>
                <li class="nav-item pr-3">
                    <a class="nav-link text-white" href="#">Clearence Event</a>
                </li> --}}

            </ul>
        </div>



    </nav>
