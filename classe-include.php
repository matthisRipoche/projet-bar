<?php
include_once('classes/boisson.php');
$objetBoissons = new Boissons_methods;

include_once('classes/commande.php');
$objetCommandes = new Commandes_methods($objetBoissons);
