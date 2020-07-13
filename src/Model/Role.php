<?php

    namespace ConnectionManager\Src\Model;

    use ConnectionManager\Src\Core\Model;

    /**
     * Class Role.
     */
    class Role extends Model
    {
        protected static $table = "roles";

        public $description;

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
            }
        }
    }