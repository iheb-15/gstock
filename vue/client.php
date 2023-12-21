<?php 
include 'entete.php';
if (!empty($_GET['id'])) {
  $clients=getClient($_GET['id']);
}

?>
<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <form action="<?=!empty($_GET['id'])?"../model/modifClient.php":"../model/ajoutClient.php"?>" method="post">
            <label for="nom">Nom </label><br>
            <input value="<?=!empty($_GET['id'])? $clients['nom']:""?>" type="text" name="nom" id="nom"placeholder="veuillez saisir le nom"><br>
            <input value="<?=!empty($_GET['id'])? $clients['id']:""?>" type="hidden" name="id" id="id"><br>
            
            <label for="prenom">prenom </label><br>
            <input value="<?=!empty($_GET['id'])? $clients['prenom']:""?>" type="text" name="prenom" id="prenom"placeholder="veuillez saisir le prenom"><br>
            
            
            <label for="telephone">N° de téléphone</label><br>
            <input value="<?=!empty($_GET['id'])? $clients['telephone']:""?>" type="text" name="telephone" id="telephone"placeholder="veuillez saisir le N° de telephone"><br>
            

            <label for="adresse">ADRESSE</label><br><br>
            <input value="<?=!empty($_GET['id'])? $clients['adresse']:""?>" type="text" name="adresse" id="adresse"placeholder="veuillez saisir l'adresse"><br>
            


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
            $clients=getClient();
            if (!empty($clients)&& is_array($clients)) {
              foreach($clients as $key =>$value){
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