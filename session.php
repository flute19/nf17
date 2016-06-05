<?php
$vUser = $_POST['user'];
switch($vUser){
	case admin:
		header('Location: http://tuxa.sme.utc/~nf17p015/projetv2/accueil.html');
		break;
	case lambda:	
		header('Location: http://tuxa.sme.utc/~nf17p015/projetv2/accueil2.html');
		break;

}
echo "$vUser";
?>