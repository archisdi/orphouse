<?php

session_start();

if (isset($_POST)) {
    include '../element/db_connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek_admin = $connect->query("SELECT * FROM admin WHERE username = '" . $username . "' AND password = '" . $password . "'");

    if ($cek_admin->num_rows == 1) {
        $fetch_admin = $cek_admin->fetch_assoc();
        $id_member_login = $fetch_admin["username"];
        $_SESSION["member_login"] = $id_member_login;

        header("location: ../home.php");
        exit();
        
    } else {
        header("location: ../login.php?status=1");
        exit();
    }
} else {
    header("location : ../login.php");
    exit();
}
?>