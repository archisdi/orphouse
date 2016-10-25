<?php
include 'db_connection.php';
if (isset($_GET["id"])) {
    $call_panti = $connect->query("SELECT * FROM panti WHERE id_panti ='" . $_GET["id"] . "'");
    $fetch_panti = $call_panti->fetch_assoc();

    $call_anak = $connect->query("SELECT * FROM anak WHERE id_panti ='" . $_GET["id"] . "'");
    $n = 0;
    if ($call_anak->num_rows >= 1) {
        while ($fetch_anak = $call_anak->fetch_assoc()) {
            $n++;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <link rel="shortcut icon" href="../img/profile.ico" />
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Orphouse</title>

            <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
            <link href="../css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="../css/freelancer.css" rel="stylesheet">

            <!-- Custom Fonts -->
            <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <!-- Custom CSS -->
            <link href="../css/1-col-portfolio.css" rel="stylesheet">


            <style>
                #map-container { height: 300px }
            </style>

        </head>

        <body id="page-top" class="index">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <img class="navbar-brand" src="../img/profile.ico" alt="">
                        <a class="navbar-brand" href="../index.html">Orphouse</a>
                    </div>

                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

            <!-- Header -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">Panti Asuhan <?php echo $fetch_panti["nama"] ?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row col-md-12">
                    <div class="">

                        <div class="thumbnail img-responsive">
                            <img class="img-responsive" src="../img/panti/<?php echo $fetch_panti["img"] ?>" alt="">
                        </div>
                        <div class="box">

                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Panti Asuhan</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input type="text" class="form-control" placeholder="" name="nama" required="" value="<?php echo $fetch_panti["nama"] ?>" disabled="">
                                </div>
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Alamat Panti Asuhan</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>                                            
                                    <input type="text" class="form-control" placeholder="" name="alamat" required="" value="<?php echo $fetch_panti["alamat"] ?>" disabled="">
                                </div>
                            </div>

                            <!-- phone mask -->
                            <div class="form-group">
                                <label>Kontak Panti Asuhan</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $fetch_panti["kontak"] ?>" disabled="">
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->

                            <!-- text input -->
                            <div class="form-group">
                                <label>Total Anak Asuh</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-child"></i></span>                                            
                                    <input type="text" class="form-control" placeholder="" name="anak" required="" value="<?php echo $fetch_panti["jumlah_anak"] ?>" disabled="">
                                </div>
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Koordinat Peta</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>                                            
                                    <input type="text" class="form-control" placeholder="" name="maps" required="" value="<?php echo $fetch_panti["maps"] ?>" disabled="">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <a href="anak.php?id=<?php echo $fetch_panti["id_panti"] ?>"><button type="button" class="btn btn-default btn-block bg-info"><i class="fa fa-child">&nbsp;Tampilkan anak asuh</i></button></a>
                            </div>
                            <br>
                        </div>


                        <!-- /.box-body -->
                        <div class="thumbnail">
                            <div id="map-container">
                                <!---MAP CANVAS--->
                            </div>
                        </div>
                        <div>    
                            <br>
                            <a href="home.php"><button type="button" class="btn btn-default">Back</button></a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="text-center">
                <div class="footer-below">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                Copyright <a href="http://www.archisdiningrat.net">Archisdiningrat</a> 2015
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Plugin JavaScript -->

            <script src="js/classie.js"></script>
            <script src="js/cbpAnimatedHeader.js"></script>

            <!-- Contact Form JavaScript -->
            <script src="js/jqBootstrapValidation.js"></script>
            <script src="js/contact_me.js"></script>

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
    header("location: home.php");
    exit();
}
?>
