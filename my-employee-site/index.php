<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LandscapeTitles| florida web design</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
<div id="container">
  <div id="header">
    <?php
      $servername = "employeedb.c0bmb4m3zabi.us-east-1.rds.amazonaws.com";
	  $username = "admin";
      $password = "jash1989";
      $dbname = "employee";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			echo "Connection failed: " . $conn->connect_error;
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_REQUEST['name'];
			$role = $_REQUEST['role'];
			
			$sqlquery = "INSERT INTO emp VALUES('$name', '$role')";
			$conn->query($sqlquery);
		}

		$sql = "SELECT name,role FROM emp";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<h2 style='text-align:center'><span class='off'>Available Employees</span></h2>";
		
		echo "<table>";
		echo "<tr><td>Name</td><td>Role</td></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["name"]. "</td><td>" . $row["role"]. "</td></tr>";
		}
		} else {
			echo "0 results";
		}
		echo "</table>";

		$conn->close();
    ?>
  </div>
  <div id="content">
    <div class="contenttext">
      <form action="index.php" method="POST">
		<label for="name">First name:</label><br>
		<input type="text" id="name" name="name"><br>
		<label for="role">Role:</label><br>
		<input type="text" id="role" name="role"><br><br>
		<input type="submit" value="Submit">
	</form> 
    </div>
  </div>
    
  <div id="footer">
  <?php
		$ip = gethostname();
		echo "IP Address is: $ip", "<br>";
		?>
  </div>
</div>
</body>
</html>
