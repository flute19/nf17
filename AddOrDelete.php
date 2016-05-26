
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
			break;
			case Pc :
			break;
			case Developpement_Projet_Laboratoire :
			break;
			case Developpement_Projet_Departement :
			break;			
			
		}
	break;
	
	case Del : 
	
		switch($_POST['choix']){
			
			case site :
			break;
			case Batiment :
			break;
			case Laboratoire :
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
		echo "Aucun choix effectué.";
}