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
                                            <select id="cities" name="cities" class="form-control">
                                                <option value="">----- Select City -----</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputPlace" class="lbl-color">Place</label>
                                            <input type="text" class="form-control" id="place" name="place" placeholder="Enter Place Name">
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-success" value="SAVE" id="submit" name="submit">
                                </form>
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

<script>
    //Hide Alert Message
    $('#submit').click(function() {
        setTimeout(function() {
            $('.alert').slideUp('slow');
        }, 5000);
    });

    function loadData(type, cat_id) {
        $.ajax({
            url: 'placeProcess.php',
            type: 'POST',
            data: {
                type: type,
                id: cat_id
            },
            success: function(data) {
                if (type == '') {
                    $("#places").html('');
                } else {
                    $('#cities').append(data);
                }
            }
        });
    }

    loadData();

    $(document).ready(function() {
        $('#submit').on('click', function(e) {
            e.preventDefault();
            var city, place = '';

            var city = $('#cities').val();
            var place = $('#place').val();

            if (city == '' || place == '') {
                toastr["error"]("All fields are required.");
                // $('#message').html(
                //     '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                //     '<span>All fields are required.</span>' +
                //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                //     '<span aria-hidden="true">&times;</span>' +
                //     '</button>' +
                //     '</div>'
                // );
            } else {
                $.ajax({
                    url: 'insertPlace.php',
                    type: 'POST',
                    data: {
                        city: city,
                        place: place,
                    },
                    success: function(data) {
                        if (data == true) {
                            toastr["success"]("Place Successfully Saved.");
                            // $('#message').html(
                            //     '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            //     '<span>Place Successfully Saved.</span>' +
                            //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            //     '<span aria-hidden="true">&times;</span>' +
                            //     '</button>' +
                            //     '</div>'
                            // );

                            $("#usrForm")[0].reset();
                        } else if (data == false) {
                            toastr["error"]("Place Not Saved !!");
                            // $('#message').html(
                            //     '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            //     '<span> Place Not Saved !! </span>' +
                            //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            //     '<span aria-hidden="true">&times;</span>' +
                            //     '</button>' +
                            //     '</div>'
                            // );
                        } else {
                            toastr["error"]("Place Already Exist !!");
                            // $('#message').html(
                            //     '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            //     '<span> Place Already Exist !! </span>' +
                            //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            //     '<span aria-hidden="true">&times;</span>' +
                            //     '</button>' +
                            //     '</div>'
                            // );
                        }
                    }
                });
            }
        });
    });
</script>