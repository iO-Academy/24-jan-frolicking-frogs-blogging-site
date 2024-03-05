<?php

require_once 'src/Models/PostModel.php';
require_once 'connectToDB.php';

$db = connectToDB();
$postModel = new PostModel($db);

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
    <div class="flex gap-5">
        <a href="addPost.php">Create post</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</nav>

<form class="container lg:w-1/2 gap-5 mx-auto mb-10 flex justify-between items-center flex-col lg:flex-row px-5 sm:px-0">
    <div class=" w-full flex flex-col lg:flex-row gap-5">
        <div>
            <label for="category" class="text-lg block xl:inline">Filter by category:</label>
            <select id="category" class="px-3 py-2 text-lg w-full xl:w-auto">
                <option>All</option>
                <option>News</option>
                <option>Gaming</option>
                <option>Films</option>
                <option>TV</option>
                <option>Science and Nature</option>
            </select>
        </div>

        <div>
            <label for="sort" class="text-lg block xl:inline">Sort by:</label>
            <select id="sort" class="px-3 py-2 text-lg w-full xl:w-auto">
                <option>Newest</option>
                <option>Oldest</option>
                <option>Most Liked</option>
                <option>Most Disliked</option>
            </select>
        </div>
    </div>


    <input class="px-3 py-2 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Filter">

</form>

<section class="container lg:w-1/2 mx-auto flex flex-col gap-5">

    <?php $postModel->displayAllPosts(); ?>

</section>
</body>
</html>






