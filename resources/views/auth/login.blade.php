
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta value='{!! csrf_field() !!}'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}" />

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
    <title>{{ $title }}</title>
</head>
<body>

    <div id="logreg-forms">
        <form class="form-signin" action="{{route('sign_in')}}"  method="Post">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>

            <input type="email" id="inputEmail" name="email" class="form-control mb-3" placeholder="Email address" required="" autofocus="">
            <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password" required="">

            <button class="btn btn-success btn-block mt-3" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            {{-- <a href="#" id="forgot_pswd">Forgot password?</a> --}}
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <a href="{{route('register')}}" class="btn btn-primary btn-block" type="button" id="btn-signup" style="color: white;"><i class="fas fa-user-plus"></i> Sign up New Account</a>

           </form>

           <br>

            <form action="{{route('register')}}"  method="Post" class="form-signup">
                @csrf


                <p style="text-align:center">OR</p>

                <input type="text" id="user-name" name="name" class="form-control mb-3" placeholder="Full name" required="" autofocus="">
                <input type="email" id="user-email" name="email" class="form-control mb-3" placeholder="Email address" required autofocus="">
                <input type="password" id="user-pass" name="password" class="form-control mb-3" placeholder="Password" required autofocus="">

                <button class="btn btn-success btn-block mt-5" type="submit"><i class="fas fa-sign-in-alt"></i> Register</button>

                <hr>
                <a href="{{route('login')}}" class="btn btn-primary btn-block mt-1" type="submit" style="color: white;"><i class="fas fa-user-plus"></i> Sign In</a>

            </form>
            <br>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('auth/custom.js') }}"></script>


</body>
</html>
