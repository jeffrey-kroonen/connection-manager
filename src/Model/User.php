<?php

    namespace ConnectionManager\Src\Model;

    use ConnectionManager\Src\Core\Model;
    use ConnectionManager\Src\Utility\Auth;

    /**
     * Class User.
     */
    class User extends Model
    {
        use Auth;

        protected static $table = "users";

        public $id;

        public $role_id;

        public $first_name;

        public $last_name;

        public $full_name;

        public $email;

        public $password;

        public $last_login;

        /**
         * constructor
         * 
         * @param null|array $data
         * @return void
         * @access public 
         */
        public function __construct($data)
        {
            if (is_array($data)) {
                foreach ($data as $column => $value) {
                    $this->$column = $value;
                }
                $this->setFullName();
            }
        }

        /**
         * setFullName
         * 
         * @return void
         * @access public
         */
        private function setFullName()
        {
            $this->full_name = $this->first_name . " " . $this->last_name;
        }

        /**
         * generatePassword
         *
         * @return string
         * @access public
         */
        public function generatePassword()
        {
            return uniqid() . base64_encode(date("s"));
        }
        
    }