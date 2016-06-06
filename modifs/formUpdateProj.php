<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>


<?php //file inclusion to make request
include "connect.php";
?>

<!-- begin of page code -->
 <h1> Modification d'un projet </h1>


<FORM METHOD='POST' ACTION="updateProj.php">


<p>
<tr>
	<td> Nom du projet à modifier </td>
	<td>
		<select name="projetkey">  <!-- Sélection du projet à modifier -->
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
</p>
<tr>
	<td> Modification des éléments : </td>
</tr> 
<p> 
	
		New Nom : <input type="text" name="nom" />
		New Sigle : <input type="text" name="sigle" />
</p> 
<p> 
		New start_date (JJ-MM-AAAA) : <input type="text" name="start_date" />
		New end_date (JJ-MM-AAAA) : <input type="text" name="end_date" />
</p> 
<p> 		New description : <textarea name="description" rows="8" cols="45"> </textarea> </p> 

<p> 		New chef de projet : <select name="chefProj"> 
		<?php
			$vConn = fConnect();//connection to database
		 
			$vSql2 ="SELECT * FROM Employe WHERE type = 'directeur' OR type = 'chef de projet' ORDER BY nom"; // get project
			$vQuery2=pg_query($vConn, $vSql2);
			
			while ($vResult2 = pg_fetch_array($vQuery2)){//print project dynamicaly
		?>
		<option value="<?php echo $vResult2[pk_num_badge]?>"> <?php echo $vResult2[nom]?>    <?php echo $vResult2[prenom]?> </option>
		   <?php
		   }
		   pg_close($vConn);
		   ?>
		</select>
</p> 
<p>		New Departement : <select name="departement">
					<?php
						$vConn = fConnect();//connection to database
					 
						$vSql3 ="SELECT * FROM Departement d ORDER BY nomdep"; // get chef_de_projet
						$vQuery3=pg_query($vConn, $vSql3);
			
						while ($vResult3 = pg_fetch_array($vQuery3)){//print project dynamicaly
					?>
				<option value="<?php echo $vResult3[pk_iddep]?>"> <?php echo $vResult3[nomdep]?>  </option>
						<?php
					       }
						  pg_close($vConn);
						?>
				</select>
	
</p> 


<INPUT VALUE="MODIFIER" TYPE="SUBMIT">

</FORM>


 
 
  <a href="accueil.html">Add site</a>


</BODY>
</HTML>
