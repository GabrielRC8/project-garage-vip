@extends('layouts.site')

@section('content')

    <!-- section start -->
    <!-- ================ -->
    <section class="pv-20 clearfix jumbotron" style="margin-top: -110px; z-index: 500; position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-to-action light-gray-bg p-20 shadow bordered" style="text-align: center;">
                        
                        <!-- main start -->
                        <!-- ================ -->
                        <div style="width: 50%;margin: auto;">
                            <h1 class="page-title"><span class="text-default">404</span></h1>
                            <h2>Ooops! Página não encontrada</h2>
                            <p>Você foi redirecionado para está página de erro porque a URL solicitada não foi encontrada neste servidor. Verifique se digitou a url corretamente.</p>
                            <br>
                            <a href="{{ route('site.index') }}" class="btn btn-default btn-animated btn-lg">HOME<i class="fa fa-home"></i></a>
                            <br>
                        </div>
                        <!-- main end -->

                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>
    <!-- section end -->

@endsection