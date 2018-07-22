<div class="form-group m-form__group row">
    <div class="col-lg-4 m-form__group-sub">
        <label> Senha  </label>
        <input type='password' class="form-control m-input" name="password" id="passwordChange"/>
        @if ($errors->has('password'))
            <span class="m-form__help">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="col-lg-4 m-form__group-sub">
        <label> Confirmar  </label>
        <input type='password' class="form-control m-input" name="passwordConfirm" />
    </div>
</div>