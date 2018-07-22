<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
            <!--begin::brand-->
            <div class="m-stack__item m-brand  m-brand--skin-dark ">
                <div class="m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="{!! route('dashboard.index') !!}" class="m-brand__logo-wrapper">
                            <img alt="" src="{!! asset('uploads/logos/yago_dark.png') !!}"/>
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
                        <!--being::toggle-->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                            <span></span>
                        </a>
                        <!--begin:: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!--begin::Responsive Header Menu Toggler -->
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!--begin::Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                <!--begin::horizonal-menu-->
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
                            <a  href="#" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-line-graph"></i>
                                <span class="m-menu__link-text">
                                    Relatórios
                                </span>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:1000px">
                                <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <div class="m-menu__subnav">
                                    <ul class="m-menu__content">
                                        <li class="m-menu__item" hidden>
                                            <h3 class="m-menu__heading m-menu__toggle">
                                                <span class="m-menu__link-text">
                                                    Solicitações
                                                </span>
                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </h3>
                                            <ul class="m-menu__inner">
                                                <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                    <a  href="" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Estatística por Alas (Apartamentos)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                    <a  href="" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Estatística por tipo ocorrencia (linha)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                    <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                    <span class="m-menu__link-text">
                                                        Estatística por tipo ocorrencia (coluna)
                                                    </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="m-menu__item">
                                            <h3 class="m-menu__heading m-menu__toggle">
                                                <span class="m-menu__link-text">
                                                    Gastronomia
                                                </span>
                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </h3>
                                            <ul class="m-menu__inner">
                                                <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                    <a  href="" class="m-menu__link ">
                                                        <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                                            <span></span>
                                                        </i>
                                                        <span class="m-menu__link-text">
                                                            Reservas / Data / Horário
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                    <a  href="" class="m-menu__link ">
                                                        <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                                            <span></span>
                                                        </i>
                                                        <span class="m-menu__link-text">
                                                            Pratos / Data / Horário
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="m-menu__item">
                            <a  href="">
                                <i class="m-menu__link-icon flaticon-paper-plane"></i>
                                <span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap">
                                        <span class="m-menu__link-text">
                                            App
                                        </span>
                                        <span class="m-menu__link-badge">
                                            <span class="m-badge m-badge--brand m-badge--wide">
                                                Acesso
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>


                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                            <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
                                <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-music-2"></i>
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center" style="background: url({!! asset('themes/default/assets/app/media/img/misc/notification_bg.jpg') !!}); background-size: cover;">
                                            <span class="m-dropdown__header-title">
                                                9 Nova
                                            </span>
                                            <span class="m-dropdown__header-subtitle">
                                              Notificações
                                            </span>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                                            Alertas
                                                        </a>
                                                    </li>
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
                                                            Solicitações
                                                        </a>
                                                    </li>
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
                                                            Logs
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                        <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                            <div class="m-list-timeline m-list-timeline--skin-light">
                                                                <div class="m-list-timeline__items">
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge"></span>
                                                                        <span class="m-list-timeline__text">
                                                                           Notificação
                                                                            <span class="m-badge m-badge--success m-badge--wide">
                                                                                Pendente
                                                                            </span>
                                                                        </span>
                                                                        <span class="m-list-timeline__time">
                                                                            14 min
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                        <div class="m-scrollable" m-scrollabledata-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                            <div class="m-list-timeline m-list-timeline--skin-light">
                                                                <div class="m-list-timeline__items">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                        <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                                            <div class="m-stack__item m-stack__item--center m-stack__item--middle">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!--begin::profile-->
                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                        <img src="{!! asset('themes/default/assets/app/media/img/users/user4.jpg') !!}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                    </span>
                                    <span class="m-topbar__username m--hide">
                                        Yago
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center" style="background: url({!! asset('themes/default/assets/app/media/img/misc/user_profile_bg.jpg') !!}); background-size: cover;">
                                            <div class="m-card-user m-card-user--skin-dark">
                                                <div class="m-card-user__pic">
                                                    <img src="{!! asset('themes/default/assets/app/media/img/users/user4.jpg') !!}" class="m--img-rounded m--marginless" alt=""/>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name m--font-weight-500">
                                                        Nome
                                                    </span>
                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                        email
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-light">
                                                    <li class="m-nav__section m--hide">
                                                        <span class="m-nav__section-text">
                                                            Sessão
                                                        </span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                            <span class="m-nav__link-title">
                                                                <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">
                                                                        Meu Perfil
                                                                    </span>
                                                                    <span class="m-nav__link-badge">
                                                                        <span class="m-badge m-badge--success">
                                                                            2
                                                                        </span>
                                                                    </span>
                                                                </span>
															</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="../../header/profile.html" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
                                                                Atividades Recentes
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
                                                                Suporte
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                            Sair
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="m_quick_sidebar_toggle" class="m-nav__item">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-grid-menu"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Topbar -->
            </div>
        </div>
    </div>
</header>