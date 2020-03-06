<?php
session_start();
try{
	$bdd=new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'pierre', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TP4</title>
		<body>
			<a href="inscriptions.php">S'inscrire</a><br />
			<a href="connexion.php">Se connecter</a><br />
			<a href="deconnect.php">Se déconnecter</a><br /><br />
			<?php 
			if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
				echo 'Salut '.$_SESSION['pseudo'].' !<br />Tu es connecté !';
			}?>
		</body>
	</head>
</html>
