<?php

namespace Controller;

use Core\Controller;
Use Model\UserModel;

class UserController extends Controller
{
    
    public function addAction()
    {
        echo "test addaction";
        // $this->render("register");
    }
    
    public function registerAction()
    {   
        $this->render("register");
        $register = new UserModel;
        
        foreach ($_POST AS $value)
        {
            if (empty($value))
            {   
                echo "Tous les champs doivent être complétés !";
                return false;
            }
        }
        
        if ($_POST && $_POST['email'] && $_POST['password'])
        {
            if ($register->Mailexist($_POST['email']) > 0)
            {
                echo "Adresse mail déjà utilisée !";
                return false;
            }
            else
            {
                $register->save($_POST['email'], $_POST['password']);
                echo "Votre compté a bien été créer !";
            }
        }
    }
    
    public function loginAction()
    {
        $this->render("login");
        $login = new UserModel;
        if (isset($_POST['emailconnect']) && isset($_POST['passwordconnect']))
        {
            $connect = $_POST['emailconnect'];
            $password = $_POST['passwordconnect'];
            if ($login->Login($connect, $password) == true)
            {
                session_start();
                //$_SESSSION['id'] = 
                $_SESSION['email'] = $connect;
                $_SESSION['password'] = $password;
                echo "Tu es connecté";
            }
            else
            {
                echo "Mauvais email ou mot de passe !";
            }
        }
    }

    public function profilAction()
    {
        $this->render("profil");
    }

    public function editAction()
    {
        $this->render("edit");
        $edit = new UserModel;
        $emailedit = $_SESSION['email'];
        $passwordedit = $_SESSION['password'];
        if(isset($_POST['emailedit']) && !empty($_POST['emailedit'])) 
        {
            $rec = $edit->Iduser($emailedit);
            // var_dump($test[0]);
            $edit->Emailedit($_POST['emailedit'], $rec[0]);
        }
        if(isset($_POST['passwordedit']) && !empty($_POST['passwordedit']))
        {
            $rec = $edit->Iduser($emailedit);
            $edit->Passwordedit($_POST['passwordedit'], $rec[0]);
        }
    }

    public function deleteAction()
    {
        session_start();
        $delete = new UserModel;
        $rec = $delete->Iduser($_SESSION['email']);
        $delete->DeleteProfil($rec[0]);
        echo "Votre compte a bien été delete <a href='register'>Register</a>";
    }

    public function decoAction()
    {
        $this->render("deco");
    }
}