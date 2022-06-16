<?php

//démarrer la session
session_start();

$dbhost = 'localhost';
$dbname = 'projet';
$dbuser = 'root';
$dbpasswd = '';

try {
    $db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpasswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOexception $e) {
    die("Une erreur est survenue lors de la connexion à la base de données");
}


//Fonction qui permet de définir le menu de l'administrateur et du bénevol
function admin()
{
    if (isset($_SESSION['admin'])) {
        global $db;
        $a = [
            'email' => $_SESSION['admin'],
            'role' => 'admin'
        ];

        $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $existe = $req->rowCount($sql);
        return $existe;
    } else {
        return false;
    }
}
