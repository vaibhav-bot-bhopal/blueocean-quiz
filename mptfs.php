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
  <div class="container pt-5 pl-4 pr-4">
    <div class="row">
      <div class="col-lg-6 col-md-8 col-sm-12 mx-auto" style="background: #E1E1E1; border-radius: 4px; border: 2px solid #555;">
        <img src="img/logo/mptfslogo.png" alt="MPTFS-Logo" width='80px' height='80px' class="img-fluid d-block mx-auto pt-4 pb-4">
        <!-- Form Start -->
        <form id="quizFrm" method="POST" autocomplete="off">
          <div class="form-group">
            <label class="text-primary mb-3" style="font-size: 18px; font-weight: 700;">Select Your Quiz and Month</label>
            <select id="quiz" name="quiz" class="form-control mb-2" style="font-size: 14px; font-weight: 700;">
              <option value="">----- Select Your Quiz Here -----</option>
              <option value="tiger_day_quiz_july_2021">Tiger Day Quiz 2021</option>
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

          <div class="dropdown">
            <a id="search" href="javascript:void(0);" name="save" onclick="myFunction()" class="btn btn-sm btn-success mb-3" style="font-size: 14px; font-weight: 600;">View Result</a>

            <button type="button" class="btn btn-sm btn-danger mb-3 dropdown-toggle float-right" data-toggle="dropdown" style="font-size: 14px; font-weight: 600;">
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

  <div class="row">
    <div class="col-lg-6 col-md-8 col-sm-12 mt-2 mb-5 offset-lg-3 offset-md-2 text-center">
      <a href="javascript:void(0);" onclick="showModal();" class="text-danger font-weight-bold">Click here for steps to get score and certificate</a>
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="row">
    <div class="col-12 text-center" id="customer_result">
    </div>
  </div>
</div>

<!-- Certificate Script -->
<script>
  function showModal() {
    $('#instructionModal').modal('show');
  }

  function myFunction() {
    var quiz = $("#quiz").val();
    var mail_value = $("#email").val();

    $.ajax({
      url: 'auto_certificate.php',
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

<!-- Instructions Modal -->
<div class="modal fade" id="instructionModal" tabindex="-1" role="dialog" aria-labelledby="instructionModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content" style="margin-top: 60px;">
      <div class="modal-header">
        <img src='img/logo/mptfslogo.png' class='mr-2' alt='MPTFS-Logo' width='36' height='36'>
        <h5 class=" modal-title font-weight-bold py-2" id="instructionModalLabel">Steps to get Score and Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-danger text-justify font-weight-bold">Step 1 - Select "The name of the Quiz" from the first dropdown.</p>
        <p class="text-danger text-justify font-weight-bold">Step 2 - Please enter the EXACT email id or mobile number you provided during the quiz submission in second text box and click on search.</p>
        <p class="text-danger text-justify font-weight-bold">Step 3 - Once you click search, you will see your score and two buttons to open your certificate. Click on any one of the buttons to open the certificate in either PDF or JPG format. You may then save it on your device.</p>

        <p class="text-success text-justify font-weight-bold">Thank you everyone for participating!!</p>

        <p class="text-dark text-justify font-weight-bold">
          If you are trying to open the certificate on your android phone then you are requested to use "Chrome" Browser instead of the default browser. You may open this on Laptop / Desktop as well. Once the certificate opens in a new tab save it on your device.
        </p>

        <p class="text-primary text-justify font-weight-bold">
          If anyone has any issue in opening the certificate then please message in following through WhatsApp to 9922951184.
        <ul class="text-dark text-justify font-weight-bold">
          <li>Name of Quiz</li>
          <li>Your Name</li>
          <li>Mail id and Phone number</li>
        </ul>
        </p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>