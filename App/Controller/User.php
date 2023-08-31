<?php

use Repository\UserRepositoryImpl;
use Service\UserServiceImpl;
use Config\Database;

class User extends Controller
{

    public function index()
    {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            header('Location:' . BASEURL . '/Chat');
        } else {
            $this->view("login/login");
        }
    }

    public function userObj()
    {
        $pdo = $this->getDatabaseConnection();
        $this->model('User');
        $userRepository = $this->repository('UserRepository', UserRepositoryImpl::class, $pdo);
        $userService = $this->service('UserService', UserServiceImpl::class, $userRepository);
        $userServiceImpl = new $userService($userRepository);
        return $userServiceImpl;
    }

    // * Login Handling

    public function loginUser()
    {
        // Check if the login form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validate user credentials
            $userData = $this->userObj()->validate($username, $password);

            if ($userData['valid']) {
                $_SESSION['user_id'] = $userData['user_id'];
                $_SESSION['username'] = $username;
                $_SESSION['login'] = true;
                echo "success";
                exit();
            } else if (!$username || !$password) {
                echo "invalid";
                exit();
            } else {
                echo "failed";
                exit();
            }
        } else {
            $this->view('login/login');
        }
    }


    public function logout()
    {
        session_start();
        session_destroy();
        header('Location:' . BASEURL . '/User');
    }

    // * Register Handling

    public function register()
    {
        $this->view("register/register");
    }

    public function registerHandling()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            if ($username && $password) {
                $regis = $this->userObj()->register($username, $password);
                if ($regis == true) {
                    echo "success";
                    exit();
                } else {
                    echo "failed conected to database";
                    exit();
                }
            } else if (!$username || !$password) {
                echo "invalid";
                exit();
            } else {
                echo "failed";
                exit();
            }
        }
    }
}
