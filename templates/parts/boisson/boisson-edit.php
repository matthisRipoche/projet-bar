<section id="boisson-create-edit">
    <form action="" method="post">
        <h2><label for="">Edit d'une boisson</label></h2>
        <div class="inputs">
            <input type="hidden" name="sameID" value="<?php echo $_POST['editID']; ?>">
            <input class="input name" type="text" id="newName" name="newName" placeholder="Nom" value="<?php echo $_POST['editName']; ?>">
            <input class="input prix" type="number" id="newPrix" name="newPrix" step="1.00" placeholder="Prix" value="<?php echo $_POST['editPrix']; ?>">
            <textarea class="input description" type="text" id="newDescription" name="newDescription" placeholder="Description"><?php echo $_POST['editDescription']; ?></textarea>
            <input type="submit" value="Editer la boisson" class="btn">
        </div>
    </form>
</section>