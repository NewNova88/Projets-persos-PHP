# Mes mini-projets persos en PHP
Quelques projets en PHP que j'ai fait.

# Qu'est-ce que c'est que tout ça ?
Ce sont des petits projets persos que j'ai fait quand j'ai appris en solo le PHP. Bien que je n'aime pas le PHP, je suis très fier de ces petits projets.

# Il y a quoi comme projets ?
Il y a 3 projets :
 - Un petit blog
 - Un système de messagerie
 - Un système d'inscription, connexion, déconnexion

# PHP ? C'est quoi ?
C'est un langage de programmation qui sert pour la partie serveur des pages web. La plupart du temps quand vous vous inscrivez sur un site, pour vous enregistrer, c'est fait avec PHP. C'est aussi avec PHP que vous restez connecté sur un site web, tant que vous n'avez pas supprimé les cookies ou fermé le navigateur.

# Du coup, je fais comment pour faire tourner ces projets sur mon PC ?
Il vous faut un serveur local, comme Apache, ainsi que PhpMyAdmin pour les bases de données. Ensuite installer les fichiers dans un dossier qui devrait s'appeler www, ou www/html. Il vous faudra créer des bases de données et des tables suivants les fichiers source. C'est assez simple. Changez cependant les identifiants dans les requêtes avec PDO. Exemple :
Changez cette ligne :
$bdd=new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'pierre', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
En : 
$bdd=new PDO('mysql:host=localhost;dbname=VOTRE_BASE;charset=utf8', 'IDENTIFIANT', 'MOT DE PASSE', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
Changez (IDENTIFIANTS et MOT DE PASSE par ceux que vous utilisez pour vous connecter sur PhpMyAdmin.

# Ok c'est bon mais.... C'est pas super beau...
En effet. Ces projets sont issus de mon apprentissage du PHP, une fois que je le maîtrisais un peu. Mon objectif était que ce soit fonctionnel, pas forcément beau. Mais libre à vous de les modifier pour que ce soit joli si vous le souhaitez !

# Bon code !
