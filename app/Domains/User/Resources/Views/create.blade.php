<!--begin::Modal-->
<div class="modal fade" id="modalUserCreate" tabindex="-1" role="dialog" data-backdrop="static"  aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header m--bg-fill-metal">
                <h5 class="modal-title">
                    Lançar Novo Usuário
                </h5>
                <i class="flaticon-circle  modal-close cursor-pointer modalClose" data-dismiss="modal" aria-label="Close"> </i>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" enctype="multipart/form-data"
                      id="formUserCreate" action="{!! route('user.store') !!}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="m-portlet__body">
                        @include('user::partials.form.body-create')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--air"> Confimar  </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->