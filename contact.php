<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss | Online Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>

    <div style="min-height :100vh;" class="row  container-fluid  m-0 p-0 overflow-scroll">

        <?php include 'utils/_dbconn.php' ?>
        <?php include 'utils/_header.php' ?>
        <?php
        $alert = "false";
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $gender = $_POST['gender'];
            $message = $_POST['message'];

            $search = ["<", ">", "'", '"',];
            $replace = ["&#60;", "&#62;", "&#39;", '&#34;'];

            $first_name = str_replace($search, $replace, $first_name);
            $last_name = str_replace($search, $replace, $last_name);
            $email = str_replace($search, $replace, $email);
            $password = str_replace($search, $replace, $password);
            $address = str_replace($search, $replace, $address);
            $mobile = str_replace($search, $replace, $mobile);
            $gender = str_replace($search, $replace, $gender);
            $message = str_replace($search, $replace, $message);


            $alert = "false";


            $sql = "INSERT INTO `contact` (`first_name`, `last_name`, `email`, `password`, `address`, `mobile`, `gender`, `message`, `time_stamp`) VALUES ('$first_name', '$last_name', '$email', '$password', '$address', '$mobile','$gender', '$message', current_timestamp());
                ";

            $result = mysqli_query($conn, $sql);


            if ($result) {

                $alert = "success";

            } else {

                $alert = "danger";

            }

        }
        ?>
        <?php
        if ($alert == "success") {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Thank you to join us.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } elseif ($alert == "danger") {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alert! </strong> Something wents wrong, Try again!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <div class="container my-5 col-md-6 shadow-lg  bg-body-tertiary rounded ">


            <form class="row g-3 my-3 mx-5 " action="contact.php" method="POST">
                <h3 class="text text-center my-3 ">Get in touch with us</h3>
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        placeholder="Enter first name" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        placeholder="Enter last name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter password" required>
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" rows="3" name="address"
                        placeholder="Enter permanent address " required></textarea>
                </div>
                <div class="col-md-6">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="number" class="form-control" id="mobile" name="mobile"
                        placeholder="Enter mobile number" minlength="10" maxlength="10" pattern="[0-9]" required>
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label><br>
                    <div class="gender d-flex  justify-content-center border  rounded p-1">
                        <input class="mx-3" type="radio" name="gender" id="gender" value="male" checked>Male
                        <input class="mx-3" type="radio" name="gender" id="gender" value="Female">Female
                    </div>
                </div>
                <div class="col-md-12 mb-1">
                    <label for="category" class="form-label">Say something to us</label>
                    <textarea class="form-control" id="message" rows="1" name="message" placeholder="Wirite for us "
                        required></textarea>
                </div>


                <div class="col-12 my-2 d-flex  justify-content-center">
                    <?php

                    if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                        echo '<button type="submit" class="btn btn-mx btn-outline-primary mx-1 ">Submit</button>';
                    } else {
                        echo '<button  class="btn btn-mx btn-outline-primary mx-1 " data-bs-toggle="modal" data-bs-target="#login_modal">Submit</button>';
                    }

                    ?>
                    <button type="reset" class="btn btn-outline-danger mx-1">Reset</button>
                </div>
            </form>
        </div>

    </div>
    <?php include 'utils/_footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>