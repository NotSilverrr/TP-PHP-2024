<?php
namespace App\Controllers;

use App\Core\SQL;
use App\Core\User as U;
use App\Core\View;
use App\Models\User as MUser;

class User
{

    public function register(): void
    {
        $view = new View("User/register.php", "back.php");
        // $view->addData('error', null);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = $_POST['firstname'] ?? '';
            $lastname = $_POST['lastname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            try {
                $user = new MUser($firstname, $lastname, $email, $password);
                $sql = new SQL();
                $sql->insert('user', [
                    'firstname' => $user->getFirstname(),
                    'lastname' => $user->getLastname(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword()
                ]);
                header('Location: /login');
                exit;
            } catch (\Exception $e) {
                $view->addData('error', $e->getMessage());
            }
        }
    }

    public function login(): void
    {
        $view = new View("User/login.php", "back.php");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = strtolower($_POST['email']);
            $password = $_POST['password'];
            try {
                $sql = new SQL;
                $user = $sql->getOneByEmail('user', $email);


                if (!$user || !password_verify($password, $user["password"])){
                    throw new \Exception("Email ou mot de passe incorrect");
                }
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /backoffice');
                exit();
            } catch (\Exception $e) {
                $view->addData('error', $e->getMessage());
            }

        }
    }


    public function logout(): void
    {
        $user = new U();
        $user->logout();
        header('Location: /login');
        exit();
    }

}