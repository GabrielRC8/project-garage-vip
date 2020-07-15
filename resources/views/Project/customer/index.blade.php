@extends('layouts.app')

@section('content')                     

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">                    
        <li class="active">Clientes</li>
    </ul>
    <!-- END BREADCRUMB -->  

    <div class="page-title">
        <h2><span class="fa fa-user"></span> Clientes</h2>
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
                
                @if(Session::has('flash_error'))
                    <div class="alert alert-danger">
                        {{ Session::get('flash_error') }}
                    </div>
                @endif
                
                <div class="row">

                    <div class="col-md-12">
                    
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- Painel de cadastro -->
                                <h3 class="fa-add">Cadastro de Clientes</h3>
                                
                                {!! Form::open([
                                    'route' => 'customer.store',
                                    'class' => 'form-horizontal'
                                ]) !!}
        
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nome:', ['class' => 'col-sm-1 control-label']) !!}
        
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
                                        {!! Form::label('cpf', 'CPF/CNPJ:', ['class' => 'col-sm-1 control-label']) !!}
        
                                        <div class="col-md-3">
                                            {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
        
                                            @if($errors->has('cpf'))
                                                <label class="error">
                                                    {!! $errors->first('cpf') !!}
                                                </label>
                                            @endif
                                        </div>

                                        {!! Form::label('fone', 'Telefone/Cel:', ['class' => 'col-sm-1 control-label']) !!}
        
                                        <div class="col-md-3">
                                            {!! Form::text('fone', null, ['class' => 'form-control']) !!}       
        
                                            @if($errors->has('fone'))
                                                <label class="error">
                                                    {!! $errors->first('fone') !!}
                                                </label>
                                            @endif
                                        </div>
                                        {!! Form::label('fone_2', 'Telefone/Cel:', ['class' => 'col-sm-1 control-label']) !!}
        
                                        <div class="col-md-3">
                                            {!! Form::text('fone_2', null, ['class' => 'form-control']) !!} 

                                            @if($errors->has('fone_2'))
                                                <label class="error">
                                                    {!! $errors->first('fone_2') !!}
                                                </label>
                                            @endif
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('street', 'Endereço:', ['class' => 'col-sm-1 control-label']) !!}
        
                                        <div class="col-md-5">
                                            {!! Form::text('street', null, ['class' => 'form-control']) !!}
        
                                            @if($errors->has('street'))
                                                <label class="error">
                                                    {!! $errors->first('street') !!}
                                                </label>
                                            @endif
                                        </div>

                                        {!! Form::label('number', 'Número:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-md-1">
                                            {!! Form::text('number', null, ['class' => 'form-control']) !!}
                                            @if($errors->has('number'))
                                                <label class="error">
                                                    {!! $errors->first('number') !!}
                                                </label>
                                            @endif
                                        </div>
                                        {!! Form::label('zipcode', 'CEP:', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-md-2">
                                            {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
                                            @if($errors->has('zipcode'))
                                                <label class="error">
                                                    {!! $errors->first('zipcode') !!}
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <h3 class="fa-add">Veículo</h3>

                                        {!! Form::label('assembler', 'Montadora:', ['class' => 'col-sm-1 control-label'])!!}
        
                                        <div class="col-md-2">
                                            {!! Form::text('assemler', null, ['class' => 'form-control']) !!}
        
                                            @if($errors->has('assembler'))
                                                <label class="error">
                                                    {!! $errors->first('assembler') !!}
                                                </label>
                                            @endif
                                        </div>

                                        {!! Form::label('model', 'Modelo:', ['class' => 'col-sm-1 control-label'])!!}
        
                                        <div class="col-md-2">
                                            {!! Form::text('model', null, ['class' => 'form-control']) !!}
        
                                            @if($errors->has('model'))
                                                <label class="error">
                                                    {!! $errors->first('model') !!}
                                                </label>
                                            @endif
                                        </div>



                                        {!! Form::label('board', 'Placa:', ['class' => 'col-sm-1 control-label']) !!}
        
                                        <div class="col-md-2">
                                            {!! Form::text('board', null, ['class' => 'form-control']) !!}
        
                                            @if($errors->has('board'))
                                                <label class="error">
                                                    {!! $errors->first('board') !!}
                                                </label>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('status', 'Status:', ['class' => 'col-sm-1 control-label']) !!}
        
                                        <div class="col-md-9">
                                            {!! Form::select('status', array('0' => 'Inativo', '1' => 'Ativo'), null, ['class' => 'form-control select']) !!}
        
                                            @if($errors->has('status'))
                                                <label class="error">
                                                    {!! $errors->first('status') !!}
                                                </label>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="btn-group">
                                        <a href="{{ route('customer.index') }}" class="btn btn-danger">Cancelar</a>
                                        {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
                                    </div>
        
                                {!! Form::close() !!}                             
        
                            </div>
                        </div>


                        <!-- Painel de busca /listagem clientes -->

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Buscar de Clientes</h3>
        
                                {!! Form::open([
                                    'route' => 'group.store',
                                    'class' => 'form-horizontal'
                                ]) !!}
        
                                    <div class="form-group">
                                        {!! Form::label('cpf', 'CPF/CNPJ:', ['class' => 'col-sm-3 control-label']) !!}
        
                                        <div class="col-md-3">
                                            {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
        
                                            @if($errors->has('cpf'))
                                            <label class="error">
                                                {!! $errors->first('cpf') !!}
                                            </label>
                                            @endif
                                        </div>
                                    </div>
        
                                            
                                    <div class="btn-group">
                                        <a href="{{ route('group.index') }}">
                                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                                    </div>
        
                                {!! Form::close() !!}                             
        
                            </div>

                
                        </div>
                    </div>
        
                </div>

            </div>

        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->

@endsection