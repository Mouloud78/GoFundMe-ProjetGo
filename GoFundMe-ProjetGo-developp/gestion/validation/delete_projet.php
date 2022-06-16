<?php
require "../../functions/main-functions.php";

/**
 * Suppression du projet
 */
$db->exec("DELETE FROM posts WHERE id = {$_POST['id']}");
