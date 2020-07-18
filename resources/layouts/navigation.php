<?php

  use ConnectionManager\Src\Helper\UrlHelper;

?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-light" href="<?= URL; ?>">CONNECTION MANAGER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
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
  </div>
</nav>