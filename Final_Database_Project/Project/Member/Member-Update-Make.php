<?php	
	$con = mysqli_connect("localhost:3306","root","","Basic");
	if (mysqli_connect_errno())
	{
		die('Could not connect');
	}
	
	$OldmemberID 			=		$_GET['OldmemberID'];

	$Mfirst					=		$_GET['Mfirst'];
	$Mlast					=		$_GET['Mlast'];
	$MBirthDate				=		$_GET['MBirthDate'];
	$Street					=		$_GET['Street'];
	$StreetNumber			=		$_GET['StreetNumber'];
	$PostalCode				=		$_GET['PostalCode'];

	if (
		$OldmemberID				===	'' 
		or $Mfirst					===	'' 
		or $Mlast					===	'' 
		or $MBirthDate				===	'' 
		or $Street					===	'' 
		or $StreetNumber			===	'' 
		or $PostalCode				===	'' )
		{
			header('Location:Member-Update.html');
			exit;
		}
	
	$myquery = "UPDATE member
		SET 
			memberID			=	'$OldmemberID',
			Mfirst 				= 	'$Mfirst', 
			Mlast 				= 	'$Mlast',
			MBirthDate 			= 	'$MBirthDate',
			Street 				=	'$Street', 
			StreetNumber		= 	'$StreetNumber',
			PostalCode			= 	'$PostalCode'
		WHERE
			memberID = '$OldmemberID'
		";
	$result = mysqli_query($con, $myquery);
		
	if($result === FALSE) {
		die(mysqli_error($con)); 
	}
	mysqli_close($con);
?>	

<html style="background-image:url(../Images/background.jpg);">

	<head>
		<title> DB 2018-19	 </title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="../CSS/stylesheet_general.css"/>
		<link rel="icon" href="../Images/favicon.png"/>
		
	</head>
	
	<body>
		<meta http-equiv="refresh" content="2; ../After-Update.html" />
		<h1 			
			style="font-size:70px;text-align:center;color:white;
			font-family:myfont">Redirecting you in 3 seconds...		
		</h1>
	</body>
</html>