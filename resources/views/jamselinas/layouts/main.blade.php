<!doctype html>
<html lang="en">
    <head>
        <!-- meta -->
        @include('jamselinas.layouts.partials.meta')
        @yield('meta')
        @yield('title')
        @yield('styles')
    </head>
    <body data-smooth-scroll-offset="77">
        <div class="nav-container">
            @include('jamselinas.layouts.partials.header')
        </div>
        <div class="main-container">
            @yield('content')
            
            @include('jamselinas.layouts.partials.footer')
        </div>

        @include('jamselinas.layouts.partials.script')

        @yield('registeredScript')
    </body>

</html>