<section id="commande-create-edit">
    <h2>Commande Edit</h2>
    <form action="" method="post">
        <ul class="liste-boisson">
            <?php
            //Trouver la commande à éditer
            $tabIdPossible = [];
            foreach ($objetBoissons->GetArrayBoissons() as $boisson) {
                $idPossible = $boisson->getID();
                $tabIdPossible[] = $idPossible;
            }
            foreach ($objetCommandes->commandes as $commande) :
                if ($commande->getID() == $_POST['commande-editListeBoisson']) :

                    //Boucler sur la liste de boissons de la commande



                    foreach ($commande->getListeBoisson() as $id => $boisson) :
                        if (in_array($id, $tabIdPossible)) :
            ?>
                            <li class="boisson">
                                <p class="boisson-name"><?php echo $boisson['name']; ?></p>
                                <input class="boisson-number" type="number" id="nombre" name="<?php echo 'new-boissons-selected' . $id; ?>" step="1" placeholder="Nombre" value="<?php echo $boisson['nombre']; ?>">
                            </li>
                    <?php
                        endif;
                    endforeach;

                    ?>
                    <input type="hidden" name="commandeEditID" value="<?php echo $commande->getID(); ?>">
            <?php
                    break;
                endif;
            endforeach;
            ?>
        </ul>
        <input class="btn" type="submit" name="commande-editID">
    </form>
</section>