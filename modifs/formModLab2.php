<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>


<?php //file inclusion to make request
include "connect.php";
?>

<!-- begin of page code -->
 <h1> Modifier les données d'un laboratoire</h1>

<FORM METHOD='POST' ACTION="modLab.php">

	<h2>  Modification des données du laboratoire  </h2> 
		
		<?php
			$vConn = fConnect();//connection to database
		 
			$vLabo = $_POST["labo"];//gets labo selected at last step
			echo "Labo: $vLabo";
			$vSql1 = "SELECT * FROM Laboratoire AS l 
				WHERE l.pk_idlab = $vLabo"; // get labo full data
			$vQuery1 = pg_query($vConn, $vSql1);
			$Result = pg_fetch_array($vQuery1);
			
			echo "$Result[pk_idlab] $Result[nom]"; // display it for user
		?>
		<!--transmit labo to modify 's id to next page -->
		<INPUT TYPE = "hidden" NAME ="labo" 
			VALUE = "<?php echo $Result[pk_idlab]?>">
	
<h2>  Données à modifier  </h2>
<table border="1">
<tr><!-- Name parameter-->
	<td> Nom </td>
	<td>
		<INPUT TYPE = "text" Name = "nom" >
</tr>
<tr><!-- Sigle parameter-->
	<td> Sigle </td>
	<td>
		<INPUT TYPE = "text" Name = "sigle" >
</tr>
<tr><!-- Name parameter-->
	<td> Logo </td>
	<td>
		<INPUT TYPE = "text" Name = "logo" > 
	</td>
</tr>
<tr>
	<td> Directeur </td>
	<td>
		<select name ="dirkey">
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
	<td> Site </td>
	<td>
		<select name="site">
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql3 ="SELECT * FROM Site ORDER BY pk_nom "; // get project
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
</HTML>
