<?php
require_once __DIR__ . '/../Repositories/UserRepository.php';

class UserService {
    private UserRepository $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function getAllUsers(): array {
        return $this->userRepository->getAllUsers();
    }

    public function getUserById(int $id) {
        return $this->userRepository->getUserById($id);
    }
}
