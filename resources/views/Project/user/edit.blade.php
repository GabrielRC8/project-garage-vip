@extends('layouts.app')

@section('content')                     

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">             
        <li>Usuários</li>       
        <li class="active">Usuários</li>
    </ul>
    <!-- END BREADCRUMB -->  

    <div class="page-title">
        <h2><span class="fa fa-user"></span> Usuários</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">

            <div class="col-md-12">
            
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Atualizar usuário</h3>                               
                        
                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'route' => ['user.update', $user],
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
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}

                                    @if($errors->has('email'))
                                        <label class="error">
                                            {!! $errors->first('email') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('group_id', 'Grupo:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::select('group_id', $groups, null, ['class' => 'form-control']) !!}

                                    @if($errors->has('group_id'))
                                        <label class="error">
                                            {!! $errors->first('group_id') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('status', 'Status:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::select('status', array('0' => 'Inativo', '1' => 'Ativo', '3' => 'Bloqueado'), null, ['class' => 'form-control select']) !!}

                                    @if($errors->has('status'))
                                        <label class="error">
                                            {!! $errors->first('status') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('user.index') }}" class="btn btn-danger">Cancelar</a>
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


@section('page_plugins_js')
    <script type="text/javascript" src="{{ URL::asset('js/plugins/bootstrap/bootstrap-select.js') }}"></script>
@endsection