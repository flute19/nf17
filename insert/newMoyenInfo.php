<html>
<head>
	<title>Nouveau Moyen informatique</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<h1>Nouveau Moyen informatique</h1>
	<h2>Consignes</h2>
	<p><b>Remplissez tous les champs demande</b></p>
	

	<form method = "POST" action= "newMoyenInfo2.php">
	<p>Nom <input = "text" name ="nom"/></p>
	<p>Operating System <input type = "text"  name = "os"></p>
	
	 
	
		<?php
		include "connect.php";
		$vConn = fConnect();
		$vSql = "SELECT * FROM Machine ";
		$vQuery=pg_query($vConn, $vSql);
		echo "<p>Machine liée <select name='machine'></p>";
		echo "<option value ='vide' >  </option>";
		while ($vResult = pg_fetch_array($vQuery)) {
		?>
			<option value="<?php echo $vResult[pk_num_contratm]?>"> <?php echo $vResult[modele]?>  </option>
		<?php
		}
		
		echo "</select>";
		?>
	
		
	
		
	
	<p><input type = "submit" name = "newmoyeninfo" value = "Nouveau Moyen informatique"> </p>
	

	</form>
</body>
