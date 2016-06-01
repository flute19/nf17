<html>
<head>
	<title>Nouvel Employé</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<h1>Nouvel Employé</h1>
	<h2>Consignes</h2>
	<p><b>Remplissez tous les champs demandé</b></p>
	

	<form method = "POST" action= "newEmploye2.php">
	<p>Nom <input = "text" name ="nom"/></p>
	<p>Prénom <input type = "text"  name = "prenom"></p>
	<p>Email <input type = "text" name = "email"></p>
	<p>Statut <select name="statut"></p>
	<option value = "CDI"> CDI</option>
	<option value = "CDD"> CDD</option>
	<option value = "Stage"> Stage</option>
	</select>
	
	<?php
		include "connect.php";
		$vConn = fConnect();
		$vSql = "SELECT S.pk_nom FROM Salle S";
		$vQuery=pg_query($vConn, $vSql);
		echo "<p>Salle <select name='Salle'></p>";
		while ($vResult = pg_fetch_array($vQuery)) {
			echo "<option value = '$vResult[0]'> $vResult[0] </option>";
		}
		echo "</select>";
	?>
	

	<p><input type = "submit" name = "inscription" value = "Ajouter un employé"> </p>
	

	</form>
</body>
</html>
