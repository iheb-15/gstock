<?php 
include 'entete.php';
if (!empty($_GET['id'])) {
  $article=getArticle($_GET['id']);
}

?>
<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <form action="<?=!empty($_GET['id'])?"../model/modifArticle.php":"../model/ajoutArticle.php"?>" method="post">
            <label for="nom_article">Nom de l'article</label>
            <input value="<?=!empty($_GET['id'])? $article['nom_article']:""?>" type="text" name="nom_article" id="nom_article"placeholder="veuillez saisir le nom"><br>
            <input value="<?=!empty($_GET['id'])? $article['id']:""?>" type="hidden" name="id" id="id"><br>
            
            <label for="categorie">Catégorie</label><br>
            <select name="categorie" id="categorie">
                <option <?=!empty($_GET['id'])&& $article['categorie']=="Ordinateur"?"selected":""?> value="Ordinateur">Ordinateur</option>
                <option <?=!empty($_GET['id'])&& $article['categorie']=="Imprimente"?"selected":""?>value="Imprimente">Imprimente</option>
                <option <?=!empty($_GET['id'])&& $article['categorie']=="Accessoire"?"selected":""?>value="Accessoire">Accessoire</option>
            </select><br>

            <label for="quantite">Quantité</label><br>
            <input value="<?=!empty($_GET['id'])? $article['quantite']:""?>" type="number" name="quantite" id="quantite"placeholder="veuillez saisir la quantite">
            
            <label for="prix_unitaire">prix_unitaire</label>
            <input value="<?=!empty($_GET['id'])? $article['prix_unitaire']:""?>" type="number" name="prix_unitaire" id="prix_unitaire"placeholder="veuillez saisir le prix_unitaire">
            

            <label for="date_fabrication">date_fabrication</label>
            <input value="<?=!empty($_GET['id'])? $article['date_fabrication']:""?>" type="datetime-local" name="date_fabrication" id="date_fabrication">
            
            <label for="date_expiration">date_expiration</label>
            <input value="<?=!empty($_GET['id'])? $article['date_expiration']:""?>" type="datetime-local" name="date_expiration" id="date_expiration"><br>
            

            <button type="submit">Valider</button>
            <?php 
                if (!empty($_SESSION['message']['text'])) {
            ?>
                  <div class="alert <?=$_SESSION['message']['type']?>">
                  <?=$_SESSION['message']['text']?>
                  </div>
            <?php            
                }

            ?>

        </form>
        </div>
        <div class="box">
          <table class="mtable">
            <tr>
              <th> Nom article</th>
              <th>Catégorie</th>
              <th> Quantité</th>
              <th>prix_unitaire</th>
              <th> date_fabrication</th>
              <th> date_expiration</th>
              <th> Action</th>
            </tr>
            <?php
            $article=getArticle();
            if (!empty($article)&& is_array($article)) {
              foreach($article as $key =>$value){
            ?>
            <tr>
                <td><?=$value['nom_article']?></td>
                <td><?=$value['categorie']?></td>
                <td><?=$value['quantite']?></td>
                <td><?=$value['prix_unitaire']?></td>
                <td><?=$value['date_fabrication']?></td>
                <td><?=$value['date_expiration']?></td>
                <td><a href="?id=<?=$value['id']?>"><i class='bx bxs-edit-alt'></i></a></td>
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