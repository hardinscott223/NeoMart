<?php

function saveUsers($mysqli, $name, $email, $password){
    $sql = "INSERT INTO `users`(`u_id`, `name`, `email`, `password`) VALUES ($name,$email,$password)";
    $mysqli->query($sql);
    return ['Message'=> 'User Registered Successfully', 'result'=> true];
}