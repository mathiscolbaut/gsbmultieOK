<?php
//on insère le fichier qui contient les fonctions
require_once ("../include/class.pdogsb.inc.php");

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = PdoGsb::getPdoGsb();

var_dump($lePdo->testMail('toto@gmail.com')); //cas où mail existe

var_dump($lePdo->testMail('t@gmail.com')); //cas où mail n'existe pas
