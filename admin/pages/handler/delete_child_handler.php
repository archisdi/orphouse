<?php

session_start();
if (isset($_SESSION["member_login"])) {
    if (isset($_POST)) {
        include '../element/db_connection.php';

        $cek_member = $connect->query("SELECT * FROM admin WHERE username = '" . $_SESSION["member_login"] . "' AND password = '" . $_POST["password"] . "'");

        if ($cek_member->num_rows == 1) {
            $call_panti = $connect->query("SELECT * FROM panti WHERE id_panti ='" . $_SESSION["id_panti"] . "'");
            $fetch_panti = $call_panti->fetch_assoc();

            $add_total = $fetch_panti["jumlah_anak"] - 1;
            $connect->query("UPDATE panti SET jumlah_anak = '" . $add_total . "'  WHERE id_panti='" . $_SESSION["id_panti"] . "'");  

            $connect->query("DELETE FROM anak WHERE id_anak = '" . $_POST["id"] . "'");

            header("location: ../delete_child.php?stat=1");
            exit();
        } else {
            header("location: ../delete_child.php?stat=2");
            exit();
        }
    } else {
        header("location: ../delete_child.php");
        exit();
    }
} else {
    header("location: handler/logout_handler.php");
    exit();
}
?>