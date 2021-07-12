<?php

    include('../includes/connection.inc.php');

    header('Content-type: Application/JSON');

    $sql = "SELECT *FROM slots";

    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

    $json_array = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $json_array[] = $row;
    }

    echo json_encode($json_array, JSON_PRETTY_PRINT);

    // echo "<pre>";
    // print_r($json_array);
    // echo "</pre>";

    // $output = "";   

    // if(mysqli_num_rows($result) > 0)
    // {
    //     $id = 1;

    //     while($row = mysqli_fetch_assoc($result))
    //     {
    //         $output .= "<tr><td class='text-center'><input type='checkbox' class='del-chkbx' value='{$row['id']}'></td>
    //         <td class='text-center'>{$id}</td>
    //         <td class='text-left'>{$row['slot_name']}</td>
    //         <td class='text-center'>{$row['slot_date']}</td>
    //         <td class='text-center'>{$row['slot_state']}</td>
    //         <td class='text-center'>{$row['free_slot']}</td>
    //         </tr>";
    //         $id++;
    //     }

    //     mysqli_close($conn);

    //     echo $output;
    // }
    // else
    // {
    //     echo "<h2 align='center'>No Record Found in Database.</h2>";
    // }
?>