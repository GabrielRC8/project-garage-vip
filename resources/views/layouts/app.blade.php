@inject('page', 'App\Http\Controllers\PageController')

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- META SECTION -->
    <title>{{ ENV('APP_NAME') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="{{ URL::asset('img/project-icon.png') }}">

    <script>var baseUrl = "{{ url('/') }}";</script>
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/theme-dark.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/project.css') }}?f=4"/>

    <!-- EOF CSS INCLUDE -->
</head>
<body style="display:none">
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">

            <li class="">
                <a href="{{ route('home.index') }}" style="font-weight:bold; font-size: 22px;">{{ ENV("APP_NAME") }}</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            
            <li class="xn-profile">
                <a href="#" class="profile-mini">
                    <img src="{{
                        Auth::user()->image ? 
                        URL::asset('storage/user/' . Auth::user()->image) : 
                        URL::asset('assets/images/users/avatar.jpg')
                    }}" alt="{{ Auth::user()->name }}" class="mCS_img_loaded">
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="{{
                            Auth::user()->image ? 
                            URL::asset('storage/user/' . Auth::user()->image) : 
                            URL::asset('assets/images/users/avatar.jpg')
                        }}" alt="{{ Auth::user()->name }}" class="mCS_img_loaded">
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name">{{ Auth::user()->name }}</div>
                        <div class="profile-data-title">{{ Auth::user()->group->name }}</div>
                    </div>
                    <div class="profile-controls">
                        <a href="{{ route('home.index') }}" class="profile-control-left"><span class="fa fa-home"></span></a>
                        <a href="{{ route('currentUser.index') }}" class="profile-control-right"><span class="fa fa-user"></span></a>
                    </div>
                </div>                                                                        
            </li>

            <li class="xn-title">Navegação</li>
            
            @if( $page->pagePermission('home.index') )
            <li class="{{ $page->pagePermissionActive('home.index') }}">
                <a href="{{ route('home.index') }}"><span class="fa fa-home"></span> <span class="xn-text">Home</span></a>
            </li>
            @endif

            @if( $page->pagePermission('homeAdmin.index') )
            <li class="{{ $page->pagePermissionActive('homeAdmin.index') }}">
                <a href="{{ route('homeAdmin.index') }}"><span class="fa fa-home"></span> <span class="xn-text">Home</span></a>
            </li>
            @endif

            @if( $page->pagePermission('homeUser.index') )
            <li class="{{ $page->pagePermissionActive('homeUser.index') }}">
                <a href="{{ route('homeUser.index') }}"><span class="fa fa-home"></span> <span class="xn-text">Home</span></a>
            </li>
            @endif

            @if( $page->pagePermission('customer.index') )
            <li class="{{ $page->pagePermissionActive('customer.index') }}">
                <a href="{{ route('customer.index') }}"><span class="fa fa-user"></span> <span class="xn-text">Clientes</span></a>
            </li>
            @endif

            @if( $page->pagePermission('page.index') || 
                 $page->pagePermission('group.index') || 
                 $page->pagePermission('user.index') 
            )
            <li class="xn-openable 
                {{ $page->pagePermissionActive('page.index') }} 
                {{ $page->pagePermissionActive('group.index') }}
                {{ $page->pagePermissionActive('user.index') }}
            ">
                <a href="javascript:void(0);"><span class="fa fa-users"></span> <span class="xn-text">Usuários</span></a>
                <ul>

                    @if( $page->pagePermission('page.index') )
                    <li class="{{ $page->pagePermissionActive('page.index') }}">
                        <a href="{{ route('page.index') }}"><span class="fa fa-file"></span> Páginas</a>
                    </li>
                    @endif
                    
                    @if( $page->pagePermission('group.index') )
                    <li class="{{ $page->pagePermissionActive('group.index') }}">
                        <a href="{{ route('group.index') }}"><span class="fa fa-group"></span> Grupos</a>
                    </li>
                    @endif

                    @if( $page->pagePermission('user.index') )
                    <li class="{{ $page->pagePermissionActive('user.index') }}">
                        <a href="{{ route('user.index') }}"><span class="fa fa-user"></span> Usuários</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

        </ul>
        <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <!-- <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li> -->
            <!-- END TOGGLE NAVIGATION -->
            <!-- SEARCH -->
            <li class="xn-search">
                <form role="form">
                    <input type="text" name="search" placeholder="Search..."/>
                </form>
            </li>   
            <!-- END SEARCH -->                    
            <!-- POWER OFF -->
            <li class="xn-icon-button pull-right last">
                <a class="mb-control" data-box="#mb-signout" href="javascript:void(0);"><span class="fa fa-power-off"></span></a>
            </li>
            
            @if( $page->pagePermission('configuration.index') )
            <li class="xn-icon-button pull-right {{ $page->pagePermissionActive('configuration.index') }}">
                <a href="{{ route('configuration.index') }}"><span class="fa fa-gears"></span></a>
            </li>
            @endif

            <li class="xn-icon-button pull-right {{ $page->pagePermissionActive('currentUser.index') }}">
                <a href="{{ route('currentUser.index') }}"><span class="fa fa-user"></span></a>
            </li>
            <!-- END POWER OFF -->                    
            <!-- MESSAGES -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-comments"></span></a>
                <div class="informer informer-danger">4</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                        <div class="pull-right">
                            <span class="label label-danger">4 new</span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                            <span class="contacts-title">John Doe</span>
                            <p>Praesent placerat tellus id augue condimentum</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                            <span class="contacts-title">Dmitry Ivaniuk</span>
                            <p>Donec risus sapien, sagittis et magna quis</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                            <span class="contacts-title">Nadia Ali</span>
                            <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-offline"></div>
                            <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                            <span class="contacts-title">Darth Vader</span>
                            <p>I want my money back!</p>
                        </a>
                    </div>     
                    <div class="panel-footer text-center">
                        <a href="pages-messages.html">Show all messages</a>
                    </div>                            
                </div>                        
            </li>
            <!-- END MESSAGES -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

         @yield('content')

     </div>
    <!-- END PAGE CONTENT -->

</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Tem certeza que deseja sair?</p>
                <p>Clique em não para cancelar. Clique em sim para sair do usuário atual.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{ route('auth.logout') }}" class="btn btn-success btn-lg">Sim</a>
                    <button class="btn btn-default btn-lg mb-control-close">Não</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="{{ URL::asset('audio/alert.mp3') }}" preload="auto"></audio>
<audio id="audio-fail" src="{{ URL::asset('audio/fail.mp3') }}" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{ URL::asset('js/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/jquery/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/bootstrap/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/summernote/summernote.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/fileinput/fileinput.min.js') }}"></script>    

<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
@yield('page_plugins_js')
<!-- END PAGE PLUGINS -->

<!-- START TEMPLATE -->
<script type="text/javascript" src="{{ URL::asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/project.js') }}"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>