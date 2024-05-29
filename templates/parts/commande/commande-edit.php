<section id="commande-create-edit">
    <h2>Commande Edit</h2>
    <form action="" method="post">
        <ul class="liste-boisson">
            <?php foreach ($objetBoissons->boissons as $boisson) : ?>
                <li class="boisson">
                    <p class="boisson-name"><?php echo $boisson->getName(); ?></p>
                    <input class="boisson-number" type="number" id="nombre" name="<?php echo 'new-boissons-selected' . $boisson->getID(); ?>" step="1" placeholder="Nombre" value="<?php  ?>">
                </li>
            <?php endforeach; ?>


            <?php
            if (isset($_POST['commande-editListeBoisson'])) {

                foreach ($objetCommandes->commandes as $commande) {
                    if ($commande->getID() == $_POST['commande-editListeBoisson']) {

                        $listeBoissonEdit = $commande->getListeBoisson();
                        dump($listeBoissonEdit);

                        break;
                    }
                }
            }
            ?>
        </ul>
        <input class="btn" type="submit" name="commande-editID">
    </form>
</section>