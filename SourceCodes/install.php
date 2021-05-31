<?php
$db_name = "Random_Fishermen";

$link_temp = mysqli_connect("127.0.0.1", "root", "");

$database = "CREATE DATABASE IF NOT EXISTS Random_Fishermen";

$table = mysqli_query($link_temp,$database);

mysqli_close($link_temp);

$link = mysqli_connect("127.0.0.1", "root", "", $db_name);
mysqli_set_charset($link, "utf8");

$tables = "CREATE TABLE IF NOT EXISTS UTILISATEURS (
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Prenom VARCHAR(220),
	Nom VARCHAR(220),
	Date date,
	Mail VARCHAR(220),
	Pseudo VARCHAR(220),
	Password VARCHAR(220)
);

CREATE TABLE IF NOT EXISTS AMIS (
	ID_USER INT,
	ID_AMI INT
);

CREATE TABLE IF NOT EXISTS TRANSACTIONS(
	ID_TRANSACTION INT PRIMARY KEY AUTO_INCREMENT,
	etat BOOL,
	date_ouverture date,
	date_fermeture date,
	montant INT,
	id_paye INT,
	id_recoit INT,
	commentaire text,
	fermeture text
);
";


$fill_tables = "INSERT INTO `UTILISATEURS` (`ID`, `Prenom`, `Nom`, `Date`, `Mail`, `Pseudo`,`Password`) 
	VALUES ('1', 'Tes', 'Teur', '2020-04-01', 'tester@gmail.com', 'Tester','mdp'); 

	INSERT INTO `UTILISATEURS` (`ID`, `Prenom`, `Nom`, `Date`, `Mail`, `Pseudo`,`Password`) 
	VALUES ('2', 'André', 'Teur', '2020-04-01', 'andre@gmail.com', 'Dédé','mdp2'); 


	INSERT INTO `AMIS` (`ID_USER`, `ID_AMI`) VALUES ('1','2'); 

	INSERT INTO `AMIS` (`ID_USER`, `ID_AMI`) VALUES ('2','1');


	INSERT INTO `TRANSACTIONS` 
	(`ID_TRANSACTION`, `etat`, `date_ouverture`, `date_fermeture`, `montant`, `id_paye`, `id_recoit`, `commentaire`) 
	VALUES ('1', '1', '2020-04-02', NULL, '1050', '1', '2', 'Tacos');

	INSERT INTO `TRANSACTIONS` 
	(`ID_TRANSACTION`, `etat`, `date_ouverture`, `date_fermeture`, `montant`, `id_paye`, `id_recoit`, `commentaire`) 
	VALUES ('2', '1', '2020-04-03', NULL, '850', '2', '1', 'Kebab');

	INSERT INTO `TRANSACTIONS` 
	(`ID_TRANSACTION`, `etat`, `date_ouverture`, `date_fermeture`, `montant`, `id_paye`, `id_recoit`, `commentaire`) 
	VALUES ('3', '1', '2020-03-02', NULL, '20000', '1', '2', '');

	INSERT INTO `TRANSACTIONS` 
	(`ID_TRANSACTION`, `etat`, `date_ouverture`, `date_fermeture`, `montant`, `id_paye`, `id_recoit`, `commentaire`) 
	VALUES ('4', '2', '2018-03-02', '2019-01-01', '20000', '1', '2', '');
";

$message1 = "Bonjour !";

if($query_tables = mysqli_multi_query($link,$tables)){
	mysqli_close($link);
	$link2 = mysqli_connect("127.0.0.1", "root", "", $db_name);
	mysqli_set_charset($link2, "utf8");

	$demarrer = TRUE;
	$message2 = "Les structures ont bien été crées";

	$query_fill = mysqli_multi_query($link2,$fill_tables);
	if (/*$query_user  && $query_friends &&*/ $query_fill){
		$message3= " et les tables ont été remplies comme prévu.";
		$message4 = "Vous pouvez maintenant lancer l'application Debster.";
	}
	else {
		$message3 = " mais les tables n'ont potentiellement pas été remplies comme prévu.";
		$message4 = "N'hésitez pas à nous contacter en cas de problème.";
	}
}
else{
	$demarrer = FALSE;
	$message2 = "Il y a eu un problème lors de la création des tables.";
	$message3 = "";
	$message4 = "Nous vous conseillons de recommencer l'opération depuis le début";
}

mysqli_close($link2);
?>

<!doctype html>
<html>
<head>
    <!--Basic metas-->
    <meta charset="utf-8">
    <title>Debster</title>
    
    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!--Tests-->

</head>
<body>
	<div class="m-5">
		<div class="jumbotron p-4">
			<h1 class="display-4"><?php echo $message1 ?></h1>
			<p class="lead"><?php echo $message2 ?><?php echo $message3 ?></p>
			<hr class="my-4">
			<p><?php echo $message4 ?></p>
			<?php
			if ($demarrer){
				echo "<a class=\"btn btn-primary btn-lg\" href=\"accueil.php\" role=\"button\">";
			}
			else{
				echo "<a class=\"btn btn-secondary btn-lg\" href=\"#\" role=\"button\">";
			}
			?>
			Démarrer</a>
		</div>
	</div>
</body>