@extends('theme.main')

@section('title', 'Grupo Permissões - Editar')

<!-- includes style dependecy this page -->
@section('css-includes')
@stop

@section('portlet-header')
    @component('theme.components.portlet-header', ['category' => 'Grupo', 'subcategory' => 'Novo'])
        @slot('title')
            Permissões
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Editar Grupo de Permissão - {{ $role->name }}
                            </h3>
                        </div>
                    </div>
                </div>
                <form class="m-form m-form--state m-form--fit" method="POST" action="{!! route('user.permission.update', ['id' => $role->id]) !!}" >
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @include('user::permission.partials.form-body')

                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row  pull-right">
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<!-- includes js dependecy this page -->
@section('js-includes')
@stop