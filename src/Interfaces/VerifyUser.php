<?php

interface Verifyable
{
    public function verifyLogin();
}

function verifyLogin()
{
    if (isset($_POST['username'])) {

        $inputtedUsername = $_POST['username'];
        $inputtedPassword = $_POST['password'];

        $hashedPassword = password_hash($inputtedPassword, PASSWORD_BCRYPT);

        $db = connectToDB();
        $usersModel = new UsersModel($db);

        $users = $usersModel->selectUser($inputtedUsername);
        if ($users === null) {
            echo 'User does not exist';
        } else {
            $storedPassword = $users->password;
            $storedUsername = $users->username;

            if ((password_verify($storedPassword, $hashedPassword)) && ($inputtedUsername === $storedUsername)) {
                $_SESSION['userid'] = $users->id;
                $_SESSION['username'] = $users->username;
                header('Location: index.php');
            } else {
                echo 'Sorry, your username or password is incorrect';
            }
        }
    }
}
