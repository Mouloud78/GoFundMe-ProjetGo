<?php
/*
 *  Fonction 
 */
function post($title, $content, $posted)
{
    global $db;
    $tab = [
        'title' => $title,
        'content' => $content,
        'writer' =>  $_SESSION['admin'],
        'posted' => $posted

    ];

    //Requête à executer
    $sql = "INSERT INTO posts(title, content, writer, date, posted) VALUES(:title, :content, :writer, NOW(), :posted)";

    //Préparer la requête
    $req = $db->prepare($sql);

    //Executer la requête
    $req->execute($tab);
}

//Fonction qui permet l'upload de l'image
function poste_img($tmp_name, $extension)
{
    //connexion à la base de données
    global $db;

    //utiliser le id pour le nom de l'image
    $id = $db->lastInsertId();
    $i = [
        'id' => $id,
        'image' => $id . $extension
    ];

    //Mise à jour de la table
    $sql = "UPDATE posts SET image = :image WHERE id= :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name, "../img/posts/" . $id . $extension);
    header("Location:index.php?page=liste_projet&id=" . $id);
}
