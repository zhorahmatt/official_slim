<!doctype html>
<html lang="en">
    <head>
        <title></title>
        @include('slim.layouts.partials.meta')
    </head>
    <body data-smooth-scroll-offset="77">
        <div class="nav-container">
            <div>
                @include('slim.layouts.partials.header')
            </div>
        </div>
        <div class="main-container">
            @yield('content')
            
            @include('slim.layouts.partials.footer')
        </div>
        @include('slim.layouts.partials.script')

        @yield('registeredScript')
    </body>

</html>