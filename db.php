<?php
  class Database {

    private $host;
    private $user;
    private $pass;
    private $dbName;

    public function connect() {

      $this->host     = 'localhost';
      $this->user     = 'root';
      $this->pass     = '';
      $this->dbName   = 'crud';

      $connect = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName) or die(mysqli_error($connect));

      return $connect;

    }

  }
