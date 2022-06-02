<?php
function get_posts()
{
    global $db;

    $req = $db->query("SELECT * FROM posts WHERE posted='1' ORDER BY date DESC");

    $result = [];
    while ($rows = $req->fetchObject()) {
        $result[] = $rows;
    }

    return $result;
}
