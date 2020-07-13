<?php

namespace ConnectionManager\Src\Core;

  /**
   *  Class Database.
   */
  class Database 
  {
      private $connection;
    
      private $driver;
    
      private $host;
    
      private $db;
    
      private $username;
    
      private $password;
    
      private $settings;
    
      /** 
       *  constructor
       *
       *  include database config file and set it the values to properties
       *
       *  @return void
       *  @access public
       */
      public function __construct()
      {        
        $this->connection = null;
        
        $this->host = $_ENV["db"]["host"];
        
        $this->driver = $_ENV["db"]["driver"];
        
        $this->db = $_ENV["db"]["database"];
        
        $this->username = $_ENV["db"]["username"];
        
        $this->password = $_ENV["db"]["password"];
        
        $this->settings = $_ENV["db"]["settings"];
      }
    
      /**
       *  setConnection
       *
       *  @return void
       *  @access private
       */
      private function setConnection()
      {
        if (!is_null($this->connection)) return;
        try {
          switch ($this->driver) {
            case "MYSQL":
              $this->connection = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db . ";", $this->username, $this->password, $this->settings);
              break;
            case "PGSQL":
              $this->connection = new \PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db . ";", $this->username, $this->password, $this->settings);
              break;
          }
        } catch (\Exception $e) {
          echo "An error occured while trying to connect to the database <br> ErrorMessage: " . $e->getMessage();
        }
      }
    
      /**
       *  query
       *
       *  @param string $q the string to query on database
       *  @param array $parameters the paramaters to fill in the placeholders in the query string
       *  @return int count rows queried
       */
      public function query($q, $parameters = [])
      {
        $this->setConnection();
        $stmt = $this->connection->prepare($q);
        $stmt->execute($parameters);
        return $stmt->rowCount();
      }
    
      /**
       *  find
       *
       *  @param string $q the string to query on database
       *  @param array $parameters the paramaters to fill in the placeholders in the query string
       *  @param boolean $all determines if the return result will be single or multiple
       *  @return array founded record or records
       */
      public function find($q, $parameters = [], $all = true)
      {
        $this->setConnection();
        $stmt = $this->connection->prepare($q);
        $stmt->execute($parameters);
        if ($all) {
          return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
          return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
      }
    
    /**
     *  create
     *
     *  @param string $table the table to insert a new row to
     *  @param array $parameters the paramaters to fill in the placeholders in the query string
     *  @return int count rows queried
     */
    public function create($table, $parameters = [])
    {
      $this->setConnection();
      $q = "INSERT INTO ".$table." (".implode(', ', array_keys($parameters)).") VALUES (".str_repeat('?, ', sizeof($parameters)-1)." ?)";
      $stmt = $this->connection->prepare($q);
      $stmt->execute(array_values($parameters));
      return $stmt->rowCount();
    }
    
    /**
     *  update
     *
     *  @param string $table the table to insert a new row to
     *  @param array $values the values to update
     *  @param string $condition the condition where to update 
     *  @param array $parameters the paramaters to fill in the placeholders in the query string
     *  @return int count rows queried
     */
    public function update($table, $values = [], $condition, $parameters = [])
    {
      $this->setConnection();
      $q = "UPDATE $table SET ".implode(' = ?, ', array_keys($values))."= ? ".$condition;
      $stmt = $this->connection->prepare($q);
      $stmt->execute(array_merge(array_values($values), $parameters));
      return $stmt->rowCount();
    }
    
    /**
     *  delete
     *
     *  @param string $table the table to delete a row from
     *  @param array $parameters which field(s) with which value(s) to delete
     *  @return int count rows queried
     */
    public function delete($table, $parameters = [])
    {
      $this->setConnection();
      $q = "DELETE FROM ".$table." WHERE ".implode(' = ? AND ', array_keys($parameters))." = ? ";
      $stmt = $this->connection->prepare($q);
      $stmt->execute(array_values($parameters));
      return $stmt->rowCount();
    }
    
    /**
     *  beginTransaction
     *
     *  @return boolean
     *  @access public
     */
    public function beginTransaction()
    {
      $this->setConnection();
      if (!$this->connection->inTransaction()) return $this->connection->beginTransaction();
    }
    
    /**
     *  commit
     *
     *  @return boolean
     *  @access public
     */
    public function commit()
    {
      $this->setConnection();
      if ($this->connection->inTransaction()) return $this->connection->commit();
    }
    
    /**
     *  rollBack
     *
     *  @return boolean
     *  @access public
     */
    public function rollBack()
    {
      $this->setConnection();
      if ($this->connection->inTransaction()) return $this->connection->rollBack();
    }
    
  }