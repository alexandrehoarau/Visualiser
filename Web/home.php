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
		<script type="text/javascript">
	
	//Author : Alexandre HOARAU
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
		
		<form class='form-wrapper cf'>
		        <input type='text' placeholder='Nom de Machine...' required id='search-term'></input>
		        <button type='submit'>Search</button>
		</form> 
		
		<form class='scan_button'>
			<button type='submit' id="scan">Scan</button>
		</form> 
				<div id='info'>
		
		
		<?php
		$_SESSION['mail']=0;
		include('info_table.php');
		?>
						
		</div>
		<div class='footer'>
			Copyright © All Rights Reserved - HOARAU Alexandre & TETIA THOMAS
		</div>
	
	</body>
</html>
