<?php
echo '<font color=red><b>Task2: Please provide a tested class for the version comparison</b></font><br><br>';
class VersionCompare{
	function comparedate($date){
		// create a $utc object with the UTC timezone
		$IST = new DateTime(''.$date.'', new DateTimeZone('UTC'));

		// change the timezone of the object without changing it's time
		$IST->setTimezone(new DateTimeZone('Europe/Berlin'));

		// format the datetime
	   echo 'CEST: '.$IST->format('Y-m-d H:i:s');
	}
}
$obj = new VersionCompare();
$utcdate = '2019-09-04 08:00:00';
echo 'UTC: '.$utcdate.'<br>';
echo $obj->comparedate($utcdate);
?>