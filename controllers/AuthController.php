<?php
require_once '../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register($name, $phone, $password, $address)
    {

        //validate input
        if (empty($name) || empty($phone) || empty($password) || empty($address)) {
            return "Please fill in all fields";
        }
        //check phone if phone registered
        if ($this->userModel->getUserByPhone($phone)) {
            return "Phone number already registered";
        }

        $user = $this->userModel->register($name, $phone, $password, $address);

        if ($user) {
            $loggedUser = $this->userModel->getUserByPhone($phone);
            var_dump($loggedUser);
            session_start();
            $_SESSION['user'] = $loggedUser;
            header('Location: ../views/dashboard.php');
            exit;
        } else {
            return "Registration failed";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../views/login.php');
        exit;
    }
}
