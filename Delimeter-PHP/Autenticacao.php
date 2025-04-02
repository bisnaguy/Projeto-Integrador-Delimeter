<?php

include_once 'repository/UserRepository.php';
include_once 'model/UserComum.php';

class Autenticacao {

    private $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
        session_start(); // Inicia a sessão
    }

    public function login($email, $password) {
        $user = new UserComum();
        $user = $this->userRepository->findByEmailPassword($email);
        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_name'] = $user->getNome();
            return true;
        }
        return false;
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_name']);
    }

    public function getUserName() {
        return isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
    }
}