<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Fav Icon  -->
<link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>App</title>
    <!-- StyleSheets  -->
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/dashlite.css?ver=1.0.0') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/theme.css?ver=1.0.0') }}"  id="skin-default">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/tinymce.css?ver=1.0.0') }}">

@stack('styles')

</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @include('admin.partials.sidebar')

            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                  @include('admin.partials.header')

                <!-- main header @e -->
                <!-- content @s -->
                   @yield('content')
                <!-- content @e -->
                  <!-- footer @s -->
                  @include('admin.partials.footer')
                 <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/admin/js/bundle.js?v=1.0.0') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/scripts.js?v=1.0.0') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/custom.js?v=1.0.0') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/sweetalert2.all.min.js?v=1.0.0') }}" type="text/javascript"></script>

    @stack('scripts')
</body>

</html>