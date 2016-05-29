<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--
	Projet NF17 : implémentation d'une base de donnée sujet 2 (gestion du patrimoine).
	Développeurs : Arnaud Magnin, Clement Passot, Thibaut Chiche, Alexia Le Quilliec.
	Semestre : P16
	
	File name : add.php
	Aim : Add data in table specified in "connect.php" file. Check that data are complete. 
	
	last update : 29/05 par Alexia
	
-->
	</HEAD>

<BODY>
 <h1> Ajout d'acteurs à un projet </h1>
  
<?php
include "connect.php";
?>

<?php

$vProjet = $_POST["projet"];
$vEmploye1 = $_POST["employé1"];
$pattern ='/[a-zA-Z]+/';

/*test if data are under correct form via reg exp. 
 if not, refuse insertion. 
 else, ask for connection to database and try inserting data. */
 
if(preg_match($pattern, $vProjet, $matches)){
	
	$vConn = fConnect(); //connection to database

	if ($vConn) {//if connected
		$vSql1 = "SELECT pk_num_badge FROM Employe AS E WHERE E.nom='$vEmploye1'";
		$vQuery1 = pg_query($vConn, $vSql1);
		
		//user feedback.
		if($vQuery1) 
			echo "Insertion done";
		 else 
			 echo "Error. Insertion fail";
		 
		 //close connection
		 pg_close($vConn);
		 
	} else { //no connection to database made
		echo "Une erreur a eu lieu, la connection a échoué.";
		}
	}else {
		echo " $v. Erreur, données erronées.";
}
	
	if ($vConn) {//if connected
		$vSql1 = "INSERT INTO Participants_Aux_Projets (pfk_employe, pfk_projet ) VALUES ('$vEmploye1','$vProjet')";
		$vQuery1 = pg_query($vConn, $vSql1);
		
		//user feedback.
		if($vQuery1) 
			echo "Insertion done";
		 else 
			 echo "Error. Insertion fail";
		 
		 //close connection
		 pg_close($vConn);
		 
	} else { //no connection to database made
		echo "Une erreur a eu lieu, la connection a échoué.";
		}
	}else {
		echo " $v. Erreur, données erronées.";
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