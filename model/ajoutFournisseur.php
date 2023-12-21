<?php
include 'connexion.php';
include_once "function.php";
if (
    !empty($_POST['nom'])
    &&!empty($_POST['prenom'])
    &&!empty($_POST['telephone'])
    &&!empty($_POST['adresse'])
    ) {
    $sql="INSERT INTO fournisseur(nom,prenom,telephone,adresse)
   VALUES(?,?,?,?) " ;
   $req= $connexion->prepare($sql);
   $req->execute(array(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['telephone'],
    $_POST['adresse'],
   ));
    if($req->rowCount()!=0){
        $_SESSION['message']['text']="fournisseur ajouté avec succés";
        $_SESSION['message']['type']="succés";
    }else{
        $_SESSION['message']['text']="une errueur s'est produite lors de l'ajout de fournisseur";
        $_SESSION['message']['type']="danger";
        
    }
}else{
    $_SESSION['message']['text']="une information obligatoire nom enregistré";
    $_SESSION['message']['type']="danger";
    
  
}
header('../vue/fournisseur.php');
?>