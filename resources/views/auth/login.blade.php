@extends('layouts.login')

@section('content')

    <div class="login-container">
        
        <div class="login-box animated fadeInDown">
            <div><h1 style="color:white; text-align:center">{{ ENV('APP_NAME') }}</h1></div>
            <div class="login-body">
                <div class="login-title"><strong>Bem vindo</strong>, faça seu login</div>

                    {!! Form::open([
                        'route' => 'auth.login',
                        'class' => 'form-horizontal'
                    ]) !!}
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

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
                        <div class="col-md-6">
                            <a href="{{ route('site.index') }}" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Log In', ['class' => 'btn btn-info btn-block']) !!}
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('password.reset') }}" class="btn btn-link btn-block">Esqueceu sua senha?</a>
                        </div>
                    </div>
                
                {!! Form::close() !!}

            </div>
        </div>
        
    </div>

@endsection