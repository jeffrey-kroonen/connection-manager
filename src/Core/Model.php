<?php

    namespace ConnectionManager\Src\Core;

    /**
     *  Class Model.
     *
     *  @property string static $table the table name in database
     */
    abstract class Model
    {

        protected static $table;
        
        public static function find($mixed)
        {
            $connection = new Database;

            if (is_array($mixed)) {
                $query = "SELECT * FROM " . static::$table . " WHERE ".implode(" = ? AND ", array_keys($mixed)) . " = ?";
                $params = array_values($mixed);
            } else {
                $query = "SELECT * FROM " . static::$table . " WHERE " . static::$table . ".id = ?";
                $params = [$mixed];
            }
        
            $array = $connection->find($query, $params, false);
            if ($array !== false) return new static($array);
            
        }
        
        public static function where(array $where) : array
        {
            $connection = new Database;

            $query = "SELECT * FROM " . static::$table . " WHERE " . implode(" = ? AND ", array_keys($where)) . " = ?";
            
            $params = array_values($where);
            
            $objects = array();
            
            if (isset($query) && isset($params)) {
                $dataSet = $connection->find($query, $params);
                
                foreach ($dataSet as $object) {
                    array_push($objects, new static($object));
                }
                
            }
            return $objects;
        }
        
        public static function all() 
        {
            $connection = new Database;

            $objects = array();
            
            $query = "SELECT * FROM " . static::$table;
            
            $dataSet = $connection->find($query);
            
            foreach ($dataSet as $array) {
                array_push($objects, new static($array));
            }
            return $objects;
        }
        
        public function save() : void
        {
            $connection = new Database;

            $table = static::$table;

            $params = array();
            
            foreach ($this as $column => $value) {
                if ($connection->query("SELECT column_name FROM information_schema.columns WHERE table_name = ? and column_name = ?", [$table, $column])) {
                    $params[$column] = $value;
                }
            }

            if (isset($this->id) && !empty($this->id)) {
                $connection->update($table, $params, "WHERE id = ?", [$this->id]);
            } else {
                $connection->create($table, $params);
                $row = $connection->find("SELECT id FROM " . $table . " ORDER BY ID DESC LIMIT ?", [1], false);
                $this->id = $row["id"];
            }
        }
        
        public function delete()
        {
            $connection = new Database;

            $connection->delete(static::$table, ["id" => $this->id]);
        }
        
    }