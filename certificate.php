<?php
include ("includes/connection.inc.php");
if(isset($_POST['c_download']))
{
   $id = $_POST['c_download'];
   $c_quiz = $_POST['c_quiz']; 
}
$sql = "SELECT * FROM `$c_quiz` WHERE `c_id`= '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email = $row['c_email'];
$name = $row['c_name'];
$c_result = $row['c_result'];


if ($c_quiz == "tiger_day_quiz_july_2021") {
   if ($c_result == 1) {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:45%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/' . $c_quiz . '.jpg" alt="" width="100%" height="795px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">' . $name . '</span> has participated in the <span style="font-weight: 700;">"Tiger Day Quiz 2021"</span> organized by Madhya Pradesh Tiger Foundation Society to create awareness for the cause of Tiger and Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">' . $name . '</span> was among the <span style="font-weight: 700;">Top 100 Scorers</span> of the Tiger Day Quiz 2021. We appreciate the participation and wish them all the best for future endeavours.
      </p>
      <div>';
   }else if ($c_result == 2) {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:45%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/' . $c_quiz . '.jpg" alt="" width="100%" height="795px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">' . $name . '</span> has participated in the <span style="font-weight: 700;">"Tiger Day Quiz 2021"</span> organized by Madhya Pradesh Tiger Foundation Society to create awareness for the cause of Tiger and Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">' . $name . '</span> was the <span style="font-weight: 700;">Winner</span> of the Tiger Day Quiz 2021. We appreciate the participation and wish him all the best for future endeavours.
      </p>
      <div>';
   } else {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:45%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/' . $c_quiz . '.jpg" alt="" width="100%" height="795px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">' . $name . '</span> has participated in the <span style="font-weight: 700;">"Tiger Day Quiz 2021"</span> organized by Madhya Pradesh Tiger Foundation Society to create awareness for the cause of Tiger and Wildlife Conservation. We appreciate the participation and wish them all the best for future endeavours.
      </p>
      <div>';
   }
}

if($c_quiz=="barasingha_july_quiz_2021") {
   if($c_result==1)
   {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:38%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/'. $c_quiz.'.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">'. $name .'</span> has participated in the <span style="font-weight: 700;">"Barasingha Quiz 2021"</span> jointly organized by Van Vihar National Park and Zoo, Bhopal and MP Tiger Foundation Society as part of <span style="font-weight: 700;">“Bharat ka Amrit Mahotsav – Celebrating 75 years of Independence ”</span>celebrations to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">'. $name .'</span> won the <span style="font-weight: 700;">First Prize</span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>
      <div>';
   }
   else if($c_result==2)
   {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:38%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/'. $c_quiz.'.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">'. $name .'</span> has participated in the <span style="font-weight: 700;">"Barasingha Quiz 2021"</span> jointly organized by Van Vihar National Park and Zoo, Bhopal and MP Tiger Foundation Society as part of <span style="font-weight: 700;">“Bharat ka Amrit Mahotsav – Celebrating 75 years of Independence ”</span>celebrations to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">'. $name .'</span> won the <span style="font-weight: 700;">Second Prize</span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>
      <div>';
   }
   else if($c_result==3)
   {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:38%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/'. $c_quiz.'.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">'. $name .'</span> has participated in the <span style="font-weight: 700;">"Barasingha Quiz 2021"</span> jointly organized by Van Vihar National Park and Zoo, Bhopal and MP Tiger Foundation Society as part of <span style="font-weight: 700;">“Bharat ka Amrit Mahotsav – Celebrating 75 years of Independence ”</span>celebrations to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">'. $name .'</span> won the <span style="font-weight: 700;">Third Prize</span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>
      <div>';
   }
   else{
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:38%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/'. $c_quiz.'.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">'. $name .'</span> has participated in the <span style="font-weight: 700;">"Barasingha Quiz 2021"</span> jointly organized by Van Vihar National Park and Zoo, Bhopal and MP Tiger Foundation Society as part of <span style="font-weight: 700;">“Bharat ka Amrit Mahotsav – Celebrating 75 years of Independence ”</span>celebrations to create awareness for the cause of Wildlife Conservation. We appreciate the participation and wish them all the best for future endeavours.
      </p>
      <div>';
   }
}

if($c_quiz=="bsss_june_2021") {
   if($c_result==1)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr./Ms. <span style="font-weight: 700;">$name</span> has participated in the <span style="font-weight: 700;">"World Environment Day Quiz 2021"</span> jointly organized by The Bhopal School of Social Sciences, Bhopal and MP Tiger Foundation Society on <span style="font-weight: 700;">World Environment Day , 5th June 2021</span>, to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">$name</span> won the <span style="font-weight: 700;"> First Prize </span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
  else if($c_result==2)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr./Ms. <span style="font-weight: 700;">$name</span> has participated in the <span style="font-weight: 700;">"World Environment Day Quiz 2021"</span> jointly organized by The Bhopal School of Social Sciences, Bhopal and MP Tiger Foundation Society on <span style="font-weight: 700;">World Environment Day , 5th June 2021</span>, to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">$name</span> won the <span style="font-weight: 700;"> Second Prize </span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
   else if($c_result==3)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr./Ms. <span style="font-weight: 700;">$name</span> has participated in the <span style="font-weight: 700;">"World Environment Day Quiz 2021"</span> jointly organized by The Bhopal School of Social Sciences, Bhopal and MP Tiger Foundation Society on <span style="font-weight: 700;">World Environment Day , 5th June 2021</span>, to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">$name</span> won the <span style="font-weight: 700;"> Third Prize </span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
   else{
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr./Ms. <span style="font-weight: 700;">$name</span> has participated in the <span style="font-weight: 700;">"World Environment Day Quiz 2021"</span> jointly organized by The Bhopal School of Social Sciences, Bhopal and MP Tiger Foundation Society on <span style="font-weight: 700;">World Environment Day , 5th June 2021</span>, to create awareness for the cause of Wildlife Conservation. We appreciate the participation and wish them all the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
}

if($c_quiz=="anand_vihar_june_2021") {
   if($c_result==1)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr./Ms. <span style="font-weight: 700;">$name</span> has participated in the <span style="font-weight: 700;">"Wildlife Heritage of Madhya Pradesh"</span> Quiz jointly organized by Anand Vihar College For Women, Bhopal and MP Tiger Foundation Society on <span style="font-weight: 700;">World Environment Day , 5th June 2021</span>, to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">$name</span> won the <span style="font-weight: 700;"> First Prize </span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
  else if($c_result==2)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr./Ms. <span style="font-weight: 700;">$name</span> has participated in the <span style="font-weight: 700;">"Wildlife Heritage of Madhya Pradesh"</span> Quiz jointly organized by Anand Vihar College For Women, Bhopal and MP Tiger Foundation Society on <span style="font-weight: 700;">World Environment Day , 5th June 2021 </span>, to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">$name</span> won the <span style="font-weight: 700;"> Second Prize </span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
   else if($c_result==3)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr./Ms. <span style="font-weight: 700;">$name</span> has participated in the <span style="font-weight: 700;">"Wildlife Heritage of Madhya Pradesh"</span> Quiz jointly organized by Anand Vihar College For Women, Bhopal and MP Tiger Foundation Society on <span style="font-weight: 700;">World Environment Day , 5th June 2021 </span>, to create awareness for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">$name</span> won the <span style="font-weight: 700;"> Third Prize </span> in the quiz. We appreciate the participation and wish them all the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
   else{
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr./Ms. <span style="font-weight: 700;">$name</span> has participated in the <span style="font-weight: 700;">"Wildlife Heritage of Madhya Pradesh"</span> Quiz jointly organized by Anand Vihar College For Women, Bhopal and MP Tiger Foundation Society on <span style="font-weight: 700;">World Environment Day , 5th June 2021 </span>, to create awareness for the cause of Wildlife Conservation. We appreciate the participation and wish them all the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
}

if($c_quiz=="mptfs_biodiversity_2021") {
   if($c_result==1)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz 2021"</span> organized by MP Tiger Foundation Society in May 2021 to create awareness among the common public for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> won the <span style="font-weight: 700;">“FIRST PRIZE”</span> in the quiz. MPTFS appreciates the participation and wishes them all
      the best for future endeavours.
      </p>      
      <div>
      BOT;
   }
  else if($c_result==2)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz 2021"</span> organized by MP Tiger Foundation Society in May 2021 to create awareness among the common public for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> won the <span style="font-weight: 700;">“SECOND PRIZE”</span> in the quiz. MPTFS appreciates the participation and wishes them all the
      best for future endeavours.
      </p>      
      <div>
      BOT;
   }
   else if($c_result==3)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz 2021"</span> organized by MP Tiger Foundation Society in May 2021 to create awareness among the common public for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> won the <span style="font-weight: 700;">“THIRD PRIZE”</span> in the quiz. MPTFS appreciates the participation and wishes them all
      the best for future endeavours.</p>      
      <div>
      BOT;
   }
   else{
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz 2021"</span> organized by MP Tiger Foundation Society in May 2021 to create awareness among the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and
      wishes them all the best for future endeavours.</p>      
      <div>
      BOT;
   }
}

if($c_quiz=="tata_dec_quiz_2020") {
   if($c_result==1)
   {
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:36%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Ta-Ta 20-20 Wildlife Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> was among the top 20 candidates in the quiz. MPTFS appreciates the participation and wishes them all the best for future endeavors.
      </p>      
      <div>
      BOT;
   }
   else{
      $data = <<<BOT
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">""MPTFS Ta-Ta 20-20 Wildlife Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>      
      <div>
      BOT;
   }
}


// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

// Load content from html file 
// $html = file_get_contents("work.php"); 
$dompdf->loadHtml($data); 

// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
// $dompdf->setPaper('A4'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("$email", array("Attachment" => 0));


?>