<?php

switch($_POST['addordelete'])

{
	case Add : 
		switch($_POST['choix']){
			
			case site :
			break;
			case Batiment :
			break;
			case Laboratoire :
			header('Location: http://tuxa.sme.utc/~nf17p015/projetv2/formAddLabo.php');
			break;
			case Departement :
			break;
			case Salle :
			break;
			case Domaine :
			break;
			case Plan_Batiment :
			break;
			case Thematique :
			break;
			case Photo_salle :
			break;
			case Employe :
			break;
			case Directeur_Site :
			break;
			case Employe_Site :
			break;
			case Poste_Telephonique :
			break;
			case Machine :
			break;
			case Moyen_Info :
			break;
			case Adresse_Mac :
			break;
			case Serveur :
			break;
			case Projet :
			break;
			case Participants_Aux_Projets :
			header('Location: http://tuxa.sme.utc/~nf17p015/projetv2/formAddToProj.php');
			break;
			case Pc :
			break;
			case Developpement_Projet_Laboratoire :
			break;
			case Developpement_Projet_Departement :
			break;			
			
		}
	break;
	
	case Mod : 
	
		switch($_POST['choix']){
			
			case site :
			break;
			case Batiment :
			break;
			case Laboratoire :
			header('Location: http://tuxa.sme.utc/~nf17p015/projetv2/formModLab1.php');
			break;
			case Departement :
			break;
			case Salle :
			break;
			case Domaine :
			break;
			case Plan_Batiment :
			break;
			case Thematique :
			break;
			case Photo_salle :
			break;
			case Employe :
			header('Location: http://tuxa.sme.utc/~nf17p015/projetv2/formModEmp1.php');
			break;
			case Directeur_Site :
			break;
			case Employe_Site :
			break;
			case Poste_Telephonique :
			break;
			case Machine :
			break;
			case Moyen_Info :
			break;
			case Adresse_Mac :
			break;
			case Serveur :
			break;
			case Projet :
			break;
			case Participants_Aux_Projets : 
			break;
			case Pc :
			break;
			case Developpement_Projet_Laboratoire :
			break;
			case Developpement_Projet_Departement :
			break;			
			
		}
	
	break;
	
	default : 
		echo "Vous n'avez pas fait de choix.";
}
?>
