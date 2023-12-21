<?php
include 'connexion.php';
include_once "function.php";
if (
    !empty($_POST['id_article'])
    &&!empty($_POST['id_client'])
    &&!empty($_POST['quantite'])
    &&!empty($_POST['prix'])
    ) {
        $article=getArticle($_POST['id_article']);
        if (!empty($article)&& is_array($article)) {
            if ($_POST['quantite']>$article['quantite']) {
                $_SESSION['message']['text']="la quantité à vendre n'est pas disponible";
                $_SESSION['message']['type']="danger";
                
            } else{
                $sql="INSERT INTO vente(id_article,id_client,quantite,prix)
                VALUES(?,?,?,?) " ;
                $req= $connexion->prepare($sql);
                $req->execute(array(
                 $_POST['id_article'],
                 $_POST['id_client'],
                 $_POST['quantite'],
                 $_POST['prix'],
                 ));
                 if($req->rowCount()!=0){
                    $sql="UPDATE article SET quantite=quantite-? WHERE id=?";

                    $req= $connexion->prepare($sql);
                $req->execute(array(
                 $_POST['quantite'],
                 $_POST['id_article'],

                 ));
                 if ($req->rowCount()!=0) {
                    $_SESSION['message']['text']="vente effectué avec succés";
                    $_SESSION['message']['type']="succés";
                 } else {
                    $_SESSION['message']['text']="Impossible de faite cette vente";
                    $_SESSION['message']['type']="danger";
                    
                 }
                 

                     $_SESSION['message']['text']="vente effectué avec succés";
                     $_SESSION['message']['type']="succés";
                 }else{
                     $_SESSION['message']['text']="une errueur s'est produite lors de la vente ";
                     $_SESSION['message']['type']="danger";
                     
                 }

            }
        }

    
}else{
    $_SESSION['message']['text']="une information obligatoire nom enregistré";
    $_SESSION['message']['type']="danger";
    
  
}
header('../vue/vente.php');
?>