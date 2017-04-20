<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>colyseum</title>
</head>
<body>	
	<?php 
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=colyseum','root', 'root');
		// $dbh = null;
	}catch(PDOException $e){
		print"Error !:".$e->getMessage()."<br/>";
		die();
	}
	?>
	<h2>exo1</h2>
	<?php
	foreach ($dbh->query('SELECT * from clients') as $row){
		echo $row['lastName']." ".$row['firstName']."<br/> " ;
	}
	?>
	<h2>exo2</h2>
	<?php 

	foreach ($dbh->query('SELECT * from showTypes') as $row){
		echo utf8_encode($row['type'])."<br/> " ;
	}
	?>	
	<h2>exo3</h2>
	<?php 
	foreach ($dbh->query('SELECT * from clients LIMIT 20') as $row){
		echo $row['lastName']." ".$row['firstName']."<br/> " ;
	}
	?>
	<h2>exo4</h2>
	<?php 
	echo '<h2>Exo 4 : N\'afficher que les clients possédant une carte de fidélité.</h2>';
	$requestCarteFidelite = 'SELECT * FROM colyseum.clients JOIN colyseum.cards ON colyseum.clients.cardNumber = colyseum.cards.cardNumber WHERE cardTypesId = 1';
	$resultCarteFidelite = $connexion->query($requestCarteFidelite);
	foreach ($resultCarteFidelite  as $row) {
		print $row['id'] . " ";
		print  $row['firstName'] . " ";
		print $row['lastName'] . " ";
		print $row['birthDate'] . " ";
		print $row['card'] . " ";
		print $row['cardNumber'] . " ";

		echo'<br />';
	}
	

	?>
	<h2>exo5</h2>
	<?php
	foreach ($dbh->query('SELECT * from clients') as $row){
		echo $row['lastName']." ".$row['firstName']."<br/> " ;
	}
	?>
</body>
</html>

