<div class="page-boisson">
    <div class="wrapper">
        <h1>BOISSON</h1>
        <div class="content">

            <?php
            if (isset($_POST['editID'])) :
                include_once('templates/parts/boisson/boisson-edit.php');
            else :
                include_once('templates/parts/boisson/boisson-create.php');
            endif;

            include_once('templates/parts/boisson/boisson-show-data.php');
            ?>
        </div>
    </div>
</div>