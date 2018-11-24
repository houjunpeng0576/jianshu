<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title> Admin Lab Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="/css/admin.css">
    <link href="/adminlab/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/adminlab/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="/adminlab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/adminlab/css/style.css" rel="stylesheet" />
    <link href="/adminlab/css/style_responsive.css" rel="stylesheet" />
    <link href="/adminlab/css/style_default.css" rel="stylesheet" id="style_color" />

    <link href="/adminlab/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/adminlab/assets/uniform/css/uniform.default.css" />
    <link href="/adminlab/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="/adminlab/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<!-- BEGIN HEADER -->
@include('admin.layout.header')
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
    <!-- BEGIN SIDEBAR -->
    @include('admin.layout.sidebar')
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN THEME CUSTOMIZER-->
                    <div id="theme-change" class="hidden-phone">
                        <i class="icon-cogs"></i>
                        <span class="settings">
                                <span class="text">Theme:</span>
                                <span class="colors">
                                    <span class="color-default" data-style="default"></span>
                                    <span class="color-gray" data-style="gray"></span>
                                    <span class="color-purple" data-style="purple"></span>
                                    <span class="color-navy-blue" data-style="navy-blue"></span>
                                </span>
							</span>
                    </div>
                    <!-- END THEME CUSTOMIZER-->
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Dashboard
                        <small> General Information </small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Admin Lab</a> <span class="divider">&nbsp;</span>
                        </li>
                        <li><a href="#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
                        <li class="pull-right search-wrap">
                            <form class="hidden-phone">
                                <div class="search-input-area">
                                    <input id=" " class="search-query" type="text" placeholder="Search">
                                    <i class="icon-search"></i>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->

            @yield('content')

        <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
@include('admin.layout.footer')
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="/adminlab/js/jquery-1.8.3.min.js"></script>
<script src="/adminlab/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/adminlab/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/adminlab/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="/adminlab/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/adminlab/js/jquery.blockui.js"></script>
<script src="/adminlab/js/jquery.cookie.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="/adminlab/js/excanvas.js"></script>
<script src="/adminlab/js/respond.js"></script>
<![endif]-->
<script src="/adminlab/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="/adminlab/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="/adminlab/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="/adminlab/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="/adminlab/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="/adminlab/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="/adminlab/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="/adminlab/assets/jquery-knob/js/jquery.knob.js"></script>

<script src="/adminlab/js/jquery.peity.min.js"></script>
<script type="text/javascript" src="/adminlab/assets/uniform/jquery.uniform.min.js"></script>
<script src="/adminlab/js/scripts.js"></script>

@yield('js')

<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.setMainPage(true);
        App.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>