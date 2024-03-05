<?php

readonly class EmailAddress
{
    public string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Error: Invalid email');
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}