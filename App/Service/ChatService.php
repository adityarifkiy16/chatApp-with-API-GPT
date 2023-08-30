<?php

namespace Service {

    use Model\Chat;
    use Repository\chatRepository;

    interface chatService
    {
        public function saveHistory($uid, $response): bool;
        public function showChat($uid);
        public function removeChat($uid);
    }

    class chatServiceImpl implements chatService
    {
        public chatRepository $chatRepo;

        public function __construct($chatRepo)
        {
            $this->chatRepo = $chatRepo;
        }

        public function saveHistory($uid, $response): bool
        {
            $data = json_decode($response);
            foreach ($data as $message) {
                $chat = new Chat;
                $chat->setUid($uid);
                $chat->setType($message->type);
                $chat->setChat($message->content);
                $success = true;
                $chatSave = $this->chatRepo->save($chat);
                if ($chatSave) {
                    $success = true;
                } else {
                    $success = false;
                }
            }
            return $success;
        }

        public function showChat($uid)
        {
            $chatArray = $this->chatRepo->find($uid);
            return $chatArray;
        }

        public function removeChat($id)
        {
            $this->chatRepo->remove($id);
        }
    }
}
