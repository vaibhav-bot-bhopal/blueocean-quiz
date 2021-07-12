<?php

    include('../includes/connection.inc.php');

    $id = $_POST['id'];

    $id = implode($id, ",");

    $sql = "DELETE FROM slots WHERE id IN ({$id})";

    if(mysqli_query($conn, $sql))
    {
        echo true;
    }
    else
    {
        echo false;
    }
?>