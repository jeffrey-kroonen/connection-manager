<?php

    namespace ConnectionManager\Src\Core;

    /** 
     * Class Guard.
     */
    class Guard
    {
        /** 
         * authenticated
         * 
         * @return boolean
         * @access public
         */
        public static function authenticated()
        {
            if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) return true;
            return false;
        }

        /**
         * role
         *
         * @param string    $role the role the user needs to have
         * @return boolean
         * @access public
         */
        public static function role($role)
        {
            if (isset($_SESSION["role"]) && !empty($_SESSION["role"])) {
                if (is_array($role)) {
                    foreach ($role as $r) {
                        if ($_SESSION["role"] == $r) return true;
                    }
                } else {
                    if ($_SESSION["role"] == $role) return true;
                }
            }
            return false;
        }

        /**
         * redirectLogin
         *
         * @return void
         * @access public
         */
        public static function redirectLogin()
        {
            header("location:" . URL . "/login");
        }
    }