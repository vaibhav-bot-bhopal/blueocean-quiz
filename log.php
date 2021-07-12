<?php
	date_default_timezone_set('Asia/Kolkata');
	$log_msg = $arLogData['event_datetime']='['.date('D Y-m-d h:i:s A').'][client'.$_SERVER['REMOTE_ADDR'].']['.$_SERVER['REQUEST_URI'].']' ;
	
	wh_log($log_msg);
	 
	function wh_log($log_msg)
	{
	    $log_filename = "log";
	    if (!file_exists($log_filename)) 
	    {
	        // create directory/folder uploads.
	        mkdir($log_filename, 0777, true);
	    }
	    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
	    file_put_contents($log_file_data,$log_msg." ",FILE_APPEND);
	}
?>