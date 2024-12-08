<?php
namespace App\Models;
class User
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function __construct(string $firstname, string $lastname, string $email, string $password)
    {
        $this->firstname = $this->setFirstname($firstname);
        $this->lastname = $this->setLastname($lastname);
        $this->email = $this->setEmail($email);
        $this->password = $this->setPassword($password);
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname)
    {
        $this->firstname = $lastname;
    }

    public function setEmail(string $email)
    {
        $this->firstname = $email;
    }

    public function setPassword(string $password)
    {
        $this->firstname = $password;
    }
}