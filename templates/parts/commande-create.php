<form action="" method="post">
    <ul class="liste-boisson">
        <?php foreach ($objetBoissons->boissons as $boisson) : ?>
            <li class="boisson">
                <input class="btn" type="submit" name="<?php echo 'boissons-selected' . $boisson->getID(); ?>" value="<?php echo $boisson->getName(); ?>">
            </li>
        <?php endforeach; ?>
    </ul>

    <input class="btn" type="submit" name="commande-create">
</form>