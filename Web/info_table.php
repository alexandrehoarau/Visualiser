<div id='info'>

		<table id='user' cellpadding='0' cellspacing='0' class='sortable'>
				<thead>
					<tr id='legende'>
						<th align='center' width=25% class='bd' >Nom</th>
						
							<th align='center'width=10% class='bd'>IP</th>
							<th align='center'width=12% class='bd'>Last Updated</th>
								<th align='center' width=12% class='bd'>Etat</th>
								<th align='center' class='bd'></th>
				</thead>
		        <tbody>



        	<?php
header('Content-Type: text/html; charset=utf-8');
	$link = mysql_connect("localhost","root","root");
	mysql_select_db("Visualiser",$link);
	mysql_query("SET NAMES utf8" );	

	if(isset($_POST['nom'])){
		$nom = $_POST['nom'];
	}

	if(isset($_POST['adresse'])){
	$adresse = $_POST['adresse'];
	}
	if(isset($_POST['addmac'])){
	$addmac = $_POST['addmac'];
	}
	if(isset($_POST['calendrier'])){
	$calendar = $_POST['calendrier'];
	}
	/*if(isset($_POST['time'])){
	$time = $_POST['time'];
	}*/
	if(isset($_POST['espace_utilisable'])){
	$espace_utilisable=$_POST['espace_utilisable'];
	}
	if(isset($_POST['total_espace'])){
	$total=$_POST['total_espace'];
	}

$req="SELECT * FROM machine WHERE addmac='".$addmac."'";
$query = mysql_query($req);
$rs=mysql_fetch_row($query);	


	if($_POST['adresse']!=null && $_POST['nom']!=null && $_POST['addmac']!=null && $rs==null){
	
		$time = time();
		$sql= 'INSERT INTO machine (nom , ip , addmac , calendrier , temps , espace_restant , espace_total) VALUES ("'.$nom.'","'.$adresse.'","'.$addmac.'","'.$calendar.'","'.$time.'","'.$espace_utilisable.'","'.$total.'")';
		$req = mysql_query($sql);

	}
	elseif($rs!=null){

				$time = time();
			   	$sql ="UPDATE machine SET nom='".$nom."',ip='".$adresse."',calendrier='".$calendar."',temps='".$time."',espace_restant='".$espace_utilisable."',espace_total='".$total."' WHERE addmac='".$addmac."'";
			   	$req = mysql_query($sql) or die(mysql_error());

	}
		
	$sql= "SELECT * FROM machine;";
	$req = mysql_query($sql);


			$nblignes = mysql_numrows($req);

			for ($i=0;$i<$nblignes;$i=$i+1){

				$nom = mysql_result($req,$i,"nom");
	 			$ip =  mysql_result($req,$i,"ip");
	 			$addmac = mysql_result($req,$i,"addmac");
	 			$cal = mysql_result($req,$i,"calendrier");
	 			$tmp = mysql_result($req,$i,"temps");
	 			$restant = mysql_result($req,$i,"espace_restant");
	 			$total = mysql_result($req,$i,"espace_total");
	 			$taux=round(($restant/$total)*100);

	 			//$addmac = str_replace(':', '_', $addmac2);
	 			$notif = (time() - $tmp);
	 	
	 			if($notif>=0 && $notif <3){
	 				$etat = "connecté";
	 			}elseif($notif>=3 && $notif<=15){
	 				$etat = "Update";
	 			}elseif($notif>15 &&$notif <45){
	 				$etat = "Attente";
	 			}elseif($notif>=45){
	 				$etat = "Déconnecté";
	 			}
	 			
	 			$fp=fopen("log.txt", "w");

	 			$requete = "nom=".$nom."&adresse=".$ip."&addmac=".$addmac."&cal=".$cal."&restant=".$restant."&total=".$total."&etat=".$etat."";
	 			$requete2 = $requete;
	 			fwrite($fp,$requete2);
	 			fclose($fp);

					echo "<tr id='prod'>
				 				<td align='center'>$nom</td>
				 				<td align='center'>$ip</td>
				 				<td align='center'>$cal</td>
				 				<td align='center'>$etat</td>
				 				<td align='center' class='bd'>";

				if($etat == "connecté"){
					echo "<a href='info.php?adresse=".$ip."'><img src='img/add.png' width=35%></img></a></td>";
					$_SESSION['mail']=0;
					
						?>
						<script type="text/javascript">
						$(function(){
    					toastr.success('Nouvelle Mise à jour','<?php echo $nom ?>');
						});
						</script>

					
				<?php
					
				}elseif($etat == "Update"){
					echo "<a href='info.php?adresse=".$ip."'><img src='img/add.png' width=35%></img></a></td>";
				?>
				<script type="text/javascript">
						$(function(){
    					toastr.info('Connecté, Attente de mise à jour','<?php echo $nom ?>'); // Display a info toast, with no title
						});
						</script>
				<?php
				}elseif($etat == "Attente"){
					echo "<img src='img/pause.png' width=35%></img></td>";
					?>

						<script type="text/javascript">
						$(function(){
    					toastr.warning('Etat Inconnu, Attente de réponse de la Machine','<?php echo $nom ?>'); // Display a info toast, with no title
						});
						</script>
					<?php

				}else{
					echo "<a href='remove.php?".$requete."' id='remove'><img src='img/del.png' width=37%></img></a></td>";	
					
				}
	}

	
			echo "</tbody></table></div>";
			?>