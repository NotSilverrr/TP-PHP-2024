<?php
namespace App\Controllers;

use App\Core\SQL;
use App\Core\User as U;
use App\Core\View;

class User
{

    public function register(): void
    {
        $view = new View("User/register.php", "back.php");
        //echo $view;
    }

    public function login(): void
    {
        $view = new View("User/login.php", "back.php");
    }

    public function loginPost(): void
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = new SQL();
        $sql->login($email, $password);
    }

    public function registerPost(): void
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = new SQL();
        $sql->register($firstname, $lastname, $email, $password);
    }

    public function logout(): void
    {
        $user = new U();
        $user->logout();
        echo "Déconnexion";
    }

}