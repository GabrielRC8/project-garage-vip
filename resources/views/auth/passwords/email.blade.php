@extends('layouts.login')

@section('content')

    <div class="registration-container">            
        <div class="registration-box animated fadeInDown">
            <div><h1 style="color:white; text-align:center">{{ ENV('APP_NAME') }}</h1></div>
            <div class="registration-body">

                <div class="registration-title"><strong>Esqueceu</strong> sua senha?</div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="registration-subtitle">Esqueceu sua senha? Preencha os campos abaixo para iniciar o precesso de recuperação.</div>

                {!! Form::open([
                    'route' => 'password.sendResetLinkEmail',
                    'class' => 'form-horizontal'
                ]) !!}
                    
                    <h4>Email</h4>
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email@domain.com.br' ]) !!}

                            @if($errors->has('email'))
                                <span class="help-block">
                                    {!! $errors->first('email') !!}
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