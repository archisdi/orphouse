<?php
include 'db_connection.php';
if (isset($_GET["id"])) {
    $call_anak = $connect->query("SELECT * FROM anak WHERE id_anak ='" . $_GET["id"] . "'");
    $fetch_anak = $call_anak->fetch_assoc();
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

            <link href="../css/ionicons.min.css" rel="stylesheet">


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
                <!-- /.row -->

                <div class="row col-md-12">
                    <br>
                    <div class="thumbnail">
                        <img class="img img-responsive img-circle" height="200" width="200" src="../img/anak/<?php echo $fetch_anak["img"] ?>" align="middle">
                    </div>

                    <div class="box">

                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama Anak</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                <input type="text" class="form-control" placeholder="" name="nama" required="" value="<?php echo $fetch_anak["nama"] ?>" disabled="">
                            </div>
                        </div>

                        <!-- text input -->
                        <div class="form-group">
                            <label>Alamat Panti Asuhan</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>                                            
                                <input type="text" class="form-control" placeholder="" name="alamat" required="" value="<?php echo $fetch_anak["lahir"] ?>" disabled="">
                            </div>
                        </div>

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ion ion-<?php
                                    if ($fetch_anak["jk"] == "L") {
                                        echo 'male';
                                    } else {
                                        echo 'female';
                                    }
                                    ?>"></i>
                                </div>
                                <input type="text" class="form-control"  value="<?php
                                if ($fetch_anak["jk"] == "L") {
                                    echo 'Laki-laki';
                                } else {
                                    echo 'Perempuan';
                                }
                                ?>" disabled="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- text input -->
                        <div class="form-group">
                            <label>Sekolah</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" fa fa-building"></i></span>                                            
                                <input type="text" class="form-control" placeholder="" name="anak" required="" value="<?php echo $fetch_anak["sekolah"] ?>" disabled="">
                            </div>
                        </div>

                        <!-- text input -->
                        <div class="form-group">
                            <label>Hobi</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ion ion-ios-basketball"></i></span>                                            
                                <input type="text" class="form-control" placeholder="" name="maps" required="" value="<?php echo $fetch_anak["hobi"] ?>" disabled="">
                            </div>
                        </div>
                        <br>
                    </div>
                    <div>    
                        <br>
                        <a href="anak.php?id=<?php echo $fetch_anak["id_panti"] ?>"><button type="button" class="btn btn-default">Back</button></a>
                        <br><br>
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



        </body>

    </html>

    <?php
} else {
    header("location: home.php");
    exit();
}
?>

