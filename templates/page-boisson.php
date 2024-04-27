<?php
include_once('classes/boissons_methods.php');

$objetBoissons = new Boissons_metods;
?>

<div class="page-boisson">
    <h1>BOISSON</h1>

    <?php
    if (isset($_POST['editID'])) :
        include_once('templates/parts/boisson-edit.php');
    else :
        include_once('templates/parts/boisson-create.php');
    endif;

    include_once('templates/parts/boisson-show-data.php');
    ?>
</div>