<?php

session_start();
if (isset($_SESSION["member_login"])) {
    if (isset($_POST)) {
        include '../element/db_connection.php';

        $connect->query("UPDATE anak SET nama = '" . $_POST["nama"] . "', sekolah = '" . $_POST["sekolah"] . "', lahir = '" . $_POST["lahir"] . "', jk = '" . $_POST["jk"] . "', hobi = '" . $_POST["hobi"] . "'   WHERE id_panti='" . $_SESSION["id_panti"] . "' AND id_anak='" . $_SESSION["id_anak"] . "'");

        header("location: ../edit_child.php?stat=1");
        exit();
    } else {
        header("location: ../edit_child.php");
        exit();
    }
} else {
    header("location: handler/logout_handler.php");
    exit();
}
?>