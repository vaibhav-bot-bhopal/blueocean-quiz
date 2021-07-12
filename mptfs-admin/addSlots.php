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
            <div class="container-fluid mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5">
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
                                            <select id="place" name="place" class="form-control">
                                                <option value="">----- Select Place -----</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputDatepicker" class="lbl-color">Date</label>
                                            <input type="date" class="form-control" onload="getDate()" id="date" name="date" required>
                                        </div>
                                    </div>

                                    <!-- <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputSlot" class="lbl-color">Slot</label>
                                                <select id="slot" name="slot" class="form-control">
                                                    <option value="">----- Select Slot -----</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputSlot" class="lbl-color">Current Slot State</label>
                                                <input type="text" class="form-control" id="cslots" name="cslots" value="0" disabled>
                                            </div>
                                        </div> -->

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputName" class="lbl-color">Slot Name</label>
                                            <input type="text" class="form-control" id="sname" name="sname" placeholder="Enter Slot Name">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputSlot" class="lbl-color">Add Number of Slots</label>
                                            <input type="text" class="form-control" id="fslots" name="fslots" placeholder="Enter Number of Free Slots">
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-success" value="SAVE" id="submit" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-small btn-danger float-left" id="delete-btn">DELETE</button>
                            </div>
                            
                            <div class="card-body">
                                <table id="tblData" class="table table-bordered table-striped">
                                    <thead>
                                        <th class='text-center'><input type='checkbox' id='all-chkbx' value=''></th>
                                        <th class='text-center'>S.No.</th>
                                        <th class='text-center'>Slot Name</th>
                                        <th class='text-center'>Slot Date</th>
                                        <th class='text-center'>Current Slot Status</th>
                                        <th class='text-center'>Total Slots</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql_fetch = "SELECT *FROM slots ORDER BY id DESC";

                                        $result = mysqli_query($conn, $sql_fetch);
                                        ?>

                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $id = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td class='text-center'><input type='checkbox' class='del-chkbx' value='<?php echo $row['id'] ?>'></td>
                                                    <td><?php echo $id ?></td>
                                                    <td><?php echo $row['slot_name'] ?></td>
                                                    <td><?php echo $row['slot_date'] ?></td>
                                                    <td><?php echo $row['slot_state'] ?></td>
                                                    <td><?php echo $row['free_slot'] ?></td>
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
                Are you sure, you want to delete this slot ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                <button type="button" class="btn btn-danger" id="delSlot">Yes, Delete</button>
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

    function loadData(type, cat_id) {
        $.ajax({
            url: 'slotProcess.php',
            type: 'POST',
            data: {
                type: type,
                id: cat_id
            },
            success: function(data) {
                if (type == 'slotData') {
                    $("#slot").append(data);
                } else if (type == 'placeData') {
                    $('#place').append(data);
                } else if (type == 'currData') {
                    $("#cslots").val(data);
                } else {
                    $('#cities').append(data);
                }
            }
        });
    }

    loadData();

    $('#cities').on('change', function() {
        $('#place').html('<option value="">----- Select Place -----</option>');
        var city = $('#cities').val();

        if (city != '') {
            loadData('placeData', city);
        } else {
            $('#places').html('');
        }
    });

    $('#place').on('change', function() {
        $('#slot').html('<option value="">----- Select Slot -----</option>');
        var place = $('#place').val();

        if (place != '') {
            loadData('slotData', place);
        } else {
            $('#slot').html('<option value="">----- Select Slot -----</option>');
        }
    });

    $('#slot').on('change', function() {
        $('#cslots').html('');
        var slot = $('#slot').val();

        if (slot != '') {
            loadData('currData', slot);
        } else {
            $('#cslots').html('');
        }
    });

    $(document).ready(function() {
        $('#submit').on('click', function(e) {
            e.preventDefault();
            var city, place, date, name, slots = '';

            var city = $('#cities').val();
            var place = $('#place').val();
            var name = $('#sname').val();
            var date = $('#date').val();
            var slots = $('#fslots').val();

            if (city == '' || place == '' || date == '' || name == '' || slots == '') {
                toastr["error"]("All fields are required.");
            } else {
                $.ajax({
                    url: 'insertSlot.php',
                    type: 'POST',
                    data: {
                        city: city,
                        place: place,
                        date: date,
                        name: name,
                        slots: slots,
                    },
                    success: function(data) {
                        if (data == true) {
                            toastr["success"]("Slot Successfully Saved.");
                            setTimeout(function(){
                               window.location.reload();
                            }, 1000);
                            
                            $("#usrForm")[0].reset();
                            getDate();
                        } else if (data == false) {
                            toastr["error"]("Slot Not Saved !!");
                        } else if (data == 2){
                            toastr["error"]("Slot Already Exist !!");
                        }
                    }
                });
            }
        });
    });


    // Set Default Date
    $(document).ready(function() {
        getDate();
    });

    function getDate() {
        var today = new Date();
        document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
    }

    //Prevent Back Date in Datepicker
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);


    // Delete Slots
    $(document).on("click", "#all-chkbx", function(){

        var id = [];

        if(this.checked)
        {
            $(".del-chkbx").each(function(key)
            {
                $(".del-chkbx").prop('checked', true);
                id[key] = $(this).val();      
            });
        }
        else
        {
            $(".del-chkbx").each(function()
            {
                $(".del-chkbx").prop('checked', false);
            });
        }  
    });

            
    $("#delete-btn").on("click", function(){

        var id = [];

        $(".del-chkbx:checked").each(function(key)
        {
            id[key] = $(this).val(); 
        });

        if(id.length == 0)
        {
            $("#msgModal").modal('show');
        }
        else
        {
            $("#delModal").modal('show');

            $(document).on("click", "#delSlot", function(){
                $.ajax({
                    url: "deleteSlots.php",
                    type: "POST",
                    data: {id : id},
                    success: function(data)
                    {
                        if(data == true)
                        {
                            $("#delModal").modal('hide');
                            toastr["success"]("Slot Successfully Deleted.");
                            setTimeout(function(){
                               window.location.reload();
                            }, 1000);
                        }
                    }
                });
            });
        }  
    });
</script>