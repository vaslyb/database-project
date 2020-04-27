<!DOCTYPE html>

<html style="background-image:url(../Images/background.jpg);">

	<head>
		<title> DB 2018-19 </title>
		
		<link type="text/css" rel="stylesheet" href="../CSS/stylesheet_general.css"/>
		<link rel="icon" href="../Images/favicon.png"/>
	</head>
	
	
	<body>

	<p style="font-size:70px;text-align:center;color:white;
	font-family:myfont">Copies Available</p>
	
	<form align="center">
	<?php

		$con = mysqli_connect("localhost:3306","root","","Basic");
		if (mysqli_connect_errno())
		{
			die('Could not connect');
		}

		$result = mysqli_query($con,"SELECT * FROM copies_available");

		echo "
			<table border='1' align=center style=background:#f2f2f2>
			<tr>
			<th>Title</th>
			<th>ISBN Code</th>
			<th>Copies Available</th>
			</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['Title'] . "</td>";
			echo "<td>" . $row['ISBN'] . "</td>";
			echo "<td>" . $row['Available_Number'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		mysqli_close($con);


	?>
	<br><br>	
			<a href = "../Homepage.html" button class="hover_button"
				style="width:20%"> Back to Homepage</a>
	</form>
	</body>
</html>



