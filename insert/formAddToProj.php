<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>


<?php //file inclusion to make request
include "connect.php";
?>

<!-- begin of page code -->
 <h1> Ajout d'un acteur à un projet</h1>

 <!--<h2>  Saisie manuelle  </h2>
 
 <FORM METHOD='POST' ACTION="addToProj.php"> 
 <table>
 <tr>
	<td> Projet concerné: </td>
	<td><INPUT NAME="projet"></td>
</tr>
<tr>
	<td> Employé concerné: </td> 
	<td>Nom :<INPUT NAME="employe1name"></td> <!-- ultimately, we want to allowed people to add several people at the same tame-->
<!--	<td>Prénom: <INPUT NAME="employe1firstname"></td>
</tr>
<tr>
	<INPUT VALUE="AJOUTER" TYPE="SUBMIT">
</tr>
</table>

</FORM>-->

<FORM METHOD='POST' ACTION="addToProj2.php">

	<h2>Sélection des éléments </h2> 

<table>
<tr>
	<td> Nom du projet </td>
	<td>
		<select name="projetkey">
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql1 ="SELECT * FROM Projet ORDER BY nom "; // get project
			$vQuery1=pg_query($vConn, $vSql1);
			
			while ($vResult1 = pg_fetch_array($vQuery1)){//print project dynamicaly
		?>
		<option value="<?php echo $vResult1[pk_key]?>"> <?php echo $vResult1[nom] ?> </option>
		   <?php
		   }
		   pg_close($vConn);
		   ?>
		</select>
	</td>
</tr>
<tr>
	<td> Employé à ajouter au projet </td>
	<td>
		<select name="employe1key">
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql2 ="SELECT * FROM Employe ORDER BY nom "; // get project
			$vQuery2=pg_query($vConn, $vSql2);
			
			while ($vResult2 = pg_fetch_array($vQuery2)){//print project dynamicaly
		?>
		<option value="<?php echo $vResult2[pk_num_badge]?>"> <?php echo "$vResult2[prenom] $vResult2[nom]" ?> </option>
		   <?php
		   }
		   pg_close($vConn);
		   ?>
		</select>
	</td>
</tr>
</table>

<INPUT VALUE="AJOUTER" TYPE="SUBMIT">

</FORM>


 
 
  <a href="accueil.html">Add site</a>


</BODY>
</HTML>
