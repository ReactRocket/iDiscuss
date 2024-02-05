<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_dbconn.php';

    $user_name = $_POST['username'];
    $user_email = $_POST['user_email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    // for security reason..... 
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $singup = "false";
    $alert = "false";


    if ($user_name == "" or $pass == "" or $cpass == "" or $user_email == "") {
        $alert = "null";
        header("location: /projects/websites/idiscuss/index.php?signup=$singup&alert=$alert");
    } else {
        if ($pass == $cpass) {

            $sql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
            $result = mysqli_query($conn, $sql);
            $Exist = mysqli_num_rows($result);


            if ($Exist > 0) {
                $alert = "exist";
                header("location: /projects/websites/idiscuss/index.php?signup=$singup&alert=$alert");
            } else {

                $time_stamp = date('l jS \of F Y h:i:s A');
                $sql = "INSERT INTO `users` (`user_name`,`user_email`, `password`,`time_stamp`) VALUES ( '$user_name','$user_email', '$hash','$time_stamp');";
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