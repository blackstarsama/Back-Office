<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice Add Posts</title>
  </head>
<body>
<?php
if(isset($_GET['id']))
{
	$id  = $_GET["id"] ;
	//On verifie que le post existe
	$dn = mysql_query('select * from posts where id="'.$id.'"');
	if(mysql_num_rows($dn)>0)
	{
		$dnn = mysql_fetch_array($dn);
		//On affiche les donnees du post
?>
<form name="form1" method="post" action="editpost2.php">
  <table width="40%" border="0" align="center">
  <tr>
    <td width="37%"><a href="postsbackoffice.php">Retour</a></td>
    <td width="32%"></td>
    
  </tr>
    <tr>
      <td colspan="2" align="center"><h1>Editer des posts</h1></td>
    </tr>
    
    <tr>
      <td width="24%">&nbsp;</td>
      <td width="76%">&nbsp;</td>
    </tr>
    <tr>
      <td>Titre</td>
      <td><label for="textfield3"></label>
      <input name = "idpost" type = "hidden" id="idpost" value="<?php echo htmlentities($dnn['id']); ?>" />
      <input type="text" name="title" id="textfield3" value="<?php echo htmlentities($dnn['title']); ?>"></td>
    </tr>
    <tr>
      <td>Contenu</td>
      <td><label for="textarea"></label>
      <textarea name="content" id="textarea" cols="45" rows="5" ><?php echo htmlentities($dnn['content']); ?></textarea></td>
    </tr>
    <tr>
      <td>Auteur</td>
      <td><label for="textfield4"></label>
      <input type="text" name="auteur" id="textfield4" value="<?php echo htmlentities($dnn['author']); ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Modifier"></td>
    </tr>
  </table>
</form>
<?php
	}
	else
	{
		echo 'Ce post n\'existe pas.';
	}
}
else
{
	echo 'L\'identifiant de ce post n\'est pas d&eacute;fini.';
}
?>
</body>
</html>