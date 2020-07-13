<?php

    /**
     * Require files.
     */
    require_once dirname(__DIR__, 3) . "/bootstrap.php";

    /**
     * Use classes.
     */
    use ConnectionManager\Src\Core\Guard;

    /**
     * Verify user role.
     */
    if (!Guard::role(["user", "administrator"])) header("location:" . URL);
    