<!DOCTYPE html>
<html lang="pt-br" >
<head>
    <meta charset="utf-8" />
    <title>
        Yago |  Login
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

    <link rel="shortcut icon" href="{!! asset('uploads/adm/media/img/logos/favicon.ico') !!}" />
</head>

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >



<!--begin::page-->
<div class="m-grid m-grid--hor m-grid--root m-page">


    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-2"
         id="m_login" style="background-image: url({!! asset('themes/default/assets/app/media/img//bg/bg-3.jpg') !!});">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{!! asset('uploads/adm/media/img/logos/icon.png') !!}">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Entre no Painel Admin</h3>
                    </div>
                    <form class="m-login__form m-form" method="post" action="{!! route('auth') !!}">
                        {{ csrf_field() }}
                        @if(Session::has('error'))
                            <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-warning alert-dismissible fade show" role="alert">
                                <div class="m-alert__icon">
                                    <i class="flaticon-exclamation-1"></i>
                                    <span></span>
                                </div>
                                <div class="m-alert__text">
                                    <strong>Ops!</strong> Login Inválido.
                                </div>
                                <div class="m-alert__close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <div class="form-group m-form__group">
                            <input class="form-control m-input"   type="text" placeholder="Email" name="email" >
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Senha" name="password">
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--focus">
                                    <input type="checkbox" name="remember"> Relembre-me
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right m-login__form-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">Esqueceu a senha ?</a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                Logar
                            </button>
                        </div>
                    </form>
                </div>

                <div class="m-login__forget-password" hidden>
                    <div class="m-login__head">
                        <h3 class="m-login__title">Forgotten Password ?</h3>
                        <div class="m-login__desc">Enter your email to reset your password:</div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">Request</button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--begin:end-page-->

<!--begin::base scripts -->
<script src="{!! asset('themes/default/assets/vendors/base/vendors.bundle.js') !!}" type="text/javascript"></script>
<script src="{!! asset('themes/default/assets/app/js/scripts.bundle.js') !!}" type="text/javascript"></script>

<!--begin::page snippets -->
<script src="./assets/snippets/pages/user/login.js" type="text/javascript"></script>
</body>
</html>