<?php

session_start();
if (isset($_SESSION["member_login"])) {
    if (isset($_POST)) {
        include '../element/db_connection.php';

        $connect->query("UPDATE panti SET nama = '" . $_POST["nama"] . "', alamat = '" . $_POST["alamat"] . "', kontak = '" . $_POST["kontak"] . "', maps = '" . $_POST["maps"] . "'   WHERE id_panti='" . $_SESSION["id_panti"] . "'");

        header("location: ../edit_orph.php?stat=1");
        exit();
    } else {
        header("location: ../edit_orph.php");
        exit();
    }
} else {
    header("location: handler/logout_handler.php");
    exit();
}
?>