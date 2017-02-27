<?php
//page d'affichage des mentions légales
//$titrePage = "Bioforce3 - Mentions légales";

//include "includes/entete.php";
echo '<h1>Mentions Légales</h1>';

/*METHODE 1 */
$doc = file('docs/mentions.txt');//fichier dans un tableau
foreach($doc as $ligne)
{
	//on cherche les : pour séparer la ligne dans un tableau
	$tLigne = explode(':', $ligne);
	if(count($tLigne)== 2)//si deux éléments dans le tableau
	{
		echo '<strong>'.$tLigne[0].': </strong>'.$tLigne[1].'<br/>';
	}
else echo '<em>'.$tLigne[0].'</em>';

//cas des lignes vides pour espacer
if(trim($ligne) == '') echo '<hr class="h30">';
}

/*METHODE 2 (facile)*/
echo '<pre>';
echo file_get_contents('docs/mentions.txt');
echo '</pre>';


include "includes/piedPage.php";

?>