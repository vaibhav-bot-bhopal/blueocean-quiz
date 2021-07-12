<?php
include('includes/header.php');
include('includes/menumptfs.php');
include('includes/connection.inc.php');
// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 

if(isset($_POST['submit']))
{
    $quiz = $_POST['quiz'];

 if($quiz == '')
 {
    header('location: generate_pdf.php');
 }
 else{
  
    $sql = "SELECT * FROM `$quiz`";
    $result = mysqli_query($conn, $sql);

    echo "<table class='table' id='myTbl' border='1'>";
    echo "<thead>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Score</th>";
    echo "<th>Mobile</th>";
    echo "<th>Result</th>";
    echo "<th>Action</th>";
    echo "</thead>";
    while($row = mysqli_fetch_assoc($result))
    {  
    // $row = mysqli_fetch_assoc($result);
    $id = $row['c_id'];
    $name = $row['c_name']; 
    $email = $row['c_email'];
    $score = $row['c_score'];
    $mobile = $row['c_mobile'];  
    $c_result = $row['c_result'];
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$email</td>";
    echo "<td>$score</td>";
    echo "<td>$mobile</td>";
    echo "<td>$c_result</td>";
    echo "<td>
        <form action='generate_certificate.php' method='post' target='_blank'>
            <input type='hidden' name='c_download' value='$id'>
            <input type='hidden' name='c_quiz' value='$quiz'>
            <input class='btn btn-danger mybtn reloadButton' id='clickButton' data-id='{$id}' type='submit' value='Generate Certificate'>
        </form>
    </td>";    
    echo "</tr>";

}
echo "</table>";
 }

 
}

?>

<?php
include('includes/footer.php');
?>




