<?php

require_once 'connectToDB.php';
require_once 'registration.php';
require_once 'src/Models/UsersModel.php';

use PHPUnit\Framework\TestCase;

class RegistrationTest extends TestCase
{
    //Check if username is taken
    public function test_checkUsername(): void {
        $expected = 'This username is taken';

        $db = connectToDb();
        $usersModel = new UsersModel($db);

        $inputtedUsername = 'Connor';
        $actual = '';
        $user = $usersModel->checkUser($inputtedUsername);
        if (!empty($user)) {
            $actual = 'This username is taken';
        }

        $this->assertEquals($expected, $actual);
    }

    //Check password validation
    public function test_checkPassword(): void {
        $expected = '';

        $inputtedPassword = '1q2w3e4r5t6y7u8i';

        $uppercase = str_contains('[A-Z]', $inputtedPassword);
        $number = str_contains('[0-9]', $inputtedPassword);

        $actual = '';
        if (strlen($inputtedPassword) < 8 || $uppercase || $number) {
            $actual = 'Password not secure';
        }

        $this->assertEquals($expected, $actual);
    }

    //Check email validation
    public function test_checkEmail(): void {
        $expected = '';
        $actual = '';

        $inputtedEmail = 'email@gmail.com';
        if (!filter_var($inputtedEmail, FILTER_VALIDATE_EMAIL)) {
            $actual = 'Email incorrect';
        }

        $this->assertEquals($expected, $actual);
    }


    //Validates a new user
    public function test_validateUser(): void {
        $expected = 'confirmed';
        $actual = '';

        $inputtedUsername = 'Username';
        $inputtedEmail = 'email@gmail.com';
        $inputtedPassword = 'asdfghgfds';

        //Validate username
        $db = connectToDb();
        $usersModel = new UsersModel($db);
        $user = $usersModel->checkUser($inputtedUsername);

        //Validate password
        $uppercase = str_contains('[A-Z]', $inputtedPassword);
        $number = str_contains('[0-9]', $inputtedPassword);

        if (!empty($user)) {
            $actual = 'failed-username'; //Validate username
        } else if (strlen($inputtedPassword) < 8 || $uppercase || $number) {
            $actual = 'failed-password'; //Validate password
        } else if (!filter_var($inputtedEmail, FILTER_VALIDATE_EMAIL)) {
            $actual = 'failed-email'; //Validate email
        } else {
            $actual = 'confirmed';
        }

        $this->assertEquals($expected, $actual);
    }
}

