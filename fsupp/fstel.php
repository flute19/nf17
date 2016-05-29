<?php

if (isset ($_POST['id'])){
	$_POST['id']= (int) $_POST['id'];
	if ($_POST['id'] > 0 ){
	
		$bdd = new PDO('mysql:host=localhost;dbname=nf17;charset=utf8', 'root', '');
		
		$stmt = $bdd->query('SELECT COUNT(*) AS total FROM poste_telephonique WHERE pk_num_interne  = \''.$_POST['id']. '\' ');
		$total = $stmt->fetch();
		echo $total['total'];
		
		
		if ($total['total']){
			$bdd->query ('DELETE FROM poste_telephonique WHERE pk_num_interne  = \''.$_POST['id']. '\' 	');

			echo  'Le poste téléphonique ' . $_POST['id'] . ' a été supprimé'  ; 
		}
		else
		{
			echo 'Ce numéro n\'existe pas';
		}
		
	}
	else
		echo 'Il faut entrer une valeur possible, veuillez réessayer';
	
}
else
	echo 'Aucune valeur indiquée, veuillez réessayer';

?>