<?php
include 'connect.php';
?>
<html>
<head>
  <title>All posts (backoffice)</title>
  <script language="javascript">
      function confirme( identifiant )
      {
        var confirmation = confirm( "Voulez vous vraiment supprimer ce post ?" ) ;
  if( confirmation )
  {
    document.location.href = "deletepost.php?id="+identifiant ;
  }
      }
    </script>
</head>
<body>
<table width="40%" border="0" align="center">
  <tr>
    <td width="37%"><a href="backoffice.php">Retour</a></td>
    <td width="32%"></td>
    
  </tr>
<tr>
    <td align="center" colspan="2"><h1>Tous les posts</h1></td>
  </tr>
</table>
<?php
$req='select * from posts';
$sql=mysql_query($req);
while ($dnn=mysql_fetch_array($sql)) {
?>

<table width="55%" border="0" align="center">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php echo "<h2>".$dnn['title']."</h2>"; ?></td>
    <td width="15%" rowspan="4" align="center" valign="middle"><?php echo "<br><a href='editpost.php?id=".$dnn['id']."'>Edit</a>" ;?></td>
    <td width="16%" rowspan="4" align="center" valign="middle"><?php echo "<br> <a href=\"#\" onClick=\"confirme('".$dnn['id']."')\" >Delete</a>" ;?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" colspan="2" valign="top"><?php echo $dnn['content']; ?></td>
  </tr>
  <tr>
    <td width="34%">Post&eacute; par : <?php echo "<b>".$dnn['author']."</b>"; ?></td>
    <td width="35%">Date : <?php echo $dnn['dateadd']; ?></td>
  </tr>
</table>
<?php
}
?>
</body>
</html>