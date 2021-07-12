<?php

include('../includes/connection.inc.php');

// Insert Data in Database
$city = $_POST['city'];
$place = $_POST['place'];

$duplicate = mysqli_query($conn, "SELECT *FROM places where place_name='$place'");

if (mysqli_num_rows($duplicate) > 0) {
    echo json_encode(array("statusCode" => 201));
} else {
    $sql = "INSERT INTO places (place_name, city_code) values ('$place', '$city')";

    if (mysqli_query($conn, $sql)) {
        echo true;
    } else {
        echo false;
    }
}
