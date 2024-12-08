<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\User;
class Backoffice
{

    public function dashboard(): void
    {
        $view = new View('BackOffice/dashboard.php', "back.php");
        $user = new User();
        $view->addData("logged", $user->isLogged());
    }

}