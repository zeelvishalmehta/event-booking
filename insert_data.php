<?php
include("connect.php");

//read the json file contents
 $jsondata = file_get_contents('event-data.json');

//convert json object to php associative array
$data = json_decode($jsondata, true);
foreach($data as $data)
{
	$employee_name = $data['employee_name'];
	$employee_mail = $data['employee_mail'];
	$event_id = $data['event_id'];
	$event_name = $data['event_name'];
	$participation_fee = $data['participation_fee'];
	$event_date = $data['event_date'];
	
	$explode_date = explode(" ",$event_date);
	$date = $explode_date[0];
	$time = $explode_date[1];
	$sql = "insert into ebooking (employee_name,employee_mail,event_id,event_name,participation_fee,event_date,event_time) values ('".$employee_name."','".$employee_mail."','".$event_id."','".$event_name."','".$participation_fee."','".$date."','".$time."')";	
	$conn->query($sql);
}

?>
