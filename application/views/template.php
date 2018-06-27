
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
    <!--<![endif]-->

    <head>
        <title>Sistem Informasi Akademik SMKN 1 Pleret</title>
        
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minisum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="Responsive Admin Template build with Twitter Bootstrap and jQuery" name="description" />
        <meta content="ClipTheme" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link rel="shortcut icon" href="http://localhost/akademik/assets/logo.png">
        <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Raleway:400,100,200,300,500,600,700,800,900/" />
        <link type="text/css" rel="stylesheet" href="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/font-awesome/css/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/fonts/clip-font.min.css" />
        <link type="text/css" rel="stylesheet" href="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/iCheck/skins/all.css" />
        <link type="text/css" rel="stylesheet" href="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" />
        <link type="text/css" rel="stylesheet" href="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/sweetalert/dist/sweetalert.css" />
        <link type="text/css" rel="stylesheet" href="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/css/main.min.css" />
        <link type="text/css" rel="stylesheet" href="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/css/main-responsive.min.css" />
        <link type="text/css" rel="stylesheet" media="print" href="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/css/print.min.css" />
        <link type="text/css" rel="stylesheet" id="skin_color" href="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/css/theme/light.min.css" />
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type='text/css'/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link href="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>

    <body>

<!--         <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container" box-sizing:content-box; height:300; style="margin-bottom: 15px">
                <div class="navbar-header">
 

                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href="index.html">
                    <!-- <div class="span2"> -->
                    <img align="left" width=50 height=50 src="http://localhost/akademik/assets/logo.png"> <br>
                 <!-- </div> -->
                 <h1 align="left" style="font-family:'arial'">SISTEM INFORMASI AKADEMIK</h> 
                <p>SMK NEGERI 1 PLERET</p></a>
                    <!-- end: LOGO -->

                </div>
 
                        <!-- start: PAGE SIDEBAR TOGGLE -->
                        <!-- end: PAGE SIDEBAR TOGGLE -->
                    <!-- </ul> -->
                    <!-- end: TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container" style="margin-top: 110px">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                <div class="main-navigation navbar-collapse collapse">
                    <!-- start: MAIN MENU TOGGLER BUTTON -->
                    <div class="navigation-toggler">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>  
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                    <!-- end: MAIN MENU TOGGLER BUTTON -->
                    <!-- start: MAIN NAVIGATION MENU -->
                    <ul class="main-navigation-menu">

                        <!-- ini area menu dinamis --->

                        <?php
                        $id_level_user = $this->session->userdata('id_level_user');
                        $sql_menu = "SELECT * FROM tabel_menu WHERE id in(select id_menu from tbl_user_rule where id_level_user=$id_level_user) and is_main_menu=0";
                        $main_menu = $this->db->query($sql_menu)->result();
                        foreach ($main_menu as $main) {
                            // chek apakah ada submenu ?
                            $submenu = $this->db->get_where('tabel_menu', array('is_main_menu' => $main->id));
                            if ($submenu->num_rows() > 0) {
                                // tampilkan submenu disini
                                echo "<li>
                                    <a href='javascript:void(0)'>
                                    <i class='" . $main->icon. "'></i>
                                    <span class='title'> " . strtoupper($main->nama_menu) . " </span>
                                    <i class='fa fa-angle-down' aria-hidden='true'></i>
                                    <span class='selected'></span>
                                    </a>
                                    <ul class='sub-menu'>";
                                foreach ($submenu->result() as $sub) {
                                    echo "<li>" . anchor($sub->link, "<i class='" . $sub->icon . "'></i> " . strtoupper($sub->nama_menu)) . "</li>";
                                }

                                echo"</ul>
                                    </li>";
                            } else {
                                // tampilkan main menu
                                echo "<li>" . anchor($main->link, "<i class='" . $main->icon . "'></i>" . strtoupper($main->nama_menu)) . "</li>";
                            }
                        }
                    ?>    
<li>
                             <?php
                                    echo anchor('auth/logout', '<i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;LOG OUT');
                                    ?>
                                    </li>
                    <!-- end: MAIN NAVIGATION MENU -->
                </div>
                <!-- end: SIDEBAR -->
            </div>

            <!-- start: PAGE -->
            <div class="main-content">
                <!-- start: PANEL CONFIGURATION MODAL FORM -->
                <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <h4 class="modal-title">Panel Configuration</h4>
                            </div>
                            <div class="modal-body">
                                Here will be a configuration form
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">
                                    Save changes
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: STYLE SELECTOR BOX -->
                            <div id="style_selector" class="hidden-xs close-style">
                                <div id="style_selector_container" style="display:block">
                                    <div class="style-main-title">
                                        Style Selector
                                    </div>
                                    <div class="box-title">
                                        Choose Your Layout Style
                                    </div>
                                    <div class="input-box">
                                        <div class="input">
                                            <select name="layout">
                                                <option value="default">Wide</option>
                                                <option value="boxed">Boxed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-title">
                                        Choose Your Orientation
                                    </div>
                                    <div class="input-box">
                                        <div class="input">
                                            <select name="orientation">
                                                <option value="default">Default</option>
                                                <option value="rtl">RTL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-title">
                                   
                                        Choose Your Footer Style
                                    </div>
                                    <div class="input-box">
                                        <div class="input">
                                            <select name="footer">
                                                <option value="default">Default</option>
                                                <option value="fixed">Fixed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-title">
                                        Backgrounds for Boxed Version
                                    </div>
                                    <div class="images boxed-patterns">
                                        <a id="bg_style_1" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/bg.png"></a>
                                        <a id="bg_style_2" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/bg_2.png"></a>
                                        <a id="bg_style_3" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/bg_3.png"></a>
                                        <a id="bg_style_4" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/bg_4.png"></a>
                                        <a id="bg_style_5" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/bg_5.png"></a>
                                    </div>
                                    <div class="box-title">
                                        5 Predefined Color Schemes
                                    </div>
                                    <div class="images icons-color">
                                        <a id="light" href="#"><img class="active" alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/lightgrey.png"></a>
                                        <a id="dark" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/darkgrey.png"></a>
                                        <a id="black-and-white" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/blackandwhite.png"></a>
                                        <a id="navy" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/navy.png"></a>
                                        <a id="green" href="#"><img alt="" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/green.png"></a>
                                    </div>
                                    <div style="height:25px;line-height:25px; text-align: center">
                                        <a class="clear_style" href="#">
                                            Clear Styles
                                        </a>
                                        <a class="save_style" href="#">
                                            Save Styles
                                        </a>
                                    </div>
                                </div>
                               
                            <!-- end: STYLE SELECTOR BOX -->
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li class="active">
                                    Dashboard
                                </li>
                                <li class="search-box">
                                    <form class="sidebar-search">
                                        <div class="form-group">
                                            <input type="text" placeholder="Start Searching...">
                                            <button class="submit">
                                                <i class="clip-search-3"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ol>
                            <div class="page-header">
                                <h1>Dashboard <small>overview &amp; stats </small></h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                    <div class="row">

                        <?php echo $contents; ?>

                        <!-- end: PAGE CONTENT-->
                    </div>
                </div>
                <!-- end: PAGE -->
            </div>
            
            <!-- end: MAIN CONTAINER -->
            <!-- start: FOOTER -->
            <div class="footer clearfix">
                <div class="footer-inner">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; 
                </div>
                <div class="footer-items">
                    <span class="go-top"><i class="fa fa-archive"></i>simpan</span>
                </div>
            </div>
            <!-- end: FOOTER -->
            <!-- start: RIGHT SIDEBAR -->
            <div id="page-sidebar">
                <a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
                <div class="sidebar-wrapper">
                    <ul class="nav nav-tabs nav-justified" id="sidebar-tab">
                        <li class="active">
                            <a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a>
                        </li>
                        <li>
                            <a href="#favorites" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a>
                        </li>
                        <li>
                            <a href="#settings" role="tab" data-toggle="tab"><i class="fa fa-gear"></i></a>
                        </li>
                    </ul>

 
            <!-- start: MAIN JAVASCRIPTS -->
            <!--[if lt IE 9]>
                <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/respond/dest/respond.min.js"></script>
                <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/Flot/excanvas.min.js"></script>
                <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/jquery-1.x/dist/jquery.min.js"></script>
                <![endif]-->
            <!--[if gte IE 9]><!-->

            <script type="text/javascript" src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
            <script type="text/javascript" src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/blockUI/jquery.blockUI.js"></script>
            <script type="text/javascript" src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/iCheck/icheck.min.js"></script>
            <script type="text/javascript" src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js"></script>
            <script type="text/javascript" src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/jquery.cookie/jquery.cookie.js"></script>
            <script type="text/javascript" src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript" src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/js/min/main.min.js"></script>
            <!-- end: MAIN JAVASCRIPTS -->
            <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/Flot/jquery.flot.js"></script>
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/Flot/jquery.flot.pie.js"></script>
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/Flot/jquery.flot.resize.js"></script>
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/plugin/jquery.sparkline.min.js"></script>
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js"></script>
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/moment/min/moment.min.js"></script>
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
            <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/js/min/index.min.js"></script>
            <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

            <script>
                jQuery(document).ready(function() {
                    Main.init();
                    Index.init();
                });
            </script>

    </body>

</html>