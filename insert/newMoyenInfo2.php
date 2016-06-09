<html>
<head>
<title>Nouveau Moyen Informatique</title>
</head>
<body>
<title>Nouveau Moyen Informatique</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	include "connect.php";
	$vConn = fConnect();
  
  
  
  $vNom=$_POST[nom];
  $vOs=$_POST[os];
	$vMachine = $_POST[machine];
echo "$vMachine";
	
	


	/*Transformer les données en NULL si les valeurs non obligatoire ne sont pas remplies*/
	if ($vMachine == 'vide') $vMachine = 'NULL'; 
	
	

  /* Verifiez que les champs remplies ne sont pas vides */
  if (empty($vOs))
  {
    echo "<p>Veuillez bien remplir le champ Operating System</p>" ;
  }
  else
  {
  
   
      $vSql="INSERT INTO Moyen_Info(pk_nom,os,fk_machine_liee) VALUES ('$vNom','$vOs',$vMachine)";
      $vQuery=pg_query($vConn,$vSql);
      /* Vérifiez que l'insertion a bien marché*/
      if($vQuery){
        echo "<p> Nouveau moyen informatique $vNom validée</p>";
      }
      else
      {
        echo "<p> Validation échoué</p>";
      }
  }

	
 
 
?>
 <hr/>
 <p><a href="newMoyenInfo.php">Retour</a></p>
 </body>
 </html>  
