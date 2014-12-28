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

$reponse_client = $bdd -> query ('SELECT nom_client, modele_id FROM clients');

while ($row = $reponse_client -> fetch ())
{

$nom_client = $row['nom_client'];
$modele = $row['modele_id'];

$table_client [$nom_client] = $modele;


$reponse_modele = $bdd -> prepare ('SELECT reference FROM modeles WHERE modele_id = ?');
$reponse_modele -> execute (array($modele));

	while ($row2 = $reponse_modele -> fetch())
	{

	?>
	<p><?php echo 'Le '.$nom_client. ' a commandé la '.$row2 ['reference']. '.';?></p>
	
<?php
	}

}

$reponse_client -> closeCursor ();
$reponse_modele -> closeCursor ();

?>
</body>
</html>