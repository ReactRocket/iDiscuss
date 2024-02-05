<?php
// echo '<script>
//     $("#user_lg").click(function  { 
//         alert("hello world");

//     });
// </script>';

session_start();

session_destroy();

header("location: /projects/websites/idiscuss/index.php");