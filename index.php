<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>colyseum</title>
</head>
<body>	
	<h2>exo1</h2>
	<?php 
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=colyseum','root', 'root');
		// $dbh = null;
	}catch(PDOException $e){
		print"Error !:".$e->getMessage()."<br/>";
		die();
	}
	foreach ($dbh->query('SELECT * from clients') as $row){
		echo $row['lastName']." ".$row['firstName']."<br/> " ;
	}
	?>
	<h2>exo2</h2>
	<?php 





	?>
</body>
</html>

