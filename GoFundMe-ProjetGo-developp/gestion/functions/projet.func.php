<?php

//Fonction qui permet d'afficher le projet
function getProjet()
{
    //Connexion à la base de données
    global $db;

    //Créer la requête
    $req = $db->query("
        SELECT posts.id,
               posts.title,
               posts.image,
               posts.date,
               posts.content,
               posts.posted,
               admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email 
        WHERE posts.id = '{$_GET['id']}'
    ");

    //Stocker le resultat dans une variable
    $result = $req->fetchObject();
    return $result;
}

function edit($title, $content, $posted, $id)
{
    global $db;
    $edit = [
        'title' => $title,
        'content' => $content,
        'posted' => $posted,
        'id' => $id
    ];

    $sql = "UPDATE posts SET title=:title, content=:content, date=Now(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($edit);
}
