<?php

if (isset($_POST['quitter'])) {
    if ($page = 'signup') {
        header("location:../index.php?page=home");
    }
}

//si la session est déja ouverte
if (isset($_SESSION['admin'])) {
    //rediriger vers la page d'administration
    header("Location:index.php?page=gestion");
}
?>


<div class="row">
    <div class="col l5 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/admin.jpg" alt="administrateur" width="100%" />
                </div>
            </div>

            <h4 class="center-align">Se connecter</h4>

            <?php
            //Vérifier si les deux champs existent
            if (isset($_POST['submit'])) {

                //sécuriser les deux champs lors de la saisie de l'utilisateur
                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));

                //Vérifier si les deux champs sont vide ou non
                $errors = [];
                if (empty($email) || empty($password)) {
                    $errors['empty'] = "Remplir tous les champs ... !";

                    //Si administrateur n'existe pas
                } else if (administrateur_existe($email, $password) == 0) {
                    $errors['existe'] = "Cet administrateur n'existe pas";
                }

                //Vérifier si le tableau errors n'est pas vide, s'il n'est pas vide affiche les erreurs
                if (!empty($errors)) {
            ?>
                    <div class="card red">
                        <div class="card-content white-text">
                            <?php
                            foreach ($errors as $error) {
                                echo $error . "<br />";
                            }
                            ?>
                        </div>
                    </div>
            <?php
                } else {
                    //Créer une session pour l'administrateur connécté
                    $_SESSION['admin'] = $email;

                    //rediriger l'administrateur connecté a la page d'administration
                    header("Location:index.php?page=gestion");
                }
            }
            ?>

            <form method="POST">
                <div class="row">

                    <div class="input-field col s12">
                        <i class="material-icons">chat</i>
                        <input type="email" id="email" name="email" />

                        <label for="email" style="margin-left: 30px;">Votre Email</label>

                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons">lock</i>
                        <input type="password" id="password" name="password" />
                        <label for="password" style="margin-left: 30px;">Votre mot de passe</label>
                    </div>
                </div>
                <!--
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password" name="password" />
                        <label for="password">Votre mot de passe</label>
                    </div>
                </div>
                -->
                <div class="row">
                    <div class="col m6 s12">
                        <button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
                            <i class="material-icons left">perm_identity</i>Connexion
                        </button>
                    </div>
                    <div class="col m6 s12 right-align">
                        <button type="submit" name="quitter" class="waves-effect waves-light btn light-blue">
                            <i class="material-icons left">cancel</i>Quitter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>