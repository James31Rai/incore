<?php
use Core\Session;

$session = new Session();

view('sessions/create', [
    'heading' => 'Login',
    'errors' => $session::getFlash('errors') ?? [],
    'email' => $session::getFlash('email')
]);