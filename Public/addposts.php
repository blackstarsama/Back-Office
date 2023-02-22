<?php
include 'connect.php';
?>
<html>
<head>
	<title>Add posts</title>
</head>
<body>
<form name="form1" method="post" action="">
  <table width="40%" border="0" align="center">
  <tr>
    <td width="37%"><a href="backoffice.php">Retour</a></td>
    <td width="32%"></td>
    
  </tr>
    <tr>
      <td colspan="2" align="center"><h1>Ajouter des posts</h1></td>
    </tr>
    
    <tr>
      <td width="24%">&nbsp;</td>
      <td width="76%">&nbsp;</td>
    </tr>
    <tr>
      <td>Titre</td>
      <td><label for="textfield3"></label>
      <input type="text" name="title" id="textfield3"></td>
    </tr>
    <tr>
      <td>Contenu</td>
      <td><label for="textarea"></label>
      <textarea name="content" id="textarea" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Auteur</td>
      <td><label for="textfield4"></label>
      <input type="text" name="auteur" id="textfield4"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Valider"></td>
    </tr>
  </table>
</form>
<?php
//Recuperation champs
$title=$_POST['title'];
$content=$_POST['content'];
$auteur=$_POST['auteur'];
$dateadd=date("Y-m-d H:i:s");

if (isset($_POST['button'])) {
	if ($title=='' or $content=='' or $auteur=='') {
	echo "<h2><font color=red>Tous les champs sont obligatoires!</h2></font>";
	}
	
	else{
		$req="insert into posts(title,content,author,dateadd) values('$title','$content','$auteur','$dateadd')";
		mysql_query($req) or die('Erreur de requette'.mysql_error());
		echo "<h2><font color=green>Post ajout&eacute; avec succ&egrave;s!</h2></font>";
	}
}
?>
</body>
</html>