<?php

readonly class User {

    public int $id;
    public string $username;

    public Password $password;

    public EmailAddress $emailAddress;

    public function __construct(int $id, string $username, Password $password, EmailAddress $emailAddress)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->emailAddress = $emailAddress;
    }

}

?>
