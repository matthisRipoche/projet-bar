<section id="commande-create">
    <form action="" method="post" class="create-commande">
        <ul class="liste-boisson">
            <?php foreach ($objetBoissons->boissons as $boisson) : ?>
                <li class="boisson">
                    <p class="boisson-name"><?php echo $boisson->getName(); ?></p>
                    <input class="boisson-number" type="number" id="nombre" name="<?php echo 'boissons-selected' . $boisson->getID(); ?>" step="1" placeholder="Nombre">
                </li>
            <?php endforeach; ?>
        </ul>
        <input class="btn" type="submit" name="commande-create">
    </form>
</section>