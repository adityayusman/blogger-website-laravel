<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Larablog.id | @yield('pageTitle')</title>
    <!-- CSS files -->

    <link rel="shortcut icon" href="{{ \App\Models\Setting::find(1)->blog_favicon }}" type="image/x-icon">
    <link href="/back/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="/back/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="/back/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="/back/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/back/dist/libs/ijabo/ijabo.min.css">
    <link rel="stylesheet" href="/back/dist/libs/ijobuCropTool/ijaboCropTool.min.css">
    <link rel="stylesheet" href="/jquery-ui-1.13.2/jquery-ui.min.css">
    <link rel="stylesheet" href="/jquery-ui-1.13.2/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/jquery-ui-/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="/amsify/amsify.suggestags.css">

    @stack('stylesheet')
    @livewireStyles
    <link href="/back/dist/css/demo.min.css" rel="stylesheet" />
    <style>
        .swal2-popup {
            font-size: .85rem;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        @include('back.layouts.inc.header')
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                @yield('header')
            </div>
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
            @include('back.layouts.inc.footer')
        </div>
    </div>

    <!-- Libs JS -->
    <script src="/back/dist/libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="/back/dist/libs/ijabo/ijabo.min.js"></script>
    <script src="/back/dist/libs/ijobuCropTool/ijaboCropTool.min.js"></script>
    <script src="/back/dist/libs/ijaboViewer/jquery.ijaboViewer.min.js"></script>
    <script src="/back/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/jquery-ui-1.13.2/jquery-ui.min.js"></script>
    <script src="/amsify/jquery.amsify.suggestags.js"></script>
    <!-- Tabler Core -->
    <script src="/back/dist/js/tabler.min.js"></script>
    @stack('scripts')
    @livewireScripts
    <script>
        $('input[name="post_tags"]').amsifySuggestags();

        window.addEventListener('showToastr', function(event) {
            toastr.remove();
            if (event.detail.type === 'info') {
                toastr.info(event.detail.message);
            } else if (event.detail.type === 'success') {
                toastr.success(event.detail.message)
            } else if (event.detail.type === 'error') {
                toastr.error(event.detail.message)
            } else if (event.detail.type === 'warning') {
                toastr.warning(event.detail.message)
            } else {
                return false;
            }
        });
    </script>
    <script src="/back/dist/js/demo.min.js"></script>

</body>

</html>
