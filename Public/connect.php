<?php
try
  {
	  $bdd = new PDO('mysql:host=localhost;dbname=backoffice', 'root', '');
  }
  catch (Exception $e)
  {
	  die('Erreur : '.$e->getMessage());
  }
  
?>