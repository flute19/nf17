<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>


<?php //file inclusion to make request
include "connect.php";
?>

<!-- begin of page code -->
 <h1> Modifier les données d'un laboratoire </h1>

<FORM METHOD='POST' ACTION="formModLab2.php">

	<h2>  Sélection du laboratoire  </h2> 
		<select name="labo">
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql1 ="SELECT * FROM Laboratoire ORDER BY pk_idLab"; // get site on witch to add labo
			$vQuery1=pg_query($vConn, $vSql1);
			
			while ($vResult1 = pg_fetch_array($vQuery1)){//print project dynamicaly
		?>
		<option value="<?php echo $vResult1[pk_idlab] ?>"> 
			<?php echo "$vResult1[pk_idlab] $vResult1[nom]"; ?> 
		</option>	
		
		<?php
			}
			pg_close($vConn);
		?>
		</select>

<INPUT VALUE="AJOUTER" TYPE="SUBMIT">
</FORM>

 
<a href="accueil.html"> Gérer les données </a>


</BODY>
</HTML>