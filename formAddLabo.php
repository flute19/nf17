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

 <h2>  Saisie manuelle  </h2>
 
<FORM METHOD='POST' ACTION="addLabo.php">

	<h2>Sélection des éléments </h2> 

<table>
<tr><!-- Site parameter-->
	<td> Site </td>
	<td>
		<select name="sitenom">
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql1 ="SELECT * FROM Site ORDER BY pk_nom "; // get site on witch to add labo
			$vQuery1=pg_query($vConn, $vSql1);
			
			while ($vResult1 = pg_fetch_array($vQuery1)){//print project dynamicaly
		?>
		<option value="<?php echo $vResult1[pk_nom]?>"> <?php echo $vResult1[pk_nom] ?> </option>
		   <?php
		   }
		   pg_close($vConn);
		   ?>
		</select>
	</td>
</tr>
<tr>
	<td> Directeur </td>
	<td>
		<select name="dirkey">
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
<tr>
	<td> Nom </td>
	<td><INPUT type = "text"  name = "nom" ></td>
</tr>
<tr>
	<td> Sigle </td>
	<td><INPUT type = "text"  name = "sigle" ></td>
</tr>
<tr>
	<td> Logo (URL) </td>
	<td><INPUT type = "text"  name = "logo" ></td>
</tr>
</table>

<INPUT VALUE="AJOUTER" TYPE="SUBMIT">

</FORM>


 
 
  <a href="accueil.html">Add site</a>


</BODY>
</HTML>