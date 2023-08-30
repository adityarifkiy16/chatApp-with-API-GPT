<?php

use Repository\ChatRepositoryImpl;
use Service\ChatServiceImpl;
use Config\Database;


class Chat extends Controller
{
    public function chatObj()
    {
        $pdo = $this->getDatabaseConnection();
        $chat = $this->model('Chat');
        $chatRepository = $this->repository('ChatRepository', ChatRepositoryImpl::class, $pdo);
        $chatService = $this->service('ChatService', ChatServiceImpl::class, $chatRepository);
        return $chatService;
    }

    public function index()
    {
        session_start();
        if ($_SESSION['login'] == false) {
            header('Location:' . BASEURL . '/User');
        } elseif ($_SESSION['login'] == true) {
            $this->view('chat/chat');
        }
    }

    public function saveToDatabase()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $uid = $_SESSION['user_id'];
            $saveHist = $this->chatObj()->saveHistory($uid, $_POST['response']);
            if ($saveHist === true) {
                echo 'OK' . PHP_EOL;
            } else {
                echo 'FAIL' . PHP_EOL;
            }
            echo $uid;
        }
    }

    public function showData()
    {
        session_start();
        $uid = $_SESSION['user_id'];
        $jsonData = $this->chatObj()->showChat($uid);
        echo $jsonData;
    }
}
