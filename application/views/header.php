<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <!-- DNS prefetch -->
        <link rel=dns-prefetch href="//fonts.googleapis.com">

        <!-- Use the .htaccess and remove these lines to avoid edge case issues.
             More info: h5bp.com/b/378 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title> Photon - Scan</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

        <!-- CSS: implied media=all -->
        <!-- CSS concatenated and minified via ant build script-->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/style.css"> <!-- Generic style (Boilerplate) -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/960.fluid.css"> <!-- 960.gs Grid System -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/main.css"> <!-- Complete Layout and main styles -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/buttons.css"> <!-- Buttons, optional -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/lists.css"> <!-- Lists, optional -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/icons.css"> <!-- Icons, optional -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/notifications.css"> <!-- Notifications, optional -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/typography.css"> <!-- Typography -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/forms.css"> <!-- Forms, optional -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/tables.css"> <!-- Tables, optional -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/charts.css"> <!-- Charts, optional -->
        <link rel="stylesheet" href="<?php echo site_url()."includes/admin/";?>css/jquery-ui-1.8.15.custom.css"> <!-- jQuery UI, optional -->
        <!-- end CSS-->

        <!-- Fonts -->
        <link href="//fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css">
        <!-- end Fonts-->

        <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

        <!-- All JavaScript at the bottom, except for Modernizr / Respond.
             Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
             For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
        <script src="<?php echo site_url()."includes/admin/";?>js/libs/modernizr-2.0.6.min.js"></script>
    </head>

    <body id="top">

        <!-- Begin of #container -->
        <div id="container">
            <!-- Begin of #header -->
            <div id="header-surround"><header id="header">

                    <!-- Place your logo here -->
                    <img src="<?php echo site_url()."includes/admin/";?>img/logo.png" alt="Grape" class="logo">

                    <!-- Divider between info-button and the toolbar-icons -->
                    <div class="divider-header divider-vertical"></div>

                    <!-- Info-Button -->
                    <a href="javascript:void(0);" onclick="$('#info-dialog').dialog({ modal: true });"><span class="btn-info"></span></a>

                    <!-- Modal Box Content -->
                    <div id="info-dialog" title="About" style="display: none;">
                        <p>Developed by Magdy Medhat</p>
                        <p>magdimedhat@gmail.com</p>
                    </div> <!--! end of #info-dialog -->


                    <!-- Begin of #user-info -->
                    <div id="user-info">
                        <p>
                            <span class="messages"> now: <?php date_default_timezone_set("Africa/Cairo"); echo date("d M, Y") ."&nbsp;&nbsp;&nbsp;". date('h:i A'); ?></span>
                             <a href="<?php echo site_url('web/logout'); ?>" class="button red">Logout</a>
                        </p>
                    </div> <!--! end of #user-info -->
                    

                    

                </header></div> <!--! end of #header -->

            <div class="fix-shadow-bottom-height"></div>

            <!-- Begin of Sidebar -->
            <aside id="sidebar">

                <!-- Search -->
                

                <!-- Begin of #login-details -->
                <section id="login-details">
                    <h1 align="center">Photon Scan</h1>
                    
                    

                    <div class="clearfix"></div>
                </section> <!--! end of #login-details -->

                <!-- Begin of Navigation -->
                <nav id="nav">
                    <ul class="menu collapsible shadow-bottom">
                        <li><a href="<?php echo site_url('web/patients');?>"><img src="<?php echo site_url()."includes/admin/";?>img/icons/packs/fugue/16x16/slide--arrow.png">Patients</a></li>
                        <li><a href="<?php echo site_url('web/doctors');?>"><img src="<?php echo site_url()."includes/admin/";?>img/icons/packs/fugue/16x16/slide--arrow.png">Doctors</a></li>
                        <?php if($type == 'admin'):?>
                        <li><a href="<?php echo site_url('web/scan_types');?>"><img src="<?php echo site_url()."includes/admin/";?>img/icons/packs/fugue/16x16/slide--arrow.png">Scan Types</a></li>
                        <li><a href="<?php echo site_url('web/payment_methods');?>"><img src="<?php echo site_url()."includes/admin/";?>img/icons/packs/fugue/16x16/slide--arrow.png">Payment Methods</a></li>
                        <li><a href="<?php echo site_url('web/income');?>"><img src="<?php echo site_url()."includes/admin/";?>img/icons/packs/fugue/16x16/slide--arrow.png">Income</a></li>
                        <?php endif; ?>
                    </ul>
                </nav> <!--! end of #nav -->

            </aside> <!--! end of #sidebar -->