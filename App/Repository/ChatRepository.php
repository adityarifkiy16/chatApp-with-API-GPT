<?php

namespace Repository {

    use Model\Chat;
    use PDO;

    interface chatRepository
    {
        public function find($uid);
        public function save(chat $chat): void;
        public function remove(int $uid): bool;
    }

    class ChatRepositoryImpl implements chatRepository
    {
        private \PDO $con;

        function __construct($con)
        {
            $this->con = $con;
        }

        public function find($uid)
        {
            $query = "SELECT
            user.id AS user_id,
            reqChat.id AS chat_id,
            reqChat.request_chat AS chat_content,
            reqChat.time as time,
            'request' AS type
        FROM
            user
        JOIN
            reqChat ON user.id = reqChat.user_id
        WHERE
            user.id = :uid
        
        UNION
        
        SELECT
            user.id AS user_id,
            resChat.id AS chat_id,
            resChat.response_chat AS chat_content,
            resChat.time as time,
            'response' AS type
        FROM
            user
        JOIN
            resChat ON user.id = resChat.user_id
        WHERE
            user.id = :uid
        ";

            $result = $this->con->prepare($query);
            $result->bindParam(":uid", $uid);
            $result->execute();
            $chatArray = [];

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $chat = new Chat();
                $chat->setUid($row['user_id']);
                $chat->setId($row['chat_id']);
                $chat->setChat($row['chat_content']);
                $chat->setType($row['type']);
                $chat->setTime($row['time']);
                $chatArray[] = $chat;
            }
            $chatData = [];
            foreach ($chatArray as $chat) {
                $chatData[] = $chat->jsonSerialize();
            }
            $jsonData = json_encode($chatData);
            return $jsonData;
        }

        public function save(Chat $chat): void
        {

            if ($chat->getType() === 'response') {
                $query = "INSERT INTO resChat(user_id, response_chat) VALUES (?, ?)";
                $result = $this->con->prepare($query);
                $result->execute([$chat->getUid(), $chat->getChat()]);
            } elseif ($chat->getType() === 'request') {
                $query = "INSERT INTO reqChat(user_id, request_chat) VALUES (?, ?)";
                $result = $this->con->prepare($query);
                $result->execute([$chat->getUid(), $chat->getChat()]);
            }
        }

        public function remove(int $id): bool
        {
            $sql = "SELECT id FROM chat WHERE id = ?";
            $result = $this->con->prepare($sql);
            $result->execute([$id]);

            if ($result->fetch()) {
                $sql = "DELETE FROM Todolist Where id = ?";
                $result = $this->con->prepare($sql);
                $result->execute([$id]);
                return true;
            } else {
                return false;
            }
        }
    }
}
