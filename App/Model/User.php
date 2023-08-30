<?php

namespace Model {
    class User
    {
        private int $id;
        private string $username;
        private string $password;

        public function __construct(string $username = '', string $pass = '')
        {
            $this->username = $username;
            $this->password = $pass;
        }

        // ! Getter 

        public function getId()
        {
            return $this->id;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function getPassword()
        {
            return $this->password;
        }

        // ! Setter

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }
    }
}
