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
 <h1> Ajout de laboratoires à un site </h1>
  
<?php
include "connect.php";
?>

<?php

$vSiteKey = $_POST["sitenom"]; // get site key
$vNom = $_POST["nom"]; // get labo's name
$vSigle = $_POST["sigle"];
$vLogo = $_POST["logo"];
$vDirecteur = $_POST["dirkey"];

//authorized patterns
$pattern1 ='/[a-zA-Z0-9]+/'; //authorized form for nom, sigle
$pattern2 ='/[a-zA-Z0-9\%\\/]+/'; // authorized form for logo

//variable used to tell if data are under correct form.
$vOk = TRUE; 

if (!preg_match($pattern1, $vNom, $matches)) {//check if nom correct
	 $vOk = False;
	 echo "$vNom n'est pas une donnée acceptable pour le champ Nom.";
	}
if (!preg_match($pattern1, $vSigle, $matches)) {//check if sigle correct
	 $vOk = False;
	 echo "$vSigle n'est pas une donnée acceptable pour le champ Sigle.";
	}
if (!preg_match($pattern2, $vLogo, $matches)) {//check if logo correct
	 $vOk = False;
	 echo "$vLogo n'est pas une donnée acceptable pour le champ Logo.";
	}
	
$vConn = fConnect(); //connection to database
if($vOk){
	if ($vConn) {//if connected
		//get proper attributes to be added to db.
		
		//insertion in db
		
			$vSql1 = "INSERT INTO Laboratoire ( nom, sigle, logo, fk_directeur,fk_site) 
						VALUES 
					('$vNom', '$vSigle', '$vLogo', $vDirecteur, '$vSiteKey')";
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
} else {
	echo "L'insertion de ces données dans la base de données n'est pas possible.";
} 
?> 

<h2>Visualisation des éléments </h2> 
<table border="1"> 
	<tr>
		<td width="100pt"><b>Id</b></td>
		<td width="100pt"><b>Nom</b></td>		
	</tr> 
<?php
$vConn = fConnect();
$vSql11 ="SELECT * FROM Laboratoire ORDER BY pk_idLab ";
$vQuery11=pg_query($vConn, $vSql11);
while ($vResult11 = pg_fetch_array($vQuery11)) {
	echo "<tr>";
	echo "<td>$vResult11[pk_idLab]</td>";
	echo "<td>$vResult11[nom]</td>";
	echo"</tr>";
	}
pg_close($vConn);
?> 

</table>
 <a href="formAddLabo.php">Retour</a>


</BODY>
</HTML>