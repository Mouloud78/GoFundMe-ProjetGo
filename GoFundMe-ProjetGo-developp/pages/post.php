<?php

$post = get_post();
if ($post == false) {
    header("Location:index.php?page=error");
} else {
?>
    </div>
    <div class="parallax-container" style="height: 200px;">
        <div class="parallax">
            <img src="img/posts/<?= $post->image; ?>" alt="<?= $post->title; ?>" style=" transform: translate3d(-50%, 432.451px, 0px);opacity: 0.5;" />
        </div>
    </div>
    <div class="container">
        <h2><?= $post->title ?> </h2>
        <h6>Par <?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date)) ?></h6>
        <p>
            <?= nl2br($post->content); ?>
        </p>
    <?php
}
    ?>
    <hr>