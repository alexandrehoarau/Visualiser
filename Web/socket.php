<?php

//Création de la socket pour l'échanges d'informations avec la socket en JAVA
 $adresse = $_GET['adresse'];
 $PORT = 20222; //the port on which we are connecting to the "remote" machine
 $HOST = $adresse; //the ip of the remote machine (in this case it's the same machine)
 $sock = socket_create(AF_INET, SOCK_STREAM, 0) //Creating a TCP socket
         or die("error: could not create socket\n");
 
 $succ = socket_connect($sock, $HOST, $PORT) //Connecting to to server using that socket
         or die("error: could not connect to host\n");
  
 $text = "Requête"; //the text we want to send to the server
 
 socket_write($sock, $text . "\n", strlen($text) + 1) //Writing the text to the socket
         or die("error: failed to write to socket\n");
 
 $reply = socket_read($sock, 10000000, PHP_NORMAL_READ) //Reading the reply from socket
         or die("error: failed to read from socket\n");
 
 //Récupération des informations supplémentaires
 $info = explode("&", $reply);
 $nom = $info[0];
 $adresse = $info[1];
 $addmac = $info[2];
 $calendar = $info[3];
 $time = $info[4];
$espace_utilisable = $info[5];
$total_espace = $info[6];
$os = $info[7];
$os_version = $info[8];
$interface = $info[9];

//echo $interface;
$notif = (time() - $time);
if($notif <30){

	 				$etat = "connecté";
	 				$_SESSION[$addmac][$etat]="connecté";
	 			}
	 			elseif($notif <100){
	 				$etat = "Attente";
	 			}else{
	 				$etat = "Déconnecté";
	 			}

 ?>