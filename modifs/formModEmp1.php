<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>


<?php //file inclusion to make request
include "connect.php";
?>

<!-- begin of page code -->
 <h1> Modifier les données d'un employé</h1>

<FORM METHOD='POST' ACTION="formModEmp2.php">

	<h2>  Sélection de l'employé  </h2> 
		<select name="employe">
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql1 ="SELECT * FROM Employe ORDER BY nom,prenom"; // get site on witch to add labo
			$vQuery1=pg_query($vConn, $vSql1);
			
			while ($vResult1 = pg_fetch_array($vQuery1)){//print project dynamicaly
		?>
		<option value="<?php echo $vResult1[pk_num_badge] ?>"> 
			<?php echo "$vResult1[prenom] $vResult1[nom]"; ?> 
		</option>	
		
		<?php
			}
			pg_close($vConn);
		?>

<INPUT VALUE="AJOUTER" TYPE="SUBMIT">
</FORM>

 
<a href="accueil.html">Add site</a>


</BODY>
</HTML>
