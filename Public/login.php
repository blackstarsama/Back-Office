<?php
include 'connect.php';
?>
<html>
<head>
	<title>Login to backoffice</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="32%" border="0" align="center">
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="30%">Login</td>
      <td width="70%"><label for="login"></label>
      <input type="text" name="login" id="login" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="mdp"></label>
      <input type="password" name="mdp" id="mdp" /></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="login" id="login" value="Login" /></td>
    </tr>
  </table>
</form>
<p>
  <?php
//Recuperation login/mdp
$login=$_POST['login'];
$mdp=$_POST['mdp'];

$req="select login,mdp from users where login='$login' and mdp='$mdp'";
$sql=mysql_query($req);
$count=mysql_num_rows($sql);

if (isset($_POST['login'])) {
	if ($login=='' or $mdp=='') {
	echo "<h2><font color=red>Tous les champs sont obligatoires!</h2></font>";
	}
	elseif ($count<0) {
	echo "<h2><font color=red>Le login et le mot de passe ne corresponde pas!</h2></font>";	
	}
	else{
		header("location:/sama/backoffice.php");
	}
}
?>
</p>
<p>Login : sama</p>
<p>Mdp : password</p>
</body>
</html>