<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'pierre', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>
<form method="post" action="connexion.php" >
	<p>
		Veuillez vous connecter<br />
		Pseudo <input type="text" name="pseudo" /><br />
		Mot de passe <input type="password" name="password" /><br />
		Connexion automatique <input type="checkbox" name="autoconnect" /><br />
		<input type="submit" value="Se connecter" />
	</p>
</form>
<?php
if(isset($_POST['pseudo']) AND isset($_POST['password'])){
	$pass_hache=sha1($_POST['password']);
	$req=$bdd->prepare('SELECT id FROM inscris WHERE pseudo = :pseudo AND pass = :pass');
	$req->execute(array('pseudo'=>$_POST['pseudo'], 'pass'=>$pass_hache));
	$res=$req->fetch();
	if(!$res){
		echo 'Mauvais identifiant ou mot de passe !';
	}
	else{
		session_start();
		$_SESSION['id'] = $res['id'];
		$_SESSION['pseudo']=$_POST['pseudo'];
		echo 'Vous êtes connectés !';
	}
	if(isset($_POST['autoconnect'])){
		setcookie('pseudo', $_POST['pseudo']);
		setcookie('password', $pass_hache);
	}
}
?>
<br /><br /><a href="index.php">Acceuil</a><br />
<a href="deconnect.php">Se déconnecter</a><br />
