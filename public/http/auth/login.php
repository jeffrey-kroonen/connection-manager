<?php

    /**
     * Require files.
     */
    require_once dirname(__DIR__, 3) . "/bootstrap.php";

    /**
     * Use classes.
     */
    use ConnectionManager\Src\Model\User;    

    /**
     * Set header
     */
    header("Content-Type: application/json");

    /**
     * Set variables.
     */
    $email = (isset($_POST["email"]) && !empty($_POST["email"])) ? $_POST["email"] : null;
    $password = (isset($_POST["password"]) && !empty($_POST["password"])) ? $_POST["password"] : null;

    if (is_null($email) || is_null($password)) die(json_encode(["msg" => "Not all fields are completed."]));

    /**
     * Get ConnectionManager\Src\Model\User.
     */
    $user = User::find(["email" => $email]);

    /**
     * Verify user exists.
     */
    if (is_null($user)) die(json_encode(["msg" => "User not found."]));

    /**
     * Verify password.
     */
    if (!password_verify($password, $user->password)) die(json_encode(["msg" => "Password is incorrect."]));

    /**
     * Login user.
     */
    try {
        $user->login();
        die(json_encode(["msg" => "The user is successfully logged in."]));
    } catch (\Exception $e) {
        die(json_encode(["msg" => "An error occurred while trying to login."]));
    }
    