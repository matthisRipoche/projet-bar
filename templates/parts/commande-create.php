<form action="" method="post">
    <?php $boissonSelected = []; ?>
    <ul class="liste-boisson">
        <?php foreach ($objetBoissons->boissons as $boisson) : ?>
            <li class="boisson">
                <input type="checkbox" name="<?php echo $boisson->getID(); ?>" value="<?php echo $boisson->getID(); ?>">
                <label for="<?php echo $boisson->getID(); ?>"><?php echo $boisson->getName(); ?></label>
                <?php $boissonSelected[] = $boisson->getID(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <input type="hidden" name="liste-boisson" value="<?php echo $boissonSelected ?>">
    <input class="btn" type="submit">
</form>