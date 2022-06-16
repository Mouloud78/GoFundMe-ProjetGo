<?php
/*
    detruire la session de l'administrateur
 */
unset($_SESSION['admin']);

/*
    Redirection vers la page d'accueil
 */
header("Location:../");
