<nav class="light-green">
  <div class="container">
    <div class="nav-wrapper">

      <a href="index.php?page=home" class="brand-logo" style="font-size: 25px; font-weight:bold">GoFundMe-ProjetGo</a>

      <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">

        <li class="<?php echo ($page == "home") ? "active" : ""; ?>">
          <a href="index.php?page=home" style="font-size: 15px; font-weight:bold;">Home</a>
        </li>

        <li class="<?php echo ($page == "projet") ? "active" : ""; ?>">
          <a href="index.php?page=projet" style="font-size: 15px; font-weight:bold">
            Projects</a>
        </li>

        <li class="<?php echo ($page == "signup") ? "active" : ""; ?>">
          <a href="gestion/index.php?page=signup" style="font-size: 15px; font-weight:bold">
            Sign Up</a>
        </li>

        <li class="<?php echo ($page == "login") ? "active" : ""; ?>">
          <a href="gestion/index.php?page=login" style="font-size: 15px; font-weight:bold">
            Sign In</a>
        </li>



      </ul>

      <ul class="side-nav" id="mobile-menu">
        <li class="<?php echo ($page == "home") ? "active" : ""; ?>"><a href="index.php?page=home">Home</a></li>
        <li class="<?php echo ($page == "projet") ? "active" : ""; ?>"><a href="index.php?page=projet">Projets</a></li>
        <li class="<?php echo ($page == "inscription") ? "active" : ""; ?>"><a href="gestion/index.php?page=inscription">Sign Up</a></li>
        <li class="<?php echo ($page == "login") ? "active" : ""; ?>"><a href="gestion/index.php?page=login">Sign Ip</a></li>
      </ul>

    </div>
  </div>
</nav>