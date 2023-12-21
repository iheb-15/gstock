<?php
include 'connexion.php';

function getArticle($id = null)
{
    if (!empty($id)) {
        $sql = "SELECT * FROM article WHERE id=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM article";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

function getClient($id = null)
{
    if (!empty($id)) {
        $sql = "SELECT * FROM client WHERE id=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM client";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

function getVente($id = null)
{
    if (!empty($id)) {
        $sql = "SELECT nom_article, nom, prenom, v.quantite, prix, date_vente,v.id,prix_unitaire,adresse,telephone
                FROM client AS c,vente As v, article AS a WHERE v.id_article=a.id AND v.id_client=c.id AND v.id=?";
               
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    } else {
        $sql = "SELECT nom_article, nom, prenom, v.quantite, prix, date_vente,v.id
                FROM client AS c,vente AS v,article AS a WHERE v.id_article=a.id AND v.id_client=c.id";
                
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}


function getFournisseur($id = null)
{
    if (!empty($id)) {
        $sql = "SELECT * FROM fournisseur WHERE id=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM fournisseur";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

function getCommande($id = null)
{
    if (!empty($id)) {
        $sql = "SELECT nom_article, nom, prenom, co.quantite, prix, date_commande,co.id,
        prix_unitaire,adresse,telephone
                FROM client AS c,commande AS co, article AS a WHERE co.id_article=a.id AND
                co.id_fournisseur=f.id AND co.id=?";
                
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    } else {
        $sql = "SELECT nom_article, nom, prenom, co.quantite, prix, date_commande,co.id
                FROM fournisseur AS f,commande AS co,article AS a WHERE co.id_article=a.id
                AND co.id_fournisseur=f.id";
                
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

?>
