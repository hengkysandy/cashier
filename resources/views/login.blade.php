<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Cashier</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('css/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{ asset('css/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Animate.css -->
    <link href="{{ asset('css/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{url('doLogin')}}" method="POST" role="login">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <h1>Login Form B</h1>
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default" type="submit">Log In</button>
                        </div>
                        @if(count($errors) > 0)
                            <div style="text-align: center; color: red;">
                                <span>Invalid Username or Password</span>
                            </div>
                        @endif

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div>
                                <h1><i class="fa fa-money"></i> Cashier</h1>
                                <p>Copyright &copy by Cashier. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
