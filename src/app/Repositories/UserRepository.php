<?php
require_once __DIR__ . '/../Models/UserModel.php';

class UserRepository {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function getUserById($id) {
        return $this->model->select()->where('id', '=', $id)->first();
    }

    public function getUserByEmail($email) {
        return $this->model->select()->where('email', '=', $email)->first();
    }

    public function getAllUsers() {
        return $this->model->select()->get();
    }
}
