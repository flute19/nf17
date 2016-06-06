<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>


<?php //file inclusion to make request
include "connect.php";
?>

<!-- begin of page code -->
 <h1> Modification d'un serveur </h1>


<FORM METHOD='POST' ACTION="updateServer.php">


<p>
<tr>
	<td> Nom du serveur à modifier </td>
	<td>
		<select name="serverKey">  <!-- Sélection du serveur à modifier -->
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql1 ="SELECT * FROM Serveur ORDER BY pfk_nom "; // get server
			$vQuery1=pg_query($vConn, $vSql1);
			
			while ($vResult1 = pg_fetch_array($vQuery1)){//print server dynamicaly
		?>
		<option value="<?php echo $vResult1[pfk_nom]?>"> <?php echo $vResult1[pfk_nom] ?> </option>
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
	
		New OS : <input type="text" name="os" />
		New Capacite : <input type="text" name="capacite" />
</p> 


<INPUT VALUE="MODIFIER" TYPE="SUBMIT">

</FORM>

 
<a href="accueil.html">Add site</a>


</BODY>
</HTML>
