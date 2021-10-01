<?php
    $basepath = "http://localhost/santree/";

    // $mysqli = new mysqli("localhost","id17678214_root","IbxHWFZ]x[T1KCSh","id17678214_santree_db");
    $mysqli = new mysqli("localhost","root","whoami","santree_db");
    
    if($mysqli->connect_errno) {
        die("connection failed " . $mysqli->connect_errno .": " . $mysqli->connect_error);
        $mysqli->exit;
    }