<?php

include 'element/db_connection.php';

$call_loggedin_member = $connect->query("SELECT * FROM admin WHERE username ='" . $_SESSION["member_login"] . "'");
$fetch_member = $call_loggedin_member->fetch_assoc();

$call_panti2 = $connect->query("SELECT * FROM panti ORDER BY id_panti DESC LIMIT 10");
$call_panti = $connect->query("SELECT * FROM panti");
$call_anak = $connect->query("SELECT * FROM anak");
$call_admin = $connect->query("SELECT * FROM admin");

$npanti = 0;
$nanak = 0;
$nL = 0;
$nP = 0;
$perL = 0;
$perP = 0;

if ($call_panti->num_rows >= 1) {
    while ($fetch_panti = $call_panti->fetch_assoc()) {
        $npanti++;
    }
}

if ($call_anak->num_rows >= 1) {
    while ($fetch_anak = $call_anak->fetch_assoc()) {
        if ($fetch_anak["jk"] == "L") {
            $nL++;
        } else if ($fetch_anak["jk"] == "P") {
            $nP++;
        }
        $nanak++;
    }
}

$perL = (100/($nL+$nP))*$nL;
$perP = 100 - $perL;

?>

