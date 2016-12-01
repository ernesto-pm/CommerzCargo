<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CommerzCargo</title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/font-awesome/css/font-awesome.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/bootstrap/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/uniform/css/uniform.default.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')!!}">

    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/morris/morris.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/fullcalendar/fullcalendar.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')!!}">

    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/css/components.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/global/css/plugins.min.css')!!}">

    <link rel="stylesheet" href="{!! URL::asset('theme/assets/layouts/layout/css/layout.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/layouts/layout/css/themes/darkblue.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('theme/assets/layouts/layout/css/custom.min.css')!!}">

    <link href="{!! URL::asset('theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') !!}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{!! URL::asset('favicon.ico') !!}">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.5.0/js/conekta.js"></script>

    <script type="text/javascript">

        // Conekta Public Key
        //Conekta.setPublishableKey('key_KJysdbf6PotS2ut2'); //v3.2
        Conekta.setPublicKey('key_DCXoYGs3roRdcSsxyqgbHsA'); //v5+

        // ...
    </script>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">

        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/">
                <img src="{!! URL::asset('landing/img/logo.png')!!}" alt="logo" class="logo-default" style="width: 100px"> </a>
            <div class="menu-toggler sidebar-toggler"> </div>
        </div>
        <!-- END LOGO -->

        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            @if(!Auth()->guest())
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> 7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">12 pending</span> notifications</h3>
                            <a href="page_user_profile_1.html">view all</a>
                        </li>
                        <li>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                        </a>
                                    </li>
                                </ul><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(99, 114, 131);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have
                                <span class="bold">7 New</span> Messages</h3>
                            <a href="app_inbox.html">view all</a>
                        </li>
                        <li>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                    <li>
                                        <a href="#">
                                                <span class="photo">

                                                    <img src="theme/assets/layouts/layout/img/avatar.png" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                            <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                </ul><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(99, 114, 131);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-default"> 3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li class="external">
                            <h3>You have
                                <span class="bold">12 pending</span> tasks</h3>
                            <a href="app_todo.html">view all</a>
                        </li>
                        <li>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                    <li>
                                        <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                        </a>
                                    </li>
                                </ul><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(99, 114, 131);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
                        </li>
                    </ul>
                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="theme/assets/layouts/layout/img/avatar.png">
                            <span class="username username-hide-on-mobile">  {{Auth()->user()->name}}  </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="/home">
                                    <i class="icon-user"></i> Dashboard </a>
                            </li>
                            <li>
                                <a href="app_calendar.html">
                                    <i class="icon-calendar"></i> Mi calendario (TODO) </a>
                            </li>
                            <li>
                                <a href="app_inbox.html">
                                    <i class="icon-envelope-open"></i> Mis mensajes (TODO)
                                    <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="app_todo.html">
                                    <i class="icon-rocket"></i> Mis tareas (TODO)
                                    <span class="badge badge-success"> 7 </span>
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="/logout">
                                    <i class="icon-key"></i> Salir </a>
                            </li>
                        </ul>
                    </li>

                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="/logout" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
                @else

                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="/register">
                                Registrate
                            </a>
                        </li>

                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li>
                            <a href="/login">
                                Inicia Sesion
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                @endif
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!--END HEADER-->

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->

<div class="page-container">

    <!-- SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide.speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"> </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <li class="nav-item">
                    <a href="/home" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="arrow"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END SIDEBAR -->

    <div class="page-content-wrapper">
        <div class="page-content" style="min-height:1112px;">

            @yield('content')
        </div>
    </div>


</div>



    <!-- JavaScripts -->

    <script src="{!! URL::asset('theme/assets/global/plugins/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/js.cookie.min.js')!!}"type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/jquery.blockui.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/uniform/jquery.uniform.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')!!}" type="text/javascript"></script>

    <script src="{!! URL::asset('theme/assets/global/plugins/moment.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/global/plugins/clockface/js/clockface.js')!!}" type="text/javascript"></script>

    <script src="{!! URL::asset('theme/assets/global/scripts/app.min.js')!!}" type="text/javascript"></script>
    <script src="{!! URL::asset('theme/assets/pages/scripts/components-date-time-pickers.min.js')!!}" type="text/javascript"></script>


    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
