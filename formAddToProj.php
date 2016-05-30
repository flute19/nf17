<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>

<BODY>
 <h1> Ajout d'un acteur à un projet</h1>

 <h2>  Saisie manuelle  </h2>
 
 <FORM METHOD='POST' ACTION="addToProj.php"> 
 <table>
 <tr>
	<td> Projet concerné: </td>
	<td><INPUT NAME="projet"></td>
</tr>
<tr>
	<td> Employé concerné: </td> 
	<td>Nom :<INPUT NAME="employe1name"></td> <!-- ultimately, we want to allowed people to add several people at the same tame-->
	<td>Prénom: <INPUT NAME="employe1firstname"></td>
</tr>
<tr>
	<INPUT VALUE="AJOUTER" TYPE="SUBMIT">
</tr>
</table>

</FORM>



 
 
  <a href="accueil.html">Add site</a>


</BODY>
</HTML>