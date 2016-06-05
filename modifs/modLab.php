<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--
	Projet NF17 : implémentation d'une base de donnée sujet 2 (gestion du patrimoine).
	Développeurs : Arnaud Magnin, Clement Passot, Thibaut Chiche, Alexia Le Quilliec.
	Semestre : P16
	
	File name : add.php
	Aim : Add data in table specified in "connect.php" file. Check that data are complete. 
	
	last update : 05/06 par Alexia
	
-->
	</HEAD>

<BODY>
 <h1> Modification des données d'un Laboratoire </h1>
  
<?php
include "connect.php";
?>

<?php
// /!\ data to keep updated: 5 attb ok to mod. Used in assess what to change function.
$vLabo = $_POST["labo"]; //lign to update

//data recuperation from formModLab2 page
$vNom = $_POST["nom"];//given by U
$vSigle = $_POST["sigle"];//given by U
$vLogo = $_POST["logo"];//given by U
$vDir = $_POST["dirkey"];
$vSite = $_POST["site"];


//char autorize for data given by user
$pattern1 = '/[a-zA-Z0-9]*/'; //lab's name & sigle
$pattern2 ='/[a-zA-Z0-9%\\/.]*/';//lab's logo = URL 
$vOk = TRUE; //test if insertion ok.

echo "L: $vLabo; N: $vNom; S: $vSigle; L: $vLogo D: $vDir, S:$vSite";

/*test if data are under correct form via reg exp. 
 if not, refuse insertion. 
 else, ask for connection to d$vQuery1atabase and try inserting data. */
 
 if (!preg_match($pattern1, $vNom, $matches)) {
	 $vOk = False;
	 echo "$vNom n'est pas une donnée acceptable.";
	}
if (!preg_match($pattern1, $vSigle,$matches)) {
	 $vOk = False; //sigle accepts digits
	 echo "$vSigle n'est pas une donnée acceptable.";
	}
if (!preg_match($pattern2, $vLogo, $matches)) {
	 $vOk = False;
	 echo "$vLogo n'est pas une donnée acceptable.";
	}

/************************************************************
* Get where changes are. If no change, reinsert same data   *
* 1: get former data                                        *
* 2: feed variable if necessary                             *
************************************************************/

//1:
$vConn = fconnect();
if($vConn){
	$vSql0 ="SELECT * FROM Laboratoire AS l 
				WHERE l.pk_idlab = $vLabo"; // get labo full data
	$vQuery0=pg_query($vConn, $vSql0);
	$Result0 = pg_fetch_array($vQuery0);//result to request
	
	//2:
	if (empty ($vNom)){$vNom = $Result0[nom];} //name check
	if (empty ($vSigle)){$vSigle = $Result0[sigle];} //sigle check
	if (empty ($vLogo)){$vLogo = $Result0[logo];} //logo = URL check
	if (empty ($vDir)){$vDir = $Result0[fk_directeur];} //sup check
	if (empty ($vSite)){$vSite = $Result0[fk_site];} //room check
	pg_close($vConn);
}else{
	echo "La récupération des données a échoué faute de connexion.";
	$vOk = FALSE;
}


//insertion 

if($vOk){//field have correct data form
	
	$vConn = fConnect(); //connection to database
	
	if ($vConn) {//if connected
	
		//insertion in db
		if ($vOk){//check if data ok
			$vSql1 = "UPDATE Laboratoire 
				SET nom ='$vNom', 
					sigle = '$vSigle', 
					logo = '$vLogo',
					fk_directeur = '$vDir', 
					fk_site = '$vSite'
				WHERE pk_idlab = $vLabo";
			$vQuery1 = pg_query($vConn, $vSql1);
		}
		
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
}else {
	echo " Erreur, données erronées.";
}

?> 

<h2>Visualisation des éléments </h2> 
<table border="1"> 
	<tr>
		<td width="100pt"><b>Identifiant</b></td>
		<td width="100pt"><b>Nom</b></td>		
	</tr> 
<?php
$vConn = fConnect();
$vSql11 ="SELECT * FROM Laboratoire ORDER BY pk_idlab ";
$vQuery11=pg_query($vConn, $vSql11);
while ($vResult11 = pg_fetch_array($vQuery11)) {
	echo "<tr>";
	echo "<td>$vResult11[pk_idlab]</td>";
	echo "<td>$vResult11[nom]</td>";
	echo"</tr>";
	}
?>
</table>
 <a href="formModLab1.php">Retour</a>


</BODY>
</HTML>
