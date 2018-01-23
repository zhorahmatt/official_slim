<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    @include('slim.layouts.admin.layouts.partials.meta')

    @yield('mystyles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        {{-- header --}}
        @include('slim.layouts.admin.layouts.partials.header')

        @include('slim.layouts.admin.layouts.partials.aside_satu')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('slim.layouts.admin.layouts.partials.footer')

        @include('slim.layouts.admin.layouts.partials.aside_dua')
        <div class="control-sidebar-bg"></div>
    </div>
    @include('slim.layouts.admin.layouts.partials.script')
</body>
</html>