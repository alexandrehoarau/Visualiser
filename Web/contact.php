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
	</head>
	
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
			</div>	<!--div cssmenu-->
	
		</div><!--div header-->
	
		<form action ="formmail.php" method="POST">
			<table>
				<tr>
					<td><label="nom">Nom</label></td>
					<td><input type="text" name="nom"/></td>
				</tr>
				<tr>
					<td><label="prenom">Prénom</label></td>
					<td><input type="text" name="prenom"/></td>
				</tr>
				<tr>
					<td><label="nom">E-mail</label></td>
					<td><input type="text" name="mail"/></td>
				</tr>
				<tr>
					<td><label="nom">Message</label></td>
					<td><textarea COLS="70" ROWS="5" name="message"></textarea></td>
				</tr>
			</table>
			<input type="submit" name="send" value="Envoyer"/>
		</form>
	
		</div><!--div test-->
		
		<div class='footer'>
			Copyright © All Rights Reserved - HOARAU Alexandre & TETIA THOMAS
		</div>
	
	</body>
</html>
