<?php

require_once 'connectToDB.php';
require_once 'src/Models/UsersModel.php';

session_start();
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
                header('Location: Homepage.php');
                session_start();
                $_SESSION['userid'] = $users->id;
                $_SESSION['username'] = $users->username;
            } else {
                echo 'Sorry, your username or password is incorrect';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
    </div>
</nav>

<form method="post" class="container lg:w-1/4 mx-auto flex flex-col p-8 bg-slate-200">
    <h2 class="text-3xl mb-4 text-center">Login</h2>
    <div class="mb-5">
        <label class="mb-3 block" for="username">Username:</label>
        <input class="w-full px-3 py-2 text-lg" type="text" id="username" name="username" />
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="password">Password:</label>
        <input class="w-full px-3 py-2 text-lg" type="password" id="password" name="password"/>
    </div>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Login" />
</form>

<div class="text-center"><?php verifyLogin(); ?></div>

</body>
</html>
