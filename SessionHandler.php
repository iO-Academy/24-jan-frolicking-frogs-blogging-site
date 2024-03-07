<?php

class SessionHandles
{

    public function LoginUser(User $users): void
    {
        $_SESSION['userid'] = $users->id;
        $_SESSION['username'] = $users->username;
    }

    public function checkUserLoggedIn(): bool
    {
        return isset($_SESSION['userid']);
    }
}