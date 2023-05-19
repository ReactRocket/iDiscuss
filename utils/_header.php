<?php

session_start();

echo '<div style="z-index:100;" class="position-sticky  top-0 my-0 py-0 mx-0 px-0"><nav  class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Front End</a></li>
            <li><a class="dropdown-item" href="#">Back End</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Fullstack</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      
          
      <div class="d-flex mx-2">';

if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {

  echo '<span class="text-light p-0 my-1 material-symbols-outlined">
  account_circle
  </span> <p class="text-capitalize text-light p-0 my-1 mx-2 fw-bold">' . $_SESSION['user_id'] . '</p>
  <button type="button" id="act_btn" class="btn btn-outline-danger py-0"><a class="text-light text-decoration-none" href="utils/_logout.php">Logout</a></button>';
} else {

  echo '<button class="btn mx-2 btn-outline-success " data-bs-toggle="modal" data-bs-target="#signup_modal">Sign_up</button>

        <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#login_modal">Login</button>';
}





echo '</div>
      
    </div>
  </div>
</nav>';


if (isset($_GET['signup']) and $_GET['signup'] == 'true') {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success! </strong>Your account has been created successfully. Now you can login to our system.
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
                  <strong>Alert! </strong>User not exist! Please sign_up first.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
      break;
  }
}

echo '</div>';

include "utils/_signup_modal.php";
include "utils/_login_modal.php";


// extra working
/*
$signup = $_GET['signup'];
  $alert = $_GET['alert'];

  switch ($alert) {
    case 'null':
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning! </strong> Please fill all the details.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      break;

    case 'success':
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Your account has been created successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      break;

    case 'exist':
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Alert! </strong>User Already Exist. Please try again with new Email Address.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      break;

    case 'pass_not_matched':
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning! </strong>Password not matched. Please enter same password to confirm.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      break;
  }
  */