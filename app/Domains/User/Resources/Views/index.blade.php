@extends('theme.main')

@section('title', 'Gerenciamento Usuários')

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
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Gerenciar Usuários
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
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
            @if ($errors->any())
                <div id="validate" class="hasErrorValidator"></div>
            @endif
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Pesquisar..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
									<span><i class="la la-search"></i></span>
								</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        @if (Sentinel::hasAccess(['user.create']))
                            <button data-toggle="modal" data-target="#modalUserCreate" id="userCreate" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--air">
                            <span>
                                <i class="la la-plus "></i>
                                <span>
                                   Lançar Novo
                                </span>
                            </span>
                            </button>
                        @endif
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <table class="m-datatable" id="html_table" width="100%">
                <thead>
                <tr>
                    <th title="Field #1">#</th>
                    <th title="Field #2">Nome</th>
                    <th title="Field #3">Email</th>
                    <th title="Field #3">Nível Acesso</th>
                    <th title="Field #3">Status</th>
                    <th title="Field #3">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles[0]->name }}</td>
                        <td>{{ ($user->permissions['admin']) ? 'Ativo' : 'Inativo' }}</td>
                        <td data-field="Actions" class="m-datatable__cell">
                            <span style="overflow: visible; width: 132px;">
                                <div class="dropdown ">
                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                        <i class="la la-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right cursor-pointer">
                                        <a class="dropdown-item userPasswordEdit"  data-id="{{ $user->id }}" data-first-name=" {{ $user->first_name }}">
                                            <i class="la la-key "></i> Atualizar Senha
                                        </a>
                                    </div>
                                </div>
                                <a href="{!! route('user.edit', ['id' => $user->id]) !!}"
                                   data-id="{{ $user->id }}" data-first-name=" {{ $user->first_name }}"
                                   data-last-name=" {{ $user->last_name }}"
                                   data-email="{{ $user->email }}" data-role="{{ $user->roles[0]->name }}"
                                   data-role-id="{{ $user->roles[0]->id }}"
                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill userEdit"
                                   title="Editar Usuário">
                                   <i class="la la-edit"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--begin::form-departmant-->
        @include('user::create')
        @include('user::edit')
        @include('user::password')
    </div>
@endsection

<!-- includes js dependecy this page -->
@section('js-includes')
    <script src="{!! asset('themes/default/assets/vendors/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}"></script>
    <script src="{!! asset('themes/default/assets/snippets/pages/user/table-user.js') !!}"></script>
    <script src="{!! asset('themes/default/assets/snippets/pages/user/form-user.js') !!}"></script>
@stop