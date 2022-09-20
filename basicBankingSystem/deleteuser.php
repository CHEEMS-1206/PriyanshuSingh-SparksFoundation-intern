<?php

include 'config.php';

$uid = $_GET['id'];

$sql = "delete from customers where id=$uid";

mysqli_query($conn, $sql);

header("location: customers.php");

?>