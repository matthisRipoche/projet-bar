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
                    echo "<td>" . $boisson->getName() . "</td>";
                    echo "<td>" . $boisson->getDescription() . "</td>";
                    if (!empty($boisson->getPrix())) {
                        echo '<td class="prix">' . $boisson->getPrix() . "euros" . "</td>";
                    } ?>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="supprID" value="<?php echo $boisson->getID(); ?>">
                            <input class="btn" type="submit" value="Suppr">
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="editID" value="<?php echo $boisson->getID(); ?>">
                            <input type="hidden" name="editName" value="<?php echo $boisson->getName(); ?>">
                            <input type="hidden" name="editDescription" value="<?php echo $boisson->getDescription(); ?>">
                            <input type="hidden" name="editPrix" value="<?php echo $boisson->getPrix(); ?>">
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