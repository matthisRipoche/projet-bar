<?php
include_once('classes/boisson.php');
include_once('classes/boissons_methods.php');
$objetBoissons = new Boissons_metods;

include_once('classes/commande.php');
include_once('classes/commandes_methods.php');
$objetCommandes = new Commandes_methods($objetBoissons);
