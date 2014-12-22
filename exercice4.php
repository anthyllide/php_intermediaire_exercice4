<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta content="text/html;charset=UTF-8" http-equiv="Content-Type"/>
<title>exercice 4</title> 
<link href="#" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
try {
$bdd = new PDO ('mysql:host=localhost; dbname=projet_modeles', 'root', '');
}
catch (Exception $e)
{
die ('Erreur : '.$e -> getMessage());
}

$reponse = $bdd -> query ('SELECT nom_client, modele_id FROM clients');

if (!$reponse)
{
   print_r($bdd->errorInfo());
}

while ($row = $reponse -> fetch ())
{
echo $row ['nom_client'].'<br/>';
}

$reponse -> closeCursor ();

?>
</body>
</html>