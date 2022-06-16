<?php
if (admin() != 1) {
    header("Location:index.php?page=gestion");
}
?>

<?php


//Vérifier si le boutton submit à été utilisé
if (isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $role = htmlspecialchars(trim($_POST['role']));


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
        ajout_utilisateur($name, $email, $password, $role);
    }
}
?>


<div class="row">
    <div class="col m12 s12">
        <h4>Validation des bénevols</h4>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $benevols = getBenevol();
                foreach ($benevols as $benevol) {
                ?>
                    <tr>
                        <td><?= $benevol->name ?></td>
                        <td><?= $benevol->email ?></td>
                        <td><?= $benevol->role ?></td>
                        <td><i class="material-icons">
                                <!--Vérifier que le béne est validé ou non par l'administrateur-->
                                <?php
                                echo ($benevol->valide == "1") ? "verified_user" : "av_timer";
                                ?>
                            </i></td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>
    </div>

</div>
</div>

<!--Script qui fait apparaitre la liste déroulante de Rôle-->
<script type="text/javascript">
    setTimeout(function() {
        $("select").material_select();
    }, 200);
</script>