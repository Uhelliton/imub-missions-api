<div class="form-group m-form__group row">
    <div class="col-lg-4 m-form__group-sub">
        <label> Primeiro Nome  </label>
        <input type='hidden' name="clientId" value="{{ Session::get('sessionClientId') }}"/>
        <input type='text' class="form-control m-input" name="firstName"  value="{{ old('firstName') }}" />
        @if ($errors->has('first_name'))
            <span class="m-form__help">{{ $errors->first('first_name') }}</span>
        @endif
    </div>
    <div class="col-lg-4 m-form__group-sub">
        <label >Sobrenome</label>
        <input type='text' class="form-control m-input" name="lastName" value="{{ old('lastName') }}" />
    </div>
    <div class="col-lg-4 m-form__group-sub">
        <label >E-mail</label>
        <input type='email' class="form-control m-input" name="email" value="{{ old('email') }}" />
        @if ($errors->has('email'))
            <span class="m-form__help">{{ $errors->first('email') }} </span>
        @endif
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-3 m-form__group-sub">
        <label> Senha  </label>
        <input type='password' class="form-control m-input" name="password" id="password" value="{{ old('password') }}" />
        @if ($errors->has('password'))
            <span class="m-form__help">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="col-lg-3 m-form__group-sub">
        <label> Confirmar  </label>
        <input type='password' class="form-control m-input" name="passwordConfirm" value="{{ old('passwordConfirm') }}" />
    </div>
    <div class="col-lg-3 m-form__group-sub">
        <label>Grupo Acesso</label>
        <select name="roleId" class="form-control m-bootstrap-select m_selectpicker" id="roles">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3 m-form__group-sub">
        <label>Tipo Usuário</label>
        <select name="userTypeId" class="form-control m-bootstrap-select m_selectpicker">
            @foreach($userTypes as $type)
                <option value="{{ $type->id }}">{{ $type->nome }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-4 m-form__group-sub">
        <label >Foto</label>
        <div class="">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="input-group" style="width: 400px">
                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                        <span class="fileinput-filename"> </span>
                    </div>
                    <span class="input-group-addon btn default btn-file">
                        <span class="fileinput-new"> Selecione imagem </span>
                        <span class="fileinput-exists"> Alterar </span>
                        <input type="file" name="cover"> </span>
                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                </div>
            </div>
        </div>
    </div>
</div>