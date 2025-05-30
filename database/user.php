<?php

function saveUsers($mysqli, $name, $email, $password)
{
    $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        return ['message' => 'User Registered Successfully', 'result' => true];
    } else {
        return ['message' => 'Registration Failed', 'result' => false];
    }
}
