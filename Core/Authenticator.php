<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", ['email' => $email])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $user['email'],
                    'name' => $user['name']
                ]);
                return true;
            }
        }
        return false;
    }
    
    public function login(Array $user) 
    {
        Session::put('user', $user);

        session_regenerate_id(true);
    }

    public function logout() 
    {
        Session::destroy();
    }
}
