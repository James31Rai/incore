<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query("SELECT * FROM notes WHERE user_id=?", [1])->all();

view('notes/index', [
    'heading' => 'My Notes',
    'notes' => $notes
]);