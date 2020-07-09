@extends('layouts.app')

@section('content')                     

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">             
        <li>Usuários</li>       
        <li class="active">Meu cadastro</li>
    </ul>
    <!-- END BREADCRUMB -->  

    <div class="page-title">
        <h2><span class="fa fa-user"></span> Meu cadastro</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">

            <div class="col-md-12">

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
            
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Atualizar imagem</h3>                               
                        
                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'route' => ['currentUser.updateImage', $user],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                            <div class="form-group">
                                {!! Form::label('image_profile', 'Imagem:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    <input type="file" name="image_profile" class="file-simple"/>

                                    @if($errors->has('image_profile'))
                                    <label class="error">
                                        {!! $errors->first('image_profile') !!}
                                    </label>
                                    @endif
                                </div>
                            </div>

                            <div class="btn-group">
                                {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Atualizar usuário</h3>                               
                        
                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'route' => ['currentUser.update', $user],
                            'class' => 'form-horizontal'
                        ]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Usuário:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}

                                    @if($errors->has('name'))
                                    <label class="error">
                                        {!! $errors->first('name') !!}
                                    </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Email:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::text('email', $user->email, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('current_password', 'Senha atual:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::password('current_password', ['class' => 'form-control']) !!}

                                    @if($errors->has('current_password'))
                                        <label class="error">
                                            {!! $errors->first('current_password') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Senha:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}

                                    @if($errors->has('password'))
                                        <label class="error">
                                            {!! $errors->first('password') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Confirmação da senha:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                                    @if($errors->has('password_confirmation'))
                                        <label class="error">
                                            {!! $errors->first('password_confirmation') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="btn-group">
                                {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->

@endsection