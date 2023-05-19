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
    <style>

    </style>
</head>

<body>
    <div class="main  container-fluid m-0 p-0 " style="min-height: 150vh;">

        <?php include 'utils/_dbconn.php' ?>

        <?php include 'utils/_header.php' ?>
        <?php

        $id = $_GET['id'];
        $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            $cat_id = $row["category_id"];
            $title = $row["category_name"];
            $cate = $row["category_desc"];
            $link = $row["category_source"];
        }
        ?>
        <?php
        $success_Alert = false;
        $warning_Alert = false;

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST') {

            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];

            if ($th_title == "" or  $th_desc == "") {
                $warning_Alert = true;
            } else {

                $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `time_stamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";

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
                    <strong>Success! </strong> Your question has been submitted successfully.We will response soon...
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


        <div class="container">
            <div class="p-5 mb-4 mt-4 bg-info rounded-3 ">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold" _msttexthash="299247" _msthash="8">Welcome to <?php echo $title; ?>
                        forum
                    </h1>
                    <p class="col-md-8 fs-4" _msttexthash="19263036" _msthash="9"><?php echo $cate; ?></p>
                    <button class="btn btn-primary  btn-lg" type="button" _msttexthash="237770" _msthash="10"><a
                            style="text-decoration:none; color:white;" href="<?php echo $link; ?>" target=" _blank"
                            rel="noopener noreferrer">
                            View
                            Details</a>

                    </button>
                    <hr>
                    <p>"Don’t post anything that is illegal or violates the forum’s terms of service.
                        Don’t post anything that is offensive or discriminatory.
                        Don’t post anything that is spam or self-promotion.
                        Don’t post anything that is irrelevant to the forum’s topic.
                        Don’t post anything that is inaccurate or misleading.
                        Don’t post anything that is abusive or threatening.
                        Don’t post anything that is copyrighted by someone else without permission.
                        Don’t post anything that is confidential or private information about someone else.
                        Don’t post anything that is harmful to others."</p>
                    <p>Posted By: <span class="text fw-bold">Ayush Varma</span></p>
                </div>
            </div>
        </div>
        <div class="container">

            <h1 class="h1 text my-5">Start Disscussion</h1>

            <!-- method-1 -->
            <!-- <form action="_thread_list.php?id=<?php echo $id; ?>" method="post"> -->

            <!-- method-2 -->
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title"
                        placeholder="Enter Question's Title " require />
                    <small id="emailHelp" class="form-text text-muted">Keep your title as short and
                        crisp as possible</small>
                </div>
                <div class="form-group mb-3 ">
                    <label class="mb-3" for="desc">Discription</label>
                    <textarea class="form-control" id="desc" name="desc" rows="5" placeholder="Enter Discription"
                        require></textarea>
                </div>
                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <div class="container">
            <h1 class="h1 text my-5">Frequently Asked Questions</h1>
            <?php

            $id = $_GET['id'];
            $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id";
            $result = mysqli_query($conn, $sql);
            $noQue = true;
            while ($row = mysqli_fetch_assoc($result)) {

                $noQue = false;

                $thread_id = $row["thread_id"];
                $thread_upp_title = $row["thread_title"];
                $thread_title = strtoupper($thread_upp_title);
                $thread_desc = $row["thread_desc"];

                echo '<div class="d-flex my-3">
            <div class="flex-shrink-0">
                <img style="border-radius:50%;" class="" 
                    src="https://source.unsplash.com/50x50/?profile,photo' . $thread_id . '" alt="user">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5><a style="text-decoration:none;"  href="_thread.php?thread_id=' . $thread_id . '&cat_id=' . $cat_id . '">' . $thread_title . '</a></h5>
                <p>' . $thread_desc . '</p>
            </div>
        </div><hr>';
            }

            if ($noQue) {
                echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-5">Questions not found!</h1>
                  <p class="lead">You will be the first to ask question..</p>
                </div>
              </div>';
            }

            ?>



        </div>
    </div>
    <?php include 'utils/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>