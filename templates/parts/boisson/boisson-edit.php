<form action="" method="post">
    <label for="">Edit d'une boisson</label>
    <div class="inputs">
        <?php dump($_POST); ?>
        <input type="hidden" name="sameID" value="<?php echo $_POST['editID']; ?>">
        <input class="input" type="text" id="newName" name="newName" placeholder="Nom" value="<?php echo $_POST['editName']; ?>">
        <input class="input" type="text" id="newDescription" name="newDescription" placeholder="Description" value="<?php echo $_POST['editDescription']; ?>">
        <input class="input" type="number" id="newPrix" name="newPrix" step="1.00" placeholder="Prix" value="<?php echo $_POST['editPrix']; ?>">
    </div>

    <input type="submit" value="Editer la boisson" class="btn">
</form>