<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

$currentUser = 1;
authorize($note['user_id'] === $currentUser);

$errors = [];
    
if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    view('note/edit', [
        'heading' => 'Edit Note',        
        $_POST['body'] ?? '',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query("UPDATE notes SET body=:body WHERE id=:id", [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);
redirect('/notes');
