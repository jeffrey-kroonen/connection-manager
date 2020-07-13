<?php

    /**
     *  Require files.
     */
    require_once dirname(__DIR__) . "/bootstrap.php";

    /**
     *  Use classes.
     */
    use ConnectionManager\Src\Core\Route;

    /**
     *  Initialize pageConfig array.
     */
    $pageConfig = [];

    Route::add('/',function(){
        $pageConfig["title"] = "Dashboard";
        include DOCUMENT_ROOT . "/public/dashboard.php";
    }, "get");

    Route::add("/connection/create", function() {
        $pageConfig["title"] = "Create connection";
        include DOCUMENT_ROOT . "/public/connection/create.php";
    }, "get");

    Route::run("/connection-manager");

