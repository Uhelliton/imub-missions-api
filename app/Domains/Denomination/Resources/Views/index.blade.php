@extends('theme.main')

@section('title', 'Dashboard')

<!-- includes style dependecy this page -->
@section('css-includes')
@stop

@section('portlet-header')
    @component('theme.components.portlet-header', ['category' => 'Dashboard', 'subcategory' => 'Painel'])
        @slot('title')
            Dashboard
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="m-portlet">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-xl-4">
                    <div class="m-portlet__body-">
                        <div class="m-widget17">
                            <div class="m-widget17__stats m--margin-top-70">
                                <div class="m-widget17__items m-widget17__items-col1">
                                    <div class="m-widget17__item" style="height: 100%!important;">
                                        <span class="m-widget17__icon">
                                            <i class="la la-cutlery m--font-brand"></i>
                                        </span>
                                        <a href="{!! route('alacarte.index') !!}">
                                            <span class="m-widget17__subtitle">
                                                 À La Carte
                                            </span>
                                        </a>
                                        <span class="m-widget17__desc">
                                            @priceFormatWithoutDecimal($servicesEffective->alacarte) reservas
                                        </span>
                                    </div>
                                    <div class="m-widget17__item" style="height: 100%!important;">
                                        <span class="m-widget17__icon">
                                            <i class="la la-ship m--font-info"></i>
                                        </span>
                                        <a href="{!! route('experience.reserve.index') !!}">
                                            <span class="m-widget17__subtitle">
                                               Experiências
                                            </span>
                                        </a>
                                        <span class="m-widget17__desc">
                                          @priceFormatWithoutDecimal($servicesEffective->experiencia) reservas
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget17__items m-widget17__items-col2">
                                    <div class="m-widget17__item" style="height: 100%!important;">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-layers m--font-success"></i>
                                        </span>
                                        <a href="{!! route('solicitation.index') !!}">
                                            <span class="m-widget17__subtitle">
                                              Solicitações
                                            </span>
                                        </a>
                                        <span class="m-widget17__desc">
                                            @priceFormatWithoutDecimal($servicesEffective->solicitacao) chamados
                                        </span>
                                    </div>
                                    <div class="m-widget17__item" style="height: 100%!important;">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-list-1 m--font-danger"></i>
                                        </span>
                                        <a href="">
                                            <span class="m-widget17__subtitle">
                                                Avaliações
                                            </span>
                                        </a>
                                        <span class="m-widget17__desc">
                                           @priceFormatWithoutDecimal($servicesEffective->avaliacao)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="m-widget14">
                        <div class="m-widget14__header m--margin-bottom-30">
                            <h3 class="m-widget14__title">
                                Estatística Solicitações
                            </h3>
                            <span class="m-widget14__desc">
                                detalhamento mês a mês
                            </span>
                        </div>
                        <div class="m-widget14__chart" style="height:120px;">
                            <canvas  id="m_chart_daily_sales"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="m-widget14">
                        <div class="m-widget14__header">
                            <h3 class="m-widget14__title">
                                Solicitações por Departamento
                            </h3>
                            <span class="m-widget14__desc">
                                percentual por setores
                            </span>
                        </div>
                        <div class="row  align-items-center">
                            <div class="col">
                                <div id="m_chart_revenue_change" class="m-widget14__chart1" style="height: 180px">
                                </div>
                            </div>
                            <div class="col">
                                <div class="m-widget14__legends" id="departamentStatisticsLegends">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

<!-- includes js dependecy this page -->
@section('js-includes')
    <script src="{!! asset('themes/default/assets/snippets/pages/dashboard/dashboard.js') !!}"></script>
@stop