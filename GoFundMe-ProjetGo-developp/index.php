<?php

include 'functions/main-functions.php';

$pages = scandir('pages/');
if (isset($_GET['page']) && !empty($_GET['page'])) {
    if (in_array($_GET['page'] . '.php', $pages)) {
        $page = $_GET['page'];
    } else {
        $page = "error";
    }
} else {
    $page = "home";
}

$pages_functions = scandir('functions/');
if (in_array($page . '.func.php', $pages_functions)) {
    include 'functions/' . $page . '.func.php';
}
?>

<!DOCTYPE html>
<html>

<head>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->

    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GoFundMe-ProjetGo</title>




</head>

<body>


    <?php
    include 'body/topbar.php';
    ?>
    <div class="container">
        <?php
        include 'pages/' . $page . '.php';
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <!--<script src="js/materialize.js"></script>-->
    <script type="text/javascript" src="js/script.js"></script>


    <?php
    $pages_js = scandir('js/');
    if (in_array($page . '.func.js', $pages_js)) {
    ?>
        <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
    <?php
    }
    ?>

    <footer class="page-footer light-green" style="height:130px ;">
        <div class="container" style="text-align:center ;">
            © 2022 Copyright projet GofundMe and ProjetGo
        </div>
    </footer>


</body>

</html>