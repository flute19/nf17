<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>


<?php //file inclusion to make request
include "connect.php";
?>

<!-- begin of page code -->
 <h1> Modification d'une adresse Mac </h1>


<FORM METHOD='POST' ACTION="updateMac.php">


<p>
<tr>
	<td> Nom de l'appareil où l'adresse Mac doit changer </td>
	<td>
		<select name="nomAppareil">  <!-- Sélection du serveur à modifier -->
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql1 ="SELECT pfk_nom_appareil FROM adresse_mac ORDER BY pfk_nom_appareil "; // get server
			$vQuery1=pg_query($vConn, $vSql1);
			
			while ($vResult1 = pg_fetch_array($vQuery1)){//print server dynamicaly
		?>
		<option value="<?php echo $vResult1[pfk_nom_appareil]?>"> <?php echo $vResult1[pfk_nom_appareil] ?> </option>
		   <?php
		   }
		   pg_close($vConn);
		   ?>
		</select>
	</td>
</tr>
</p>
<tr>
	<td> Modification des éléments : </td>
</tr> 
<p> 
	
		New adresse Mac (XX:XX:XX:XX:XX:XX) : <input type="text" name="mac" />
		New type (wifi or ethernet) : <input type="text" name="type" />
</p> 


<INPUT VALUE="MODIFIER" TYPE="SUBMIT">

</FORM>

 
<a href="accueil.html">Add site</a>


</BODY>
</HTML>
