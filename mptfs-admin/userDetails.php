<?php

include('../includes/connection.inc.php');


// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login-view.php");
    exit;
}
?>

<?php
include('includes/admin-header.php');
?>

<div id="admin-content">
    <div class="row">
        <div class="col-md-12">
            <div class="container mt-5 mb-5">
                <div class="row d-flex">
                    <div class="col-md-12 mx-auto">

                        <div id="message"></div>

                        <div class="card">
                            <div class="card-body">
                                <table id="tblData" class="table table-bordered table-striped">
                                    <thead>
                                        
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone No.</th>
                                        <th>Are you a student studying in Class 8th to  Class 12th (for session Apr 2021 - Mar 2022) ?</th>
                                        <th>City</th>
                                        <th>Place</th>
                                        <th>Date</th>
                                        <th>Slot Name</th>
                                        
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_fetch = "SELECT *FROM users LEFT JOIN slots ON users.slot = slots.id LEFT JOIN cities ON users.city = cities.id  LEFT JOIN places ON users.place = places.id";

                                        $result = mysqli_query($conn, $sql_fetch);
                                        ?>

                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $id = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['address'] ?></td>
                                                    <td><?php echo $row['phone'] ?></td>
                                                    <td><?php echo $row['answer'] ?></td>
                                                    <td><?php echo $row['city_name'] ?></td>
                                                    <td><?php echo $row['place_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        $date = strtotime($row['date']);
                                                        echo date('d-m-Y', $date);
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row['slot_name'] ?></td>
                                                </tr>
                                            <?php $id++;
                                            } ?>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>