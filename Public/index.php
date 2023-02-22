<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice Posts</title>
  </head>
  <body>
      <table width="40%" border="0" align="center">
        <tr>
          <td width="37%"><a href="login.php">Acc&egrave;s backoffice</a></td>
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

      <table width="50%" border="0" align="center">
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><?php echo "<h2>".$dnn['title']."</h2>"; ?></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" colspan="3" valign="top"><?php echo $dnn['content']; ?></td>
        </tr>
        <tr>
          <td width="37%">&nbsp;</td>
          <td width="32%">Post&eacute; par : <?php echo "<b>".$dnn['author']."</b>"; ?></td>
          <td width="31%">Date : <?php echo $dnn['dateadd']; ?></td>
        </tr>
      </table>
      <?php
      }
      ?>
  </body>
</html>





