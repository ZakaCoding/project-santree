<?php
    // include some required file for login
    include "../config/config.php";

    // trigger function when someone else want access this file 
    // then force back to login page
    if(!isset($_POST['login']))
    {
        // redirect back
        header("location: http://localhost/santree/p/login.php");
        exit(); // stop code
    }

    $username = $mysqli->real_escape_string($_POST['username']);
    $pwd = $mysqli->real_escape_string($_POST['password']);

    $query = "SELECT `user_id`,`username`,`password` FROM `users` WHERE `username` = '$username'";

    // check query error
    if($mysqli->query($query)) {
        // check data from tables
        $result = $mysqli->query($query);
        if(!empty($result->num_rows)) {
            // throw data into associative array
            $data = $result->fetch_assoc();

            // verify password
            if(!password_verify($pwd,$data['password'])) {
                // throw message wrong password or force back to login page with message
                die("your password was wrong");
            }
        } else {
            
            // throw message data empty or force back to login page with message
            die("Data empty");
        }
    } else {
        die($mysqli->error);
    }

    // login session

    // create session token 
    $string_data  = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
    $random_string  = str_shuffle($string_data);
    $token  = substr($random_string,0,12);

    // store token data to database
    $query_update = "UPDATE `users` SET `session_token` = '$token' WHERE `user_id` =".$data['user_id'];

    // check query update
    if($mysqli->query($query_update)) {
        // check affected row if was success store token to database
        if($mysqli->affected_rows == 0) {
            die("Failed store data session_token to database");
            exit();
        }
    } else {
        die($mysqli->error);
    }

    // create session
    session_start();
    $_SESSION['login'] = [
        "username" => $username,
        "token" => $token
    ];

    // check session
    // var_dump($_SESSION['login']);
    // exit();

    // when all step for login wass successful
    // going to admin page.
    header("location: http://localhost/santree/p/admin.php");
    exit();