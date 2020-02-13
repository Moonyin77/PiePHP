<?php

namespace Model;
use Core\Database;

class UserModel extends Database
{
    private $email;
    private $password;
    
    public function Save($email, $password)
    {    
        $sql = 'INSERT INTO users(email, password) VALUES ("' . htmlspecialchars($email) . '","' . $password . '")';
        $exe = $this->pdo->prepare($sql); //création de la requête sql pour aller chercher tous nos articles.
        $exe->execute(array ($email, $password, PASSWORD_DEFAULT));
    }
    
    public function Mailexist($email)
    {
        $reqmail = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
        $reqmail->execute(array($email));
        return $mailexist = $reqmail->rowCount();
    }
    
    public function Login($emailconnect, $passwordconnect)
    {
        $sql = "SELECT email, password FROM users WHERE email = '$emailconnect' AND password = '$passwordconnect' ";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }

    public function Iduser ($email)
    {
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }

    public function Emailedit($email, $id)
    {
        // var_dump($id);
        $sql = 'UPDATE users SET email = "' . $email . '" WHERE id = "'. $id .'"';
        $req = $this->pdo->prepare($sql);
        $req->execute();
    }

    public function Passwordedit($password, $id)
    {
        // var_dump($id);
        $sql = 'UPDATE `users` SET `password`= "' . $password . '" WHERE `id` = "' . $id . '"';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        // var_dump($req);
    }

    public function Deleteprofil($id)
    {
        $sql = 'DELETE FROM users WHERE id = "' . $id . '"';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        // var_dump($req);
    }
}