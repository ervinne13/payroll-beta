<html class="chrome"><head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Blank Page | Bootstrap Based Admin Template - Material Design</title>
        <!-- Favicon-->
        <link rel="icon" href="../../favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{bsb_plugins_url("bootstrap/css/bootstrap.css")}}" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="{{bsb_plugins_url("node-waves/waves.css")}}" rel="stylesheet">

        <!-- Animation Css -->
        <link href="{{bsb_plugins_url("animate-css/animate.css")}}" rel="stylesheet">

        <!-- Custom Css -->
        <link href="{{bsb_css_url("style.min.css")}}" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{bsb_css_url("themes/all-themes.css")}}" rel="stylesheet">
    </head>

    <body class="theme-light-green ls-closed">
        <!-- Page Loader -->
        <div class="page-loader-wrapper" style="display: none;">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-light-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars" style="display: block;"></a>
                    <a class="navbar-brand" href="../../index.html">{{config("app.name")}}</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Call Search -->
                        <li><a href="javascript:void(0);" class="js-search" data-close="true                                                                        "><i class="material-icons">search</i></a></li>
                        <!-- #END# Call Search -->
                        <!-- Notifications -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">notifications</i>
                                <span class="label-count">7</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">NOT                                                                                                                            IFICATIONS</li>
                                <li class="body">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;"><ul class="menu" style="overflow: hidden; width: auto; height: 254px;">
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <div class="icon-circle bg-light-green">
                                                        <i class="material-icons">person_add</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>12 new members joined</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 14 mins ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <div class="icon-circle bg-cyan">
                                                        <i class="material-icons">add_shopping_cart</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>4 sales made</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 22 mins ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <div class="icon-circle bg-red">
                                                        <i class="material-icons">delete_forever</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>Nancy Doe</b> deleted account</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 3 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <div class="icon-circle bg-orange">
                                                        <i class="material-icons">mode_edit</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>Nancy</b> changed name</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 2 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <div class="icon-circle bg-blue-grey">
                                                        <i class="material-icons">comment</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>John</b> commented your post</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 4 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <div class="icon-circle bg-light-green">
                                                        <i class="material-icons">cached</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>John</b> updated status</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 3 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <div class="icon-circle bg-purple">
                                                        <i class="material-icons">settings</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>Settings updated</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> Yesterday
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.498039); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                                <li class="footer">
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">View All Notifications</a>
                                </li>
                            </ul>
                        </li>
                        <!-- #END# Notifications                                                                 -->
                        <!-- Tasks -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">flag</i>
                                <span class="label-count">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">TASKS</li>
                                <li class="body">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;"><ul class="menu tasks" style="overflow: hidden; width: auto; height: 254px;">
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <h4>
                                                        Footer display issue
                                                        <small>32%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-                                                                                                                                                                                valuemin="0" aria-valuemax="100" style="width: 32%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <h4>
                                                        Make new buttons
                                                        <small>45%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <h4>
                                                        Create new dashboard
                                                        <small>54%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <h4>
                                                        Solve transition issue
                                                        <small>65%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <h4>
                                                        Answer GitHub questions
                                                        <small>92%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.498039); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                                <li class="footer">
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">View All Tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- #END# Tasks -->
                        <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">                
                <!-- Menu -->
                <div class="menu">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 385px;"><ul class="list" style="height: 385px; overflow: hidden; width: auto;">
                            <li class="header">MAIN NAVIGATION</li>
                            <li>
                                <a href="../../index.html" class=" waves-effect waves-block">
                                    <i class="material-icons">home</i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../pages/typography.html" class=" waves-effect waves-block">
                                    <i class="material-icons">text_fields</i>
                                    <span>Typography</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../pages/helper-classes.html" class=" waves-effect waves-block">
                                    <i class="material-icons">layers</i>
                                    <span>Helper Classes</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">widgets</i>
                                    <span>Widgets</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                            <span>Cards</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="../../pages/widgets/cards/basic.html" class=" waves-effect waves-block">Basic</a>
                                            </li>
                                            <li>
                                                <a href="../../pages/widgets/cards/colored.html" class=" waves-effect waves-block">Colored</a>
                                            </li>
                                            <li>
                                                <a href="../../pages/widgets/cards/no-header.html" class=" waves-effect waves-block">No Header</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                            <span>Infobox</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="../../pages/widgets/infobox/infobox-1.html" class=" waves-effect waves-block">Infobox-1</a>
                                            </li>
                                            <li>
                                                <a href="../../pages/widgets/infobox/infobox-2.html" class=" waves-effect waves-block">Infobox-2</a>
                                            </li>
                                            <li>
                                                <a href="../../pages/widgets/infobox/infobox-3.html" class=" waves-effect waves-block">Infobox-3</a>
                                            </li>
                                            <li>
                                                <a href="../../pages/widgets/infobox/infobox-4.html" class=" waves-effect waves-block">Infobox-4</a>
                                            </li>
                                            <li>
                                                <a href="../../pages/widgets/infobox/infobox-5.html" class=" waves-effect waves-block">Infobox-5</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">swap_calls</i>
                                    <span>User Interface (UI)</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../pages/ui/alerts.html" class=" waves-effect waves-block">Alerts</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/animations.html" class=" waves-effect waves-block">Animations</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/badges.html" class=" waves-effect waves-block">Badges</a>
                                    </li>

                                    <li>
                                        <a href="../../pages/ui/breadcrumbs.html" class=" waves-effect waves-block">Breadcrumbs</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/buttons.html" class=" waves-effect waves-block">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/collapse.html" class=" waves-effect waves-block">Collapse</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/colors.html" class=" waves-effect waves-block">Colors</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/dialogs.html" class=" waves-effect waves-block">Dialogs</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/icons.html" class=" waves-effect waves-block">Icons</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/labels.html" class=" waves-effect waves-block">Labels</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/list-group.html" class=" waves-effect waves-block">List Group</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/media-object.html" class=" waves-effect waves-block">Media Object</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/modals.html" class=" waves-effect waves-block">Modals</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/notifications.html" class=" waves-effect waves-block">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/pagination.html" class=" waves-effect waves-block">Pagination</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/preloaders.html" class=" waves-effect waves-block">Preloaders</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/progressbars.html" class=" waves-effect waves-block">Progress Bars</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/range-sliders.html" class=" waves-effect waves-block">Range Sliders</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/sortable-nestable.html" class=" waves-effect waves-block">Sortable &amp; Nestable</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/tabs.html" class=" waves-effect waves-block">Tabs</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/thumbnails.html" class=" waves-effect waves-block">Thumbnails</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/tooltips-popovers.html" class=" waves-effect waves-block">Tooltips &amp; Popovers</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/ui/waves.html" class=" waves-effect waves-block">Waves</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">assignment</i>
                                    <span>Forms</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../pages/forms/basic-form-elements.html" class=" waves-effect waves-block">Basic Form Elements</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/forms/advanced-form-elements.html" class=" waves-effect waves-block">Advanced Form Elements</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/forms/form-examples.html" class=" waves-effect waves-block">Form Examples</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/forms/form-validation.html" class=" waves-effect waves-block">Form Validation</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/forms/form-wizard.html" class=" waves-effect waves-block">Form Wizard</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/forms/editors.html" class=" waves-effect waves-block">Editors</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">view_list</i>
                                    <span>Tables</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../pages/tables/normal-tables.html" class=" waves-effect waves-block">Normal Tables</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/tables/jquery-datatable.html" class=" waves-effect waves-block">Jquery Datatables</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/tables/editable-table.html" class=" waves-effect waves-block">Editable Tables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">perm_media</i>
                                    <span>Medias</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../pages/medias/image-gallery.html" class=" waves-effect waves-block">Image Gallery</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/medias/carousel.html" class=" waves-effect waves-block">Carousel</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">pie_chart</i>
                                    <span>Charts</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../pages/charts/morris.html" class=" waves-effect waves-block">Morris</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/charts/flot.html" class=" waves-effect waves-block">Flot</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/charts/chartjs.html" class=" waves-effect waves-block">ChartJS</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/charts/sparkline.html" class=" waves-effect waves-block">Sparkline</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/charts/jquery-knob.html" class=" waves-effect waves-block">Jquery Knob</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0);" class="menu-toggle toggled waves-effect waves-block">
                                    <i class="material-icons">content_copy</i>
                                    <span>Example Pages</span>
                                </a>
                                <ul class="ml-menu" style="display: block;">
                                    <li>
                                        <a href="../../pages/examples/sign-in.html" class=" waves-effect waves-block">Sign In</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/examples/sign-up.html" class=" waves-effect waves-block">Sign Up</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/examples/forgot-password.html" class=" waves-effect waves-block">Forgot Password</a>
                                    </li>
                                    <li class="active">
                                        <a href="../../pages/examples/blank.html" class="toggled waves-effect waves-block">Blank Page</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/examples/404.html" class=" waves-effect waves-block">404 - Not Found</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/examples/500.html" class=" waves-effect waves-block">500 - Server Error</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">map</i>
                                    <span>Maps</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../pages/maps/google.html" class=" waves-effect waves-block">Google Map</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/maps/yandex.html" class=" waves-effect waves-block">YandexMap</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/maps/jvectormap.html" class=" waves-effect waves-block">jVectorMap</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">trending_down</i>
                                    <span>Multi Level Menu</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <span>Menu Item</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <span>Menu Item - 2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                            <span>Level - 2</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <span>Menu Item</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                                    <span>Level - 3</span>
                                                </a>
                                                <ul class="ml-menu">
                                                    <li>
                                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                            <span>Level - 4</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="../changelogs.html" class=" waves-effect waves-block">
                                    <i class="material-icons">update</i>
                                    <span>Changelogs</span>
                                </a>
                            </li>
                            <li class="header">LABELS</li>
                            <li>
                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                    <i class="material-icons col-red">donut_large</i>
                                    <span>Important</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                    <i class="material-icons col-amber">donut_large</i>
                                    <span>Warning</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                    <i class="material-icons col-light-blue">donut_large</i>
                                    <span>Information</span>
                                </a>
                            </li>
                        </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.498039); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px; height: 130.71px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        © 2016 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                    </div>
                    <div class="version">
                        <b>Version: </b> 1.0.4
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->
            <aside id="rightsidebar" class="right-sidebar">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                    <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 553px;"><ul class="demo-choose-skin" style="height: 553px; overflow: hidden; width: auto;">
                                <li data-theme="red" class="active">
                                    <div class="red"></div>
                                    <span>Red</span>
                                </li>
                                <li data-theme="pink">
                                    <div class="pink"></div>
                                    <span>Pink</span>
                                </li>
                                <li data-theme="purple">
                                    <div class="purple"></div>
                                    <span>Purple</span>
                                </li>
                                <li data-theme="deep-purple">
                                    <div class="deep-purple"></div>
                                    <span>Deep Purple</span>
                                </li>
                                <li data-theme="indigo">
                                    <div class="indigo"></div>
                                    <span>Indigo</span>
                                </li>
                                <li data-theme="blue">
                                    <div class="blue"></div>
                                    <span>Blue</span>
                                </li>
                                <li data-theme="light-blue">
                                    <div class="light-blue"></div>
                                    <span>Light Blue</span>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan"></div>
                                    <span>Cyan</span>
                                </li>
                                <li data-theme="teal">
                                    <div class="teal"></div>
                                    <span>Teal</span>
                                </li>
                                <li data-theme="green">
                                    <div class="green"></div>
                                    <span>Green</span>
                                </li>
                                <li data-theme="light-green">
                                    <div class="light-green"></div>
                                    <span>Light Green</span>
                                </li>
                                <li data-theme="lime">
                                    <div class="lime"></div>
                                    <span>Lime</span>
                                </li>
                                <li data-theme="yellow">
                                    <div class="yellow"></div>
                                    <span>Yellow</span>
                                </li>
                                <li data-theme="amber">
                                    <div class="amber"></div>
                                    <span>Amber</span>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange"></div>
                                    <span>Orange</span>
                                </li>
                                <li data-theme="deep-orange">
                                    <div class="deep-orange"></div>
                                    <span>Deep Orange</span>
                                </li>
                                <li data-theme="brown">
                                    <div class="brown"></div>
                                    <span>Brown</span>
                                </li>
                                <li data-theme="grey">
                                    <div class="grey"></div>
                                    <span>Grey</span>
                                </li>
                                <li data-theme="blue-grey">
                                    <div class="blue-grey"></div>
                                    <span>Blue Grey</span>
                                </li>
                                <li data-theme="black">
                                    <div class="black"></div>
                                    <span>Black</span>
                                </li>
                            </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.498039); width: 4px;                                                                                                                                                                                                        position: absolute; top: 0                                                                                                                                                                                                        px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;                                                                                                                                                                                                        height: 339.788px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="settings">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 553px;"><div class="demo-settings" style="height: 553px; overflow: hidden; width: auto;">
                                <p>GENERAL SETTINGS</p>
                                <ul class="setting-list">
                                    <li>
                                        <span>Report Panel Usage</span>
                                        <div class="switch">
                                            <label><in                                                                                                                                                                                                        put type="checkbox" checked=""><span class="lever"></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <span>Email Redirect</span>
                                        <div class="switch">
                                            <label><input type="checkbox"><span class="lever"></span></label>
                                        </div>
                                    </li>
                                </ul>
                                <p>SYSTEM SETTINGS</p>
                                <ul class="setting-list">
                                    <li>
                                        <span>Notifications</span>
                                        <div class="switch">
                                            <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <span>Auto Updates</span>
                                        <div class="switch">
                                            <label><in                                                                                                                                                                                                        put type="checkbox" checked=""><span class="lever"></span></label>
                                        </div>
                                    </li>
                                </ul>
                                <p>ACCOUNT SETTINGS</p>
                                <ul class="setting-list">
                                    <li>
                                        <span>Offline</span>
                                        <div class="switch">
                                            <label><input type="checkbox"><span class="lever"></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <span>Location Permission</span>
                                        <div class="switch">
                                            <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                        </div>
                                    </li>
                                </ul>
                            </div><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.498039); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                    </div>
                </div>
            </aside>
            <!-- #END# Right Sidebar -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>BLANK PAGE</h2>
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="{{bsb_plugins_url("jquery/jquery.min.js")}}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{bsb_plugins_url("bootstrap/js/bootstrap.js")}}"></script>

        <!-- Select Plugin Js -->
        <script src="{{bsb_plugins_url("bootstrap-select/js/bootstrap-select.js")}}"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="{{bsb_plugins_url("jquery-slimscroll/jquery.slimscroll.js")}}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{bsb_plugins_url("node-waves/waves.js")}}"></script>

        <!-- Custom Js -->
        <script src="{{bsb_js_url("admin.js")}}"></script>

        <!-- Demo Js -->
        <script src="{{bsb_js_url("demo.js")}}"></script>

    </body>
</html>