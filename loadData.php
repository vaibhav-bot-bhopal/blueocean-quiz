<?php
    include('includes/connection.inc.php');

    $quiz_id = $_POST['id'];

    $sql = "SELECT * FROM $quiz_id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $output = '';
        
        while($row = mysqli_fetch_assoc($result))
        {

        }
    }
?>