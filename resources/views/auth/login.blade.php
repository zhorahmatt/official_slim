<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <title>CMS Media SAKTI</title>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/font.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/app.css" type="text/css" />

</head>
<body>
<div class="app app-header-fixed">
    

<div class="container w-xxl w-auto-xs">
    <a href class="navbar-brand block m-t">CMS Media SAKTI</a>
    <div class="m-b-lg">
        <div class="wrapper text-center">
            <strong>Sign in to get in touch</strong>
        </div>

        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="text-danger wrapper text-center">
                @if ( count($errors) )
                    <div class="form-group">
                        <label class="form-label">Email atau kata sandi salah</label>
                    </div>
                @endif
            </div>

            <div class="list-group list-group-sm">
                <div class="list-group-item">
                    <input id="email" type="email" placeholder="Email" class="form-control no-border" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="list-group-item">
                    <input id="password" type="password" placeholder="Password" class="form-control no-border" name="password" required>
                </div>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>

            <button type="submit" class="btn btn-lg btn-primary btn-block">Log in</button>
            <div class="text-center m-t m-b"><a href="{{ route('password.request') }}">Forgot password?</a></div>
        </form>
    </div>
    <div class="text-center">
        <p>
            <small class="text-muted">CMS from Media SAKTI<br>&copy; 2017</small>
        </p>
    </div>
</div>


</div>

<script src="{{ asset('assets') }}/admin/libs/jquery/jquery/dist/jquery.js"></script>
<script src="{{ asset('assets') }}/admin/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="{{ asset('assets') }}/admin/js/ui-load.js"></script>
<script src="{{ asset('assets') }}/admin/js/ui-jp.config.js"></script>
<script src="{{ asset('assets') }}/admin/js/ui-jp.js"></script>
<script src="{{ asset('assets') }}/admin/js/ui-nav.js"></script>
<script src="{{ asset('assets') }}/admin/js/ui-toggle.js"></script>
<script src="{{ asset('assets') }}/admin/js/ui-client.js"></script>

</body>
</html>
