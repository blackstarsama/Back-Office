<?php
//récupération des valeurs des champs:
include 'connect.php';

$recupid = $_POST["idpost"];
$recuptitle = $_POST["title"];
$recupcontent = $_POST["content"];
$recupauthor = $_POST["auteur"];

echo "Nouveau titre:".$recuptitle."</br>";
echo "Nouveau contenu:".$recupcontent."</br>";
echo "Nouveau auteur:".$recupauthor."</br>";

 
  //création de la requête SQL:
  $sql = "UPDATE posts
            SET title = '$recuptitle',
            content = '$recupcontent',
	         author = '$recupauthor'
           WHERE id = '$recupid' " ;
 
  //exécution de la requête SQL:
  $requete = mysql_query($sql) or die( mysql_error() ) ;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo("<b><font color=green size=6>".'La modification &agrave; &eacute;t&eacute; correctement effectu&eacutee'."</font></b>") ;
  }
  else
  {
    echo("<b><font color=red size=6>".'La modification &agrave; &eacute;chou&eacute;e'."</font></b>") ;
  }

?>
   </p>                                
<p><a href="postsbackoffice.php">Retour</a></p>
