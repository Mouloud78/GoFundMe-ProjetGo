<div class="row">

    <?php
    $tables = [
        "Projets" => "posts",
        "Administrateurs" => "admins"
    ];

    $couleur = [
        "posts" => "red",
        "admins" => "blue"
    ];
    ?>

    <?php
    //Récuperer le nom de la table
    foreach ($tables as $table_name => $table) {
    ?>
        <div class="col l4 m6 s12">
            <div class="card">
                <div class="card-content <?= couleur($table, $couleur); ?> white-text">
                    <!--Afficher le nom de la table-->
                    <span class="card-title"><?= $table_name; ?></span>
                    <?php
                    //Récuperer le resultat retourné par la fonction tableau
                    $nbID = tableau($table);
                    ?>
                    <!--Afficher le resultat -->
                    <h4><?= $nbID[0] ?></h4>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
/*
    On fait appelle à la fonction qui récupere les projets
*/
$projets = getProjets();
?>

<!--Afficher les projets dans la table-->
<table>
    <thead>
        <tr>
            <th>Projet</th>
            <th>Date publication</th>
            <th>Auteur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /*
            vérifier s'il ya des projets qui ne sont pas encore validé par l'administrateur
         */
        if (!empty($projets)) {

            /*
            On parcour le tableau projets ($projets)
        */
            foreach ($projets as $projet) {
        ?>
                <tr id="post_<?= $projet->id ?>">
                    <td><?= $projet->title ?></td>
                    <td><?= date("d/m/Y à H:i", strtotime($projet->date)); ?></td>
                    <td><?= $projet->name ?></td>
                    <td>

                        <a href="#" id="<?= $projet->id; ?>" class="btn-floating btn-small waves-effect waves-light green see_projet"><i class="material-icons">playlist_add</i></a>
                        <a href="#" id="<?= $projet->id; ?>" class="btn-floating btn-small waves-effect waves-light red delete_projet"><i class="material-icons">delete_sweep</i></a>
                        <a href="#projet_<?= $projet->id; ?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more</i></a>

                        <!--Créer et afficher la modal-->
                        <div class="modal" id="projet_<?= $projet->id ?>">
                            <div class="modal-content">
                                <!--Titre du projet-->
                                <h4><?= $projet->title; ?></h4>
                                <!--Celui qui a ajouté le projet-->
                                <p>
                                    Projet ajouté par <?= $projet->name . " (" . $projet->writer . ")</strong><br/>Le " . date("d/m/Y à H:i", strtotime($projet->date)) ?>
                                </p>
                                <hr />
                                <p>
                                    <?= substr(nl2br($projet->content), 0, 850) ?> ....
                                </p>
                            </div>
                            <!--Le footer de la fenetre modal-->
                            <div class="modal-footer">
                                <a href="#" id="<?= $projet->id; ?>" class="modal-action modal-close waves-effect waves-green btn-flat see_projet"><i class="material-icons">done</i></a>

                                <a href="#" id="<?= $projet->id; ?>" class="modal-action modal-close waves-effect waves-red btn-flat delete_projet"><i class="material-icons">delete</i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td></td>
                <td>
                    <center>Aucun projet à valider</center>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<p>


</p>