<?php
include 'connexion.php';
if (
    !empty($_POST['nom'])
    &&!empty($_POST['prenom'])
    &&!empty($_POST['telephone'])
    &&!empty($_POST['adresse'])
   
    &&!empty($_POST['id'])
    
    ) {
    $sql="UPDATE client SET nom=?,prenom=?,telephone=?,adresse=? WHERE id=?";
   $req= $connexion->prepare($sql);
   $req->execute(array(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['telephone'],
    $_POST['adresse'],
    $_POST['id']
));
    if($req->rowCount()!=0){
        $_SESSION['message']['text']="client modifier avec succés";
        $_SESSION['message']['type']="succés";
    }else{
        $_SESSION['message']['text']="Rien a été modifier";
        $_SESSION['message']['type']="warning";
        
    }
}else{
    $_SESSION['message']['text']="une information obligatoire nom enregistré";
    $_SESSION['message']['type']="danger";
    
  
}
header('location: ../vue/client.php');
?>