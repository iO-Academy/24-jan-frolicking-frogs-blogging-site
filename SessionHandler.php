<?php

class SessionHandles
{

    function LoginUser($users): void
    {
        $_SESSION['userid'] = $users->id;
        $_SESSION['username'] = $users->username;

    }

}