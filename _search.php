<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss | Online Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script>
    let table = new DataTable('#myTable');
    </script>
</head>

<body>

    <div style="min-height :100vh;" class="container-fluid mh-2 m-0 p-0">
        <?php include 'utils/_dbconn.php' ?>

        <?php include 'utils/_header.php' ?>

        <!-- for searching from threads -->
        <!-- SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('not'); -->

        <?php

        $find = ["<", ">", "'", '"',];
        $replace = ["&#60;", "&#62;", "&#39;", '&#34;'];

        $search = $_GET["search"];
        $search = str_replace($find, $replace, $search);


        $sql = "SELECT * FROM `categories`";
        $result = mysqli_query($conn, $sql);
        $t_color = "warning";

        while ($row = mysqli_fetch_assoc($result)) {

            $id = $row["category_id"];
        }


        $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            $cat_id = $row["category_id"];
        }

        ?>

        <div class="container my-5">
            <table id="myTable" class="display my-5">
                <thead>
                    <tr>
                        <th>
                            <h1 class="text h1 text-center my-3">Search results of <i>"<?php echo $search ?>"</i></h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php

                                $sql = "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$search');";
                                $result = mysqli_query($conn, $sql);
                                $no_result_found = true;

                                while ($row = mysqli_fetch_assoc($result)) {

                                    $no_result_found = false;

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
                                    <span class="fw-bold p-0 mt-3m-0 ">' . $thread_user_name .  '</span><span style="opacity: 0.5;" class="text">  ' . $time_stamp . ' </span> 
                                    <p class="fw-bold p-0 m-0 "><a style="text-decoration:none;"  href="_thread.php?thread_id=' . $thread_id . '&cat_id=' . $cat_id . '">' . $thread_title . '</a></p>
                                    <p>' . $thread_desc . '</p>
                                    </div>
                                    </div><hr>';
                                }

                                if ($no_result_found) {
                                    echo '<div class="jumbotron jumbotron-fluid">
                                    <div class="container">
                                    <h3 class="display-5 text h3 ">Your search - ' . $search . ' - did not match any documents.</h3>
                                    <p class="lead">
                                    <h3 class="text h3">Suggestions:</h3>
                                    <ul>
                                    <li>Make sure that all words are spelled correctly.</li>
                                    <li>Try different keywords.</li>
                                    <li>Try more general keywords.</li>
                                    </ul>




                                    </p>
                                    </div>
                                    </div>';
                                }


                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'utils/_footer.php' ?>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>



<!-- <h3 class="text h3"><a href="#" class="text-primary text-decoration-none">Search result answer</a></h3>
                <p class="text">
                    <i>
                        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis officiis asperiores illum
                        consequuntur minima reprehenderit alias id perspiciatis mollitia, in voluptas neque tempora
                        autem
                        vel non, accusantium distinctio inventore eaque."</i>
                </p> -->