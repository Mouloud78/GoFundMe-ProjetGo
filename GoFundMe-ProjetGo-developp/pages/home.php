<h4>Projets récent.....</h4>
<div class="row">

    <?php
    $posts = get_posts();

    foreach ($posts as $post) {
    ?>
        <div class="col l4 m4 s12">
            <div class="card">
                <div class="card-content">
                    <h5 class="grey-text text-darken-2"><?= $post->title ?></h5>
                    <h6 class="grey-text"><?= date("d/m/Y à H:i", strtotime($post->date)); ?> par <?= $post->name; ?></h6>
                </div>
                <div class="card-image waves-effect waves-block waves-light">
                    <img style="height:280px;" src="img/posts/<?= $post->image ?>" class="activator" alt="<?= $post->title ?>" />
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">
                        <i class="material-icons  right">more_vert</i>
                    </span>
                    <p>
                        <a href="index.php?page=post&id=<?= $post->id ?>">Voir détail du projet...</a>
                    </p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">
                        <?= $post->title ?> <i class="material-icons right">close</i>
                    </span>
                    <p>
                        <?= substr(nl2br($post->content), 0, 500);  ?>....
                    </p>
                </div>
            </div>
        </div>

    <?php
    }

    ?>
</div>