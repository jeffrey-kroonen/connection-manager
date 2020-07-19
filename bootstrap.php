<?php

    /**
     * Start session.
     */
    session_start();

    /**
     *  Require files.
     */
    require_once __DIR__ . "/vendor/autoload.php";

    require_once __DIR__ . "/config/consts.php";

    require_once __DIR__ . "/config/db.php";

    /**
     * Current user.
     */
    if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) $_ENV["currentUser"] = ConnectionManager\Src\Model\User::find($_SESSION["user_id"]);