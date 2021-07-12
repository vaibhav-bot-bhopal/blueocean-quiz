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
} else if ($_POST['type'] == 'placeData') {
    $sql = "SELECT *FROM places WHERE city_code = {$_POST['id']}";

    $result = mysqli_query($conn, $sql);

    $output = '';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<option value='{$row['id']}'>{$row['place_name']}</option>";
        }
    } else {
        $output .= "<option value=''>Place Not Found !!</option>";
    }
} else if ($_POST['type'] == 'slotData') {
    $sql = "SELECT *FROM slots WHERE city_code = {$_POST['id']}";

    $result = mysqli_query($conn, $sql);

    $output = '';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<option value='{$row['id']}'>{$row['slot_name']}</option>";
        }
    } else {
        $output .= "<option>Slot Not Found !!</option>";
    }
} else if ($_POST['type'] == 'currData') {
    $sql = "SELECT *FROM slots WHERE id = {$_POST['id']}";

    $result = mysqli_query($conn, $sql);

    $output = '';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "{$row['slot_state']}";
        }
    } else {
        $output .= "Slot Not Found !!";
    }
}
echo $output;
