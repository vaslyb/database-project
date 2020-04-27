<!DOCTYPE html>

<html style="background-image:url(../Images/background.jpg);">

	<head>
		<title> DB 2018-19 </title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="../CSS/stylesheet_general.css"/>
		<link rel="icon" href="../Images/favicon.png"/>
		
	</head>

	<body>
		<form action="Book-Update-Make.php" method="GET" align="center">
		<p style="font-size:70px;text-align:center;color:white;
		font-family:myfont">Book Details:</p>
				<?php
					$con = mysqli_connect("localhost:3306","root","","Basic");
					if (mysqli_connect_errno())
					{
						die('Could not connect');
					}
					
					$ISBN = $_GET['ISBN'];
										
					$myquery = "
					SELECT 
						* 
					FROM 
						book
					WHERE
						ISBN = '$ISBN'
					";
										
					$result	= mysqli_query($con,$myquery);
					
					if ($result !=FALSE) {
						$row = mysqli_fetch_array($result);

						$Title 			= 	$row['Title'];
						$PubYear 		= 	$row['PubYear'];
						$Numpages 		= 	$row['Numpages'];
						$PubName 		=	$row['PubName'];
					}
					else { 
						echo '<div align="center"> Error, no results </div>';
					}
					mysqli_close($con);
				?>
			<br><br>
			<div>
				<label for="Title">Title: </label>
				<input type="text" name="Title" 
				style="width:70%" required
				value="<?=$Title?>" >
			</div>
			<br><br>
			<div>
				<label for="PubYear">Year Published: </label>
				<input type="text" name="PubYear" 
				style="width:70%" required
				value="<?=$PubYear?>" >
			</div>
			<br><br>
			<div>
				<label for="NumPages">Number of pages: </label>
				<input type="text" name="NumPages" required
				value="<?=$Numpages?>" >
			</div>
			<br><br>
			<div>
				<label for="PubName">Publisher Name: </label>
				<input type="text" name="PubName" required
				value="<?=$PubName?>" >
			</div>
			<br><br>
			<input type="hidden" name="OldISBN" value="<?=$ISBN?>" >
			<input type="submit" value="Update">
		</form>
	</body>

</html>