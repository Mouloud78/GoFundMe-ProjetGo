<?php
function administrateur_existe($email, $password)
{
    global $db;
    $entrees = [
        'email' => $email,
        'password' => sha1($password)
    ];

    //Créer la requête sql
    $sql = "SELECT * FROM admins WHERE email = :email AND password = :password";

    //préparer la requête
    $req = $db->prepare($sql);

    //exécuter la requête
    $req->execute($entrees);

    //si l'utilisateur existe, compter le nombre de lignes trouvée
    $existe = $req->rowCount($sql);

    //Retourner le resultat(resultat boolean)
    return $existe;
}
