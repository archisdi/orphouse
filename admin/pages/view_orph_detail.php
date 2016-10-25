<?php
session_start();
if (isset($_SESSION["member_login"])) {
    if (isset($_GET["id"])) {
        include 'element/db_connection.php';


        $call_loggedin_member = $connect->query("SELECT * FROM admin WHERE username ='" . $_SESSION["member_login"] . "'");
        $fetch_member = $call_loggedin_member->fetch_assoc();

        $call_panti = $connect->query("SELECT * FROM panti WHERE id_panti ='" . $_GET["id"] . "'");
        $fetch_panti = $call_panti->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>View Orphanage</title>
                <?php include 'element/header.php' ?>
                <style>
                    #map-container { height: 300px }
                </style>
            </head>
            <?php include 'element/style.php' ?>
            <div class="wrapper">

                <!-- Main Header -->
                <header class="main-header">

                    <!-- Logo -->
                    <a href="home.php" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>A</b>o</span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>Admin</b>Orphouse</span>
                    </a>

                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">


                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <img src="../../dist/img/<?php echo $fetch_member["img"] ?>" class="user-image" alt="User Image">
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs"><?php echo $fetch_member["fullname"] ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <img src="../../dist/img/<?php echo $fetch_member["img"] ?>" class="img-circle" alt="User Image">
                                            <p>
                                                <?php echo $fetch_member["fullname"] ?>
                                            </p>
                                        </li>

                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="handler/logout_handler.php" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">

                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">

                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="../../dist/img/<?php echo $fetch_member["img"] ?>" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p><?php echo $fetch_member["fullname"] ?></p>
                                <!-- Status -->
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>

                        <?php include 'element/side_menu.php'; ?>

                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">

                        <h1>
                            <i class="fa fa-home"></i> View Orphanage                            
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-angle-right"></i> Level</a></li>
                            <li class="active">View</li>
                            <li class="active">View Orphanage</li>
                        </ol>
                    </section>

                    <!-- Main content -->
                    <section class="content">

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Orphanage Data</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">

                                <!-- text input -->
                                <div class="form-group">
                                    <label>Orphanage Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                        <input type="text" class="form-control" placeholder="" name="nama" required="" value="<?php echo $fetch_panti["nama"] ?>" disabled="">
                                    </div>
                                </div>

                                <!-- text input -->
                                <div class="form-group">
                                    <label>Orphanage Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ion ion-home"></i></span>                                            
                                        <input type="text" class="form-control" placeholder="" name="alamat" required="" value="<?php echo $fetch_panti["alamat"] ?>" disabled="">
                                    </div>
                                </div>

                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Orphanage Contact</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="kontak" value="<?php echo $fetch_panti["kontak"] ?>" disabled="">
                                    </div><!-- /.input group -->
                                </div><!-- /.form group -->

                                <!-- text input -->
                                <div class="form-group">
                                    <label>Total Child</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-child"></i></span>                                            
                                        <input type="text" class="form-control" placeholder="" name="anak" required="" value="<?php echo $fetch_panti["jumlah_anak"] ?>" disabled="">
                                    </div>
                                </div>

                                <!-- text input -->
                                <div class="form-group">
                                    <label>Maps Coordinate</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>                                            
                                        <input type="text" class="form-control" placeholder="" name="maps" required="" value="<?php echo $fetch_panti["maps"] ?>" disabled="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Orphanage Location</h3>
                            </div><!-- /.box-header -->
                            <div class="table-responsive">
                                <div class="box-body">
                                    <div id="map-container">
                                        <!---MAP CANVAS--->
                                    </div>
                                </div>
                            </div>                        
                            <!-- /.box-body -->
                        </div>

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Orphanage Picture</h3>
                            </div><!-- /.box-header -->
                            <div class="table-responsive">
                                <div class="box-body">
                                    <div>
                                        <img class="img-responsive" src="../../img/panti/<?php echo $fetch_panti["img"] ?>">
                                    </div>
                                </div>
                            </div>                        
                            <!-- /.box-body -->
                        </div>

                        <br>              
                        <a href="view_orph.php"><button type="button" class="btn btn-default">Back</button></a>
                    </section><!-- /.content -->
                </div><!-- /.content-wrapper -->

                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="pull-right hidden-xs">

                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; 2015 <a href="http://www.archisdiningrat.net">Archisdiningrat</a>.</strong> All rights reserved.
                </footer>

            </div><!-- ./wrapper -->

            <?php include 'element/footer.php' ?>            
            <?php include 'element/script.php' ?>

            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <script>

                function init_map() {
                    var var_location = new google.maps.LatLng(<?php echo $fetch_panti["maps"] ?>);

                    var var_mapoptions = {
                        center: var_location,
                        zoom: 14
                    };

                    var var_marker = new google.maps.Marker({
                        position: var_location,
                        map: var_map,
                        title: "Venice"});

                    var var_map = new google.maps.Map(document.getElementById("map-container"),
                            var_mapoptions);

                    var_marker.setMap(var_map);

                }

                google.maps.event.addDomListener(window, 'load', init_map);

            </script>

        </body>
        </html>

        <?php
    } else {
        header("location: view_orph.php");
    }
} else {
    header("location: handler/logout_handler.php");
    exit();
}
?>