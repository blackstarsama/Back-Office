<?php
include 'connect.php';
//récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET["id"] ;
 
  //requête SQL:
  $sql = "DELETE 
            FROM posts
      WHERE id = ".$id ;
  echo $sql ."<br><br>";      
  //exécution de la requête:
  $requete = mysql_query($sql) ;
 
  //affichage des résultats, pour savoir si la suppression a marchée:
  if($requete)
  {
    echo "<h2><font color = green>".'La suppression &agrave; &eacute;t&eacute; correctement effectu&eacute;e'."</font></h2><br><br>" ;
  }
  else
  {
    echo("La suppression &agrave; &eacute;chou&eacute;e.<br><br>") ;
  }
?>
<a href="postsbackoffice.php">Retour</a>