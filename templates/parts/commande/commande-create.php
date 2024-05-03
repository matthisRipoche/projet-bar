<form action="" method="post" class="create-commande">
    <ul class="liste-boisson">
        <?php foreach ($objetBoissons->boissons as $boisson) : ?>
            <li class="boisson">
                <input class="btn" type="submit" name="<?php echo 'boissons-selected' . $boisson->getID(); ?>" value="<?php echo $boisson->getName(); ?>">
                <input class="input" type="number" id="nombre" name="nombre" step="1" placeholder="Nombre">
            </li>
        <?php endforeach; ?>
    </ul>

    <input class="btn" type="submit" name="commande-create">
</form>