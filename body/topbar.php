<nav class="light-blue">
  <div class="container">
    <div class="nav-wrapper">
      <a href="index.php?page=home" class="brand-logo">GoFundMe-ProjetGo</a>

      <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li class="<?php echo ($page == "home") ? "active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
        <li class="<?php echo ($page == "projet") ? "active" : ""; ?>"><a href="index.php?page=projet">Projets</a></li>
      </ul>

      <ul class="side-nav" id="mobile-menu">
        <li class="<?php echo ($page == "home") ? "active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
        <li class="<?php echo ($page == "projet") ? "active" : ""; ?>"><a href="index.php?page=projet">Projets</a></li>
      </ul>

    </div>
  </div>
</nav>