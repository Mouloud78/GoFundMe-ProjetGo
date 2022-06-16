<?php
if (admin() != 1) {
    header("Location:index.php?page=gestion");
}
?>

<h2>Ajouter un projet</h2>

<?php
/*
        TESTER L'ENVOI DU FORMULAIRE
    */
if (isset($_POST['post'])) {
    $title = htmlspecialchars(trim($_POST['nom']));
    $content = htmlspecialchars(trim($_POST['content']));

    /*
        Permet de publier le projet ou non
            = 1 il sera publier
            = 0 il ne sera pas publier
     */
    $posted = isset($_POST['publication']) ? "1" : "0";

    /*
        Tableau qui envoi toutes les erreurs
     */
    $erreurs = [];

    /*
        Tous les champs doivent être remplis
     */
    if (empty($title) || empty($content)) {
        $erreurs['empty'] = "Veuillez remplir tous les champs";
    }

    /*
        Vérifier si le dossier image existe
     */
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image']['name'];
        /*
            Énumérer les extensions accépter à utiliser
         */
        $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF',];

        /*
            Récuperer l'extension du fichier 
         */
        $extension = strrchr($file, '.');

        /*
         *  Vérifier si l'extension ($extension)  se trouve dans le tableau ($extensions)
         */
        if (!in_array($extension, $extensions)) {
            $erreurs['image'] = "Extension image non valide !!!";
        }
    }

    if (!empty($erreurs)) {
?>
        <div class="card red">
            <div class="card-content white-text">
                <?php
                foreach ($erreurs as $erreur) {
                    echo $erreur . "<br/>";
                }
                ?>
            </div>
        </div>
        <?php
    } else {  //S'il n y a pas d'erreur
        /*  
            Appelle à la fonction qui rajoute le titre, le contenu 
            et qui détermine si le pjrojet soit publié ou non
        */
        post($title, $content, $posted);

        //Ajouter une condition si l'image existe
        if (!empty($_FILES['image']['name'])) {
            poste_img($_FILES['image']['tmp_name'], $extension);
        } else {
            //Récuper le dernier ID inserer 
            $id = $db->lastInsertId();

            //Rederiger l'utilisateur pour voir son projet publié

        ?>
            <!--Redériger l'utilisateur pour consulter la modification réalisée sur le projet-->
            <script>
                window.location.replace("index.php?page=liste_projet&id=<?= $_GET['id'] ?>");
            </script>
<?php
        }
    }
}
?>


<!-- enctype="multipart/form-data" permet d'envoyer des fichiers-->
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">announcement</i>
            <input type="text" name="nom" id="nom" />
            <label for="nom">Nom du projet</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">mode_edit</i>
            <textarea name="content" id="content" class="materialize-textarea"></textarea>
            <label for="content">Descriptif du projet</label>
        </div>

        <div class="col s12">
            <div class="file-field input-field">
                <div class="btn col s1">
                    <span>Image</span>
                    <input type="file" name="image" class="col s12" />
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate col s12" readonly />
                </div>
            </div>
        </div>

        <div class="col s6">
            <p>Publication</p>
            <div class="switch">
                <label>
                    Non
                    <input type="checkbox" name="publication" />
                    <span class="lever"></span>
                    Oui
                </label>
            </div>
        </div>

        <div class="col s6 right-align">
            <br /><br />
            <button class="btn" type="submit" name="post">Ajouter</button>
        </div>
    </div>
</form>