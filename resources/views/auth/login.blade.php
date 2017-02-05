<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sign In</title>
        <!-- Favicon-->
        <link rel="icon" href="../../favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->        
        <link href="{{url("css/google-material-design/css.css")}}" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{bsb_plugins_url("bootstrap/css/bootstrap.css")}}" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="{{bsb_plugins_url("node-waves/waves.css")}}" rel="stylesheet">

        <!-- Animation Css -->
        <link href="{{bsb_plugins_url("animate-css/animate.css")}}" rel="stylesheet">

        <!-- Custom Css -->
        <link href="{{bsb_css_url("style.min.css")}}" rel="stylesheet">
    </head>

    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Payroll & Timekeeping</a>
                <small>{{config('app.organization')}}</small>
            </div>
            <div class="card">
                <div class="body">
                    <form id="sign_in" method="POST" action="{{ url('/login') }}">

                        {{ csrf_field() }}

                        <div class="msg">Sign in to start your session</div>
                        <div class="input-group {{ $errors->has('id') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="id" value="{{old("id")}}" placeholder="User Id" required autofocus>
                            </div>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="input-group {{ $errors->has('id') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" value="{{old("password")}}" placeholder="Password" required>
                            </div>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="remember" id="remember" {{old('remember') ? 'checked' : ''}} class="filled-in chk-col-pink">
                                <label for="remember">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="{{bsb_plugins_url("jquery/jquery.min.js")}}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{bsb_plugins_url("bootstrap/js/bootstrap.js")}}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{bsb_plugins_url("node-waves/waves.js")}}"></script>

        <!-- Validation Plugin Js -->
        <script src="{{bsb_plugins_url("jquery-validation/jquery.validate.js")}}"></script>

        <!-- Custom Js -->
        <script src="{{bsb_js_url("admin.js")}}"></script>
        <script src="{{url('js/pages/sign-in/sign-in.js')}}"></script>

    </body>

</html>
