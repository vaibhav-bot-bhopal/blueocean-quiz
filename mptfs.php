<?php
include('includes/header.php');
include('includes/menumptfs.php');
include('includes/connection.inc.php');
?>
<style>
  .mptfs {
    animation-name: example1;
    animation-duration: 4s;
    animation-iteration-count: infinite;
  }

  @keyframes example1 {
    0% {
      color: #2E8B57;
    }

    25% {
      color: #556B2F;
    }

    50% {
      color: #228B22;
    }

    75% {
      color: #008000;
    }

    100% {
      color: #006400;
    }
  }

  /* .mybtn:focus {
    display:none !important;
  } */
</style>

<!-- contact page content copy -->

<div id="admin-content">
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

                <div class="form-group">
                  <label class="text-primary mb-3" style="font-size: 18px; font-weight: 700;">Enter Email or Mobile For Search</label>
                  <input type="text" id="email" name="email" class="form-control" placeholder="Exact Email or Mobile You Mentioned During Submission" style="font-size: 14px; font-weight: 700;">
                </div>

                <a id="search" href="javascript:void(0);" name="save" onclick="myFunction()" class="btn btn-success mb-3" style="font-size: 14px; font-weight: 600;">View Result</a>

                <div class="dropdown float-right">
                  <button type="button" class="btn btn-danger mb-3 dropdown-toggle" data-toggle="dropdown" style="font-size: 14px; font-weight: 600;">
                    Download Answer Key
                  </button>

                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="assets/certificate/tata_quiz_dec_2020.pdf" target='__blank' download>Ta-Ta 20-20 Wildlife Quiz 2020</a>
                  </div>
                </div>
            </form>
            <!-- /.Form End -->
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 text-center" id="customer_result">
      </div>
    </div>
  </div>

</div>


<br><br>
<br><br>

<?php

?>
<!-- ----------------------------------------------------------------- -->
<script>
  function myFunction() {

    var quiz = $("#quiz").val();
    var mail_value = $("#email").val();

    $.ajax({
      url: 'customer_search.php',
      type: 'post',
      data: 'quiz=' + quiz + '&email=' + mail_value,
      success: function(data, status) {
        $("#customer_result").html(data);
        $("#quiz").val("");
        $("#email").val("");
      }
    });
  }
</script>


<?php
include('includes/footer.php');
?>