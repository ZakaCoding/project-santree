<?php
    // include required file
    include "../config/config.php";

    session_start();

    // disable ilegal access to this file from user
    if(!isset($_POST['submit'])) {
        // force back to admin page
        header("location: $basepath"."p/admin.php");
        exit();
    }

    // get required data
    $name = $mysqli->real_escape_string($_POST['product-name']);
    $desc = $mysqli->real_escape_string($_POST['product-desc']);
    $price = $mysqli->real_escape_string($_POST['price']);
    $size = $mysqli->real_escape_string($_POST['size']);

    // upload file

    // file extension
    $allowed = ["png", "jpg", "jpeg"];
    $fileName = $_FILES['image']['name'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed)) {
        // echo "only file png, jpg, and jpeg allowed";
        $_SESSION['failed'] = [
            "UPLOAD_FAIL_CODE" => 1,
            "UPLOAD_FAIL_MESSAGE" => "Hanya file gambar yang bisa di upload (jpg,png,jpeg)"
        ];
        // force back to admin page
        header("location: $basepath"."p/admin.php");
        exit();
    } else {
        // check file size no more than 2MB
        if($_FILES['image']['size'] > 2097152) {
            // die("Max file size 2MB");
            $_SESSION['failed'] = [
                "UPLOAD_FAIL_CODE" => 1,
                "UPLOAD_FAIL_MESSAGE" => "File maksimal yang bisa di upload tidak lebih dari 2MB"
            ];
            // force back to admin page
            header("location: $basepath"."p/admin.php");
            exit();
        }
    }

    // upload file
    // get tmp file
    $tmpFilePath = $_FILES['image']['tmp_name'];
    
    // make sure have file path 
    if($tmpFilePath != "") {
        // check file exist
        // if(file_exists($uploaddir)) {
        //     die("file already exist [".$_FILES['image']['name'][$i]."]");
        // }

        // remove whitspace on file name
        $file_name= $_FILES['image']['name'];

        // setup new file path
        // this file path on server
        $uploaddir = '../../content/.upload/'.$file_name; //upload directory

        // upload file to dir
        if(move_uploaded_file($tmpFilePath,$uploaddir)) {
            
            // push file name to array
            // array_push($files_name,"$file_name");
            // die("This if [72]");
        } else {
            // die("This else[74]");
            $_SESSION['failed'] = [
                "UPLOAD_FAIL_CODE" => 1,
                "UPLOAD_FAIL_MESSAGE" => $_FILES['image']['error']
            ];
            // force back to admin page
            header("location: $basepath"."p/admin.php");
            exit();
        }
    } else {
        // die("error ".$_FILES['image']['error']);
        $_SESSION['failed'] = [
            "UPLOAD_FAIL_CODE" => 1,
            "UPLOAD_FAIL_MESSAGE" => $_FILES['image']['error']
        ];
        // force back to admin page
        header("location: $basepath"."p/admin.php");
        exit();
    }

    // convert array to string data
    $file_name_on_db = $file_name;
    
    // generate id
    $string_data  = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
    $random_string  = str_shuffle($string_data);
    $p_id  = substr($random_string,0,12);
    // upload to database
    $query = "INSERT INTO `product` VALUES ('$p_id', '$name', '$desc',$price,10,'$size',NOW(),'$file_name_on_db')";

    // query check
    if($mysqli->query($query))
    {
        // die("Data wass upload successful");
        // Force to admin page with success message
        $_SESSION['success'] = [
            "PORTOFOLIO_SUCCESS" => 1
        ];

        header("location: $basepath"."p/admin.php");
        exit();
    } else {
        die("Something else with error ".$mysqli->error);
    }