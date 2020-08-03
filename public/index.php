<?php

    /**
     *  Require files.
     */
    require_once dirname(__DIR__) . "/bootstrap.php";

    /**
     *  Use classes.
     */
    use ConnectionManager\Src\Core\Route;
    use ConnectionManager\Src\Core\Guard;    

    /**
     *  Initialize pageConfig array.
     */
    $pageConfig = [];

    Route::add('/',function(){
        if (!Guard::role(["user", "administrator"])) Guard::redirectLogin();

        $pageConfig["title"] = "Dashboard";
        include DOCUMENT_ROOT . "/public/dashboard.php";
    }, "get");

    Route::add("/login", function() {
        if (Guard::authenticated()) header("location:" . URL);

        $pageConfig["title"] = "Login";
        $pageConfig["javascript"] = ["auth.js"];
        include DOCUMENT_ROOT . "/public/auth/login.php";
    }, "get");

    Route::add("/login", function() {
        if (Guard::authenticated()) header("location:" . URL);
        
        include DOCUMENT_ROOT . "/public/http/auth/login.php";
    }, "post");

    Route::add("/logout", function() {
        if (!Guard::authenticated()) Guard::redirectLogin();

        include DOCUMENT_ROOT . "/public/http/auth/logout.php";
    }, "get");

    Route::add("/connection/create", function() {
        if (!Guard::role(["user", "administrator"])) Guard::redirectLogin();

        $pageConfig["title"] = "Create connection";
        include DOCUMENT_ROOT . "/public/connection/create.php";
    }, "get");

    Route::add("/connection/create", function() {
        if (!Guard::role(["user", "administrator"])) Guard::redirectLogin();

        include DOCUMENT_ROOT . "/public/http/connection/create.php";
    }, "post");

    Route::pathNotFound(function() {
        include DOCUMENT_ROOT . "/public/404.php";
    });

    Route::run("/connection-manager");

