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

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif           

                <!-- START DEFAULT TABLE EXPORT -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listagem de páginas</h3>
                        <a href="{{ route('page.create') }}" class="btn btn-success pull-right">Adicionar página</a>
                    </div>
                    <div class="panel-body panel-body-table">
                        <div class="table-responsive">
                            <table id="customers" class="table table-striped">
                                <thead>
                                    <th>Nome</th>
                                    <th>Nome da rota</th>
                                    <th>Caminho da rota</th>
                                    <th width="190">Ações</th>
                                </thead>
                                <tbody>
                                    @if (count($pages) > 0)
                                        @foreach($pages as $page)
                                            <tr>
                                                <td>{{ $page->name }}</td>
                                                <td>{{ $page->route_name }}</td>
                                                <td>{{ $page->route_path }}</td>

                                                <td width="190">
                                                    <div class="col-md-6">
                                                        <a href="{{ route('page.edit', $page) }}" class="btn btn-primary">Editar &nbsp&nbsp</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['page.destroy', $page]
                                                        ]) !!}
                                                        {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="table-text"><div>Nenhum registro encontrado.</div></td>
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