<?php
/*
    Connexion à la base de données
 */
require "../../functions/main-functions.php";

/*
  Mise à jour de la table
*/
$db->exec("UPDATE posts SET posted='1' WHERE id='{$_POST['id']}'");
