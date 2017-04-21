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
	foreach ($dbh->query('SELECT * FROM clients AS client, cards AS card WHERE card.cardNumber = client.cardNumber AND card.cardTypesId = 1')as $row) {
		echo $row['lastName']." ".$row['firstName']."<br/> ";
	}
	?>
	<h2>exo5</h2>
	<?php
	foreach ($dbh->query('SELECT * from clients WHERE lastName LIKE "M%" ORDER BY lastName ASC ') as $row){
		echo "Nom: ".$row['lastName']."<br/>"."Prénom: ".$row['firstName']."<br/> " ;
	} 
	?>

	<h2>exo6</h2>
	<?php 
	foreach ($dbh->query('SELECT title, performer, date, startTime FROM shows  ORDER BY title ASC ') as $row){
		echo $row['title']." par ".$row['performer']." , le " .$row['date']." à ".$row['startTime']."<br/>" ;
	}
	?>
	<h2>exo7</h2>
	<?php 
	foreach ($dbh->query('SELECT * FROM clients LEFT OUTER JOIN cards ON clients.cardNumber = cards.cardNumber ') as $row){
		echo "Nom : ".$row['lastName']."<br/>"."Prénom : ".$row['firstName']."<br/>"."Date de naissance :".$row['birthDate']."<br/>";
		if($row['card']){
			echo 'Numéro de carte : '.$row['cardNumber']."<br/><br/>";
		}else{
			echo "Pas de carte de fidélité"."<br/><br/>";
		}
	}


	?>
</body>
</html>

