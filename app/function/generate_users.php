<?php
    include_once "../config/config.php";

    /*
        -----------------!WARNING! -------------------
        FILE INI HANYA DIGUNAKAN UNTUK MEMBUAT USER BARU
        DAN DIJALANKAN DI LOCALSERVER. FILE INI TIDAK UNTUK
        DI UPLOAD DI SERVER UTAMA, HANYA DATA DARI DATABASE
        YANG AKAN DI UPLOAD KE SERVER UTAMA.
        -- 2021 CREATED BY. ZAKACODING
    */

    $username = "Developer"; // Username 
    $password = "whoami"; // Use Capilaize word and include number and character for secure password

    // generate hash password using passowrd_hash();
    $password = password_hash($password, PASSWORD_BCRYPT);

    // store data with query MySQL
    $query = "INSERT INTO `users` (`user_id`, `username`, `password`, `role`,`created_at`, `deleted_at`) VALUES (NULL, '$username', '$password','admin',NOW(),NULL)";

    if($mysqli->query($query)) {
        echo "success insert user data";
    } else {
        echo "error insert data : ".$mysqli->error;
    }