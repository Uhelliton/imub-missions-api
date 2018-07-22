@extends('theme.main')

@section('title', 'Perfil Usuário')

<!-- includes style dependecy this page -->
@section('css-includes')
    <link href="{!! asset('themes/default/assets/vendors/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}" rel="stylesheet" type="text/css" />
@stop

@section('portlet-header')
    @component('theme.components.portlet-header', ['category' => 'Gerenciamento', 'subcategory' => 'Usuários'])
        @slot('title')
            Usuários
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                @set $thumb = !empty($user->thumb) ? $user->thumb : 'default.jpg'
                                <img src="{!! asset('uploads/adm/media/img/users/'.$thumb.'') !!}" alt="foto"/>
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{ $user->first_name }}</span>
                            <a href="" class="m-card-profile__email m-link">{{ $user->email }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#user-profile" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#user-password" role="tab">
                                    Alterar Senha
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    @if(Session::has('success'))
                        <div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--air m-alert--outline" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                            <strong>Sucesso!</strong> {{ Session::get('success') }}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air m-alert--outline" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                            <strong>Sucesso!</strong> {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="tab-pane active" id="user-profile">
                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post"
                              enctype="multipart/form-data" id="formUserEdit" action="{{ route('user.update', ['id' => $user->id]) }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="m-portlet__body">
                                @include('user::partials.form.body-edit')
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--air"> Alterar Dados  </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="user-password">
                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post"
                              id="formUserPasswordEdit" action="{{ route('user.password.update', ['id' => $user->id]) }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="m-portlet__body">
                                @include('user::partials.form.body-password')
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--air"> Confimar  </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- includes js dependecy this page -->
@section('js-includes')
    <script src="{!! asset('themes/default/assets/vendors/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}"></script>
    <script src="{!! asset('themes/default/assets/snippets/pages/user/form-user.js') !!}"></script>
@stop