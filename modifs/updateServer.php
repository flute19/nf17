<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>
 <h1> Modification d'un serveur </h1>
  
<?php
include "connect.php";
?>

<?php
$vNom = $_POST["serverKey"]; // get server key
$vOs = $_POST["os"]; // get new os
$vCapacite = $_POST["capacite"]; //get new capacite


$vConn = fConnect(); //connection to database

$vOk = TRUE;

if (empty($_POST['serverKey']) || empty($_POST['os']) || empty($_POST['capacite']) )
  {
    echo "<p>Veuillez remplir tous les champs</p>" ;
    $vOk = False;
  }
else {
	if ( !preg_match('/^[0-9]+$/', $vCapacite, $matches) ) {
		$vOk = False;
		echo "$vCapacite n'est pas une donnée acceptable pour le champ New Capacite.";
	}
}

if($vOk){

	if ($vConn) {//if connected
		//get proper attributes to be added to db.
	
		//UPDATE in db
		//check if possible
	// chef_de_projet = $vChefProj, departement = $vDepartement

			$vSql1 = "UPDATE Serveur SET os = '$vOs', capacite=$vCapacite WHERE pfk_nom='$vNom'";


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
		<td width="100pt"><b>Pfk_nom</b></td>
		<td width="100pt"><b>Os</b></td>	
		<td width="100pt"><b>Capacite</b></td>
		
	</tr> 
<?php
$vConn = fConnect();
$vSql11 ="SELECT * FROM Serveur ORDER BY pfk_nom";
$vQuery11=pg_query($vConn, $vSql11);
while ($vResult11 = pg_fetch_array($vQuery11)) {
	echo "<tr>";
	echo "<td>$vResult11[pfk_nom]</td>";
	echo "<td>$vResult11[os]</td>";
	echo "<td>$vResult11[capacite]</td>";
	echo"</tr>";
	}
pg_close($vConn);
?> 

</table>
 <a href="formUpdateServer.php">Retour</a>


</BODY>
</HTML>
