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
		<link rel="stylesheet" href="style.css" />
		<title>TP3</title>
	</head>
	<body>
		<h1>Mon super blog !</h1>
		Derniers billet du blog : <br />
		<?php
		$reponse=$bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'Le %d/%m/%Y à %Hh%imin%ss\') AS date FROM billets ORDER BY date_creation DESC LIMIT 0, 2');
		while($donnees=$reponse->fetch()){
			echo '<div class="news"><h3>'.strip_tags($donnees['titre']).' '.strip_tags($donnees['date']).'</h3>';
			echo '<p>'.$donnees['contenu'].'<br />';
			?><em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em></div><?php
		}
		$reponse->closeCursor();
		?>
		
	</body>
</html>
