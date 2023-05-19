<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_dbconn.php';

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $alert = "false";
    $login = "false";

    if ($user == "" or $pass == "") {
        $alert = "null";
        header("location: /projects/websites/idiscuss/index.php?login=$login&alert=$alert");
    } else {

        $sql = "SELECT * FROM `users` WHERE `user_id` = '$user'";
        // $sql = "SELECT * FROM `users` WHERE `user_id` LIKE '$user'";
        $result = mysqli_query($conn, $sql);
        $Exist = mysqli_num_rows($result);

        if ($Exist == 0) {
            $alert = "not_found";
            header("location:/projects/websites/idiscuss/index.php?login=$login&alert=$alert");
        } else {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['password'])) {
                session_start();
                $_SESSION['logedin'] = true;
                $_SESSION['user_id'] = $user;
                header("location:/projects/websites/idiscuss/index.php");
                exit();
            } else {
                $alert = "pass_not_matched";
                header("location:/projects/websites/idiscuss/index.php?login=$login&alert=$alert");
            }
        }
    }
}
