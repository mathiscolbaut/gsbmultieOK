<?php
//on insère le fichier qui contient les fonctions
require_once ("../include/class.pdogsb.inc.php");

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = PdoGsb::getPdoGsb();

var_dump($lePdo->creerVisio('Ma visio', "je n'ai aucun objectif dans le vie", "https://zoom.us", date('Y-m-d H:i:s'))); //cas où mail existe