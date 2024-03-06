<?php

require_once 'login.php';

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {

    public function test_loginTest_userDoesntExist()
    {
        $expected = 'user does not exist';

        $db = connectToDb();
        $usersModel = new UsersModel($db);

        $inputtedEmail = 'Toni@gmail.com';
        $actual = '';
        $user = $usersModel->selectUser($inputtedEmail);
        if ($user === null) {
            $actual = 'user does not exist';
        }

        $this->assertEquals($expected, $actual);
    }

    public function test_loginTest_userExists()
    {
        $expected = '';

        $db = connectToDb();
        $usersModel = new UsersModel($db);

        $inputtedEmail = 'alex@gmail.com';
        $actual = '';
        $user = $usersModel->selectUser($inputtedEmail);
        if ($user === null) {
            $actual = 'user does not exist';
        }

        $this->assertEquals($expected, $actual);
    }

        public function test_loginTest_passwordInvalid()
        {
            $expected = 'sorry your email or password is incorrect';

            $db = connectToDb();
            $usersModel = new UsersModel($db);

            $inputtedPassword = 'FEHJJ';
            $inputtedEmail = 'hellobob2@gmail.com';
            $user = $usersModel->selectUser($inputtedEmail);
            $storedPassword = $user->password;
            if (password_verify($inputtedPassword, $storedPassword)) {
                $actual = '';
            } else {
                $actual = 'sorry your email or password is incorrect';
            }

            $this->assertEquals($expected, $actual);
        }

    public function test_loginTest_passwordValid()
    {
        $expected = '';

        $db = connectToDb();
        $usersModel = new UsersModel($db);

        $inputtedPassword = 'Hellobob2';
        $inputtedEmail = 'hellobob2@gmail.com';
        $user = $usersModel->selectUser($inputtedEmail);
        $storedPassword = $user->password;
        if (password_verify($inputtedPassword, $storedPassword)) {
            $actual = '';
        } else {
            $actual = 'sorry your email or password is incorrect';
        }

        $this->assertEquals($expected, $actual);
    }

    public function test_loginTest_emailInvalid()
    {
        $expected = 'sorry your email or password is incorrect';

        $db = connectToDb();
        $usersModel = new UsersModel($db);

        $inputtedEmail = 'hello@gmail.com';
        $user = $usersModel->selectUser($inputtedEmail);
        $storedEmail = $user->emailAddress;
        if ($inputtedEmail == $storedEmail) {
            $actual = '';
        } else {
            $actual = 'sorry your email or password is incorrect';
        }

        $this->assertEquals($expected, $actual);
    }

    public function test_loginTest_passwordAndEmailValid()

    {
        $expected = '';

        $db = connectToDb();
        $usersModel = new UsersModel($db);

        $inputtedEmail = 'hellobob2@gmail.com';
        $inputtedPassword = 'Hellobob2';
        $user = $usersModel->selectUser($inputtedEmail);
        $storedEmail = $user->emailAddress;
        $storedPassword = $user->password;
        if ((password_verify($inputtedPassword, $storedPassword)) && ($inputtedEmail == $storedEmail)) {
            $actual = '';
        } else {
            $actual = 'sorry your email or password is incorrect';
        }

        $this->assertEquals($expected, $actual);
    }
}