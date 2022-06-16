<nav class="light-green">

    <div class="container">

        <div class="nav-wrapper">

            <a href="#" class="brand-logo" style="font-size: 25px; font-weight:bold">Administration</a>

            <?php
            if ($page != 'login' && $page != 'signup') {
            ?>
                <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">



                    <?php
                    if (admin() == 1) {
                    ?>
                        <li class="<?php echo ($page == "gestion") ? "active" : ""; ?>"><a href="index.php?page=gestion" style="font-size: 25px; font-weight:bold"><i class="material-icons">format_list_numbered</i></a></li>

                        <li class="<?php echo ($page == "new_projet") ? "active" : ""; ?>"><a href="index.php?page=new_projet" style="font-size: 25px; font-weight:bold"><i class="material-icons">fiber_new
                                </i></a></li>

                        <li class="<?php echo ($page == "liste_projet") ? "active" : ""; ?>"><a href="index.php?page=liste_projet" style="font-size: 25px; font-weight:bold"><i class="material-icons">format_align_justify</i></a></li>

                        <li class="<?php echo ($page == "parametre") ? "active" : ""; ?>"><a href="index.php?page=parametre" style="font-size: 25px; font-weight:bold"><i class="material-icons">build</i></a></li>
                    <?php
                    }
                    ?>

                    <li><a href="index.php?page=logout"><i class="material-icons">lock</i>
                    </li>

                </ul>
            <?php
            }
            ?>
            <?php
            if ($page != 'login' && $page != 'signup') {
            ?>
                <ul class="side-nav" id="mobile-menu">
                    <li class="<?php echo ($page == "gestion") ? "active" : ""; ?>"><a href="index.php?page=gestion">Gestion</a></li>
                    <?php
                    if (admin() == 1) {
                    ?>
                        <li class="<?php echo ($page == "new_projet") ? "active" : ""; ?>"><a href="index.php?page=new_projet">Nouveau projet</a></li>


                        <li class="<?php echo ($page == "liste_projet") ? "active" : ""; ?>"><a href="index.php?page=liste_projet">Liste des projets</a></li>

                        <li class="<?php echo ($page == "parametre") ? "active" : ""; ?>"><a href="index.php?page=parametre">Paramètres</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="index.php?page=logout">Logout</a></li>

                </ul>
            <?php
            }
            ?>

        </div>
    </div>
</nav>