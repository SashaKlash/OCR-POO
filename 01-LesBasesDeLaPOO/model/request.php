<?php
// On admet que $db est un objet PDO.

$request = $db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages');

while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
{
    // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
    // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
    echo $donnees['nom'], ' a ', $donnees['forcePerso'], ' de force, ', $donnees['degats'], ' de dégâts, ', $donnees['experience'], ' d\'expérience et est au niveau ', $donnees['niveau'], '<br />';
}

$perso3 = new Personnage($donnees, Personnage::FORCE_PETITE);
