<?php
require_once __DIR__ . '/../Services/UserService.php';
require_once __DIR__ . '/../Enums/HttpStatus.php';

use App\Enums\HttpStatus;

class UserController {
    private UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function index() {
        $users = $this->userService->getAllUsers();
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    public function show($id) {
        // Validate
        if (empty($id) || !is_numeric($id)) {
            http_response_code(HttpStatus::BAD_REQUEST);
            echo json_encode(["error" => "Invalid ID. ID must be a numeric value."]);
            exit;
        }

        // Call services
        $user = $this->userService->getUserById($id);

        // return Response
        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(HttpStatus::NOT_FOUND);
            echo json_encode(["error" => "User not found"]);
        }
    }
}
