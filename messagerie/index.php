<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'pierre', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TP2</title>
	</head>
	<body>
		<?php include('includes/form.php'); ?>
		<p>
		<?php 
		$rep=$bdd->query('SELECT * FROM tp2 ORDER BY date_creation DESC LIMIT 0, 10');
		while($donnees=$rep->fetch()){
			echo '<strong>'.$donnees['pseudo'].'</strong> : '.$donnees['message'].'<br />';
		}
		$rep->closeCursor();
		?></p>
	</body>
</html>
