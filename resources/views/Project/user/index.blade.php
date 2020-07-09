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

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif           

                <!-- START DEFAULT TABLE EXPORT -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listagem de usuários</h3>
                        <a href="{{ route('user.create') }}" class="btn btn-success pull-right">Adicionar usuário</a>
                    </div>
                    <div class="panel-body panel-body-table">
                        <div class="table-responsive">
                            <table id="customers" class="table table-striped">
                                <thead>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Grupo</th>
                                    <th>Status</th>
                                    <th width="190">Ações</th>
                                </thead>
                                <tbody>
                                    @if (count($users) > 0)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->group ? $user->group->name : '' }}</td>
                                                <td>{{ $status[$user->status] }}</td>

                                                <td width="190">
                                                    <div class="col-md-6">
                                                        <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Editar &nbsp&nbsp</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['user.destroy', $user]
                                                        ]) !!}
                                                        {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="table-text"><div>Nenhum registro encontrado.</div></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>                                    
                        </div>
                    </div>
                </div>
                <!-- END DEFAULT TABLE EXPORT -->

            </div>

        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->

@endsection