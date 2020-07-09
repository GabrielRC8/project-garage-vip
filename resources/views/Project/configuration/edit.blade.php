@extends('layouts.app')

@section('content')                     

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">             
        <li class="active">Configurações</li>
    </ul>
    <!-- END BREADCRUMB -->  

    <div class="page-title">
        <h2><span class="fa fa-gears"></span> Configurações</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">

            <div class="col-md-12">
            
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Configurações do sistema</h3>

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        {!! Form::model($configuration, [
                            'method' => 'PATCH',
                            'route' => ['configuration.update', $configuration],
                            'class' => 'form-horizontal'
                        ]) !!}

                            <div class="form-group">
                                {!! Form::label('default_password', 'Senha Padrão:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::text('default_password', null, ['class' => 'form-control']) !!}

                                    @if($errors->has('default_password'))
                                        <label class="error">
                                            {!! $errors->first('default_password') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('home.index') }}" class="btn btn-danger">Cancelar</a>
                                {!! Form::submit('Atualizar configurações', ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}                          

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->

@endsection