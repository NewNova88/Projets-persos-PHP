<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'pierre', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>
<form method="post" action="inscriptions.php" >
	<p>
		Veuillez vous inscrire<br />
		Pseudo <input type="text" name="pseudo" /><br />
		Email <input type="text" name="mail" /><br />
		Mot de passe <input type="password" name="password" /> Il faut au moins 8 caractères<br />
		<input type="submit" value="S'inscrire" />
	</p>
</form>
<?php
if(isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['mail'])){
	if(preg_match('#^.{8,}$#', $_POST['password']) AND preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
		$pass_hache=sha1($_POST['password']);
		$req=$bdd->prepare('INSERT INTO inscris(pseudo, pass, email, date_inscription) VALUES(:pseudo, :password, :mail, CURDATE())');
		$req->execute(array('pseudo' => strip_tags($_POST['pseudo']), 'password'=>$pass_hache, 'mail'=>strip_tags($_POST['mail'])));
		$req->closeCursor();

	}
	else{
		echo 'Votre email ou votre mot de passe ne sont pas bons !';
	}
}
else{
	echo 'Entrez votre pseudo, votre mail et votre mot de passe !';
}

?>
<br /><a href="index.php">Acceuil</a><br />
<a href="connexion.php">Se connecter</a><br />
<a href="deconnect.php">Se déconnecter</a><br />
