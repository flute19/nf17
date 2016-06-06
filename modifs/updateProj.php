<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>
 <h1> Modification d'un projet </h1>
  
<?php
include "connect.php";
?>

<?php
$vProjetKey = $_POST["projetkey"]; // get project key
$vNom = $_POST["nom"]; // get nom 
$vSigle = $_POST["sigle"]; //get Sigle
$vStartDate = $_POST["start_date"]; // get start date
$vEndDate = $_POST["end_date"]; // get end date
$vDescription = $_POST["description"]; //get description
$vChefProj = $_POST["chefProj"]; // get chef proj
$vDepartement = $_POST["departement"]; // get Departement 


//authorized patterns
$pattern1 ='/[a-zA-Z0-9]+/'; //authorized form for nom, sigle, description
$pattern2 = '#^(0?\d|[12]\d|3[01])-(0?\d|1[012])-((?:19|20)\d{2})$#';// authorized form for dates



$vOk = TRUE;

$vConn = fConnect(); //connection to database

/*function validateDate($date, $format = 'd-m-Y') //Validation des dates rentrées
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}*/





if (empty($_POST['nom']) || empty($_POST['sigle']) || empty($_POST['start_date']) || empty($_POST['end_date']) || empty($_POST['chefProj']) || empty($_POST['departement']))
  {
    echo "<p>Veuillez remplir tous les champs</p>" ;
    $vOk = False;
  }

else {
	if (!preg_match($pattern1, $vNom, $matches)) {//check if nom correct
	 $vOk = False;
	 echo "$vNom n'est pas une donnée acceptable pour le champ Nom.";
	}
	if (!preg_match($pattern1, $vSigle, $matches)) {//check if sigle correct
		 $vOk = False;
		 echo "$vSigle n'est pas une donnée acceptable pour le champ Sigle.";
		}
	if ( !preg_match($pattern2, $vStartDate, $matches) ) {
		$vOk = False;
		echo "$vStartDate n'est pas une donnée acceptable pour le champ Date.";
	}
	if ( !preg_match($pattern2, $vEndDate, $matches) ) {
		$vOk = False;
		echo "$vStartDate n'est pas une donnée acceptable pour le champ Date.";
	}

}
if($vOk) {
	if ($vConn) {//if connected
			//get proper attributes to be added to db.
	
			//UPDATE in db
			//check if possible
			// chef_de_projet = $vChefProj, departement = $vDepartement

			$vSql1 = "UPDATE projet SET end_date='$vEndDate', start_date='$vStartDate', description='$vDescription', sigle='$vSigle', nom='$vNom', chef_de_projet='$vChefProj', departement = '$vDepartement' WHERE pk_key=$vProjetKey";


			$vQuery1 = pg_query($vConn, $vSql1);
	
			//user feedback.
			if($vQuery1) 
				echo "Update done";
	
			 else 
				 echo "Error. Update failed.";
		 
			 //close connection
			 pg_close($vConn);
			 
	} 
	else { //no connection to database made
		echo "Une erreur a eu lieu, la connection a échoué.";
	}
}

?> 

<h2>Visualisation des éléments </h2> 
<table border="1"> 
	<tr>
		<td width="100pt"><b>Nom</b></td>
		<td width="100pt"><b>Sigle</b></td>	
		<td width="100pt"><b>Start_Date</b></td>
		<td width="100pt"><b>End_Date</b></td>
		<td width="100pt"><b>Description</b></td>
		<td width="100pt"><b>Chef de projet</b></td>
		<td width="100pt"><b>Departement</b></td>	
	</tr> 
<?php
$vConn = fConnect();
$vSql11 ="SELECT * FROM Projet ORDER BY pk_key";
$vQuery11=pg_query($vConn, $vSql11);
while ($vResult11 = pg_fetch_array($vQuery11)) {
	echo "<tr>";
	echo "<td>$vResult11[nom]</td>";
	echo "<td>$vResult11[sigle]</td>";
	echo "<td>$vResult11[start_date]</td>";
	echo "<td>$vResult11[end_date]</td>";
	echo "<td>$vResult11[description]</td>";
	echo "<td>$vResult11[chef_de_projet]</td>";
	echo "<td>$vResult11[departement]</td>";
	echo"</tr>";
	}
pg_close($vConn);
?> 

</table>
 <a href="formUpdateProj.php">Retour</a>


</BODY>
</HTML>
