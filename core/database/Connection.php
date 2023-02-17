<?php

namespace App\Core\Database;
use PDO;
use Exception;
use Dotenv;

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(dirname(__DIR__)));
$dotenv->load();

class Connection{
    public static function make()
    {
        try{
            return new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}