<html>
<head>
	<title>Nouveau projet</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<h1>Nouveau Projet</h1>
	<h2>Consignes</h2>
	<p><b>Remplissez tous les champs demande</b></p>
	

	<form method = "POST" action= "newProject2.php">
	<p>Nom <input = "text" name ="nom"/></p>
	<p>Sigle <input type = "text"  name = "sigle"></p>
	<p>Date Debut (JJ-MM-AAAA)<input type = "text" name = "debut"></p>
	<p>Date Fin (JJ-MM-AAAA) <input type = "text" name = "fin"></p>
	 
	
		<?php
		include "connect.php";
		$vConn = fConnect();
		$vSql = "SELECT * FROM Employe E";
		$vQuery=pg_query($vConn, $vSql);
		echo "<p>Chef de Projet <select name='chef'></p>";
		echo "<option value ='vide' >  </option>";
		while ($vResult = pg_fetch_array($vQuery)) {
		?>
			<option value="<?php echo $vResult[pk_num_badge]?>"> <?php echo $vResult[nom]?> <?php echo $vResult[prenom]?> </option>
		<?php
		}
		
		echo "</select>";
		?>
	
		
	
		<?php
		
		$vSql3 = "SELECT * FROM Laboratoire ";
		$vQuery=pg_query($vConn, $vSql3);
		echo "<p>Laboratoire <select name='laboratoire'></p>";
		echo "<option value= 'vide' >  </option>";
		while ($vResult3 = pg_fetch_array($vQuery)) {
		?>
			<option value="<?php echo $vResult3[pk_idlab]?>"> <?php echo $vResult3[nom]?>  </option>
		<?php
		}
		echo "</select>";
		?>

		<?php
		
		$vSql2 = "SELECT * FROM Departement ";
		$vQuery=pg_query($vConn, $vSql2);
		echo "<p>Departement <select name='departement'></p>";
		echo "<option value ='vide' >  </option>";
		while ($vResult2 = pg_fetch_array($vQuery)) {
		?>
			<option value="<?php echo $vResult2[pk_iddep]?>" > <?php echo $vResult2[nomdep]?>  </option>
		<?php
		}
		echo "</select>";
		
		?>
	
	<p> Desciptif du projet <textarea name='descriptif'> </textarea>
	
	<p><input type = "submit" name = "newprojet" value = "Nouveau Projet"> </p>
	

	</form>
</body>
</html>
