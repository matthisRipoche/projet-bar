<div class="page-commandes">
    <h1>COMMANDES</h1>

    <div class="content">
        <?php
        if (isset($_POST['commande-editID'])) :
            include_once('templates/parts/commande/commande-edit.php');
        else :
            include_once('templates/parts/commande/commande-create.php');
        endif;
        include_once('templates/parts/commande/commande-show-data.php');
        ?>
    </div>


</div>