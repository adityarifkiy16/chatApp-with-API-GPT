<?php

namespace Service {

    use Repository\UserRepository;

    interface UserService
    {
        function validate(string $user, string $password): array;
        function register(string $user, string $password): bool;
    }

    class UserServiceImpl implements UserService
    {
        private UserRepository $userRepository;

        public function __construct($userRepo)
        {
            $this->userRepository = $userRepo;
        }

        function validate(string $user, string $password): array
        {
            $finduser = $this->userRepository->findUsername($user);
            if ($finduser && password_verify($password, $finduser->getPassword())) {
                return [
                    'valid' => true,
                    'user_id' => $finduser->getId()
                ];
            } else {
                return [
                    'valid' => false
                ];
            }
        }
        function register(string $user, string $password): bool
        {
            $finduser = $this->userRepository->findUsername($user);
            if ($finduser == null) {
                $this->userRepository->registerUsername($user, $password);
                return true;
            } else {
                return false;
            }
        }
    }
}
