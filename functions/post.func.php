<?php

function get_post()
{
    global $db;

    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id='{$_GET['id']}'
    ");

    $result = $req->fetchObject();
    return $result;
}
