<?php
include("connect.php");

if($_POST['submit'])
{
	if($_POST['datepicker']!=''){
	$originalDate = $_POST['datepicker'];
	$newDate = date("Y-m-d", strtotime($originalDate));
	}
	$emp_name = $_POST['ename'];
	$event_name = $_POST['evname'];

	$query = "select * from ebooking where participation_id != ''";	
	if (!empty($_POST['datepicker']) && isset($_POST['datepicker'])) $query .= " AND event_date = '$newDate'";
	if (!empty($emp_name) && ($emp_name!='all')) $query .= " AND employee_name = '$emp_name'";
	if (!empty($event_name) && ($event_name!='all')) $query .= " AND event_name = '$event_name'";
	$exec_query = $conn->query($query);
		
}
else
{
$query = "select * from ebooking";
$exec_query = $conn->query($query);
}

?>

<html>
<title> Event Booking System</title>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>	
	
</head>	
<body>
	
	<form method="post">
		<table style='margin-top:30px;color:red;'><tr><td><b>Task1: Create a simple page with filters for the employee name, event name and date.</b></td></tr></table>		
		<table align='center' width="70%" style="margin-top:50px;">
			<tr>
				
				<td>Date: <input type="text" id="datepicker" name="datepicker" autocomplete="off" placeholder='Select Date' value="<?=$_POST['datepicker']?>">
				<input type="submit" name="clear" value='Reset' onclick="document.getElementById('datepicker').value='';return false;" /></td>
				<td>Employee: <select name="ename">
					<option value='all'>ALL</option>
					<?php
					$sql_ename = "select employee_name from ebooking";
					$sql = $conn->query($sql_ename);
					while($row=mysqli_fetch_array($sql))
					{ ?>
					<option value="<?php echo $row['employee_name'];?>"<?php if ($row['employee_name'] == $_POST['ename']) echo ' selected="selected"'; ?>><?php echo $row['employee_name'];?></option>
					<?php }
					
					?>
					</select></td>
				
				<td>Event: <select name="evname">
					<option value='all'>ALL</option>
					<?php
					$sql_evname = "select event_name from ebooking";
					$sql = $conn->query($sql_evname);
					while($row=mysqli_fetch_array($sql))
					{ ?>
					<option value="<?php echo $row['event_name'];?>"<?php if ($row['event_name'] == $_POST['evname']) echo ' selected="selected"'; ?>><?php echo $row['event_name'];?></option>
					<?php }
					
					?>
					</select></td>
				<td style="font-weight:bold;"><input type="submit" name="submit" value="SEARCH"></td>
			</tr>	
		</table>	
	</form>	
		<table border=1 style="margin-top:30px;" width="100%">
			<tr style='font-weight:bold;'>
				<td>Participation Id</td>
				<td>Employee Name</td>
				<td>Email</td>
				<td>Event Id</td>
				<td>Event Name</td>
				<td align='center'>Fees</td>
				<td>Date</td>
				</tr>	
			<?php
			$count = mysqli_fetch_row($exec_query);
			if($count > 0){
			while($row=mysqli_fetch_array($exec_query))
			{
				echo "<tr>";
				echo "<td align=center>".$row['participation_id']."</td>";
				echo "<td>".$row['employee_name']."</td>";
				echo "<td>".$row['employee_mail']."</td>";
				echo "<td align=center>".$row['event_id']."</td>";
				echo "<td>".$row['event_name']."</td>";
				echo "<td align=right>".$row['participation_fee']."</td>";
				echo "<td>".$row['event_date']." ".$row['event_time']."</td>";
				echo "</tr>";
				
				$total_fees += $row['participation_fee'];
			}
			
			?>
			<tr><td colspan="5" align='center'><b>Total Fees:</b></td><td  align='right'><b><?=$total_fees?></b></td></tr>
			<? } else { ?>
			<tr><td colspan="8" align='center'>No Records</td></tr>
			
			<? } ?>
	    </table>	

<table style='margin-top:30px;'>
	<tr><td><b>Key Notes:</b></td></tr>
	<tr>
		<td><ul>
			<li><b>DATE Filter:</b> Getting a particular data as selected.</li>
			<li><b>DATE RESET Button:</b> Getting default all data because there is no date selected.</li>
			<li><b>Employee Filter:</b> Getting particular data as per selected employee.</li>
			<li><b>Event Filter:</b> Getting particular data as per selected event.</li>
			<li><b>No Records:</b> There are no match records found, it will appear as "No Records" found.</li>
			</ul></td>
	</tr>
</table>		
	
</body>	
	
</html>	
	