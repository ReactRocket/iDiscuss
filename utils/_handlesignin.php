<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_dbconn.php';

    $user_email = $_POST['user_email'];
    $pass = $_POST['password'];
    $alert = "false";
    $login = "false";

    if ($user_email == "" or $pass == "") {
        $alert = "null";
        header("location: /projects/websites/idiscuss/index.php?login=$login&alert=$alert");
    } else {

        if ($user_email == "admin123@gmail.com" and $pass == "admin123") {
            session_start();
            $_SESSION['logedin'] = true;
            header("location:/projects/websites/idiscuss/utils/admin.php");
            exit();
        } else {
            $sql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
            // $sql = "SELECT * FROM `users` WHERE `user_email` LIKE '$user_email'";
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
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_email'] = $user_email;
                    header("location:/projects/websites/idiscuss/index.php");
                    exit();
                } else {
                    $alert = "pass_not_matched";
                    header("location:/projects/websites/idiscuss/index.php?login=$login&alert=$alert");
                }
            }
        }
    }
}
