<?php

  use ConnectionManager\Src\Helper\UrlHelper;

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand text-light" href="<?= URL; ?>">CONNECTION MANAGER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?= UrlHelper::navigationActive("/", true); ?>" href="<?= URL; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= UrlHelper::navigationActive("/connection",); ?>" href="<?= URL; ?>/connection">Connections</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Pricing</a>
      </li>
    </ul>
    <div class="dropdown">
      <a class="nav-link dropdown-toggle pl-0 text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $_ENV["currentUser"]->first_name . " " . $_ENV["currentUser"]->last_name; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= URL; ?>/logout">logout</a>
      </div>
    </div>
  </div>
</nav>