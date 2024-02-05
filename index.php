<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss | Online Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        /* Tooltip container */
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
            /* If you want dots under the hoverable text */
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
    </style>
</head>

<body>

    <div style="min-height :100vh;" class="container-fluid mh-2 m-0 p-0">
        <?php include 'utils/_dbconn.php' ?>

        <?php include 'utils/_header.php' ?>

        <div id="carouselExampleAutoplaying" style="min-height: 70vh;" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://source.unsplash.com/3200x1200/?code, programming" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/3200x1200/?microsoft, computers" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/3200x1200/?coding, code" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="container my-3">
            <h2 class="text-center">iDiscuss - Browse Categories</h2>
            <div class="row ">
                <?php
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn, $sql);
                $t_color = "warning";
                while ($row = mysqli_fetch_assoc($result)) {

                    $id = $row["category_id"];
                    $title = $row["category_name"];
                    $cate = $row["category_desc"];

                    if (($id % 2) == 0) {
                        $t_color = "primary";
                    } elseif (($id % 7) == 0) {
                        $t_color = "success";
                    } elseif (($id % 5) == 0) {
                        $t_color = "danger";
                    } elseif (($id % 3) == 0) {
                        $t_color = "warning";
                    } else {
                        $t_color = "info";
                    }

                    echo '<div class="col-md-4 d-flex align-items-center justify-content-center my-2">
                    <div class="card my-3" style="width: 18rem;">
                    <img src="https://source.unsplash.com/500x400/?programming,' . $title . '" class="card-img-top" alt="html">';

                    if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                        echo '<div class="card-body">
                            <h5 class="card-title"><a class="fw-bold text-' . $t_color . '" style="text-decoration:none;" href="_thread_list.php?id=' . $id . '">' . $title . '</a></h5>
                            <p class="card-text">' . substr($cate, 0, 90) . '...</p>
                            <a href="_thread_list.php?id=' . $id . '" class="btn btn-primary">View Thread</a>
                        </div>';
                    } else {
                        echo '<div class="card-body">
                            <h5 class="card-title"><a class="fw-bold text-' . $t_color . '" style="text-decoration:none; cursor:pointer;"  data-bs-toggle="modal" data-bs-target="#login_modal">' . $title . '</a></h5>
                            <p class="card-text">' . substr($cate, 0, 90) . '...</p>
                            <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login_modal">View Thread</a>
                        </div>';
                    }
                    echo '</div>
                </div>';
                }
                ?>

            </div>
        </div>

    </div>
    <?php include 'utils/_footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>