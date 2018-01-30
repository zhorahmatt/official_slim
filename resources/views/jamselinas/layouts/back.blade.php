<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>

    <!-- meta -->
    @include('jamselinas.layouts.partials.meta')

    @yield('styles')
    
</head>
<body>
    <a id="start"></a>
        <div class="nav-container ">
            @include('jamselinas.layouts.partials.header-absolute')
        </div>
        <div class="main-container">
            <div class="app-content" id="content">
                {{-- contens --}}
                @yield('contents')
            </div>
            {{-- footer section --}}
            {{--  @include('jamselinas.layouts.partials.footer')  --}}
        </div>

    {{-- javascript calling --}}
    @include('jamselinas.layouts.partials.script')

    @yield('registeredScript')
</body>
</html>