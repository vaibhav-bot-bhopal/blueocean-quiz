<?php
include('includes/header.php');
include('includes/menumptfs.php');
include('includes/connection.inc.php');

?>	

			
 <!-- contact page content copy -->

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <!-- <h1 class="admin-heading">Search contact details</h1> -->
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-6 p-2" style="background:#e8e8e8;">
                  <!-- Form Start -->

                  <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">    
                        
                        <img src='img/logo/mptfslogo.png' alt='MPTFS Logo' width='80px' height='' style="opacity:1;">
                        
                        </div>
                    </div>
                </div>



                 <!-- <h4 class="text-center mptfs">MPTFS Wildlife Quiz June 2020</h4> -->
                  <form action="quiz_data.php" method="POST" autocomplete="off">
                        <div class="form-group">
                          <label class="text-primary" style="font-size:24px;">Select Your Quiz and Month</label>
                            <select id="quiz" name="quiz" class="form-control">
                            <option value=""> Select your quiz here</option>
                            <!-- <option value="biodiversity_may">Biodiversity Quiz May 2020</option>
                            <option value="wildlife_june">Wildlife Quiz June 2020</option> 
                            <option value="tiger_day_quiz_2020">MPTFS Tiger Day Quiz 2020</option>                            -->
                            <option value="mptfs_biodiversity_2021">MPTFS Biodiversity Quiz 2021</option>                           
                            <option value="childrens_day_wildlife_quiz_2020">Childrens Day Wildlife Quiz 2020</option>                           
                            </select> 
                        </div>
                        <input class="btn btn-danger" type="submit" value="submit" name="submit">
                     <!-- <a id="search" href="javascript:void(0);" name="save" onclick="myFunction()" class="btn btn-primary"> Search </a>                       -->
                  </form>
                  <!-- /Form End -->
              </div>             
          </div>
      </div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-12 text-center" id="customer_result">                    
        
        
        </div>
    </div>
</div>
  </div>
  <!-- ----------------------------------------------------------------- -->
<!-- <script>

function myFunction(){ 
 
    var quiz = $("#quiz").val();
    var mail_value = $("#email").val();

 $.ajax({        
      url: 'customer_search.php',
      type: 'post',
      data: 'quiz='+quiz+'&email='+mail_value,     
      success: function(data , status){      
        $("#customer_result").html(data); 
        $("#quiz").val("");
        $("#email").val("");              
  }});
}
</script> -->


<?php
include('includes/footer.php');
?>