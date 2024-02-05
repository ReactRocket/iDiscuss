<?php

session_start();


echo '<nav class="navbar navbar-expand-lg bg-body-secondary">
                <div class="container-fluid">';

// user name display
if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {

    echo '<a id="user_lg" class="navbar-brand text-danger fw-bold text-decoration-none" href="utils/_logout.php">' . $_SESSION['user_name'] . '</a>';
} else {
    echo '<a class="navbar-brand text-primary fw-bold" href="#">iDiscuss</a>';
}

echo '<button class="navbar-toggler" type="button"       data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"      aria-controls="navbarSupportedContent" aria-expanded="false"      aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categorys
                        </a>
                        <ul class="dropdown-menu">';

//display top 5 categogys
$sql = "SELECT category_id,category_name FROM `categories` limit 5";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
        echo '<li><a style="cursor:pointer;" class="dropdown-item" href="_thread_list.php?id=' . $row["category_id"] . '">' . $row["category_name"] . '</a></li>';
    } else {
        echo '<li><a style="cursor:pointer;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#login_modal" >' . $row["category_name"] . '</a></li>';
    }
}

echo  '</ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact us</a>
                    </li>
                    </ul>';

//if not logged in display login/sign_up buttons 

if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
    echo '<form class="d-flex" role="search" action="_search.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>';
} else {
    echo '<button class="btn  btn-outline-success " data-bs-toggle="modal"          data-bs-target="#signup_modal">Sign_up</button>
          <button class="btn mx-2 btn-outline-info" data-bs-toggle="modal" data-bs-target="#login_modal">Login</button>';
}

echo '</div>
                </div>
        </nav>';

if (isset($_GET['signup']) and $_GET['signup'] == 'true') {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success! </strong>Your account has been created successfully. Now you can <a style="cursor:pointer;"  class="  alert-link " data-bs-toggle="modal" data-bs-target="#login_modal" >Login</a> to our system.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

if (isset($_GET['signup']) or isset($_GET['login'])) {

    $alert = $_GET['alert'];

    switch ($alert) {
        case 'null':
            echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
                <strong>Warning! </strong> Please fill all the details.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            break;

        case 'exist':
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Alert! </strong>User Already Exist. Please try again with new Email Address.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            break;

        case 'pass_not_matched':
            echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
                <strong>Warning! </strong>Invalid Password!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            break;

        case 'not_found':
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                  <strong>Alert! </strong>User not exist! Please <a style="cursor:pointer;" class=" alert-link " data-bs-toggle="modal" data-bs-target="#signup_modal">Sign_up</a> first.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            break;
    }
}



include "utils/_signup_modal.php";
include "utils/_login_modal.php";