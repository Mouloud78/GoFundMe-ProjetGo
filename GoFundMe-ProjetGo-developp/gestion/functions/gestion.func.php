<?php


/*
    Fonction qui calcule le nombre d'entrée
*/
function tableau($table)
{
    global $db;
    //Calculer le nombre d'entrée dans la table
    $query = $db->query("SELECT COUNT(id) FROM $table");

    //retourner le resultat calculé
    return $nb = $query->fetch();
}

/*
    Fonction qui affecte une couleur spécifique à l'affichage d'une table
*/
function couleur($table, $couleur)
{
    if (isset($couleur[$table])) {
        return $couleur[$table];
    } else {
        return "green";
    }
}

/*
    Fonction qui récupere les projets dans la base de données
*/
function getProjets()
{
    global $db;
    $req = $db->query("
        SELECT 
            posts.id,
            posts.title,
            posts.date,
            posts.writer,
            posts.content,
            admins.name
        FROM posts
        JOIN admins
        ON posts.writer=admins.email
        WHERE posts.posted='0'
        ORDER BY posts.date ASC    
    ");

    /*
        On crée un tableau vide pour recevoir les projets
    */
    $result = [];

    /*
        On parcours la table
     */
    while ($rows = $req->fetchObject()) {
        /*
            On affecte les ligne de la table au tableau
         */
        $result[] = $rows;
    }

    /*
        On retourne le tableau
     */
    return $result;
}
