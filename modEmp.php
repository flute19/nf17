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
 <h1> Modification des données Employé </h1>
  
<?php
include "connect.php";
?>

<?php
// /!\ data to keep updated: 6 attb ok to mod. Used in assess what to change function.
$vEmploye = $_POST["employe"]; //lign to update

//data recuperation from formModEmp2 page
$vNom = $_POST["nom"];//given by U
$vPrenom = $_POST["prenom"];//given by U
$vMail1 = $_POST["email1"];//given by U
$vMail2 = $_POST["email2"];//given by U
$vSup = $_POST["supkey"];
$vStatut = $_POST["statut"];
$vSalle = $_POST["salle"];
//data transformation
$vMail = $vMail1.'@'.$vMail2;
echo"mail :$vMail";

//char autorize for data given by user
$pattern1 = '/[a-zA-Z0-9]*/'; //employe's email part1
$pattern2 ='/[a-zA-Z]*/';//empl name, first name, email part2 
$vOk = TRUE; //test if insertion ok.

echo "E: $vEmploye; N: $vNom; P: $vPrenom; M: $vMail1.$vMail2; S: $vStatut";

/*test if data are under correct form via reg exp. 
 if not, refuse insertion. 
 else, ask for connection to d$vQuery1atabase and try inserting data. */
 
 if (!preg_match($pattern2, $vNom, $matches)) {
	 $vOk = False;
	 echo "$vNom n'est pas une donnée acceptable.";
	}
if (!preg_match($pattern2, $vPrenom, $matches)) {
	 $vOk = False;
	 echo "$vPrenom n'est pas une donnée acceptable.";
	}
if (!preg_match($pattern2, $vMail2, $matches)) {
	 $vOk = False;
	 echo "$vMail2 n'est pas une donnée acceptable.";
	}
if (!preg_match($pattern1, $vMail1, $matches)) {
	 $vOk = False;
	 echo "$vMail1 n'est pas une donnée acceptable.";
}

//get where changes are. If no change, reinsert same data
//1: get former data
//2: feed variable if necessary

//1:
$vConn = fconnect();
if($vConn){
	$vSql0 ="SELECT * FROM Employe AS e 
				WHERE e.pk_num_badge = $vEmploye"; // get empl full data
	$vQuery0=pg_query($vConn, $vSql0);
	$Result0 = pg_fetch_array($vQuery0);//result to request
	
	//2:
	if (empty ($vNom)){$vNom = $Result0[nom];} //name check
	if (empty ($vPrenom)){$vPrenom = $Result0[prenom];} //first name check
	if (empty ($vMail)){$vMail = $Result0[email];} //email check
	if (empty ($vSup)){$vNom = $Result0[fk_superieur];} //sup check
	if (empty ($vSalle)){$vSalle = $Result0[fk_salle];} //room check
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
			$vSql1 = "UPDATE Employe 
				SET nom ='$vNom', prenom = '$vPrenom', 
					email = '$vEmail',
					fk_superieur = '$vSup', 
					fk_salle = '$vSalle'
				WHERE pk_num_badge = $vEmploye";
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
		<td width="100pt"><b>Nom</b></td>
		<td width="100pt"><b>Prenom</b></td>		
	</tr> 
<?php
$vConn = fConnect();
$vSql11 ="SELECT * FROM Employe ORDER BY pk_num_badge ";
$vQuery11=pg_query($vConn, $vSql11);
while ($vResult11 = pg_fetch_array($vQuery11)) {
	echo "<tr>";
	echo "<td>$vResult11[nom]</td>";
	echo "<td>$vResult11[prenom]</td>";
	echo"</tr>";
	}
?>
</table>
 <a href="formModEmp1.php">Retour</a>


</BODY>
</HTML>