<?php
session_start();

session_destroy();

header("location: /projects/websites/idiscuss/index.php");
