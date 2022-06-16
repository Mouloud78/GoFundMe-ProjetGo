/*
    Fonction qui permet d'afficher la modal de la page d'administration (gestion.php)
 */

$(document).ready(function () {
  $(".modal").modal();

  //effectuer la validation du projet
  $(".see_projet").click(function () {
    var id = $(this).attr("id");
    $.post("validation/see_projet.php", { id: id }, function () {
      /*
            Raffraichir la table après validation
         */
      $("#post_" + id).hide();
    });
  });

  //effectuer la suppression du projet
  $(".delete_projet").click(function () {
    var id = $(this).attr("id");
    $.post("validation/delete_projet.php", { id: id }, function () {
      /*
            Raffraichir la table après validation
         */
      $("#post_" + id).hide();
    });
  });
});
