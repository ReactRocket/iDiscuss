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
    <div class="main  container-fluid m-0 p-0 " style="min-height: 100vh;">

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

            $search = ["<", ">", "'", '"',];
            $replace = ["&#60;", "&#62;", "&#39;", '&#34;'];

            $th_title = $_POST['title'];
            $th_title = str_replace($search, $replace, $th_title);

            $th_desc = $_POST['desc'];
            $th_desc = str_replace($search, $replace, $th_desc);


            $thread_user_email = $_SESSION['user_email'];
            $thread_user_name = $_SESSION['user_name'];
            if ($th_title == "" or $th_desc == "") {
                $warning_Alert = true;
            } else {

                $time_stamp = date("F j, Y, g:i a");
                $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_name`,`thread_user_email`, `time_stamp`) VALUES ('$th_title', '$th_desc', '$id', '$thread_user_name','$thread_user_email','$time_stamp' )";

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
            <div class="container">
                <div class="p-5 mb-4 mt-4 bg-info rounded-3 ">
                    <div class="container-fluid py-5">
                        <h1 class="display-7 fw-bold" _msttexthash="299247" _msthash="8">Welcome to
                            <?php echo $title; ?>
                            forum
                        </h1>
                        <p class="col-md-8 fs-4" _msttexthash="19263036" _msthash="9">
                            <?php echo $cate; ?>
                        </p>
                        <button class="btn btn-primary  btn-lg" type="button" _msttexthash="237770" _msthash="10"><a
                                style="text-decoration:none; color:white;" href="<?php echo $link; ?>" target=" _blank"
                                rel="noopener noreferrer">
                                View
                                Details</a>

                        </button>
                        <hr>
                        <p class="text-danger fw-bold fs-5">"Don’t post anything that is illegal or violates the forum’s
                            terms of service.
                            Don’t post anything that is offensive or discriminatory.
                            Don’t post anything that is spam or self-promotion.
                            Don’t post anything that is irrelevant to the forum’s topic.
                            Don’t post anything that is inaccurate or misleading.
                            Don’t post anything that is abusive or threatening.
                            Don’t post anything that is copyrighted by someone else without permission.
                            Don’t post anything that is confidential or private information about someone else.
                            Don’t post anything that is harmful to others."</p>
                        <p class="d-flex flex-row-reverse">
                            <span class="p-2 ">Posted By:<i class="text fw-bold"> Admin</i></span>
                        </p>
                        <button class="  btn btn-xl bg-danger"><a style="text-decoration:none;" class="text-light"
                                href="index.php">Back</a></button>
                    </div>
                </div>
            </div>

            <div class="container">
                <h1 class="h1 text my-5">Start Disscussion</h1>

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
                    $time_stamp = $row["time_stamp"];
                    $thread_user_name = $row["thread_user_name"];
                    $thread_user_email = $row["thread_user_email"];
                    $thread_title = strtoupper($thread_upp_title);
                    $thread_desc = $row["thread_desc"];

                    echo '<div class="d-flex my-3">
            <div class="flex-shrink-0">
                <img style="border-radius:50%;" class="" 
                    src="https://source.unsplash.com/50x50/?profile,photo' . $thread_id . '" alt="user">
            </div>
            <div class="flex-grow-1 ms-3">
                <span class="fw-bold p-0 mt-3m-0 ">' . $thread_user_name . '</span><span style="opacity: 0.5;" class="text">  ' . $time_stamp . ' </span> 
                    <p class="fw-bold p-0 m-0 "><a style="text-decoration:none;"  href="_thread.php?thread_id=' . $thread_id . '&cat_id=' . $cat_id . '">' . $thread_title . '</a></p>
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
    </div>
    <?php include 'utils/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>