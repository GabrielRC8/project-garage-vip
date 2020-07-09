@extends('layouts.login')

@section('content')

    <div class="registration-container">
            <div class="registration-box animated fadeInDown">
                <div><h1 style="color:white; text-align:center">{{ ENV('APP_NAME') }}</h1></div>
                <div class="registration-body">
                    <div class="registration-title"><strong>Cadastro</strong>, faça seu cadastro</div>
                    <div class="registration-subtitle">Utilize o formulário abaixo para fazer seu cadastro e poder acessar a área administrativa. </div>

                    {!! Form::open([
                        'route' => 'auth.register',
                        'class' => 'form-horizontal'
                    ]) !!}

                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}

                            @if($errors->has('name'))
                                <span class="help-block">
                                    {!! $errors->first('name') !!}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

                            @if($errors->has('email'))
                                <span class="help-block">
                                    {!! $errors->first('email') !!}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}

                            @if($errors->has('password'))
                                <span class="help-block">
                                    {!! $errors->first('password') !!}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmação da senha']) !!}

                            @if($errors->has('password_confirmation'))
                                <span class="help-block">
                                    {!! $errors->first('password_confirmation') !!}
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group push-up-30">
                            <div class="col-md-6">
                                <a href="{{ route('site.index') }}" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                            <div class="col-md-6">
                                {!! Form::submit('Cadastrar', ['class' => 'btn btn-info btn-block']) !!}
                            </div>
                        </div>
                    
                    {!! Form::close() !!}

                </div>
            </div>
            
        </div>

@endsection