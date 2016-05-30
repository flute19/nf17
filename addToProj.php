<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--
	Projet NF17 : implémentation d'une base de donnée sujet 2 (gestion du patrimoine).
	Développeurs : Arnaud Magnin, Clement Passot, Thibaut Chiche, Alexia Le Quilliec.
	Semestre : P16
	
	File name : add.php
	Aim : Add data in table specified in "connect.php" file. Check that data are complete. 
	
	last update : 04/05 par Clement
	
-->
	</HEAD>

<BODY>
 <h1> Ajout d'acteurs à un projet </h1>
  
<?php
include "connect.php";
?>

<?php

$vProjet = $_POST["projet"];
$vEmploye1Nom = $_POST["employe1name"];
$vEmploye1Prenom = $_POST["employe1firstname"];


//char autorize for data given by user
$pattern1 = '/[a-zA-Z0-9]+/'; //project name
$pattern2 ='/[a-zA-Z]+/'; //employe's name and surname

$vOk = TRUE; //test if insertion ok.


/*test if data are under correct form via reg exp. 
 if not, refuse insertion. 
 else, ask for connection to d$vQuery1atabase and try inserting data. */
 
 if (!preg_match($pattern1, $vProjet, $matches)) {
	 $vOk = False;
	 echo "$vProjet n'est pas une donnée acceptable.";
	}
if (!preg_match($pattern2, $vEmploye1Nom, $matches)) {
	 $vOk = False;
	 echo "$vEmploye1Nom n'est pas une donnée acceptable.";
	}
if (!preg_match($pattern2, $vEmploye1Prenom, $matches)) {
	 $vOk = False;
	 echo "$vEmploye1Prenom n'est pas une donnée acceptable.";
	}

if($vOk){//field have correct data form
	
	$vConn = fConnect(); //connection to database
	
	if ($vConn) {//if connected
	
		//get proper attributes to be added to db.
		// acces via info provided by user. 
		//1: projet, 2: employe1
		$vSql1 = "SELECT P.pk_key FROM Projet AS P WHERE P.nom='$vProjet'";
		$vQuery1 = pg_query($vConn, $vSql1);
		$vResult1 = pg_fetch_array($vQuery1); // get primary key for projet
		
		if(!$vResult1){
			$vOk=FALSE;//prevent insertion of null in db
			echo "Le projet $vProjet n'existe pas dans la base de donnée. Veuillez l'ajouter. ";
			}
		
		$vSql2 = "SELECT pk_num_badge FROM Employe AS E WHERE E.nom='$vEmploye1Nom' AND E.prenom='$vEmploye1Prenom'";
		$vQuery2 = pg_query($vConn, $vSql2);
		$vResult2 = pg_fetch_array($vQuery2); // get primary key for employe
		
		
		if(!$vResult2){
			$vOk=FALSE; //prevent insertion in db
			echo "L'employé $vEmploye1Nom $vEmploye1Prenom n'existe pas dans la base de donnée. Veuillez l'ajouter. ";
			}
		
		//insertion in db
		if ($vOk){//check if possible
			$vSql3 = "INSERT INTO Participants_Aux_Projets (pfk_employe, pfk_projet ) VALUES ($vResult2[pk_num_badge], $vResult1[pk_key])";
			$vQuery3 = pg_query($vConn, $vSql3);
		}
		
		//user feedback.
		if($vQuery3) 
			echo "Insertion done";
		 else 
			 echo "Error. Insertion failed.";
		 
		 //close connection
		 pg_close($vConn);
		 
	} else { //no connection to database made
		echo "Une erreur a eu lieu, la connection a échoué.";
		}
}else {
	echo " Erreur, données erronées.";
}

?> 

<h2>Visualisation des éléments </h2> 
<table border="1"> 
	<tr>
		<td width="100pt"><b>Acteur</b></td>
		<td width="100pt"><b>Projet</b></td>		
	</tr> 
<?php
$vConn = fConnect();
$vSql11 ="SELECT * FROM Participants_Aux_Projets ORDER BY pfk_projet ";
$vQuery11=pg_query($vConn, $vSql11);
while ($vResult11 = pg_fetch_array($vQuery11)) {
	echo "<tr>";
	echo "<td>$vResult11[pfk_employe]</td>";
	echo "<td>$vResult11[pfk_projet]</td>";
	echo"</tr>";
	}
pg_close($vConn);
?> 

</table>
 <a href="formAddToProj.php">Retour</a>


</BODY>
</HTML>