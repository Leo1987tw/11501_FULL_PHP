<?php

include_once "./include/db_connect.php";

unset($_SESSION['login']);
unset($_SESSION['account']);

header("location: index.html");

?>