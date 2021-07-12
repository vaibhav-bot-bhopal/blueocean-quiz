<?php

include('../includes/connection.inc.php');

// Fetch Data form Database
if ($_POST['type'] == '') {
    $sql = "SELECT *FROM cities";

    $result = mysqli_query($conn, $sql);

    $output = '';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<option value='{$row['id']}'>{$row['city_name']}</option>";
        }
    } else {
        $output .= "<option value=''>City Not Found !!</option>";
    }
}
echo $output;
