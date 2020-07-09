@extends('layouts.app')

@section('content')                     

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">             
        <li>Usuários</li>       
        <li class="active">Páginas</li>
    </ul>
    <!-- END BREADCRUMB -->  

    <div class="page-title">
        <h2><span class="fa fa-file"></span> Páginas</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">

            <div class="col-md-12">
            
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Atualizar página</h3>                               
                        
                        {!! Form::model($page, [
                            'method' => 'PATCH',
                            'route' => ['page.update', $page],
                            'class' => 'form-horizontal'
                        ]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Página:', ['class' => 'col-sm-3 control-label']) !!}

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
                                {!! Form::label('route_name', 'Nome da rota:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::text('route_name', null, ['class' => 'form-control']) !!}

                                    @if($errors->has('route_name'))
                                        <label class="error">
                                            {!! $errors->first('route_name') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('route_path', 'Caminho da rota:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::text('route_path', null, ['class' => 'form-control']) !!}

                                    @if($errors->has('route_path'))
                                        <label class="error">
                                            {!! $errors->first('route_path') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('page.index') }}" class="btn btn-danger">Cancelar</a>
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