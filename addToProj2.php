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

$vProjetKey = $_POST["projetkey"]; // get project key
$vEmploye1Key = $_POST["employe1key"]; // get empl key

echo " empl $vEmploye1Key, proj $vProjetKey";

$vConn = fConnect(); //connection to database
	
if ($vConn) {//if connected
	//get proper attributes to be added to db.
	
	//insertion in db
	//check if possible
		$vSql1 = "INSERT INTO Participants_Aux_Projets (pfk_employe, pfk_projet ) VALUES ($vEmploye1Key, $vProjetKey)";
		$vQuery1 = pg_query($vConn, $vSql1);
	
	//user feedback.
	if($vQuery1) 
		echo "Insertion done";
	 else 
		 echo "Error. Insertion failed.";
	 
	 //close connection
	 pg_close($vConn);
		 
} else { //no connection to database made
	echo "Une erreur a eu lieu, la connection a échoué.";
}
//end of insertion treatment to add empl to project
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