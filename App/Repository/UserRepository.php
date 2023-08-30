<?php

namespace Repository {

    use Model\User;

    interface UserRepository
    {
        function findUsername(string $user);
        function registerUsername(string $user, string $password);
    }

    class UserRepositoryImpl implements UserRepository
    {
        private \PDO $con;

        function __construct($con)
        {
            $this->con = $con;
        }

        function findUsername(string $user): ?User
        {
            $query = "SELECT Id, username, password FROM user WHERE username = :username";
            $result = $this->con->prepare($query);
            $result->bindParam("username", $user);
            $result->execute();
            $row = $result->fetch();

            if ($row === false) {
                return null;
            }

            $user = new User();
            $user->setId($row['Id']);
            $user->setUsername($row['username']);
            $user->setPassword($row['password']);
            return $user;
        }

        function registerUsername(string $user, string $password)
        {
            $sql = "INSERT INTO user(username, password) VALUES (?, ?)";
            $result = $this->con->prepare($sql);
            $result->execute([$user, $password]);
        }
    }
}
