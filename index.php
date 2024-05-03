<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('functions.php');
include_once('classe-include.php');
include_once('header.php');
?>

<main class="site-main">
    <?php
    include_once('templates/parts/options.php');

    if (isset($_GET['nav'])) {
        switch ($_GET['nav']) {
            case 1:
                include_once('templates/pages/page-boisson.php');
                break;
            case 2:
                include_once('templates/pages/page-table.php');
                break;
            case 3:
                include_once('templates/pages/page-commande.php');
                break;
        }
    } else {
        include_once('templates/pages/page-accueil.php');
    }
    ?>
</main>

<?php

?>

<?php include_once('footer.php'); ?>