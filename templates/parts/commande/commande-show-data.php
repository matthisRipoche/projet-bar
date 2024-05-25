<section id="commande-show-data">
    <div class="commandes">
        <div class="commande">
            <div class="content textes">
                <p>ID</p>
                <p>PRIX</p>
                <p>DATE</p>
                <p>PAIMENT</p>
            </div>
        </div>
        <?php
        $commandes = $objetCommandes->GetArrayCommandes();
        if (!empty($commandes)) :
            foreach ($commandes as $commande) : ?>
                <div class="commande">
                    <div class="content textes">
                        <p><?php echo $commande->getID() ?></p>
                        <?php if (!empty($commande->getPrix())) : ?>
                            <p><?php echo $commande->getPrix() . "€" ?></p>
                        <?php endif; ?>
                        <?php if (!empty($commande->getDate())) : ?>
                            <p><?php echo $commande->getDate() ?></p>
                        <?php endif; ?>
                        <?php if ($commande->getPaiment() == false) : ?>
                            <p><?php echo "NON" ?></p>
                        <?php else : ?>
                            <p><?php echo "OUI" ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="content bouttons">
                        <form action="" method="post">
                            <input type="hidden" name="supprID" value="<?php echo $commande->getID(); ?>">
                            <input class="btn-suppr" type="submit" value="Suppr">
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="editListeBoisson" value="<?php echo $commande->getID(); ?>">
                            <input type="hidden" name="editPrix" value="<?php echo $commande->getPrix(); ?>">
                            <input class="btn-edit" type="submit" value="Edit">
                        </form>
                    </div>
                </div>
        <?php
            endforeach;
        endif;
        ?>
    </div>
</section>