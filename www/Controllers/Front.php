<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\User;
class Front
{

    public function homepage(): void
    {
        $view = new View('Front/homepage.php', "front.php");
        $user = new User();
        $view->addData("logged", $user->isLogged());
    }

}