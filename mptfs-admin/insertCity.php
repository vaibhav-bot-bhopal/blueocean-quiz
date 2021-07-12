<?php

include('../includes/connection.inc.php');

$city = $_POST['city'];

$duplicate = mysqli_query($conn, "SELECT *FROM cities where city_name='$city'");

if (mysqli_num_rows($duplicate) > 0) {
    echo json_encode(array("statusCode" => 201));
} else {
    $sql = "INSERT INTO cities (city_name) values ('$city')";

    if (mysqli_query($conn, $sql)) {
        echo true;
    } else {
        echo false;
    }
}
