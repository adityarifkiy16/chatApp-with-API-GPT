<?php

namespace Model {
    class Chat
    {
        private int $uid;
        private int $id;
        private string $chat;
        private string $type;
        private string $time;

        // ! getter

        public function getUid()
        {
            return $this->uid;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getChat()
        {
            return $this->chat;
        }

        public function getType()
        {
            return $this->type;
        }

        public function getTime()
        {
            return $this->time;
        }

        // ! setter

        public function setUid($uid)
        {
            $this->uid = $uid;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setChat($chat)
        {
            $this->chat = $chat;
        }

        public function setType($type)
        {
            $this->type = $type;
        }

        public function setTime($time)
        {
            $this->time = $time;
        }

        public function jsonSerialize()
        {
            return [
                'uid' => $this->getUid(),
                'id' => $this->getId(),
                'chat' => $this->getChat(),
                'type' => $this->getType(),
                'time' => $this->getTime(),
            ];
        }
    }
}
