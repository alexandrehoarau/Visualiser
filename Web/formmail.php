
<html>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<head>
		<link href="http://fonts.googleapis.com/css?family=Ubuntu:bold" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src=" sorttable.js "></script> 
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script type="text/javascript" src="toastr.js"></script>
<link rel="Stylesheet" href="toastr.css" />
    <div id="test">
	<div id="header">
		<div id='cssmenu'>
			<div id="header-title">
			Visualiser
			</div>
			<ul>
			   <li><a href='home.php'><span>Home</span></a></li>
			    <li><a href='contact.php'><span>Contact</span></a></li>
			 
			</ul>
		</div>


	</div>

  		<?php
			if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['mail'])&&!empty($_POST['message'])){
					$nom = $_POST['nom']; 
					$prenom= $_POST['prenom'];
					$mail = $_POST['mail']; 
					$message = $_POST['message'];

					$to = "t.tetia@rt-iut.re";

					$subject = "Visualiser";

					$header = "From:".$mail;

					ini_set( 'SMTP', 'mx.zeop.re');

					mail($to, $subject, $message,$header);

					echo 'Votre message à été envoyé';
					echo '</br><a href ="home.php">Retour Acceuil</a>';	

					}else{
					echo '<a href ="contact.php">';				//Si non, on retourne un message d'erreur qui indique à l'utilisateur qu'il na pas remplis tous les champs
					echo '<div class="pull-center"><h2>Vous n\'avez pas rempli tout les champs!!</h2></div></a>';
				}
			?>
	
		</div>
	<div class='footer'>
			Copyright © All Rights Reserved - HOARAU Alexandre & TETIA THOMAS
	</div>

</body>
</html>