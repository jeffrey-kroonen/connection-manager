<?php

    namespace ConnectionManager\Src\Utility;

    use ConnectionManager\Src\Core\Database;

    /**
     * Trait Auth.
     */
    Trait Auth
    {
        /**
         * veriftLength
         * 
         * @param string $string
         * @param int $min The minimum allowed length of the string.
         * @param int @man The maximum allowed length of the string.
         * @return boolean
         * @access public
         */
        public function verifyLength($string, $min, $max)
        {
            if (strlen($string) < $min || strlen($string) > $max) return false;
            return true;
        }

        /**
         * login
         * 
         * Checks if id isset on user object. 
         * Then set session variables and update last login date time.
         * 
         * @return void
         * @access public
         */
        public function login()
        {
            if (isset($this->id) && !empty($this->id)) {
                $_SESSION["user_id"] = $this->id;
                $_SESSION["role_id"] = $this->role_id;
                $_SESSION["authenticated"] = true;

                $this->last_login = date("Y-m-d H:i:s");
                $this->save();
            }
        }

        /**
         * logout
         * 
         * @return void
         * @access public
         */
        public function logout()
        {
            session_destroy();
        }
    }