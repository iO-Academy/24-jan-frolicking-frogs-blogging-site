<?php

require_once 'connectToDB.php';
require_once 'src/Models/PostModel.php';
require_once 'src/PostsViewHelper.php';

session_start();
$db = connectToDB();
$postModel = new PostModel($db);
$posts = $postModel->getAllPosts();
$postsViewHelper = new \src\PostsViewHelper();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <?php if (!isset($_SESSION['userid'])){

        echo '<div class="flex gap-5">
        <a href="login.php">Login</a>
        </div>'; }
    if (!isset($_SESSION['userid'])) {
        echo '<div class="flex gap-5">
        <a href="registration.php">Register</a>
        </div>';
    } ?>
</nav>
<section class="container lg:w-1/2 mx-auto flex flex-col gap-5">
    <?php $postsViewHelper->displayAllPosts($posts); ?>
</section>
</body>
</html>






