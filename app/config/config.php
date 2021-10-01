<?php
    $basepath = "http://localhost/santree/";

    $mysqli = new mysqli("localhost","root","whoami","santree_db");
    
    if($mysqli->connect_errno) {
        die("connection failed " . $mysqli->connect_errno .": " . $mysqli->connect_error);
        $mysqli->exit;
    }