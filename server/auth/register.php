<?php
require_once('../../database/server.php');

header('Content-Type: application/json');
$status = true;
$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);;

    if ($status) {
        $results = saveUsers($mysqli, $username, $email, $password);

        if ($results) {
            $response = [
                'success' => true,
                'message' => 'Registration successful',
                'user' => [
                    'username' => $username,
                    'email' => $email
                ]
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Registration failed',
                'error' => 'Could not save user to database'
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => 'Invalid status',
            'error' => 'Initial status check failed'
        ];
    }
} else {
    http_response_code(405);
    $response = [
        'success' => false,
        'message' => 'Invalid request method'
    ];
}

echo json_encode($response);
exit;
