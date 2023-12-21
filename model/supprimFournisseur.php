<?php
session_start();
include 'connexion.php';

if (!empty($_GET['id'])) {
    $id_commande = $_GET['id'];
    
    // Use a try-catch block to handle potential exceptions
    try {
        // Prepare and execute the DELETE query
        $sql_commande = "DELETE FROM fournisseur WHERE id=:id_commande";
        $req_commande = $connexion->prepare($sql_commande);
        $req_commande->execute(array(
            ':id_commande' => $id_commande
        ));
        
        // Check if the deletion was successful
        if ($req_commande->rowCount() > 0) {
            $_SESSION['message']['text'] = "Commande supprimée avec succès";
            $_SESSION['message']['type'] = "success";
        } else {
            $_SESSION['message']['text'] = "Rien n'a été supprimé";
            $_SESSION['message']['type'] = "warning";
        }
    } catch (PDOException $e) {
        $_SESSION['message']['text'] = "Erreur lors de la suppression de la commande : " . $e->getMessage();
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire n'a pas été enregistrée";
    $_SESSION['message']['type'] = "danger";
}

// Redirect to the appropriate page
header('location: ../vue/fournisseur.php');
exit();
?>
