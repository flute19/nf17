<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>
 <h1> Modification d'une adresse mac </h1>
  
<?php
include "connect.php";
?>

<?php
$vNom = $_POST["nomAppareil"]; // get server key
$vMac = $_POST["mac"]; // get new mac adress
$vType = $_POST["type"]; //get new type


$pattern = '/^[0-9A-Z]{2}(:[0-9A-Z]{2}){5}$/';

$vConn = fConnect(); //connection to database

$vOk = TRUE;

if (empty($_POST['nomAppareil']) || empty($_POST['mac']) || empty($_POST['type']) )
  {
    echo "<p>Veuillez remplir tous les champs</p>" ;
    $vOk = False;
  }
else {
	if (!preg_match('/^wifi$|(^ethernet$)/', $vType, $matches)) {
	 $vOk = False;
	 echo "$vType n'est pas une donnée acceptable pour le champ Type.";
	}
	if ( !preg_match($pattern, $vMac, $matches) ) {
		$vOk = False;
		echo "$vMac n'est pas une donnée acceptable pour le champ Adresse Mac.";
	}
}
if($vOk){
	
	if ($vConn) {//if connected
		//get proper attributes to be added to db.
	
		//UPDATE in db
		//check if possible
	// chef_de_projet = $vChefProj, departement = $vDepartement

			$vSql1 = "UPDATE adresse_mac SET pk_adresse = '$vMac', type='$vType' WHERE pfk_nom_appareil='$vNom'";


			$vQuery1 = pg_query($vConn, $vSql1);
	
		//user feedback.
		if($vQuery1) 
			echo "Update done";
	
		 else 
			 echo "Error. Update failed.";
		 
		 //close connection
		 pg_close($vConn);
			 
	} else { //no connection to database made
		echo "Une erreur a eu lieu, la connection a échoué.";
	}
}

?> 

<h2>Visualisation des éléments </h2> 
<table border="1"> 
	<tr>
		<td width="100pt"><b>Pk_adresse</b></td>
		<td width="100pt"><b>Pfk_nom_appareil</b></td>	
		<td width="100pt"><b>Type</b></td>
		
	</tr> 
<?php
$vConn = fConnect();
$vSql11 ="SELECT * FROM adresse_mac ORDER BY pfk_nom_appareil";
$vQuery11=pg_query($vConn, $vSql11);
while ($vResult11 = pg_fetch_array($vQuery11)) {
	echo "<tr>";
	echo "<td>$vResult11[pk_adresse]</td>";
	echo "<td>$vResult11[pfk_nom_appareil]</td>";
	echo "<td>$vResult11[type]</td>";
	echo"</tr>";
	}
pg_close($vConn);
?> 

</table>
 <a href="formUpdateMac.php">Retour</a>


</BODY>
</HTML>
