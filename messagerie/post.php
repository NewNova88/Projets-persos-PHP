<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'pierre', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>
<?php
$req=$bdd->prepare('INSERT INTO tp2(pseudo, message, date_creation) VALUES(:pseudo, :message, NOW())');
$req->execute(array('pseudo' => strip_tags($_POST['pseudo']), 'message'=>strip_tags($_POST['message'])));
header('Location: index.php');
?>
