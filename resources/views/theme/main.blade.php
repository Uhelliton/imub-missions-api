<html lang="pt-br" >
<head>
    <meta charset="utf-8" />
    <title>
        Igestão | @yield('title')
    </title>
    <meta name="description" content="Base portlet examples">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="_url" content="{{ config('app.url') }}"/>

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->

    <!--begin::base styles -->
    <link href="{!! asset('themes/default/assets/vendors/base/vendors.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('themes/default/assets/app/css/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <!--end::base styles -->

    {{-- css dependency pages extends --}}
    @yield('css-includes')

    <link rel="shortcut icon" href="{!! asset('themes/default/assets/demo/default/media/img/logo/favicon.ico') !!}" />
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- begin::header -->
    @include('theme.header')


    <!-- begin::body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- begin: left aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>

        <!-- begin: navigation -->
        @include('theme.navigation')

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- begin::subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    @yield('portlet-header')
                    @include('theme.partials.quick-actions')
                </div>
            </div>


            <!-- begin::content -->
            <div class="m-content">
                @yield('content')
            </div>

        </div>
    </div>
    <!-- end::body -->

    <!-- begin::footer -->
    @include('theme.footer')

</div>
<!-- end:: page -->



<!--begin::base scripts -->
<script src="{!! asset('themes/default/assets/vendors/base/vendors.bundle.js') !!}" type="text/javascript"></script>
<script src="{!! asset('themes/default/assets/app/js/scripts.bundle.js') !!}" type="text/javascript"></script>


{{-- js dependecy pages--}}
@yield('js-includes')

</body>
</html>
