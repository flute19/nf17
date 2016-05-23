<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>
 <h1> Ajout de sites</h1>
  


<?php

$vNom=$_POST["site"];

if(empty($vNom)){
	echo " Error, empy field.";
}else {
	include "connect.php";
$vConn = fConnect();
$vSql ="INSERT INTO Site (pk_nom) VALUES ('$vNom')";
$vQuery=pg_query($vConn, $vSql);

if($vQuery) 
	echo "Insertion done";
 else 
	 echo "Error. Insertion fail";
}

?> 

<h2>Visualisation des éléments </h2> 
  <table border="1"> 
    <tr>
      <td width="100pt"><b>Lieu</b></td> 
    </tr> 

<?php
//include "connect.php";
//$vConn = fConnect();
$vSql ="SELECT * FROM Site ORDER BY pk_nom ";
$vQuery=pg_query($vConn, $vSql);
while ($vResult = pg_fetch_array($vQuery)) {
	echo "<tr>";
	echo "<td>$vResult[pk_nom]</td>";
	echo"</tr>";
	}
?> 
 </table>
  
  <a href="formAddSite.php">Retour</a>


</BODY>
</HTML>