<?php 
    /// include required file
    include_once "../app/config/config.php";
    // start session
    session_start();


    if(isset($_SESSION['login']))
    {
        $session_name = $_SESSION['login']['username'];
        $query = "SELECT `username`, `session_token` FROM `users` WHERE `username` = '$session_name'";

        if($mysqli->query($query))
        {
            $result = $mysqli->query($query);
            if($result->num_rows == 1)
            {
                $update = "UPDATE `users` SET `session_token` = '' WHERE `username` = '$session_name'";
                if($mysqli->query($update))
                {
                    // check affected rows
                    if($mysqli->affected_rows != 1)
                    {
                        // destroy session
                        session_unset();
                        session_destroy();
                        die($mysqli->error);
                    }
                }
            }
        }
    }

    // destroy session
    session_unset();
    session_destroy();


    // force to default page
    header("location: $basepath");