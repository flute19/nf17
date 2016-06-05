<html>
<head>
<title>Inscription Employe</title>
</head>
<body>
<title>Nouvel Employé</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	include "connect.php";
	$vConn = fConnect();
  
  
  
  $vNom=$_POST[nom];
  $vPrenom=$_POST[prenom];
	$vEmail = $_POST[email];
	$vStatut = $_POST[statut];
	$vSalle = $_POST[Salle];
  /* Verifiez que les champs remplies ne sont pas vides */
  if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']))
  {
    echo "<p>Veuillez remplir tous les champs</p>" ;
  }
  else
  {
    /*Vérifiez que le nom et Prénom sont corrects*/
    if(!preg_match("/^([a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{1,75})$/", $vNom))
    {
      echo "<p>Le nom est incorrect !</p>";
    }
    if(!preg_match("/^([a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{1,75})$/", $vPrenom))
    {
      echo "<p>Le prénom est incorrect !</p>";
    }
    /*Vérifiez que l'adresse mail soit correct*/
    if (!filter_var($vEmail, FILTER_VALIDATE_EMAIL))
    {
      echo"<p>format email invalide.</p>";
    }
    /* Si c'est ok, insérez les données*/
    else
    {
       $vSql="INSERT INTO Employe(nom,prenom,email,statut,fk_salle,fk_superieur) VALUES('$vNom','$vPrenom','$vEmail','$vStatut','$vSalle',NULL)";
      $vQuery=pg_query($vConn,$vSql);
      /* Vérifiez que l'insertion a bien marché*/
      if($vQuery){
        echo "<p>$vSalle Inscription de $vPrenom $vNom validée</p>";
      }
      else
      {
        echo "<p> Inscription échoué</p>";
      }
  }}

	
 
 
?>
 <hr/>
 <p><a href="newEmploye.php">Retour</a></p>
 </body>
 </html>  
