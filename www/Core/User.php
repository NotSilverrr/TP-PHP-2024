<?php
namespace App\Core;
class User
{

    public function isLogged(): bool
    {
        return false;
    }

    public function getRoles():array
    {
        return [];
    }

    public function logout():void
    {
        session_destroy();
    }

    public function login(): void
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
    }

    public function register(): void
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    }

}