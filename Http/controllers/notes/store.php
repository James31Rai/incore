<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];
    
if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    view('notes/create', [
        'heading' => 'New Note',
        $_POST['body'] ?? '',
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO notes(body, user_id) VALUES(?, ?)", [
    $_POST['body'],
    1
]);
redirect('/notes');
