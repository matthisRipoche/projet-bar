<div id="boisson-show-data">
    <div class="boissons">
        <?php
        if (!empty($objetBoissons->boissons)) :
            foreach ($objetBoissons->boissons as $boisson) : ?>
                <div class="boisson">
                    <div class="content textes">
                        <p><?php echo $boisson->getName() ?></p>
                        <?php if (!empty($boisson->getPrix())) : ?>
                            <p><?php echo $boisson->getPrix() . "€" ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="content bouttons">
                        <form action="" method="post">
                            <input type="hidden" name="supprID" value="<?php echo $boisson->getID(); ?>">
                            <input class="btn-suppr" type="submit" value="Suppr">
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="editID" value="<?php echo $boisson->getID(); ?>">
                            <input type="hidden" name="editName" value="<?php echo $boisson->getName(); ?>">
                            <input type="hidden" name="editDescription" value="<?php echo $boisson->getDescription(); ?>">
                            <input type="hidden" name="editPrix" value="<?php echo $boisson->getPrix(); ?>">
                            <input class="btn-edit" type="submit" value="Edit">
                        </form>
                    </div>
                </div>
        <?php
            endforeach;
        else :
            echo "Aucune boisson trouvée.";
        endif;
        ?>
    </div>
</div>