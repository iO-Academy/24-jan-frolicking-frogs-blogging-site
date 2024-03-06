<?php

require_once 'connectToDB.php';
require_once 'src/Models/UsersModel.php';
require_once 'SessionHandler.php';

session_start();

$session = new SessionHandles();
if ($session->checkUserLoggedIn()) {
    header('Location: index.php');
}

$errorMessage = '';

if (isset($_POST['email'], $_POST['password'])) {

    $inputtedEmail = $_POST['email'];
    $inputtedPassword = $_POST['password'];

    $db = connectToDB();
    $usersModel = new UsersModel($db);

    $users = $usersModel->selectUser($inputtedEmail);
    if ($users === null) {
        $errorMessage = '<p>User does not exist<p>';

    } else {
        $storedPassword = $users->password;
        $storedEmail = $users->emailAddress;

        if ((password_verify($inputtedPassword, $storedPassword)) && ($inputtedEmail == $storedEmail)) {
            $session = new SessionHandles();
            $session->LoginUser($users);
            header('Location: index.php');
        } else {
            $errorMessage = '<p> Sorry, your email or password is incorrect<p>';
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
        <label class="mb-3 block" for="email">Email:</label>
        <input class="w-full px-3 py-2 text-lg" type="email" id="email" name="email" />
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="password">Password:</label>
        <input class="w-full px-3 py-2 text-lg" type="password" id="password" name="password"/>
    </div>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Login" />
    <p><?php echo $errorMessage ?></p>
</form>

<div class="text-center"></div>

</body>
</html>
