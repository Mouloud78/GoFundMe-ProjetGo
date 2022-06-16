<?php

function ajout_utilisateur($name, $email, $password, $role, $don)
{
    global $db;
    $tabUtilisateur = [
        'name' => $name,
        'email' => $email,
        'password' => sha1($password),
        'don' => $don

    ];

    $sql = "INSERT INTO admins(name, email, password, role, valide, don) VALUES(:name, :email, :password, 'benev', '0', :don)";
    $req = $db->prepare($sql);
    $req->execute($tabUtilisateur);
}

//Fonction qui récupere les utilisateur et non les utilisateur
function getBenevol()
{
    global $db;
    $req = $db->query("
        SELECT  * FROM admins WHERE role='benev';
    ");

    $result = [];
    while ($rows = $req->fetchObject()) {
        $result[] = $rows;
    }
    return $result;
}
