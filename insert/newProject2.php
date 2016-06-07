<html>
<head>
<title>Nouveau Projet</title>
</head>
<body>
<title>Nouveau Projet</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	include "connect.php";
	$vConn = fConnect();
  
  
  
  $vNom=$_POST[nom];
  $vSigle=$_POST[sigle];
	$vDate_deb = $_POST[debut];
	$vDate_fin = $_POST[fin];
	$vChef = $_POST[chef];

	

	$vDepartement = $_POST[departement];
	$vLaboratoire = $_POST[laboratoire];
	$vDescription = $_POST[descriptif];
	/*Transformer les données en NULL si les valeurs non obligatoire ne sont pas remplies*/
	if ($vDepartement == 'vide') $vDepartement = 'NULL'; 
	if ($vLaboratoire == 'vide') $vLaboratoire = 'NULL'; 
	if ($vChef == 'vide') $vChef = 'NULL'; 
	

  /* Verifiez que les champs remplies ne sont pas vides */
  if (empty($_POST['nom']) || empty($_POST['sigle']))
  {
    echo "<p>Veuillez bien remplir les champs Nom et Sigle</p>" ;
  }
  else
  {
    /*Vérifiez que les dates sont ok*/
	
  	if(!preg_match("#^(0?\d|[12]\d|3[01])-(0?\d|1[012])-((?:19|20)\d{2})$#", $vDate_deb))
    {
      echo "<p>La date de début est incorrect!</p>";
    }
	
    if(!preg_match("#^(0?\d|[12]\d|3[01])-(0?\d|1[012])-((?:19|20)\d{2})$#", $vDate_fin))
    {
      echo "<p>La date de fin est incorrect!</p>";
    }
    /*Vérifiez que l'adresse mail soit correct*/
    
    else
    {
       $vSql="INSERT INTO Projet(nom,sigle,start_date,end_date,description,fk_chef_de_projet,fk_departement,fk_laboratoire) VALUES ('$vNom','$vSigle','$vDate_deb','$vDate_fin','$vDescription',$vChef,$vDepartement,$vLaboratoire)";
      $vQuery=pg_query($vConn,$vSql);
      /* Vérifiez que l'insertion a bien marché*/
      if($vQuery){
        echo "<p> Nouveau projet $vNom validée</p>";
      }
      else
      {
        echo "<p> Inscription échoué</p>";
      }
  }}

	
 
 
?>
 <hr/>
 <p><a href="newProject.php">Retour</a></p>
 </body>
 </html>  
