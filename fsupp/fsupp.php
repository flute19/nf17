<?php
		switch($_POST['choix']){		
			case 'Employe' :
			?>
			Entrez l'ID de l'employé à supprimer, si vous ne le connaissez pas, trouvez le via la fonction recherche <br>
			<form action="fsemploye.php" method="post">
			<p>
				<input type="text" name="id" />
				<input type="submit" value="Valider" />
			</p>
			
			</form>
			<?php
			break;
			case 'Poste_Telephonique' :
			?>
			Entrez le numéro interne du poste téléphonique à supprimer <br>
			<form action="fstel.php" method="post">
			<p>
				<input type="text" name="id" />
				<input type="submit" value="Valider" />
			</p>
			
			</form>
			<?php
			break;
			case 'Machine' :
			?>
			Entrez le numéro de contrat de la machine à supprimer <br>
			<form action="fsmachine.php" method="post">
			<p>
				<input type="text" name="id" />
				<input type="submit" value="Valider" />
			</p>
			
			</form>
			<?php
			break;
			case 'Projet' :
			?>
			Entrez l'ID du projet à supprimer, si vous ne le connaissez pas, trouvez le via la fonction recherche <br>
			<form action="fsprojet.php" method="post">
			<p>
				<input type="text" name="id" />
				<input type="submit" value="Valider" />
			</p>
			
			</form>
			<?php
			break;
			
		}
?>