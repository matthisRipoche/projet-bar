<?php
include_once('classes/boissons.php');

$objetBoissons = new Boissons;
?>

<div class="page-boisson">
    <h1>BOISSON</h1>

    <?php if (!empty($_POST['editName'])) : ?>
        <form action="" method="post">
            <label for="">Edit d'une boisson</label>
            <div class="inputs">
                <input type="hidden" name="editName2" value="<?php echo $_POST['editName']; ?>">
                <input class="input" type="text" id="newName" name="newName" placeholder="Nom">
                <input class="input" type="text" id="newDescription" name="newDescription" placeholder="Description">
                <input class="input" type="number" id="newPrix" name="newPrix" step="1.00" placeholder="Prix">
            </div>

            <input type="submit" value="Editer la boisson" class="btn">
        </form>
    <?php endif; ?>

    <form action="" method="post">
        <label for="">Créer une boisson</label>
        <div class="inputs">
            <input class="input" type="text" id="name" name="name" placeholder="Nom">
            <input class="input" type="text" id="description" name="description" placeholder="Description">
            <input class="input" type="number" id="prix" name="prix" step="0.010" placeholder="Prix">
        </div>

        <input type="submit" value="Créer la boisson" class="btn">
    </form>

    <div class="show-data">
        <table>
            <caption>Historique des boissons créés</caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Supprimer</th>
                    <th>Editer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($objetBoissons->boissons)) {
                    foreach ($objetBoissons->boissons as $boisson) {
                        echo "<tr>";
                        echo "<td>" . $boisson['name'] . "</td>";
                        echo "<td>" . $boisson['description'] . "</td>";
                        if (!empty($boisson['prix'])) {
                            echo '<td class="prix">' . $boisson['prix'] . "euros" . "</td>";
                        } ?>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="supprName" value="<?php echo $boisson['name']; ?>">
                                <input class="btn" type="submit" value="Suppr">
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="editName" value="<?php echo $boisson['name']; ?>">
                                <input class="btn" type="submit" value="Edit">
                            </form>
                        </td>
                <?php
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune boisson trouvée.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>