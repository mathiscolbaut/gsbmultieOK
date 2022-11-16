<?php
//on insère le fichier qui contient les fonctions
require_once ("../include/class.pdogsb.inc.php");

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = PdoGsb::getPdoGsb();

var_dump($lePdo->recupererVisioIds()[0][0]); //cas où mail existe
var_dump($lePdo->recupererVisioIds()[1][0]); //cas où mail existe