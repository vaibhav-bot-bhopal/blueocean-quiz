<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Wildlife Day</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<style>
    .alert {
        font-weight: 600;
    }

    .lbl-color {
        color: #0088CC !important;
        font-weight: 600;
    }
</style>

<?php
include('includes/connection.inc.php');
include('includes/header.php');
include('includes/menumptfs.php');
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
                                <img src='img/logo/mptfslogo.png' alt='MPTFS Logo' width='80' height='80' class="img-fluid" style="opacity:1;">
                            </div>

                            <div class="card-body">
                                <form id="usrForm" action="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputName" class="lbl-color">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail" class="lbl-color">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress" class="lbl-color">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address">
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputPhone" class="lbl-color">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAns" class="lbl-color">Are you a student studying in Class 8th to  Class 12th (for session Apr 2021 - Mar 2022) ?</label>
                                            <select id="answer" name="answer" class="form-control">
                                                <option value="">----- Select Answer -----</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity" class="lbl-color">City</label>
                                            <select id="cities" name="cities" class="form-control">
                                                <option value="">----- Select City -----</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputPlace" class="lbl-color">Place</label>
                                            <select id="places" name="places" class="form-control">
                                                <option value="">----- Select Place -----</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputDate" class="lbl-color">Date</label>
                                            <input type="date" class="form-control" id="datepicker" name="datepicker">
                                        </div>
                                    </div> -->

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputDate" class="lbl-color">Date</label>
                                            <select id="dates" name="dates" class="form-control">
                                                <option value="">----- Select Date -----</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputName" class="lbl-color" >Place Code</label>
                                            <input type="text" class="form-control" id="pcode" name="pcode">
                                        </div>
                                    </div> -->

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputSlot" class="lbl-color">Slot</label>
                                            <select id="slots" name="slots" class="form-control">
                                                <option value="">----- Select Slot -----</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-success" value="SUBMIT" id="submit" name="submit">
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

    $(document).ready(function() {
        //Hide Alert Message
        $('#submit').click(function() {
            setTimeout(function() {
                $('.alert').slideUp('slow');
            }, 5000);
        });

        function loadData(type, cat_id, code) {
            $.ajax({
                url: 'mptfs-admin/getCitySlot.php',
                type: 'POST',
                data: {
                    type: type,
                    id: cat_id,
                    code: code,
                },
                success: function(data) {
                    // console.log(data);
                    if (type == 'placeData') {
                        $("#places").append(data);
                    } else if (type == 'dateData') {
                        $('#dates').append(data);
                    } else if (type == 'slotData') {
                        $('#slots').append(data);
                    } else {
                        $('#cities').append(data);
                    }
                }
            });
        }

        loadData();

        $('#cities').on('change', function() {
            $('#places').html('<option value="">----- Select Place -----</option>');
            var city = $('#cities').val();

            if (city != '') {
                loadData('placeData', city);
            } else {
                $('#places').html('<option value="">----- Select Place -----</option>');
            }
        });

        $('#places').on('change', function() {
            $('#dates').html('<option value="">----- Select Date -----</option>');
            var place = $('#places').val();

            if (place != '') {
                loadData('dateData', place);
            } else {
                $('#dates').html('<option value="">----- Select Date -----</option>');
            }
        });

        $('#dates').on('change', function() {
            $('#slots').html('<option value="">----- Select Slot -----</option>');
            var dates = $('#dates').val();
            var code = $('#dates').find(':selected').data('id');

            if (dates != '' && code != '') {
                loadData('slotData', dates, code);
            } else {
                $('#slots').html('<option value="">----- Select Slot -----</option>');
            }
        });

        $('#usrForm').on('submit', function(e) {
            e.preventDefault();

            var name, email, address, phone, answer, city, place, date, slot = '';

            var name = $('#name').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            var answer = $('#answer').val();
            var city = $('#cities').val()
            var place = $('#places').val();
            var date = new Date($('#dates').val());
            year = date.getFullYear();
            month = date.getMonth() + 1;
            day = date.getDate();
            var fulldate = ([day, month, year].join('-'));
            var slot = $('#slots').val();

            if (name == '' || email == '' || address == '' || phone == '' || answer == '' || city == '' || place == '' || date == '' || slot == '') {
                toastr["error"]("All fields are required.");
            } else {

                $.ajax({
                    url: 'user.php',
                    type: 'POST',
                    data: {
                        name: name,
                        email: email,
                        address: address,
                        phone: phone,
                        answer: answer,
                        city: city,
                        place: place,
                        date: fulldate,
                        slot: slot
                    },
                    beforeSend: function(){
                        $("#submit").val('Please wait.....');
                        $("#submit").attr("disabled", true);
                        $("#submit").css('cursor','not-allowed');
                    },
                    success: function(data) {
                         if (data == 0) {
                            toastr["error"]("This slot is full, Please try another slot !!");

                            $("#submit").val('Submit');
                            $("#submit").attr("disabled", false);
                            $("#submit").css('cursor','pointer');
                            var answer = $('#answer').prop('selectedIndex', 0);
                            var city = $('#cities').prop('selectedIndex',0);
                            var place = $('#places').html('<option value="">----- Select Place -----</option>');
                            var date = $('#dates').html('<option value="">----- Select Date -----</option>');
                            var slot = $('#slots').html('<option value="">----- Select Slot -----</option>');
                        } else if (data == 2) {
                            toastr["error"]("You have already been registered.");

                            $("#submit").val('Submit');
                            $("#submit").attr("disabled", false);
                            $("#submit").css('cursor','pointer');
                            $("#usrForm")[0].reset();
                            var answer = $('#answer').prop('selectedIndex', 0);
                            var city = $('#cities').prop('selectedIndex',0);
                            var place = $('#places').html('<option value="">----- Select Place -----</option>');
                            var date = $('#dates').html('<option value="">----- Select Date -----</option>');
                            var slot = $('#slots').html('<option value="">----- Select Slot -----</option>');
                        } else if (data == true) {
                            // toastr["success"]("Record Successfully Saved.");

                            toastr["success"]("You have been successfully registered and an email has been sent to your email ID.");

                            $("#submit").val('Submit');
                            $("#submit").attr("disabled", false);
                            $("#submit").css('cursor','pointer');
                            $("#usrForm")[0].reset();
                            var answer = $('#answer').prop('selectedIndex', 0);
                            var city = $('#cities').prop('selectedIndex',0);
                            var place = $('#places').html('<option value="">----- Select Place -----</option>');
                            var date = $('#dates').html('<option value="">----- Select Date -----</option>');
                            var slot = $('#slots').html('<option value="">----- Select Slot -----</option>');
                        } else if (data == false) {
                            // toastr["error"]("Record Not Saved !!");
                            toastr["error"]("Email does not exist !!");
                        }
                    }
                });
            }
        });
    });
</script>