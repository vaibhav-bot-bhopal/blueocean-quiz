<?php
include('includes/header.php');
include('includes/menumptfs.php');
include('includes/connection.inc.php');
?>

<div class="container p-5">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12 mx-auto" style="background: #E1E1E1; border-radius: 4px; border: 2px solid #555;">
            <img src="img/logo/mptfslogo.png" alt="MPTFS-Logo" width='80px' height='80px' class="img-fluid d-block mx-auto pt-4 pb-4">
            <!-- Form Start -->
            <form id="quizFrm" action="quiz_data.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <label class="text-primary mb-3" style="font-size: 18px; font-weight: 700;">Select Your Quiz and Month</label>
                    <select id="quiz" name="quiz" class="form-control mb-2" style="font-size: 14px; font-weight: 700;">
                        <option value="">----- Select Your Quiz Here -----</option>
                        <option value="barasingha_july_quiz_2021">Barasingha Quiz 2021</option>
                        <option value="sparrow_june_2021">World Sparrow Day Quiz 2021</option>
                        <option value="bsss_june_2021">World Environment Day Quiz (BSSS College) 2021</option>
                        <option value="anand_vihar_june_2021">Wildlife Heritage of MP Quiz (Anand Vihar College) 2021</option>
                        <option value="mptfs_biodiversity_2021">MPTFS Biodiversity Quiz 2021</option>
                        <option value="tata_dec_quiz_2020">Ta-Ta 20-20 Wildlife Quiz 2020</option>
                    </select>
                </div>
                <button class="btn btn-danger mb-3" id="submit" name="submit" style="font-size: 14px; font-weight: 600;">View Details</button>
            </form>
            <!-- /.Form End -->
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>

<script>
    $(document).ready(function() {
        $(document).on('click', '#submit', function(e) {
            var getValue = $('#quiz').val();
            if (getValue == '') {
                alert('Please Select a Quiz and Month !!');
            }
        });
    });
</script>