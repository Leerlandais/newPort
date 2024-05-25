<header class="mt-3">
<p class="h1 text-center" id="homeH1">Hi</p>

<nav class="navbar">
<div class="container-fluid">

    <div class="collapse-sm navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row justify-content-evenly">
      <li class="nav-item">
        <a class="nav-link" href="?" id="navHome"></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="./" id="navContact"></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="./" id="navAbout"></a>
        </li>

    <?php if(!isset($_SESSION["id"])) {
      ?>
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="?login" id="navLogin"></a>
        </li>
        <?php
        }else {
          ?>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="?logout" id="navLogout"></a>
          </li>
          <?php
        }
        ?>
      <!--
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
-->
<form method="POST" class="d-flex flex-row">
    <button class="btn" value="en" type="submit" name="user_lang"><img src="img/gb.svg" alt="gbFlag" class="langFlag"></button>
    <button class="btn" value="fr" type="submit" name="user_lang"><img src="img/fr.svg" alt="frFlag" class="langFlag"></button>
</form>
</div>
  </div>
</nav>
</header>