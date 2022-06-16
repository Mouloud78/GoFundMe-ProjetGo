<?php



if (isset($_POST['quitter'])) {
    if ($page = 'signup') {
        header("location:../index.php?page=home");
    }
}

//Vérifier si le boutton submit à été utilisé
if (isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $role = htmlspecialchars(trim($_POST['role']));
    $valide = htmlspecialchars(trim($_POST['valide']));
    $don = htmlspecialchars(trim($_POST['don']));


    //Vérifier si les champs envoyé ne sont pas vides
    $erreurs = [];
    if (empty($name) || empty($email)) {
        $erreurs['empty'] = "Veuillez remplir les champs";
    }

    //vérifier si l'adresse mail n'existe pas déja

    //if (email_prise($name)) {
    //   $erreurs['prise'] = "L'adresse émail déja utilisée";
    // }

    if (!empty($erreurs)) { //s'il ya des erreurs
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
    } else { //s'il n y a pas d'erreur
        ajout_utilisateur($name, $email, $password, $role, $don);
        header("location:index.php?page=login");
    }
}
?>


<div class="row" style="width: 500px; margin:auto">


    <h4>S'inscrire</h4>
    <form method="POST" style="height: 250px;">
        <div class="card-panel">

            <div class="row">
                <div>
                    <img src="../img/benevol.jpg" alt="administrateur" width="20%" />
                </div>
                <div class="col m12 s12">
                    <div class="input-field col s12">
                        <i class="material-icons">chat</i>
                        <input type="text" name="name" id="name" />
                        <label for="name" style="margin-left: 30px;">Nom</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons">email</i>
                        <input type="email" name="email" id="email" />
                        <label for="email" style="margin-left: 30px;">Adresse Email</label>
                    </div>
                    <div class="input-field  col s12">
                        <i class="material-icons">visibility_off</i>
                        <input type="password" name="password" id="password" />
                        <label for="password" style="margin-left: 30px;">Mot de passe</label>
                    </div>

                    <!--
                <div class="input-field col s12">
                    <i class="material-icons">account_circle</i>
                    <select name="role" id="role">
                        <option value="admin">Administrateur</option>
                        <option value="benev">Bénévol</option>
                    </select>
                    <label for="role" style="margin-left: 30px;">Fonction</label>
                </div>
                -->
                    <div class="input-field col s12">
                        <i class="material-icons">sentiment_very_satisfied</i>
                        <input type="text" name="don" id="don" value="0.00" />
                        <label for="don" style="margin-left: 30px;">Donner un don</label>
                    </div>

                    <div class="col m6 s12">
                        <button type="submit" name="submit" class="btn"><i class="material-icons left">control_point</i>Ajouter</button>
                    </div>

                    <div class="col m6 s12 right-align">
                        <button type="submit" name="quitter" class="btn"><i class="material-icons left">cancel</i>Quitter</button>
                    </div>


                </div>
            </div>
    </form>

</div>




</div>


<!--Script qui fait apparaitre la liste déroulante de Rôle-->
<script type="text/javascript">
    setTimeout(function() {
        $("select").material_select();
    }, 200);
</script>