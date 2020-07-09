@extends('layouts.app')

@section('content')                     

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">             
        <li>Usuários</li>       
        <li class="active">Grupos</li>
    </ul>
    <!-- END BREADCRUMB -->  

    <div class="page-title">
        <h2><span class="fa fa-group"></span> Grupos</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">

            <div class="col-md-12">
            
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Novo grupo</h3>

                        {!! Form::open([
                            'route' => 'group.store',
                            'class' => 'form-horizontal'
                        ]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Grupo:', ['class' => 'col-sm-3 control-label']) !!}

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
                                {!! Form::label('home', 'Home:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::text('home', null, ['class' => 'form-control']) !!}

                                    @if($errors->has('home'))
                                        <label class="error">
                                            {!! $errors->first('home') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('status', 'Status:', ['class' => 'col-sm-3 control-label']) !!}

                                <div class="col-md-9">
                                    {!! Form::select('status', ["Inativo","Ativo"], null, ['class' => 'form-control select']) !!}

                                    @if($errors->has('status'))
                                        <label class="error">
                                            {!! $errors->first('status') !!}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('group.index') }}" class="btn btn-danger">Cancelar</a>
                                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
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