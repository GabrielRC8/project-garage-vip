@extends('layouts.login')

@section('content')

    <div class="registration-container">            
        <div class="registration-box animated fadeInDown">
            <div><h1 style="color:white; text-align:center">{{ ENV('APP_NAME') }}</h1></div>
            <div class="registration-body">
                <div class="registration-title"><strong>Redefinir</strong> sua senha</div>
                <div class="registration-subtitle">Preencha os campos abaixo para redefinir sua senha.</div>
                
                {!! Form::open([
                    'route' => 'password.reset',
                    'class' => 'form-horizontal'
                ]) !!}

                {!! Form::hidden('token', $token) !!}
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

                            @if($errors->has('email'))
                                <span class="help-block">
                                    {!! $errors->first('email') !!}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}

                            @if($errors->has('password'))
                                <span class="help-block">
                                    {!! $errors->first('password') !!}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmação da senha']) !!}

                            @if($errors->has('password_confirmation'))
                                <span class="help-block">
                                    {!! $errors->first('password_confirmation') !!}
                                </span>
                            @endif
                        </div>
                    </div>                                                    
                    <div class="form-group push-up-20">
                        <div class="col-md-6">
                            <a href="{{ route('auth.showLoginForm') }}" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Redefinir senha', ['class' => 'btn btn-info btn-block']) !!}
                        </div>
                    </div>
                
                {!! Form::close() !!}

            </div>
        </div>
        
    </div>

@endsection
