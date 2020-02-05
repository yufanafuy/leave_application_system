<?php echo "

<head>
	<title>Leave Management System</title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<script src='js/jquery-3.4.1.min.js'></script>
	<script src='js/bootstrap.bundle.js'></script>
	<style>
		table, th, td
		{
		  border: 2px solid black;
		}
		td
		{
			text-align: center;
		}
	</style>
</head>

<body>
	<div class='container-fluid'>
		<div class = 'row'>
		<div class = 'col-lg-2'>"
?>
			<?php
			print 'Staff ID: ' . $_COOKIE['staff_id'];
			?>
<?php echo"
			<br>
			<button type='button' class='btn btn-warning' onclick=\"location.href = 'user_main.html';\">Back</button>
		</div>
		<div class = 'col-lg-8'>
			<h1 align='center'> Leave Management System </h1>
			<br><br>"
?>
			<?php
				$conn = mysqli_connect('localhost', 'root', '', 'leave_application_system') or die('Could not connect to database');
				$sql = "";
				if($_POST['view_type'] == "View PENDING Leaves" || $_POST['view_type'] == "Pending")
				{
					$sql = "SELECT * FROM leave_application WHERE staff_id=$_COOKIE[staff_id] AND status='Pending' ORDER BY dateOfApplication DESC";
				}
				else if($_POST['view_type'] == "View Applied Leaves" || $_POST['view_type'] == "All")
				{
					$sql = "SELECT * FROM leave_application WHERE staff_id=$_COOKIE[staff_id] ORDER BY dateOfApplication DESC";
				}
				else
				{
					$status=$_POST['view_type'];
					$sql = "SELECT * FROM leave_application WHERE staff_id=$_COOKIE[staff_id] AND status='$status' ORDER BY dateOfApplication DESC";
				}
				$result = $conn->query($sql);

				echo "<table class='table table-striped' align='center' >
					  <tr><th>Index</th><th>Date of Application</th><th>Start Date</th><th>End Date</th><th>Duration (Days)</th><th>Reason</th><th>Leave Type</th><th>Status</th></tr>";
				$i = 1;
				while($row = $result->fetch_array(MYSQLI_ASSOC))
					{
						echo '<tr><td>' .
							$i . '</td><td>' .
							$row['dateOfApplication'] . '</td><td>' .
							$row['startDate'] . '</td><td>' .
							$row['endDate'] . '</td><td>' .
							$row['duration'] . '</td><td>' .
							$row['reason'] . '</td><td>' .
							$row['leave_code'] . '</td><td>' .
							$row['status'] . '</td>' .
							'</tr>';
							$i++;
					}
				echo '</table>';
				$conn->close();

			?>
<?php echo"			
		</div>
		<div class = 'col-lg-2'>
			<div class='form-group'>
				<br>
				<form align='right' action='view_leave.php' method='post'>
					<label for='view_type'> Filter: </label>
					<select name='view_type'>
					  <option selected>All</option>
					  <option value='Pending'>Pending</option>
					  <option value='Approved'>Approved</option>
					  <option value='Denied'>Denied</option>
					</select>
					<br>
					<input type='submit' value='Filter' class='btn btn-warning' style='width:42%;'></button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>"
?>