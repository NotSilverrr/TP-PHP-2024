<?php

namespace App\Core;

class SQL
{

    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new \PDO("mysql:host=mariadb;dbname=esgi","esgi","esgipwd");
        }catch(\Exception $e){
            die("Erreur SQL :".$e->getMessage());
        }
    }

    public function getOneById(string $table,int $id): array
    {
       $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$table." WHERE id=:id");
       $queryPrepared->execute([
               "id"=>$id
           ]);
       return $queryPrepared->fetch();
    }

    public function login(string $email, string $pwd) 
    {
        
        $queryPrepared = $this->pdo->prepare("SELECT * FROM user WHERE email=:email AND password=:password");
        $queryPrepared->execute([
            "email"=>$email,
            "password"=>$pwd
        ]);
        $user = $queryPrepared->fetch();
        if($user){
            $_SESSION["user"] = $user;
            header("Location:/");
        }else{
            echo "Erreur de connexion";
        }
    }

    public function register(string $firstname, string $lastname, string $email, string $password)
    {
        $queryPrepared = $this->pdo->prepare("INSERT INTO user (firstname,lastname,email,password) VALUES (:firstname,:lastname,:email,:password)");
        $queryPrepared->execute([
            "firstname"=>$firstname,
            "lastname"=>$lastname,
            "email"=>$email,
            "password"=>$password
        ]);
        header("Location:/");
    }

}