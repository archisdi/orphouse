<?php

session_start();
if (isset($_SESSION["member_login"])) {
    if (isset($_POST)) {
        include '../element/db_connection.php';

        $cek_member = $connect->query("SELECT * FROM admin WHERE username = '" . $_SESSION["member_login"] . "' AND password = '" . $_POST["password"] . "'");
        $call_panti = $connect->query("SELECT * FROM panti WHERE id_panti = '" . $_POST["id"] . "'");
        $fetch_panti = $call_panti->fetch_assoc();

        if ($cek_member->num_rows == 1) {
            
            if($fetch_panti["img"] != "orph.jpg"){
                $target_name = $fetch_panti["img"];
                $target_dir = "../../../img/panti/";
                $target_file = $target_dir . $target_name;
                unlink($target_file);
            }
            
            
            $connect->query("DELETE FROM panti WHERE id_panti = '" . $_POST["id"] . "'");

            header("location: ../delete_orph.php?stat=1");
            exit();
        } else {
            header("location: ../delete_orph.php?stat=2");
            exit();
        }
    } else {
        header("location: ../delete_orph.php");
        exit();
    }
} else {
    header("location: handler/logout_handler.php");
    exit();
}
?>