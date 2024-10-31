<?php
session_start();
if(isset($_SESSION['name'])){

	$text = $_POST['text'];
	$chat_name = $_POST['chatname'];
	$date_display = $_POST['datedisplay'];

	if($date_display == 'h12a') {

		$dateformat = "h:i a";

	} else {

		$dateformat = "H:i";

	}
	
	$fp = fopen("logs/$chat_name.htm", 'a');
	fwrite($fp, "<div class='msgln'>(".date($dateformat).") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
	fclose($fp);
}
?>
