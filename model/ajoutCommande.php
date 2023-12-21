<?php
include 'connexion.php';
include_once "function.php";
if (
    !empty($_POST['id_article'])
    &&!empty($_POST['id_fournisseur'])
    &&!empty($_POST['quantite'])
    &&!empty($_POST['prix'])
    ) {
        
      
                $sql="INSERT INTO commande(id_article,id_fournisseur,quantite,prix)
                VALUES(?,?,?,?) " ;
                $req= $connexion->prepare($sql);
                $req->execute(array(
                 $_POST['id_article'],
                 $_POST['id_fournisseur'],
                 $_POST['quantite'],
                 $_POST['prix'],
                 ));
                 if($req->rowCount()!=0){
                    $sql="UPDATE article SET quantite=quantite+? WHERE id=?";

                    $req= $connexion->prepare($sql);
                $req->execute(array(
                 $_POST['quantite'],
                 $_POST['id_article'],

                 ));
                 if ($req->rowCount()!=0) {
                    $_SESSION['message']['text']="commande effectué avec succés";
                    $_SESSION['message']['type']="succés";
                 } else {
                    $_SESSION['message']['text']="Impossible de faite cette commande";
                    $_SESSION['message']['type']="danger";
                    
                 }
                 

                     $_SESSION['message']['text']="commande effectué avec succés";
                     $_SESSION['message']['type']="succés";
                 }else{
                     $_SESSION['message']['text']="une errueur s'est produite lors de la commande ";
                     $_SESSION['message']['type']="danger";
                     
                 }

            }
        

    
else{
    $_SESSION['message']['text']="une information obligatoire nom enregistré";
    $_SESSION['message']['type']="danger";
    
  
}
header('../vue/commande.php');
?>