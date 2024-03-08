<?php

require_once 'connectToDB.php';
require_once 'src/Models/UsersModel.php';
require_once 'emailAddress.php';
require_once 'password.php';
require_once 'SessionHandler.php';

session_start();

$session = new SessionHandles();

if ($session->checkUserLoggedIn()) {
header('Location: index.php');
}

$errorMessage = '';
if (isset($_POST['username'])) {

    $inputtedUsername = $_POST['username'];
    $inputtedEmail = new EmailAddress($_POST['email']);
    $inputtedPassword = new Password($_POST['password']);

    $db = connectToDb();

    $usersModel = new UsersModel($db);

    $user = $usersModel->checkUser($inputtedEmail);

    if (!empty($user)) {
        $errorMessage = 'This username is taken';

    } else if ($inputtedPassword == '') {
        $errorMessage = 'Password should be at least 8 characters in length
        and should include at least one upper case letter and one number';
    } else {
        $usersModel->addUser($inputtedUsername, $inputtedEmail, $inputtedPassword);
        $users = $usersModel->selectUser($inputtedEmail);

        $_SESSION['userid'] = $users->id;
        $_SESSION['username'] = $users->username;
        $session = new SessionHandles();
        $session->LoginUser($users);
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
        <a href="login.php">Login</a>
    </div>
</nav>

<form method="post" class="container lg:w-1/4 mx-auto flex flex-col p-8 bg-slate-200">
    <h2 class="text-3xl mb-4 text-center">Register</h2>
    <div class="mb-5">
        <label class="mb-3 block" for="username">Username:</label>
        <input class="w-full px-3 py-2 text-lg" type="text" id="username" name="username" />
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="email">Email:</label>
        <input class="w-full px-3 py-2 text-lg" type="email" id="email" name="email" />
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="password">Password:</label>
        <input class="w-full px-3 py-2 text-lg" type="password" id="password" name="password" />
    </div>

    <?php echo $errorMessage ?>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Register" />
</form>

</body>
</html>