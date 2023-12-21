<?php
include 'entete.php';

if (!empty($_GET['id'])) {
    $article = getCommande($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="<?= !empty($_GET['id']) ? "../model/modifCommande.php" : "../model/ajoutCommande.php" ?>"
                method="post">

                <input value="<?= !empty($_GET['id']) ? $article['id'] : "" ?>" type="hidden" name="id" id="id"><br>

                <label for="id_article">Article</label><br>
                <select onchange="setPrix()" name="id_article" id="id_article">
                    <?php
                    $articles = getArticle();
                    if (!empty($articles) && is_array($articles)) {
                        foreach ($articles as $key => $value) {
                            ?>
                            <option data-prix="<?= $value['prix_unitaire'] ?>" value="<?= $value['id'] ?>"><?=$value['nom_article']."_".$value['quantite']?>
                                
                                
                            </option>
                            <?php
                        }
                    }
                    ?>
                </select><br>

                <label for="id_fournisseur">fournisseur</label><br>
                <select name="id_fournisseur" id="id_fournisseur">
                    <?php
                    $clients = getFournisseur();
                    if (!empty($clients) && is_array($clients)) {
                        foreach ($clients as $key => $value) {
                            ?>
                            <option value="<?= $value['id'] ?>" <?= !empty($_GET['id']) && $commande['id_client'] == $value['id'] ? "selected" : "" ?>>
                                <?= $value['nom'] . " " . $value['prenom'] ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </select><br>

                <label for="quantite">Quantité</label><br>
                <input value="<?= !empty($_GET['id']) ? $commande['quantite'] : "" ?>" type="number" name="quantite"
                    id="quantite" placeholder="Veuillez saisir la quantite"><br>

                <label for="prix">Prix</label><br>
                <input value="<?= !empty($_GET['id']) ? $commande['prix'] : "" ?>" type="number" name="prix"
                    id="prix" ><br>

                <button type="submit">Valider</button>
                <?php
                if (!empty($_SESSION['message']['text'])) {
                    ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php
                }
                ?>

            </form>
        </div>
        <div class="box">
            <table class="table">
                <tr>
                    <th>Article</th>
                    <th>Client</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php
                $articles = getCommande();
                if (!empty($articles) && is_array($articles)) {
                    foreach ($articles as $key => $value) {
                        ?>
                        <tr>
                            <td><?= $value['nom_article'] ?></td>
                            <td><?= $value['nom'] . " " . $value['prenom'] ?></td>
                            <td><?= $value['quantite'] ?></td>
                            <td><?= $value['prix'] ?></td>
                            <td><?= date('d/m/y H:i:s', strtotime($value['date_commande'])) ?></td>
                            <td><a href="?id=<?= $value['id'] ?>"><i class='bx bxs-edit-alt'></i></a></td>
                            <td><a href="../model/supprimCommande.php?id=<?=$value['id']?>"><i class='bx bx-comment-x'></i></a></td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
</section>
<?php
include 'pied.php';
?>
