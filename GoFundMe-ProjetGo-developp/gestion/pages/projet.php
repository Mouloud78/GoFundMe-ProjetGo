<?php
//affecter la variable $post à la fonction qui récupere la totalité des attribut de la table posts
$post = getProjet();

//vérifier si la variable $post existe
if ($post == false) {
    header("Location:index.php?page=error");
}
?>
</div>
<!--afficher l'image du projet-->
<div class="parallax">
    <img src="../../img/posts/" <?= $post->image; ?> alt="<?= $post->title; ?>" style=" transform: translate3d(-50%, 432.451px, 0px);opacity: 0.5;" />
</div>
<div class="container">

    <?php

    //Vérifier si l'utilisateur à cliqué sur le bouton submit pour modifier le projet
    if (isset($_POST["submit"])) {

        //Créer les variable
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        //permet de définir si le projet est publier au non
        $posted = isset($_POST['public']) ? "1" : "0";
        //Tableau des erreurs
        $erreurs = [];

        //Vérifier si les variables sont vides
        if (empty($title) || empty($content)) {
            $erreurs['empty'] = "Veuillez remplir les champs";
        }

        //Si le tableau erreurs n'est pas vide, on affiche les erreurs
        if (!empty($erreurs)) {
    ?>
            <div class="card-content white-text">
                <?php
                foreach ($erreurs as $erreur) {
                    echo $erreur . "<br/>";
                }
                ?>
            </div>
        <?php
        } else { // si le tableau erreurs est vide, modifier le projet
            edit($title, $content, $posted, $_GET['id']);

        ?>
            <!--Redériger l'utilisateur pour consulter la modification réalisée sur le projet-->
            <script>
                window.location.replace("index.php?page=liste_projet&id=<?= $_GET['id'] ?>");
            </script>
    <?php
        }
    }
    ?>

    <form method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="title" id="title" value="<?= $post->title; ?>" />
                <label for="title">Nom du projet</label>
            </div>
            <div class="input-field col s12">
                <textarea id="content" name="content" class="materialize-textarea" style="height: 300px;">
                    <?= nl2br($post->content); ?>

                </textarea>
                <label for="content">Détail du projet</label>
            </div>

            <div class="col s6">
                <p>Publication du projet</p>
                <div class="switch">
                    <label>
                        Non
                        <input type="checkbox" name="public" <?php echo ($post->posted == "1") ? "checked" : "" ?> />
                        <span class="lever"></span>
                        Oui
                    </label>
                </div>
            </div>
            <div class="col s6 right-align">
                <br /><br />
                <button type="submit" class="btn" name="submit">Modifier</button>
            </div>
        </div>
    </form>