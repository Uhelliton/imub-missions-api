<div class="m-portlet__body">
    <div class="form-group m-form__group ">
        @if(Session::has('success'))
            <div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--air m-alert--outline" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
                <strong>Sucesso!</strong> {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-2 m-form__group-sub">
            <label> Nome  </label>
            <input type='text' class="form-control m-input" name="permissionName" value="{{ $role->name ?? '' }}"  />
        </div>
        <div class="col-lg-2 m-form__group-sub">
            <label >Slug </label>
            <input type='text' class="form-control m-input" name="permissionSlug" value="{{ $role->slug ?? '' }}"  />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="m-form__group form-group">
                <label class="col-form-label col-lg-12 col-sm-12">Agenda Eventos</label>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="agenda.event.index" value="true"
                                    {{ isset($role->permissions['agenda.event.index']) ? ($role->permissions['agenda.event.index']) ? 'checked' : '' : '' }} > Visualizar Eventos
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="agenda.event.create" value="true"
                                    {{ isset($role->permissions['agenda.event.create']) ? ($role->permissions['agenda.event.create']) ? 'checked' : '' : '' }}> Criar Eventos
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="agenda.event.edit" value="true"
                                    {{ isset($role->permissions['agenda.event.edit']) ? ($role->permissions['agenda.event.edit']) ? 'checked' : '' : '' }}> Editar Eventos
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="agenda.event.delete" value="true"
                                    {{ isset($role->permissions['agenda.event.delete']) ? ($role->permissions['agenda.event.delete']) ? 'checked' : '' : '' }}> Deletar Eventos
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="m-form__group form-group">
                <label class="col-form-label col-lg-4 col-sm-12">Dashboard</label>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="dashboard.index" value="true"
                                    {{ isset($role->permissions['dashboard.index']) ? ($role->permissions['dashboard.index']) ? 'checked' : '' : '' }}> Dashboard
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="m-form__group form-group">
                <label class="col-form-label col-lg-4 col-sm-12">Departamentos</label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="department.index" value="true"
                                    {{ isset($role->permissions['department.index']) ? ($role->permissions['department.index']) ? 'checked' : '' : '' }}> Visualizar Departamentos
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="department.create" value="true"
                                    {{ isset($role->permissions['department.create']) ? ($role->permissions['department.create']) ? 'checked' : '' : '' }}>Criar Departamentos
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="department.create" value="true"
                                    {{ isset($role->permissions['department.create']) ? ($role->permissions['department.create']) ? 'checked' : '' : '' }}> Editar Departamentos
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="department.filter.index" value="true"
                                    {{ isset($role->permissions['department.filter.index']) ? ($role->permissions['department.filter.index']) ? 'checked' : '' : '' }}> Visualizar Filtros
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="department.filter.create" value="true"
                                    {{ isset($role->permissions['department.filter.create']) ? ($role->permissions['department.filter.create']) ? 'checked' : '' : '' }}> Criar Filtros
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="department.filter.edit" value="true"
                                    {{ isset($role->permissions['department.filter.edit']) ? ($role->permissions['department.filter.edit']) ? 'checked' : '' : '' }}> Editar Filtros
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="department.filter.delete" value="true"
                                    {{ isset($role->permissions['department.filter.delete']) ? ($role->permissions['department.filter.delete']) ? 'checked' : '' : '' }}> Deletar Filtros
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-4 col-sm-12">Colaboradores </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="employee.index" value="true"
                                    {{ isset($role->permissions['employee.index']) ? ($role->permissions['employee.index']) ? 'checked' : '' : '' }}> Visualizar Colaboradores
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="employee.create" value="true"
                                    {{ isset($role->permissions['employee.create']) ? ($role->permissions['employee.create']) ? 'checked' : '' : '' }}> Criar Colaboradores
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="employee.edit" value="true"
                                    {{ isset($role->permissions['employee.edit']) ? ($role->permissions['employee.edit']) ? 'checked' : '' : '' }}> Editar Colaboradores
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="employee.delete" value="true"
                                    {{ isset($role->permissions['employee.delete']) ? ($role->permissions['employee.delete']) ? 'checked' : '' : '' }}> Deletar Colaboradores
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="review.employee.index" value="true"
                                    {{ isset($role->permissions['review.employee.index']) ? ($role->permissions['review.employee.index']) ? 'checked' : '' : '' }}> Avaliação Colaboradores
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-4 col-sm-12">Experiências </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="experience.index" value="true"
                                    {{ isset($role->permissions['experience.index']) ? ($role->permissions['experience.index']) ? 'checked' : '' : '' }}> Visualizar Experiências
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="experience.create" value="true"
                                    {{ isset($role->permissions['experience.create']) ? ($role->permissions['experience.create']) ? 'checked' : '' : '' }}> Criar Experiências
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="experience.edit" value="true"
                                    {{ isset($role->permissions['experience.edit']) ? ($role->permissions['experience.edit']) ? 'checked' : '' : '' }}> Editar Experiências
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="experience.delete" value="true"
                                    {{ isset($role->permissions['experience.delete']) ? ($role->permissions['experience.delete']) ? 'checked' : '' : '' }}> Deletar Experiências
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="experience.reserve.index" value="true"
                                    {{ isset($role->permissions['experience.reserve.index']) ? ($role->permissions['experience.reserve.index']) ? 'checked' : '' : '' }}> Visualizar Reserva
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="experience.reserve.payment" value="true"
                                    {{ isset($role->permissions['experience.reserve.payment']) ? ($role->permissions['experience.reserve.payment']) ? 'checked' : '' : '' }}> Registrar Pagamento Reserva
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-12 col-sm-12">Gastronomia (À La Carte) </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="gastronomy.alacarte.reserve.index" value="true"
                                    {{ isset($role->permissions['gastronomy.alacarte.reserve.index']) ? ($role->permissions['gastronomy.alacarte.reserve.index']) ? 'checked' : '' : '' }}> Visualizar Reservas
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="gastronomy.alacarte.reserve.calendar.index" value="true"
                                    {{ isset($role->permissions['gastronomy.alacarte.reserve.calendar.index']) ? ($role->permissions['gastronomy.alacarte.reserve.calendar.index']) ? 'checked' : '' : '' }}> Visualizar Calendário Reservas
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="gastronomy.alacarte.reserve.calendar.create" value="true"
                                    {{ isset($role->permissions['gastronomy.alacarte.reserve.calendar.create']) ? ($role->permissions['gastronomy.alacarte.reserve.calendar.create']) ? 'checked' : '' : '' }}> Criar Calendário Reservas
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="gastronomy.alacarte.reserve.calendar.edit" value="true"
                                    {{ isset($role->permissions['gastronomy.alacarte.reserve.calendar.edit']) ? ($role->permissions['gastronomy.alacarte.reserve.calendar.edit']) ? 'checked' : '' : '' }}> Editar Calendário Reservas
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="gastronomy.alacarte.reserve.map.index" value="true"
                                    {{ isset($role->permissions['gastronomy.alacarte.reserve.map.index']) ? ($role->permissions['gastronomy.alacarte.reserve.map.index']) ? 'checked' : '' : '' }}> Visualizar Mapa Reservas
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-12 col-sm-12">Opinário </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="questionnaire.index" value="true"
                                    {{ isset($role->permissions['questionnaire.index']) ? ($role->permissions['questionnaire.index']) ? 'checked' : '' : '' }}> Visualizar Opionários
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="questionnaire.create" value="true"
                                    {{ isset($role->permissions['questionnaire.create']) ? ($role->permissions['questionnaire.create']) ? 'checked' : '' : '' }}> Cadastrar Opionários Avulso
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="questionnaire.edit" value="true"
                                    {{ isset($role->permissions['questionnaire.edit']) ? ($role->permissions['questionnaire.edit']) ? 'checked' : '' : '' }}> Editar Opionários
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-12 col-sm-12">Lazer (Programação) </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="recreation.programmation.index" value="true"
                                    {{ isset($role->permissions['recreation.programmation.index']) ? ($role->permissions['recreation.programmation.index']) ? 'checked' : '' : '' }}> Visualizar Programação
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="recreation.programmation.create" value="true"
                                    {{ isset($role->permissions['recreation.programmation.create']) ? ($role->permissions['recreation.programmation.create']) ? 'checked' : '' : '' }}> Cadastrar Programação
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="recreation.programmation.edit" value="true"
                                    {{ isset($role->permissions['recreation.programmation.edit']) ? ($role->permissions['recreation.programmation.edit']) ? 'checked' : '' : '' }}> Editar Programação
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="recreation.programmation.delete" value="true"
                                    {{ isset($role->permissions) ? ($role->permissions['recreation.programmation.delete']) ? 'checked' : '' : '' }}> Deletar Programação
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-12 col-sm-12">Relatórios </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="report.table.gastronomy.alacarte.reserve" value="true"
                                    {{ isset($role->permissions['report.table.gastronomy.alacarte.reserve']) ? ($role->permissions['report.table.gastronomy.alacarte.reserve']) ? 'checked' : '' : '' }}> Reservas À La Carte
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="report.table.experience.reserve" value="true"
                                    {{ isset($role->permissions['report.table.experience.reserve']) ? ($role->permissions['report.table.experience.reserve']) ? 'checked' : '' : '' }}> Reservas Experiências
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="report.table.solicitation" value="true"
                                    {{ isset($role->permissions['report.table.solicitation']) ? ($role->permissions['report.table.solicitation']) ? 'checked' : '' : '' }}> Solicitações (Períodos / Anual)
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="report.chart.solicitation" value="true"
                                    {{ isset($role->permissions['report.chart.solicitation']) ? ($role->permissions['report.chart.solicitation']) ? 'checked' : '' : '' }}>Gráfico Solicitações
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="report.chart.questionnaire" value="true"
                                    {{ isset($role->permissions['report.chart.questionnaire']) ? ($role->permissions['report.chart.questionnaire']) ? 'checked' : '' : '' }}> Gráfico Opinários
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="report.chart.review.employee" value="true"
                                    {{ isset($role->permissions['report.chart.review.employee']) ? ($role->permissions['report.chart.review.employee']) ? 'checked' : '' : '' }}> Gráfico Avaliação Colaboradores
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-12 col-sm-12">Solicitações </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="solicitation.index" value="true"
                                    {{ isset($role->permissions['solicitation.index']) ? ($role->permissions['solicitation.index']) ? 'checked' : '' : '' }}> Visualizar Solicitações
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-12 col-sm-12">Simulador App </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="simulator.app.index" value="true"
                                    {{ isset($role->permissions['simulator.app.index']) ? ($role->permissions['simulator.app.index']) ? 'checked' : '' : '' }}> Acesso ao Simulador App
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-12 col-sm-12">Usuários </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="user.index" value="true"
                                    {{ isset($role->permissions['user.index']) ? ($role->permissions['user.index']) ? 'checked' : '' : '' }}> Visualizar Usuários
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="user.create" value="true"
                                    {{ isset($role->permissions['user.create']) ? ($role->permissions['user.create']) ? 'checked' : '' : '' }}> Criar Usuários
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="user.edit" value="true"
                                    {{ isset($role->permissions['user.edit']) ? ($role->permissions['user.edit']) ? 'checked' : '' : '' }}> Editar Usuários
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="user.delete" value="true"
                                    {{ isset($role->permissions['user.delete']) ? ($role->permissions['user.delete']) ? 'checked' : '' : '' }}> Inativar Usuários
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group">
                <label class="col-form-label col-lg-12 col-sm-12">Grupo de Usuários </label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="m-checkbox-list">
                        <label class="m-checkbox">
                            <input type="checkbox" name="user.group.permission.index" value="true"
                                    {{ isset($role->permissions['user.group.permission.index']) ? ($role->permissions['user.group.permission.index']) ? 'checked' : '' : '' }}> Visualizar Grupo Usuários
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="user.group.permission.create" value="true"
                                    {{ isset($role->permissions['user.group.permission.create']) ? ($role->permissions['user.group.permission.create']) ? 'checked' : '' : '' }}> Criar Grupo Usuários
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" name="user.group.permission.edit" value="true"
                                    {{ isset($role->permissions['user.group.permission.edit']) ? ($role->permissions['user.group.permission.edit']) ? 'checked' : '' : '' }}> Editar Grupo Usuários
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>