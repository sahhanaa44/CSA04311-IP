<?php
$conn = mysqli_connect("localhost", "root", "", "job_vacancy");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>