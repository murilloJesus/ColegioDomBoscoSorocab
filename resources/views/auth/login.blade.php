@extends('layouts.app')

@section('content')
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<!-- Login Register area Start-->
<form method="POST" action="{{ route('login') }}">
    <div class="login-content">
        <!-- Login -->
        @csrf
        <div class="nk-block toggled" id="l-login">
            <div class="nk-form">
                <div class="text-center">
                    <img src="/public/admin/img/logo.png" />
                </div>

                <h4>Painel Administrativo</h4>

                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>


                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>

                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Senha" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}> <i></i> Continuar logado</label>
                </div>

                <button type="submit" class="btn btn-login btn-success btn-float"><i
                        class="notika-icon notika-right-arrow right-arrow-ant"></i>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
