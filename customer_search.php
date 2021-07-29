<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

  .score {
    animation-name: example;
    animation-duration: 4s;
    animation-iteration-count: infinite;
  }

  @keyframes example {
    0% {
      color: red;
    }

    25% {
      color: pink;
    }

    50% {
      color: blue;
    }

    75% {
      color: green;
    }

    100% {
      color: orange;
    }
  }
</style>

<?php
include('includes/connection.inc.php');
if (($_POST['email']) && ($_POST['quiz']) && ($_POST['quiz']) != '') {
  $quiz = $_POST['quiz'];
  $email = $_POST['email'];
  $newgmail = substr($email, -10, 10);
  $newgmail0 = "0" . substr($email, -10, 10);
  $newgmail91 = "+91" . substr($email, -10, 10);
  $sql = "SELECT * FROM $quiz WHERE `c_email`= '$email' || `c_mobile`= '$email' || SUBSTRING(c_mobile, -10) = '$newgmail' || SUBSTRING(c_mobile, -10) = '$newgmail0' || SUBSTRING(c_mobile, -10) = '$newgmail91'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $rowcount = mysqli_num_rows($result);

  if ($rowcount) {
    $id = $row["c_id"] ?? "";
    $c_name = $row["c_name"] ?? "";
    $c_score = $row["c_score"] ?? "";
    $c_email = $row["c_email"] ?? "";
    // $c_address = $row["c_address"]??"";    


    $mydata = "<div class='card' style='border:none;'>";
    $mydata .= "<div>";
    $mydata .= "<h4>Welcome ! $c_name </h4>";
    $mydata .= "<h4>Your Score is : <span class='score'> $c_score </span> </h4>";
    // $mydata .= "<p> <strong> Address you mentioned during Quiz submission </strong> </br> $c_address</p>";
    $mydata .= "</div>";
    if ($quiz == 'tiger_day_quiz_july_2021') {
      $mydata .= "<div class='d-flex mx-auto mb-5'>
                    <a href='assets\certificate\\$quiz\\$c_email.jpg' target='_blank' class='btn btn-primary p-2' style='margin:0px 5px; font-size: 14px; font-weight: 600;' onclick='window.location.reload();'>Open Certificate as JPG</a>
                    <a href='dompdf\\$quiz\\$c_email.pdf' target='_blank' class='btn btn-dark p-2' style='margin:0px 5px; font-size: 14px; font-weight: 600;' onclick='window.location.reload();'>Open Certificate as PDF</a>
                    <!--<form action='certificate.php' method='post' target='_blank'>
                      <input type='hidden' name='c_download' value='$id'>
                      <input type='hidden' name='c_quiz' value='$quiz'>
                      <input class='btn btn-dark mybtn p-2' type='submit' value='Open Certificate as PDF' style='font-size: 14px; font-weight: 600;'>        
                    </form>-->
                  </div>";
    } else if ($quiz == 'barasingha_july_quiz_2021') {
      $mydata .= "<div class='d-flex mx-auto mb-5'>
                    <a href='assets\certificate\\$quiz\\$c_email.jpg' target='_blank' class='btn btn-primary p-2' style='margin:0px 5px; font-size: 14px; font-weight: 600;'>Open Certificate as JPG</a>
                    <form action='certificate.php' method='post' target='_blank'>
                      <input type='hidden' name='c_download' value='$id'>
                      <input type='hidden' name='c_quiz' value='$quiz'>
                      <input class='btn btn-dark mybtn p-2' type='submit' value='Open Certificate as PDF' style='font-size: 14px; font-weight: 600;'>        
                    </form>
                  </div>";
    } else 
    if ($quiz == 'bsss_june_2021') {
      $mydata .= "<a href='assets\certificate\\$quiz\\$c_email.jpg' target='_blank' class='btn btn-primary' style='margin:0px auto; font-size: 14px; font-weight: 600;'>Download Certificate</a>";
    } else if ($quiz == 'anand_vihar_june_2021') {
      $mydata .= "<a href='assets\certificate\\$quiz\\$c_email.jpg' target='_blank' class='btn btn-primary' style='margin:0px auto; font-size: 14px; font-weight: 600;'>Download Certificate</a>";
    } else if ($quiz == 'mptfs_biodiversity_2021') {
      $mydata .= "<a href='assets\certificate\\$quiz\\$c_email.jpg' target='_blank' class='btn btn-primary' style='margin:0px auto; font-size: 14px; font-weight: 600;'>Download Certificate</a>";
    } else if ($quiz == 'tata_quiz_dec_2020') {
      $mydata .= "<a href='assets\certificate\\$quiz\\$c_email.jpg' target='_blank' class='btn btn-primary' style='margin:0px auto; font-size: 14px; font-weight: 600;'>Download Certificate</a>";
    } else {
      // ---------------- certificate generate start----------------------

      // $mydata .= "
      //   <form action='certificate.php' method='post' target='_blank'>
      //   <input type='hidden' name='c_download' value='$id'>
      //   <input type='hidden' name='c_quiz' value='$quiz'>
      //   <input class='btn btn-dark mybtn' type='submit' value='Download Certificate' style='font-size: 14px; font-weight: 600;'>        
      //   </form>        
      //   ";

      // ---------------- certificate generate end----------------------
    }
    $mydata .= "</div>";

    echo $mydata;
  } else {
?>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin-top: 60px;">
          <div class="modal-header">
            <img src='img/logo/mptfslogo.png' class='mr-2' alt='MPTFS-Logo' width='36' height='36'>
            <h6 class="modal-title font-weight-bold py-2" id="exampleModalLabel">Message</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body font-weight-bold">
            <p class="text-dark text-justify">The Mail ID / Mobile Number you entered doesn't matches with our records.
              Please ensure that you are entering the exact same Mail ID / Mobile Number which you used at the time of quiz submission. </p>
            <p class="text-danger text-justify">For any issues kindly Whatsapp your name / Mail ID / Mobile Number on 9922951184.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#exampleModal1').modal('show');
    </script>

  <?php
  }
} else {
  ?>
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="margin-top: 60px;">
        <div class="modal-header">
          <img src='img/logo/mptfslogo.png' class='mr-2' alt='MPTFS-Logo' width='36' height='36'>
          <h6 class="modal-title font-weight-bold py-2" id="exampleModalLabel">You have not entered anything</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-danger text-justify font-weight-bold"> Please enter the exact same Mail ID / Mobile Number which you used at the time of quiz submission.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $('#exampleModal1').modal('show');
  </script>
<?php


}

?>