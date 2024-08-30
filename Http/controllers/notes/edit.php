<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

$currentUser = 1;
authorize($note['user_id'] === $currentUser);

view('notes/edit', [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);