<?php
namespace App\Models;

class User
{
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;

    public function __construct(string $firstname, string $lastname, string $email, string $password)
    {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    // ------------------ Setters ------------------

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format");
        }
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }


    // --------------------- Getters ---------------------

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}