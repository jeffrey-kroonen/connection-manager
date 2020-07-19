<?php

    /**
     * Use classes.
     */
    use ConnectionManager\Src\Model\User;    

    /**
     * Set header
     */
    header("Content-Type: application/json");

    /**
     * Lgout current user.
     */
    try {
        $_ENV["currentUser"]->logout();
        die(json_encode(["msg" => "The user is successfully logged out."]));
    } catch (\Exception $e) {
        die(json_encode(["msg" => "An error occurred while trying to logout."]));
    }