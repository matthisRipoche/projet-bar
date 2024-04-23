<?php
$tables = [];

if (isset($_COOKIE['table'])) {
    $tables = json_decode($_COOKIE['table'], true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newTable = [
        'name' => $_POST['name'],
        'disponibilite' => $_POST['disponibilite'],
        'commande' => $_POST['commande']
    ];

    $tables[] = $newTable;
    setcookie("table", json_encode($tables), strtotime("+1 year"));
}
?>

<div class="page-table">
    <h1>TABLE</h1>
    <form action="" method="post">
        <label for="">Créer une table</label>
        <div class="inputs">
            <input class="input" type="text" id="name" name="name" placeholder="Nom">
            <input class="input" type="text" id="disponibilite" name="disponibilite" placeholder="Disponibilité">
            <input class="input" type="number" id="commande" name="commande" placeholder="commande">
        </div>

        <input type="submit" value="Créer la table" class="btn">
    </form>

    <form action="">
        <label for="">Supprimer une table</label>
    </form>

    <div class="show-data">
        <table>
            <caption>Historique des tables créés</caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Disponibilité</th>
                    <th>Commande</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($tables)) {
                    foreach ($tables as $table) {
                        echo "<tr>";
                        echo "<td>" . $table['name'] . "</td>";
                        echo "<td>" . $table['disponibilite'] . "</td>";
                        echo "<td>" . $table['commande'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Aucune table trouvée.";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>