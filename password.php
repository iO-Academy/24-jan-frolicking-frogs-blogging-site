<?php

class Password
{
    public string $password;
    public function __construct(string $password)
    {
        $uppercase = str_contains('[A-Z]', $password);
        $number    = str_contains('[0-9]', $password);

        if(strlen($password) < 8 || $uppercase || $number) {
            echo 'Password should be at least 8 characters in length
             and should include at least one upper case letter and one number';
        } else {
            $this->password = $password;
        }
    }
}


new Password('dfsbfdbbfdHA7');

