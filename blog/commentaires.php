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
		<title>Commentaires du TP3</title>
	</head>
	<body>
		<h1>Mon super blog !</h1>
		<?php
		$reponse=$bdd->prepare('SELECT id, titre, contenu,
		DATE_FORMAT(date_creation, \'Le %d/%m/%Y à %Hh%imin%ss\') AS date_creation
		FROM billets 
		WHERE id=:billet ');
			if(isset($_GET['billet'])){
				$reponse->execute(array('billet'=>$_GET['billet']));
				
				while($donnees=$reponse->fetch()){
					echo '<div class="news"><h3>'.$donnees['titre'].' '.$donnees['date_creation'].'</h3>';
					echo '<p>'.$donnees['contenu'].'<br /></p></div><br />';
					
				}
				$reponse->closeCursor();
			}
		?>
		<h2>Commentaires</h2>
		<?php
			$reponse=$bdd->prepare('SELECT auteur, commentaire,
			DATE_FORMAT(date_commentaire, \'Le %d/%m/%Y à %Hh%imin%ss\') AS date_commentaire
			FROM commentaires
			WHERE id_billet=:billet ORDER BY date_commentaire DESC');
			if(isset($_GET['billet'])){
				$reponse->execute(array('billet'=>$_GET['billet']));
				
				while($donnees=$reponse->fetch()){
					echo '<p><strong>'.$donnees['auteur'].'</strong> '.$donnees['date_commentaire'].'<br />'.$donnees['commentaire'].'<br /></p>';
				}
				$reponse->closeCursor();
			}
			
					
		?>
	</body>
</html>
