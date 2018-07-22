@extends('theme.main')

@section('title', ' Grupo Permissões')

<!-- includes style dependecy this page -->
@section('css-includes') @stop

@section('portlet-header')
    @component('theme.components.portlet-header', ['category' => 'Permissões', 'subcategory' => 'Grupo'])
        @slot('title')
            Permissões
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Gerenciar Grupo de Permissões
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
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
                        <a href="{!! route('user.permission.create') !!}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--air">
                            <span>
                                <i class="la la-plus "></i>
                                <span>
                                   Lançar Novo
                                </span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <table class="m-datatable" id="html_table" width="100%">
                <thead>
                <tr>
                    <th title="Field #1">#</th>
                    <th title="Field #2">Grupo</th>
                    <th title="Field #3">Slug</th>
                    <th title="Field #3">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td>
                            <a href="{!! route('user.permission.edit', ['id' => $role->id]) !!}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill programmationEdit" title="Editar Grupo">
                                <i class="la la-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<!-- includes js dependecy this page -->
@section('js-includes')
    <script src="{!! asset('themes/default/assets/snippets/pages/user/table-user-permission.js') !!}"></script>
@stop