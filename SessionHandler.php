<?php

class SessionHandles
{

    function LoginUser($users): void
    {
        $_SESSION['userid'] = $users->id;
        $_SESSION['username'] = $users->username;
    }

    function checkUserLoggedIn()
    {
        if (isset($_SESSION['userid'])) {
            return true;
        } return false;
    }
}