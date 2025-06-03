<?php
require_once('../../database/server.php');

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $errors = [];

    if (empty($username)) {
        $errors[] = 'Username is required';
    }

    if (empty($email)) {
        $errors[] = 'Email is required';
    }

    if (empty($password)) {
        $errors[] = 'Password is required';
    }

    if ($password !== $confirmpassword) {
        $errors[] = 'Passwords do not match';
    }

    if (count($errors) === 0) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Use prepared statements to prevent SQL injection
        $stmt = $mysqli->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $username, $email, $passwordHash);

        if ($stmt->execute()) {
            $response = [
                'success' => true,
                'message' => 'Registration successful',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Registration failed',
                'errors' => ['Could not save user to database'],
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $errors,
        ];
    }
} else {
    http_response_code(405);
    $response = [
        'success' => false,
        'message' => 'Invalid request method',
    ];
}

echo json_encode($response);
exit;
