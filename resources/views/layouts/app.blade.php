<html lang="en" data-bs-theme="dark">

<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">

    {{-- Vendor Styles --}}
    @stack('vendor-styles')

    {{-- Global Styles --}}
    <link href="{{ asset('assets/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css">

    {{-- Custom Styles --}}
    @stack('custom-styles')

    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="false" class="app-default">

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid " id="kt_app_page">
            @include('layouts.partials.header')
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content  flex-column-fluid ">
                            <div id="kt_app_content_container" class="app-container  container-xxl ">
                                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.partials.footer')
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
    </div>

    <script>
        var hostUrl = "{{ asset('assets/assets') }}";
    </script>

    {{-- Global Scripts --}}
    <script src="{{ asset('assets/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/assets/js/scripts.bundle.js') }}"></script>

    {{-- Vendor Scripts --}}
    @stack('vendor-scripts')

    {{-- Custom Scripts --}}
    <script src="{{ asset('custom/js/default-ajax-setup.js') }}"></script>
    @stack('custom-scripts')
</body>

</html>
