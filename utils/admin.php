<?php
require('_dbconn.php');
if ($_SESSION['logedin'] == false) {
    header("location: /projects/websites/idiscuss/utils/_logout.php");
    die();
}
if (isset($_POST['add'])) {
    $query = "INSERT INTO `categories`(`category_name`, `category_desc`,`category_source`) VALUES ('$_POST[category_name]','$_POST[category_desc]','$_POST[category_source]')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Successfully!!!</strong> Inserted
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>WRONG!!!</strong> Not Inserted!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss | Online Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="bg-light text-dark">
    <h1 class="text-center text-warning my-5">iDiscuss | Online Coding Forum</h1>

    <div class="container">
        <div class="container d-flex justify-content-between">
            <input type="submit" value="Add Category" class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
            <a href="_logout.php" value="Cancel" class=" btn btn-danger text-white" name='cancel'>Logout</a>
        </div>
        <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New Perfume</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="name" class="col-form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="col-form-label">Category Description</label>
                                <input type="text" class="form-control" name="category_desc">
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="col-form-label">Category Source</label>
                                <input type="url" class="form-control" name="category_source">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" name="add">ADD</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--  -->
        <?php
        require('_dbconn.php');
        $q = "SELECT * FROM categories";
        $result = mysqli_query($conn, $q) or die("Query Failed!");
        if (mysqli_num_rows($result) > 0) {

            echo '<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Category</th>
      <th scope="col">Category Description</th>
      <th scope="col">Category Source</th>
     
    </tr>
  </thead>';

            while ($r = mysqli_fetch_array($result)) {
                echo "<tbody>
    <tr>
      <td>$r[0]</td>
      <td>$r[1]</td>
      <td>$r[2]</td>
      <td>$r[3]</td>
    </tr>
  </tbody>";
            }

            echo '</table>';
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>