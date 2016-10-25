<?php
session_start();
if (isset($_SESSION["member_login"])) {
    include './handler/dashboard_handler.php';
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Dashboard</title>
            <?php include 'element/header.php' ?>

            <!-- jvectormap -->
            <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">

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
                        Orphouse Admin Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Home</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon-active"><i class="ion ion-home"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Orhpanage Registered</span>
                                    <span class="info-box-number"><?php echo $npanti ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-child"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Child Registered</span>
                                    <span class="info-box-number"><?php echo $nanak ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- TABLE: LATEST Orpanage input -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Orphanage Input</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Ordphanage ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($call_panti2->num_rows >= 1) {
                                            while ($fetch_panti2 = $call_panti2->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $fetch_panti2["id_panti"] ?></td>
                                                    <td><?php echo $fetch_panti2["nama"] ?></td>
                                                    <td><?php echo $fetch_panti2["alamat"] ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <!-- DONUT CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Gender Chart</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="chart-responsive">
                                        <canvas id="pieChart" height="150"></canvas>
                                    </div><!-- ./chart-responsive -->
                                </div><!-- /.col -->
                                <div class="col-md-4">
                                    <ul class="chart-legend clearfix">
                                        <li><i class="fa fa-circle-o text-red"></i> Male</li>
                                        <li><i class="fa fa-circle-o text-aqua"></i> Female</li>
                                    </ul>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Male <span class="pull-right text-red"></i> <?php echo $perL ?>%</span></a></li>
                                <li><a href="#">Female <span class="pull-right text-aqua"></i> <?php echo $perP ?>%</span></a></li>
                            </ul>
                        </div><!-- /.footer -->
                    </div><!-- /.box -->

                    <!-- USERS LIST -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Admins</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                <?php while ($fetch_admin = $call_admin->fetch_assoc()) { ?>
                                    <li>
                                        <div>
                                            <img height="150" width="150" src="../../dist/img/<?php echo $fetch_admin["img"] ?>" alt="User Image">
                                            <a class="users-list-name" href="#"><?php echo $fetch_admin["fullname"] ?></a>
                                            <span class="users-list-date"><?php echo $fetch_admin["contact"] ?></span>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul><!-- /.users-list -->
                        </div><!-- /.box-body -->
                    </div><!--/.box -->

                </section><!-- /.content --><!-- /.content -->
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

        <!-- FastClick -->
        <script src="../../plugins/fastclick/fastclick.min.js"></script>
        <!-- Sparkline -->
        <script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="../../plugins/chartjs/Chart.min.js"></script>

        <script>
            $(function () {
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
                var pieChart = new Chart(pieChartCanvas);
                var PieData = [
                    {
                        value: <?php echo $nL ?>,
                        color: "#CA195A",
                        highlight: "#CA195A",
                        label: "Male"
                    },
                    {
                        value: <?php echo $nP ?>,
                        color: "#00C0EF",
                        highlight: "#00C0EF",
                        label: "Female"
                    }
                ];
                var pieOptions = {
                    //Boolean - Whether we should show a stroke on each segment
                    segmentShowStroke: true,
                    //String - The colour of each segment stroke
                    segmentStrokeColor: "#fff",
                    //Number - The width of each segment stroke
                    segmentStrokeWidth: 2,
                    //Number - The percentage of the chart that we cut out of the middle
                    percentageInnerCutout: 50, // This is 0 for Pie charts
                    //Number - Amount of animation steps
                    animationSteps: 100,
                    //String - Animation easing effect
                    animationEasing: "easeOutBounce",
                    //Boolean - Whether we animate the rotation of the Doughnut
                    animateRotate: true,
                    //Boolean - Whether we animate scaling the Doughnut from the centre
                    animateScale: false,
                    //Boolean - whether to make the chart responsive to window resizing
                    responsive: true,
                    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                    maintainAspectRatio: true,
                    //String - A legend template
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
                };
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                pieChart.Doughnut(PieData, pieOptions);

            });
        </script>
    </body>
    </html>

    <?php
} else {
    header("location: handler/logout_handler.php");
    exit();
}
?>