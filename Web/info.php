
<html>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<head>

<html>
		<link href="http://fonts.googleapis.com/css?family=Ubuntu:bold" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src=" sorttable.js "></script> 
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script type="text/javascript" src="toastr.js"></script>
<link rel="Stylesheet" href="toastr.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
 
$(document).ready(function(){
 
        $(".slidingDiv1").hide();
        $(".show_hide1").show();
 
    $('.show_hide1').click(function(){
    $(".slidingDiv1").slideToggle();
    });
 
});

</script>

<script type="text/javascript">
 
$(document).ready(function(){
 
        $(".slidingDiv2").hide();
        $(".show_hide2").show();
 
    $('.show_hide2').click(function(){
    $(".slidingDiv2").slideToggle();
    });
 
});
</script>

<script type="text/javascript">
 
$(document).ready(function(){
 
        $(".slidingDiv3").hide();
        $(".show_hide3").show();
 
    $('.show_hide3').click(function(){
    $(".slidingDiv3").slideToggle();
    });
 
});
</script>
		<link href="http://fonts.googleapis.com/css?family=Ubuntu:bold" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src=" sorttable.js "></script> 
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script type="text/javascript" src="toastr.js"></script>
<link rel="Stylesheet" href="toastr.css" />
		<script type="text/javascript">
		$(function() {
	grid = $('#user');

	// handle search fields key up event
	$('#search-term').keyup(function(e) { 
		text = $(this).val(); // grab search term

		if(text.length > 1) {
			grid.find('tr:has(td)').hide(); // hide data rows, leave header row showing

			// iterate through all grid rows
			grid.find('tr').each(function(i) {
				// check to see if search term matches Name column
				if($(this).find('td:first-child').text().toUpperCase().match(text.toUpperCase()))
					$(this).show(); // show matching row
			});
		}
		else 
			grid.find('tr').show(); 

	});
});	
		</script>
<script>
    $(function() {
      $("#refresh").click(function(evt) {
         $("#randomdiv").load("index.php")
         evt.preventDefault();
      })
    })
</script>
	</head>

	<body>
<script>
$(function() {
  $("#scan").click(function() {
     $("#info").load("info_table.php");
     
  })
})
</script>
<script>
$(function() {
  $("#remove").click(function() {
     $("#info").load("info_table.php");
     
  })
})
</script>

    <div id="content">
    	<?
include('socket.php');
?>
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
		<div id='info'>
        <button type='submit' class='show_hide1'>Système</button>

      	<div class="slidingDiv1">	
      		
	      	<table id='user_infos' cellpadding='0' cellspacing='0'>
			   <thead> <!-- En-tête du tableau -->
			       <tr id='legende'>
			           <th class='bd_infos'>Nom</th>
			           <th class='bd_infos'>OS</th>
			           <th class='bd_infos'>Espace total</th>
			           <th class='bd_infos'>Espace libre</th>
			       </tr>
			   </thead>
			 
			   <tbody> <!-- Corps du tableau -->
			       <tr id='prod'>
			           <td width="20%"><?php echo $nom?></td>
			           <td width="20%"><?php echo $os?></td>
			           <td width="20%"><?php echo $total_espace ?>Go</td>
			           <td width="20%"><?php echo $espace_utilisable ?> Go</td>
			       </tr>
			   </tbody>
			</table>
		</div>
		
		<br/>
		 <button type='submit' class='show_hide2'>Réseau</button>

		<div class="slidingDiv2">
	      	<table id='user_infos' cellpadding='0' cellspacing='0'>
			   <thead> <!-- En-tête du tableau -->
			       <tr id='legende_infos'>
			           <th class='bd_infos'>Adresse MAC</th>
			           <th class='bd_infos'>Adresse IP</th>
			           <th class='bd_infos'>Interfaces Réseaux</th>
			       </tr>
			   </thead>
			 
			   <tbody> <!-- Corps du tableau -->
			       <tr id='prod'>
			           <td width="30%"><?php echo $addmac ?></td>
			           <td width="30%"><?php echo $adresse?></td>
			           <td width="30%"><?php echo $interface ?></td>
			       </tr>
			   </tbody>
			</table>
		</div>

		<br/>
		 <button type='submit' class='show_hide3'>Supervision</button>

      	<div class="slidingDiv3">
	      	<table id='user_infos' cellpadding='0' cellspacing='0'>
			   <thead> <!-- En-tête du tableau -->
			       <tr tr id='legende' >
			           <th width="50%" class='bd_infos'>Dernière Mise à jour</th>

			           <th width="50%" class='bd_infos'>Etat</th>
			       </tr>
			   </thead>
			 
			   <tbody> <!-- Corps du tableau -->
			       <tr id='prod'>
			           <td><?php echo $calendar ?></td>
	
			           <td><?php echo $etat ?></td>
			       </tr>
			   </tbody>
			</table>
		</div>
		<br/>
			</div>
		<form>
		<!--Mettre à disposition un enregistrement de la page au format PDF, pour sauvegarde et/ou impression-->
	<!--	<input type="button" a class="btn btn-primary btn-large" value="Imprimer" onClick="window.print()">
	-->
		</form>
	

		
		
		</div>
	<div class='footer'>
			Copyright © All Rights Reserved - HOARAU Alexandre & TETIA THOMAS
	</div>

</body>
</html>