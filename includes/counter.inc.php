<?php
include('connection.inc.php');
$sql2="update visitor_counter set visitor_counter=visitor_counter+1";
mysqli_query($conn, $sql2);

$sql1="select visitor_counter from visitor_counter";
$count_result = mysqli_query($conn, $sql1);
$count_row =  mysqli_fetch_assoc($count_result);
$counter=$count_row['visitor_counter'];
$c_len=strlen($counter);
if($c_len == 1)
{
	$counter = "000".$counter;	
}
else if($c_len == 2)
{
	$counter = "00".$counter;
}
else if($c_len == 3)
{
	$counter = "0".$counter;
}
else
{
	$counter = $counter;
}
// $counter = "00000".$counter;
// $counter = substr($counter, $c_len);
$count=strlen($counter);

?>
<style>
#visitor_counter{
	display:flex;
	justify-content: center;
}
#visitor_counter li{
	list-style: none;
    float: left;
    background-color: #2DA8F8;
    padding: 10px;
    margin-left: 1%;
    color: #fff;
    font-size: 20px;
	font-family:arial;
	border-radius:10px;
}
#visitor_counter_box{
	list-style: none;
    padding:1%;
    font-size: 18px;
	font-family:arial;
}
</style>
<div style="text-align:center; position:relative;">
	<!-- <div id="visitor_counter_box">Total Visitors of Page</div> -->
	<ul id="visitor_counter">
		<?php for($i=0;$i<$count;$i++){?>
		<li><?php echo $counter[$i]?></li>
		<?php } ?>
	</ul>
</div>