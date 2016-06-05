<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>


<?php //file inclusion to make request
include "connect.php";
include "data.php" //contain statut allowed for employe
?>

<!-- begin of page code -->
 <h1> Modifier les données d'un employé</h1>

<FORM METHOD='POST' ACTION="modEmp.php">

	<h2>  Modification des données de l'employé  </h2> 
		
		<?php
			$vConn = fConnect();//connection to database
		 
			$vEmploye = $_POST["employe"];//gets empl selected at last step
			$vSql1 = "SELECT * FROM Employe AS e 
				WHERE e.pk_num_badge = $vEmploye"; // get empl full data
			$vQuery1 = pg_query($vConn, $vSql1);
			$Result = pg_fetch_array($vQuery1);
			
			echo "$Result[prenom] $Result[nom]"; // display it for user
		?>
		<!--transmit empl to modify 's id to next page -->
		<INPUT TYPE = "hidden" NAME ="employe" 
			VALUE = "<?php echo $Result[pk_num_badge]?>">
	
<h2>  Données à modifier  </h2>
<table border="1">
<tr><!-- Name parameter-->
	<td> Nom </td>
	<td>
		<INPUT TYPE = "text" Name = "nom" >
</tr>
<tr><!-- First Name parameter-->
	<td> Prénom </td>
	<td>
		<INPUT TYPE = "text" Name = "prenom" >
</tr>
<tr><!-- Name parameter-->
	<td> Email </td>
	<td>
		<INPUT TYPE = "text" Name = "email1" > 
		@ 
		<INPUT TYPE = "text" Name = "email2" > 
</tr>
<tr>
	<td> Supérieur </td>
	<td>
		<select name="supkey">
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
	<td> Statut </td>
	<td>
		<select name="statut">
		<?php
			for ($i = 0; $i < count($vStatut) ; $i++){
		?>
		<option value="<?php echo $vStatut[$i]?>"> <?php echo "$vStatut[$i]" ?> </option>
		<?php
			}
		?>
		</select>
	</td>
</tr>
<tr>
	<td> Salle de travail </td>
	<td>
		<select name="salle">
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql3 ="SELECT * FROM Salle ORDER BY pk_nom "; // get project
			$vQuery3=pg_query($vConn, $vSql3);
			
			while ($vResult3 = pg_fetch_array($vQuery3)){//print project dynamicaly
		?>
		<option value="<?php echo $vResult3[pk_nom]?>"> 
			<?php echo "$vResult3[pk_nom]" ?> </option>
		<?php
		   }
		   pg_close($vConn);
		?>
		</select>
	</td>
</tr>

</table>

<INPUT VALUE="ENVOYER" TYPE="SUBMIT">
</FORM>

 
<a href="accueil.html">Gérer les données</a>


</BODY>
</HTML
