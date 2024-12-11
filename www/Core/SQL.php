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

    public function insert(string $table, array $data): bool
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $queryPrepared = $this->pdo->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
        return $queryPrepared->execute($data);
    }

    public function getOneByEmail(string $table, string $email): ?array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM $table WHERE email = :email");
        $queryPrepared->execute(['email' => $email]);
        return $queryPrepared->fetch(\PDO::FETCH_ASSOC) ?: null;
    }

}