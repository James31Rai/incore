<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

    
if (! Validator::string($name, 1, 100)) {
    $errors['name'] = 'Name of no more than 100 characters is required.';
}    
if (! Validator::string($email, 1, 100)) {
    $errors['email'] = 'Email of no more than 100 characters is required.';
} else {  
    if (! Validator::email($email)) {
        $errors['email'] = 'Email is not valid.';
    } else {
        if ($user = $db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find()) {
            $errors['email'] = 'Email already exists.';
        }
    }
}
if (! Validator::string($password, 6, 20)) {
    $errors['password'] = 'Password between 6 and 20 characters is required.';
}    

if (!empty($errors)) {
    view('registration/create', [
        'heading' => 'New User',
        $_POST['body'] ?? '',
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO users (name, email, password) VALUES(?, ?, ?)", [
    $name,
    $email,
    password_hash($password, PASSWORD_BCRYPT)
]);

$_SESSION['user'] = [
    'email' => $email,
    'name' => $name
];
redirect('/');
