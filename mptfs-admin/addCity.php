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
                    <div class="col-md-6 mx-auto">

                        <div id="message"></div>

                        <div class="card" style="background-color: #E8E8E8;">

                            <div class="logo text-center mt-4">
                                <img src='../img/logo/mptfslogo.png' alt='MPTFS Logo' width='80' height='80' class="img-fluid" style="opacity:1;">
                            </div>

                            <div class="card-body">
                                <form id="usrForm" action="">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputCity" class="lbl-color">City</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name">
                                        </div>

                                    </div>

                                    <input type="submit" class="btn btn-success" value="SAVE" id="submit" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Show Data from db in Datatable -->
            <div class="card mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-small btn-danger float-left mt-5 ml-5" id="delete-btn" >DELETE</button>
                    </div>
                </div>
                
                <div class="card-body tbl-body">
                    
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Message Modal -->
<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Please Select at least One Record !!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- /.End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure, you want to delete this city ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                <button type="button" class="btn btn-danger" id="delCity">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- /.End Modal -->

<?php
include('includes/footer.php');
?>

<script>
    //Hide Alert Message
    $('#submit').click(function() {
        setTimeout(function() {
            $('.alert').slideUp('slow');
        }, 5000);
    });

    // Insert City
    $('#submit').on('click', function(e) {
        e.preventDefault();
        var city = '';

        var city = $('#city').val();

        if (city == '') {
            toastr["error"]("City field is required.");
        } else {

            $.ajax({
                url: 'insertCity.php',
                type: 'POST',
                data: {
                    city: city
                },
                success: function(data) {
                    if (data == true) {
                        toastr["success"]("City Successfully Saved.");
                        $("#usrForm")[0].reset();
                    } else if (data == false) {
                        toastr["error"]("City Not Saved !!");
                    } else {
                        toastr["error"]("City Already Exist !!");
                    }
                }
            });
        }
    });
</script>