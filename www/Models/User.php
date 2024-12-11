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
        $firstname = ucfirst(trim($firstname));
        if (!isset($firstname) || $firstname == "") {
            throw new \InvalidArgumentException("The firstname is required");
        }
        $this->firstname = ucfirst($firstname);
    }

    public function setLastname(string $lastname): void
    {
        $lastname = strtoupper(trim($lastname));
        if (!isset($lastname) || $lastname == "") {
            throw new \InvalidArgumentException("The lastname is required");
        }
        $this->lastname = $lastname;
    }

    public function setEmail(string $email): void
    {
        $email = strtolower(trim($email));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format");
        }
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,20}$/', $password)) {
            throw new \InvalidArgumentException("Veuillez entrer un mot de passe valide : <ul><li>Au moins une lettre minuscule</li><li>Au moins une lettre majuscule</li><li>Au moins un chiffre</li><li>Au moins un caractère spécial (non alphanumérique et non un espace)</li><li>Le mot de passe doit être compris entre 8 et 20 caractères</li></ul>");
        }
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