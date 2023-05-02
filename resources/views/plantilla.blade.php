<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Xeloro - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <div class="main-content">
                <header id="page-topbar">
                    <div class="navbar-header">
                        <!-- LOGO -->
                        <div class="navbar-brand-box d-flex align-items-left">
                            <a href="index.html" class="logo">
                                <i class="mdi mdi-album"></i>
                                <span>
                                    Xeloro
                                </span>
                            </a>
                            <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="dropdown d-inline-block ml-2">
                                <button type="button" class="btn header-item waves-effect waves-light"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg"
                                        alt="Header Avatar">
                                    <span class="d-none d-sm-inline-block ml-1">{{ \Auth::user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="/profile">
                                        <span>Profile</span>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center justify-content-between">
                                            Log Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dashboard">
                                            <i class="mdi mdi-home-analytics"></i>Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/profesor">
                                            <i class="mdi mdi-home-analytics"></i>Profesor
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-diamond-stone"></i>UI Elements <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                                            <a href="/xeloro/ui-buttons.html" class="dropdown-item">Buttons</a>
                                            <a href="/xeloro/ui-cards.html" class="dropdown-item">Cards</a>
                                            <a href="/xeloro/ui-carousel.html" class="dropdown-item">Carousel</a>
                                            <a href="/xeloro/ui-embeds.html" class="dropdown-item">Embeds</a>
                                            <a href="/xeloro/ui-general.html" class="dropdown-item">General</a>
                                            <a href="/xeloro/ui-grid.html" class="dropdown-item">Grid</a>
                                            <a href="/xeloro/ui-media-objects.html" class="dropdown-item">Media Objects</a>
                                            <a href="/xeloro/ui-modals.html" class="dropdown-item">Modals</a>
                                            <a href="/xeloro/ui-progressbars.html" class="dropdown-item">Progress Bars</a>
                                            <a href="/xeloro/ui-tabs.html" class="dropdown-item">Tabs</a>
                                            <a href="/xeloro/ui-typography.html" class="dropdown-item">Typography</a>
                                            <a href="/xeloro/ui-toasts.html" class="dropdown-item">Toasts</a>
                                            <a href="/xeloro/ui-tooltips-popovers.html" class="dropdown-item">Tooltips & Popovers</a>
                                            <a href="/xeloro/ui-scrollspy.html" class="dropdown-item">Scrollspy</a>
                                            <a href="/xeloro/ui-spinners.html" class="dropdown-item">Spinners</a>
                                            <a href="/xeloro/ui-sweetalerts.html" class="dropdown-item">Sweet Alerts</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-format-page-break"></i>Pages <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Auth Pages <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                    <a href="/xeloro/auth-login.html" class="dropdown-item">Login</a>
                                                    <a href="/xeloro/auth-register.html" class="dropdown-item">Register</a>
                                                    <a href="/xeloro/auth-recoverpw.html" class="dropdown-item">Recover Password</a>
                                                    <a href="/xeloro/auth-lock-screen.html" class="dropdown-item">Lock Screen</a>
                                                    <a href="/xeloro/auth-404.html" class="dropdown-item">Error 404</a>
                                                    <a href="/xeloro/auth-500.html" class="dropdown-item">Error 500</a>
                                                </div>
                                            </div>
                                            <a href="/xeloro/pages-invoice.html" class="dropdown-item">Invoice</a>
                                            <a href="/xeloro/pages-starter.html" class="dropdown-item">Starter Page</a>
                                            <a href="/xeloro/pages-maintenance.html" class="dropdown-item">Maintenance</a>
                                            <a href="/xeloro/pages-faqs.html" class="dropdown-item">FAQs</a>
                                            <a href="/xeloro/pages-pricing.html" class="dropdown-item">Pricing</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-forms" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-format-list-bulleted-type"></i>Forms <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-forms">
                                            <a href="/xeloro/forms-elements.html" class="dropdown-item">Elements</a>
                                            <a href="/xeloro/forms-plugins.html" class="dropdown-item">Plugins</a>
                                            <a href="/xeloro/forms-validation.html" class="dropdown-item">Validation</a>
                                            <a href="/xeloro/forms-mask.html" class="dropdown-item">Masks</a>
                                            <a href="/xeloro/forms-quilljs.html" class="dropdown-item">Quilljs</a>
                                            <a href="/xeloro/forms-uploads.html" class="dropdown-item">File Uploads</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-charts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-poll"></i>Charts <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                            <a href="/xeloro/charts-morris.html" class="dropdown-item">Morris</a>
                                            <a href="/xeloro/charts-google.html" class="dropdown-item">Google</a>
                                            <a href="/xeloro/charts-chartjs.html" class="dropdown-item">Chartjs</a>
                                            <a href="/xeloro/charts-sparkline.html" class="dropdown-item">Sparkline</a>
                                            <a href="/xeloro/charts-knob.html" class="dropdown-item">Jquery Knob</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-share-variant"></i>More <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-more">
                                            <a href="/xeloro/calendar.html" class="dropdown-item">Calendar</a>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-tables" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Tables <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-tables">
                                                    <a href="/xeloro/tables-basic.html" class="dropdown-item">Basic Tables</a>
                                                    <a href="/xeloro/tables-datatables.html" class="dropdown-item">Data Tables</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-icons" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Icons <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                                    <a href="/xeloro/icons-feather.html" class="dropdown-item">Feather Icons</a>
                                                    <a href="/xeloro/icons-materialdesign.html" class="dropdown-item">Material Design</a>
                                                    <a href="/xeloro/icons-dripicons.html" class="dropdown-item">Dripicons</a>
                                                    <a href="/xeloro/icons-fontawesome.html" class="dropdown-item">Font awesome</a>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-maps" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Maps <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-maps">
                                                    <a href="/xeloro/maps-google.html" class="dropdown-item">Google Maps</a>
                                                    <a href="/xeloro/maps-vector.html" class="dropdown-item">Vector Maps</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>                
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center text-lg-left">
                                    2020 © Xeloro.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right d-none d-lg-block">
                                    Design & Develop by Myra
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/simplebar.min.js"></script>
        <!-- Sparkline Js-->
        <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- Chart Js-->
        <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- Chart Custom Js-->
         <script src="assets/pages/knob-chart-demo.js"></script>
        <!-- Morris Js-->
        <script src="../plugins/morris-js/morris.min.js"></script>
        <!-- Raphael Js-->
        <script src="../plugins/raphael/raphael.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/pages/dashboard-demo.js"></script>
        <!-- App js -->
        <script src="assets/js/theme.js"></script>
    </body>
</html>