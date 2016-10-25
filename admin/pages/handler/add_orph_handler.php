<?php

session_start();
if (isset($_SESSION["member_login"])) {
    if (isset($_POST)) {
        include '../element/db_connection.php';
        $img = "orph.jpg";

        if (file_exists($_FILES['img']['tmp_name'])) {

            $target_dir = "../../../img/panti/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $check = getimagesize($_FILES["img"]["tmp_name"]);

            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }


// Check if file already exists
            if (file_exists($target_file)) {
                //echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

// Check file size
            if ($_FILES["img"]["size"] > 5000000) {
                //echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    $img = basename($_FILES["img"]["name"]);
                    echo "The file " . basename($_FILES["img"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        
        $connect->query("INSERT INTO `panti`(`nama`, `alamat`, `kontak`, `img`, `maps`) VALUES ('" . $_POST["nama"] . "','" . $_POST["alamat"] . "','" . $_POST["kontak"] . "','" . $img . "','" . $_POST["maps"] . "')");
        header("location: ../add_orph.php?stat=1");
        exit();
        
    } else {
        header("location: ../add_orph.php");
        exit();
    }
} else {
    header("location: handler/logout_handler.php");
    exit();
}
?>