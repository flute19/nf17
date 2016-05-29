<?php

if (isset ($_POST['id'])){
	$_POST['id']= (int) $_POST['id'];
	if ($_POST['id'] > 0 ){
		
		$vConn = fConnect();
		$vSql = 'SELECT COUNT(*) AS total FROM projet WHERE pk_key = \''.$_POST['id']. '\'  ' ;
		$vQuery = pg_query($vConn, $vSql);
		
		/* 
		$bdd = new PDO('mysql:host=localhost;dbname=nf17;charset=utf8', 'root', '');
		$stmt = $bdd->query('SELECT COUNT(*) AS total FROM projet WHERE pk_key = \''.$_POST['id']. '\' ');
		*/
		$total = $vQuery->fetch();
		
		echo $total['total'];
		
		
		if ($total['total']){
			
			$vSql ='DELETE FROM projet WHERE pk_key = \''.$_POST['id']. '\' 	';
			$vQuery = pg_query($vConn, $vSql);
			//$bdd->query ('DELETE FROM projet WHERE pk_key = \''.$_POST['id']. '\' 	');

			echo  'Le projet ' . $_POST['id'] . ' a été supprimé'  ; 
		}
		else
		{
			echo 'Ce projet n\'existe pas';
		}
		
	}
	else
		echo 'Il faut entrer une valeur possible, veuillez réessayer';
	
}
else
	echo 'Aucune valeur indiquée, veuillez réessayer';

?>

