<?php

$post = get_post();
if ($post == false) {
    header("Location:index.php?page=error");
} else {
?>
    </div>
    <div class="parallax-container">
        <div class="parallax">

            <img src="img/posts/<?= $post->image; ?>" alt="<?= $post->title; ?>" />
        </div>
    </div>
    <div class="container">
    <?php
}
