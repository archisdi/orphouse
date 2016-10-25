<?php
session_start();
session_destroy();
include 'db_connection.php';

$call_panti = $connect->query("SELECT * FROM panti");
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
                <div class="col-lg-12">
                    <h1 class="page-header">Orphanage
                        <small>List</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <?php
            while ($fetch_panti = $call_panti->fetch_assoc()) {
                ?>
                <!-- Project One -->
                <div class="row">
                    <div class="col-md-7">
                        <a href="#">
                            <img class="img-responsive" src="../img/panti/<?php echo $fetch_panti["img"] ?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-5">
                        <h3>Panti Asuhan <?php echo $fetch_panti["nama"] ?></h3>
                        <h5><?php echo $fetch_panti["alamat"] ?></h5>

                        <a class="btn btn-primary" href="panti_detail.php?id=<?php echo $fetch_panti["id_panti"] ?>">Detail <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
            <?php } ?>
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

        <!-- Custom Theme JavaScript -->
        <script src="js/freelancer.js"></script>

    </body>

</html>

<?php ?>

