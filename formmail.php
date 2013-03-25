<!DOCTYPE html>
<html>
<?php include ('head.php');?>
  </head>

  <body>
<?php include('nav.php');?>

    <div class="container">
      <div class="hero-unit">

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

					}else{
					echo '<a href ="mail.php">';				//Si non, on retourne un message d'erreur qui indique à l'utilisateur qu'il na pas remplis tous les champs
					echo '<div class="pull-center"><h2>Vous n\'avez pas rempli tout les champs!!</h2></div>';
				}
			?>
		</div>
	</div>
</body>

    <?php include('footer.php');?>
    
</html>
