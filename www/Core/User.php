<?php
namespace App\Core;
class User
{

    public function isLogged(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user']);
    }

    public function getRoles():array
    {
        return [];
    }

    public function logout():void
    {
        session_start();
        session_unset();
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