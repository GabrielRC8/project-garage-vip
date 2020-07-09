@extends('layouts.app')

@section('content')                     

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">                    
        <li class="active">Home</li>
    </ul>
    <!-- END BREADCRUMB -->  

    <div class="page-title">
        <h2><span class="fa fa-bullhorn"></span> Admin</h2>
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
                
                Home Admin

            </div>

        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->

@endsection