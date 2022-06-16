<?php

//Fonction qui récupere l'ensemble des postes
function get_posts()
{
    //Connexion à la base de données
    global $db;

    //Requête
    $req = $db->query("SELECT * FROM posts ORDER BY date DESC");

    $result = [];
    while ($rows = $req->fetchObject()) {
        $result[] = $rows;
    }

    return $result;
}
