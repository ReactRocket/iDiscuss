<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_dbconn.php';

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    // for security reason..... 
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $singup = "false";
    $alert = "false";


    if ($user == "" or $pass == "" or $cpass == "") {
        $alert = "null";
        header("location: /projects/websites/idiscuss/index.php?signup=$singup&alert=$alert");
    } else {
        if ($pass == $cpass) {

            $sql = "SELECT * FROM `users` WHERE `user_id` = '$user'";
            $result = mysqli_query($conn, $sql);
            $Exist = mysqli_num_rows($result);

            if ($Exist > 0) {
                $alert = "exist";
                header("location: /projects/websites/idiscuss/index.php?signup=$singup&alert=$alert");
            } else {

                $sql = "INSERT INTO `users` (`user_id`, `password`) VALUES ( '$user', '$hash');";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $singup = "true";
                    $alert = "success";
                    header("location: /projects/websites/idiscuss/index.php?signup=$singup&alert=$alert");
                    exit();
                }
            }
        } else {
            $alert = "pass_not_matched";
            header("location: /projects/websites/idiscuss/index.php?signup=$singup&alert=$alert");
        }
    }
}
