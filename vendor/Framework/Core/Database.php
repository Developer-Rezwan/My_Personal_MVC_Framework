<?php


namespace App\Vendor\Framework\Core;


class Database
{
    public $pdo;
  public function __construct()
  {
      $dsn = $_ENV['DB_CONNECTION'].":host=localhost;port=".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_DATABASE'];
      $user = $_ENV['DB_USERNAME'];
      $password = $_ENV['DB_PASSWORD'];

      $this->pdo = new \PDO($dsn,$user,$password);
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
  }
}