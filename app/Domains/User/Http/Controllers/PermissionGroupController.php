<?php

namespace Yago\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Yago\Support\Http\Controllers\Controller;
use Cartalyst\Sentinel\Roles\IlluminateRoleRepository;


class PermissionGroupController extends Controller
{
    /*
     * @var  $aclRoleRepository
     * @type instace class repository
     */
    protected $aclRoleRepository;



    /**
     * Injeta as dependencias da classe
     *
     * @param IlluminateRoleRepository $role
     */
    public function __construct(IlluminateRoleRepository $role)
    {
        $this->aclRoleRepository = $role;
    }


    /**
     * Responsavel para exibir a view index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->aclRoleRepository->all();
        return view('user::permission.index')->with( compact('roles') );
    }


    /**
     * Exibi o formulário para criar um grupo de acesso
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->aclRoleRepository->all();
        return view('user::permission.create')->with( compact('roles') );
    }


    /**
     * Exibi o formulário para editar um grupo de acesso
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->aclRoleRepository->find($id);;
        return view('user::permission.edit')->with( compact('role') );
    }


    /**
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $attributes = [
            'name' => $request->get('permissionName'),
            'slug' => $request->get('permissionSlug'),
            'permissions' => $this->setAttributesPermissions($request)
        ];

        $role = $this->aclRoleRepository->create($attributes);

        if ($role) {
            session()->flash('success', 'O Gurpo de Permissão foi cadastrado com sucesso!');
            return redirect()->back();
        }
    }

    /**
     * Responsavel para setar os atributos de permissao
     *
     * @param Request $request
     * @return array
     */
    public function setAttributesPermissions (Request $request)
    {
        $attributes = [
            "agenda.event.index"  => (bool) $request->get('agenda_event_index') ?? false,
            "agenda.event.create" => (bool) $request->get('agenda_event_create') ?? false,
            "agenda.event.edit"   => (bool) $request->get('agenda_event_edit') ?? false,
            "agenda.event.delete" => (bool) $request->get('agenda_event_delete') ?? false,
            "dashboard.index"     => (bool) $request->get('dashboard_index') ?? false,
            "department.index"  => (bool) $request->get('department_index') ?? false,
            "department.create" => (bool) $request->get('department_create') ?? false,
            "department.edit"   => (bool) $request->get('department_edit') ?? false,
            "department.filter.index"      => (bool) $request->get('department_filter_index') ?? false,
            "department.filter.create"     => (bool) $request->get('department_filter_create') ?? false,
            "department.filter.edit"       => (bool) $request->get('department_filter_edit') ?? false,
            "department.filter.delete"     => (bool) $request->get('department_filter_delete') ?? false,
            "employee.index"    => (bool) $request->get('employee_index') ?? false,
            "employee.create"   => (bool) $request->get('employee_create') ?? false,
            "employee.edit"     => (bool) $request->get('employee_edit') ?? false,
            "employee.delete"   => (bool) $request->get('employee_delete') ?? false,
            "experience.index"    => (bool) $request->get('experience_index') ?? false,
            "experience.create"   => (bool) $request->get('experience_create') ?? false,
            "experience.edit"     => (bool) $request->get('experience_edit') ?? false,
            "experience.delete"   => (bool) $request->get('experience_delete') ?? false,
            "experience.reserve.index"   => (bool) $request->get('experience_reserve_index') ?? false,
            "experience.reserve.payment" => (bool) $request->get('experience_reserve_payment') ?? false,
            "gastronomy.alacarte.reserve.index" => (bool) $request->get('gastronomy_alacarte_reserve_index') ?? false,
            "gastronomy.alacarte.reserve.calendar.index"  => (bool) $request->get('gastronomy_alacarte_reserve_calendar_index') ?? false,
            "gastronomy.alacarte.reserve.calendar.create" => (bool) $request->get('gastronomy_alacarte_reserve_calendar_create') ?? false,
            "gastronomy.alacarte.reserve.calendar.edit"   => (bool) $request->get('gastronomy_alacarte_reserve_calendar_edit') ?? false,
            "gastronomy.alacarte.reserve.map.index"       => (bool) $request->get('gastronomy_alacarte_reserve_map_index') ?? false,
            "questionnaire.index"  => (bool) $request->get('questionnaire_index') ?? false,
            "questionnaire.create" => (bool) $request->get('questionnaire_create') ?? false,
            "questionnaire.edit"   => (bool) $request->get('questionnaire_edit') ?? false,
            "recreation.programmation.index"  => (bool) $request->get('recreation_programmation_index') ?? false,
            "recreation.programmation.create" => (bool) $request->get('recreation_programmation_create') ?? false,
            "recreation.programmation.edit"   => (bool) $request->get('recreation_programmation_edit') ?? false,
            "recreation.programmation.delete" => (bool) $request->get('recreation_programmation_delete') ?? false,
            "report.chart.questionnaire"   => (bool) $request->get('report_chart_questionnaire') ?? false,
            "report.chart.review.employee" => (bool) $request->get('report_chart_review_employee') ?? false,
            "report.chart.solicitation"    => (bool) $request->get('report_chart_solicitation') ?? false,
            "report.table.experience.reserve" => (bool) $request->get('report_table_experience_reserve') ?? false,
            "report.table.gastronomy.alacarte.reserve"    => (bool) $request->get('report_table_gastronomy_alacarte_reserve') ?? false,
            "report.table.solicitation"  => (bool) $request->get('report_table_solicitation') ?? false,
            "review.employee.index"      => (bool) $request->get('review_employee_index') ?? false,
            "simulator.app.index" => (bool) $request->get('simulator_app_index') ?? false,
            "solicitation.index"  => (bool) $request->get('solicitation_index') ?? false,
            "user.index"  => (bool) $request->get('user_index') ?? false,
            "user.create" => (bool) $request->get('user_create') ?? false,
            "user.edit"   => (bool) $request->get('user_edit') ?? false,
            "user.delete" => (bool) $request->get('user_delete') ?? false,
            "user.group.permission.index"  => (bool) $request->get('user_group_permission_index') ?? false,
            "user.group.permission.create" => (bool) $request->get('user_group_permission_create') ?? false,
            "user.group.permission.edit"   => (bool) $request->get('user_group_permission_edit') ?? false
        ];

        return $attributes;
    }


    /**
     * Responsavel para atualizar um grupo de permissao
     *
     * @param  Request  $request
     * @param  int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $attributes = [
            'name' => $request->get('permissionName'),
            'slug' => $request->get('permissionSlug'),
            'permissions' => $this->setAttributesPermissions($request)
        ];

        $role = $this->aclRoleRepository->find($id);
        $role->fill($attributes);
        $role = $role->save();

        if ($role) {
            session()->flash('success', 'O Gurpo de Permissão foi atualizado com sucesso!');
            return redirect()->back();
        }
    }

}
