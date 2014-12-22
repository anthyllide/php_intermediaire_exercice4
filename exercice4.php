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

$reponse_client = $bdd -> query ('SELECT * FROM clients');
$reponse_modele = $bdd -> query ('SELECT modele_id, reference FROM modeles');

if (!$reponse_client)
{
   print_r($bdd->errorInfo());
}

while ($row = $reponse_client -> fetch ())
{
$id = $row ['client_id'];
$nom_client = $row['nom_client'];
$modele = $row['modele_id'];

$table [$id][$nom_client] = $modele;
}

while ($row2 = $reponse_modele -> fetch())
{
$reference = $row2['reference'];
$modele_id = $row2 ['modele_id'];

$table [$id][$nom_client] = $modele_id 
}


print_r ($table2);

$reponse_client -> closeCursor ();
$reponse_modele -> closeCursor ();

?>
</body>
</html>