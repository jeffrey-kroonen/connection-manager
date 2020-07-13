<?php

    /**
     *  Set database configuration.
     */
    $_ENV["db"] = [
        "host" => "localhost",
        "driver" => "MYSQL", //MYSQL | PGSQL
        "database" => "connection_manager",
        "username" => "root",
        "password" => "",
        "settings" => [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_EMULATE_PREPARES => false
                      ]
    ];