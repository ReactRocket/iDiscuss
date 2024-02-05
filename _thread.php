<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss | Online Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="utils/_style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <div class="main  container-fluid m-0 p-0 " style="min-height: 100vh;">
        <?php include 'utils/_dbconn.php' ?>

        <?php include 'utils/_header.php' ?>


        <!-- comment insertion -->
        <?php
        $success_Alert = false;
        $warning_Alert = false;

        $id = $_GET['thread_id'];

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST') {

            $search = ["<", ">", "'", '"',];
            $replace = ["&#60;", "&#62;", "&#39;", '&#34;'];

            $cmt_desc = $_POST['desc'];
            $cmt_desc = str_replace($search, $replace, $cmt_desc);

            $cmt_user_email = $_SESSION['user_email'];
            $cmt_user_name = $_SESSION['user_name'];


            if ($cmt_desc == "") {
                $warning_Alert = true;
            } else {

                $time_stamp = date("F j, Y, g:i a");

                $sql = "INSERT INTO `comments` ( `cmt_desc`, `cmt_th_id`, `cmt_user_name`, `cmt_user_email`, `time_stamp`) VALUES ('$cmt_desc', '$id', '$cmt_user_name', '$cmt_user_email', '$time_stamp');";

                $result = mysqli_query($conn, $sql);


                if ($result) {
                    $success_Alert = true;
                }
            }
        }
        ?>
        <?php

        if ($success_Alert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> Your comment has been submitted successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }

        if ($warning_Alert) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Warning! </strong> Please fill all the details.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
        ?>

        <!-- thread showing questions -->
        <div class="container">
            <div class="container">
                <?php

                $id = $_GET['thread_id'];
                $c_id = $_GET['cat_id'];
                $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {

                    $thread_id = $row["thread_id"];
                    $str_thread_title = $row["thread_title"];
                    $thread_title = strtoupper($str_thread_title);
                    $thread_desc = $row["thread_desc"];
                    $thread_user_email = $row["thread_user_email"];
                    $thread_user_name = $row["thread_user_name"];

                    echo ' <div  class="p-5 mb-4 mt-4 bg-info  rounded-3 ">
                        <div class="container-fluid py-5">
                        <h1 class=" lead display-5 fw-bold text-dark" _msttexthash="299247" _msthash="8">' . $thread_title . '</h1>
                        <p class="lead col-md-8 text-light my-4 fs-4" _msttexthash="19263036" _msthash="9">' . $thread_desc . '</p>
                    <p>Question By: <span class="text fw-bold">' . $thread_user_name . '</span></p>
                        <hr>
                    <p class="text-danger fw-bold fs-5" >"Don’t post anything that is illegal or violates the forum’s terms of service.
                        Don’t post anything that is offensive or discriminatory.
                        Don’t post anything that is spam or self-promotion.
                        Don’t post anything that is irrelevant to the forum’s topic.
                        Don’t post anything that is inaccurate or misleading.
                        Don’t post anything that is abusive or threatening.
                        Don’t post anything that is copyrighted by someone else without permission.
                        Don’t post anything that is confidential or private information about someone else.
                        Don’t post anything that is harmful to others."</p>
                    <p class="d-flex flex-row-reverse" ><span >Posted By: <i class="p-2 text fw-bold">Admin</i></span></p>
                        </div>';
                }
            //     echo '<button class="  btn btn-xl bg-danger"><a style="text-decoration:none;"
            // class="text-light" href="_thread_list.php?id=' . $c_id . '">Back</a></button>
            // </div>';
                ?>

            </div>


            <!-- disscussion form -->

            <div class="container">
                <h1 class="h1 text my-3">Start Disscussion</h1>


                <!-- method -1  -->
                <!-- <form action="_thread.php?thread_id=<?php echo $id; ?>&cat_id=<?php echo $c_id; ?>" method="post"> -->

                <!-- method-2 -->
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">

                    <div class="form-group mb-3 col-lg-5 ">
                        <label class="mb-3" for="desc">Type your comments...</label>
                        <textarea class="form-control" id="desc" name="desc" rows="1"
                            placeholder="Enter a comment"></textarea>
                    </div>
                    <button type="reset" class="btn btn-secondary">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>



            </div>


            <!-- showing comments -->

            <div class="container mt-4">
                <h1 class=" h1 text  my-5">Comments</h1>
                <?php

                $sql = "SELECT * FROM `comments` WHERE `cmt_th_id` = $id";
                $result = mysqli_query($conn, $sql);
                $noQue = true;
                while ($row = mysqli_fetch_assoc($result)) {

                    $noQue = false;

                    $cmt_id = $row["cmt_id"];
                    $cmt_desc = $row["cmt_desc"];
                    $cmt_user_name = $row["cmt_user_name"];
                    $cmt_user_email = $row["cmt_user_email"];
                    $time_stamp = $row["time_stamp"];

                    echo '<div class="d-flex my-3">
            <div class="flex-shrink-0">
                <img style="border-radius:50%;" class="" 
                    src="https://source.unsplash.com/50x50/?profile,photo' . $cmt_id . '" alt="user">
            </div>
            <div class="flex-grow-1 ms-3">
                <span class="fw-bold p-0 m-0 ">' . $cmt_user_name . ' -> </span> <span style="opacity: 0.5;" class="text">  ' . $time_stamp . ' </span>
                <p class="lead">' . $cmt_desc . '</p>
            </div>
        </div>';
                }

                if ($noQue) {
                    echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-5">Comments not found!</h1>
                  <p class="lead">You will be the first to comment..</p>
                </div>
              </div>';
                }

                ?>
            </div>
        </div>
    </div>

    <?php include 'utils/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>