<html>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="refresh" content="0.01; url=home.php">

	<head>
	</head>
	<body>

<?php
//Suppression des Machines déconnectées
	header('Content-Type: text/html; charset=utf-8');
	$link = mysql_connect("localhost","root","root");
	mysql_select_db("Visualiser",$link);
	mysql_query("SET NAMES utf8" );	


	if(isset($_GET['nom'])){
		$nom = $_GET['nom'];
	}
	if(isset($_GET['adresse'])){
	$adresse = $_GET['adresse'];
	}

	if(isset($_GET['addmac'])){
	$addmac = $_GET['addmac'];
	}
	if(isset($_GET['cal'])){
	$cal = $_GET['cal'];
	}
	if(isset($_GET['restant'])){
	$restant = $_GET['restant'];
	}
	if(isset($_GET['total'])){
	$total=$_GET['total'];
	}
	if(isset($_GET['etat'])){
	$total_espace=$_GET['etat'];
	}

	$req ="DELETE FROM machine WHERE addmac='".$addmac."'";
	mysql_query($req);

?>
</body>
</html>