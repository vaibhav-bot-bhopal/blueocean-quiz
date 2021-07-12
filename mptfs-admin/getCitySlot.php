<?php

include('../includes/connection.inc.php');

if ($_POST['type'] == '') {
    $sql = "SELECT *FROM cities";

    $result = mysqli_query($conn, $sql);

    $output = '';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<option value='{$row['id']}'>{$row['city_name']}</option>";
        }
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
} else if ($_POST['type'] == 'dateData') {
    // $sql = "SELECT *FROM slots WHERE place_code = {$_POST['id']}";
    $sql = "SELECT distinct(slot_date), place_code FROM slots WHERE place_code = {$_POST['id']} ORDER BY slot_date";

    $result = mysqli_query($conn, $sql);

    $output = '';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $date = $row['slot_date'];
            $output .= "<option value='{$row['slot_date']}' data-id='{$row['place_code']}'>" . date("d-m-Y", strtotime($date)) . "</option>";
        }
    } else {
        $output .= "<option value=''>Date Not Found !!</option>";
    }
} else if ($_POST['type'] == 'slotData') {
    // $sql = "SELECT *FROM slots WHERE id = {$_POST['id']}";
    $date = strtotime($_POST['id']);
    $fdate = date("Y-m-d", $date);
    $sql = "SELECT *FROM slots WHERE slot_date = '$fdate' AND place_code = {$_POST['code']}";

    $result = mysqli_query($conn, $sql);

    $output = '';

    $flg = 0;

    $op1 = '';

    $op2 = '';


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['slot_name'] && $row['slot_date']) 
			{
                //if ($row['slot_state'] != $row['free_slot']) 
				if ($row['slot_state'] < $row['free_slot']) 
				{
                    //$output = "<option value=''>Slot Not Available !!</option>";
                    $op1 .= "<option value='{$row['id']}'>{$row['slot_name']}</option>";
                    $flg = $flg + 1;
                } else {
                    //$output .= "<option value='{$row['id']}'>{$row['slot_name']}</option>";
                    $op2 = "<option value=''>Slot Not Available !!</option>";
                }
                if ($flg > 0) {
                    $output = $op1;
                } else {
                    $output = $op2;
                }
            } else {
                $output .= "<option value=''>Slot Not Available !!</option>";
            }




            // if ($row['slot_state'] >= $row['free_slot']) {
            //     $output .= "<option value=''>Slot Not Available !!</option>";
            // } else {
            //     $output .= "<option value='{$row['id']}'>{$row['slot_name']}</option>";
            // }
        }
    } else {
        $output .= "<option value=''>Slot Not Found !!</option>";
    }


    // if (mysqli_num_rows($result) > 0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         if ($row['slot_name'] && $row['slot_date']) {
    //             if ($row['slot_state'] == $row['free_slot']) {
    //                 $output = "<option value=''>Slot Not Available !!</option>";
    //             } else {
    //                 $output .= "<option value='{$row['id']}'>{$row['slot_name']}</option>";
    //             }
    //         } else {
    //             $output .= "<option value=''>Slot Not Available !!</option>";
    //         }




    //         if ($row['slot_state'] >= $row['free_slot']) {
    //             $output .= "<option value=''>Slot Not Available !!</option>";
    //         } else {
    //             $output .= "<option value='{$row['id']}'>{$row['slot_name']}</option>";
    //         }
    //     }
    // } else {
    //     $output .= "<option value=''>Slot Not Found !!</option>";
    // }
}
echo $output;
