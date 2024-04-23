<?php include_once('header.php'); ?>

<main class="site-main">
    <?php
    include_once('templates/parts/options.php');

    if (isset($_GET['option'])) {
        $option = $_GET['option'];
        switch ($option) {
            case 1:
                include_once('templates/page-boisson.php');
                break;
            case 2:
                include_once('templates/page-table.php');
                break;
            case 3:
                include_once('templates/page-commande.php');
                break;
        }
    } else {
        include_once('templates/page-accueil.php');
    }
    ?>
</main>

<?php

?>

<?php include_once('footer.php'); ?>