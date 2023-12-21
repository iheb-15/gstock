<?php 
include 'entete.php';
if (!empty($_GET['id'])) {
  $fournisseur=getFournisseur($_GET['id']);
}

?>
<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <form action="<?=!empty($_GET['id'])?"../model/modifFournisseur.php":"../model/ajoutFournisseur.php"?>" method="post">
            <label for="nom">Nom </label><br>
            <input value="<?=!empty($_GET['id'])? $fournisseur['nom']:""?>" type="text" name="nom" id="nom"placeholder="veuillez saisir le nom"><br>
            <input value="<?=!empty($_GET['id'])? $fournisseur['id']:""?>" type="hidden" name="id" id="id"><br>
            
            <label for="prenom">prenom </label><br>
            <input value="<?=!empty($_GET['id'])? $fournisseur['prenom']:""?>" type="text" name="prenom" id="prenom"placeholder="veuillez saisir le prenom"><br>
            
            
            <label for="telephone">N° de téléphone</label><br>
            <input value="<?=!empty($_GET['id'])? $fournisseur['telephone']:""?>" type="text" name="telephone" id="telephone"placeholder="veuillez saisir le N° de telephone"><br>
            

            <label for="adresse">ADRESSE</label><br><br>
            <input value="<?=!empty($_GET['id'])? $fournisseur['adresse']:""?>" type="text" name="adresse" id="adresse"placeholder="veuillez saisir l'adresse"><br>
            


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
              <th> Nom </th>
              <th>Prénom</th>
              <th> Télephone</th>
              <th>adresse</th>
              <th> Action</th>
            </tr>
            <?php
            $fournisseur=getFournisseur();
            if (!empty($fournisseur)&& is_array($fournisseur)) {
              foreach($fournisseur as $key =>$value){
            ?>
            <tr>
                <td><?=$value['nom']?></td>
                <td><?=$value['prenom']?></td>
                <td><?=$value['telephone']?></td>
                <td><?=$value['adresse']?></td>
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