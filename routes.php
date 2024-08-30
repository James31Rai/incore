<?php

$router->get('/', 'index');
$router->get('/about', 'about');
$router->get('/contact', 'contact');

$router->get('/notes', 'notes/index')->only('auth');
$router->get('/note', 'notes/show');
$router->delete('/note', 'notes/destroy');
$router->get('/note/edit', 'notes/edit');
$router->put('/note/update', 'notes/update');
$router->get('/notes/create', 'notes/create');
$router->post('/notes/store', 'notes/store');

$router->get('/register', 'registration/create')->only('guest');
$router->post('/register', 'registration/store')->only('guest');;

$router->get('/login', 'sessions/create')->only('guest');
$router->post('/login', 'sessions/store')->only('guest');

$router->delete('/logout', 'sessions/destroy')->only('auth');