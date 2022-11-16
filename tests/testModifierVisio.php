<?php
//on insère le fichier qui contient les fonctions
require_once ("../include/class.pdogsb.inc.php");

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = PdoGsb::getPdoGsb();

var_dump($lePdo->modifierVisio(1, "Modification visio" , "Modif objectif","Nouveau URL", date('Y-m-d H:i:s'))); //cas où mail existe