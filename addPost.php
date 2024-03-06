<?php

require_once 'connectToDB.php';
require_once 'src/Models/PostModel.php';

if (isset($_POST['submit']))
    {

    $inputtedTitle = $_POST['title'];
    $inputtedContent = $_POST['content'];

    $db = connectToDb();

    $postsModel = new PostModel($db);

    $post = $postsModel->checkPost($inputtedTitle, $inputtedContent);

    if (!empty($post))
    {
        echo 'This username is taken';
    }
    else
    {
        $postsModel->addPost($inputtedTitle, $inputtedContent);
        header('Location: index.php');

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
        <a href="addPost.php">Create Post</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</nav>

<form class="container lg:w-3/4 mx-auto flex flex-col p-8 bg-slate-200">
    <h2 class="text-3xl mb-4 text-center">Create new post</h2>

    <div class="flex flex-col sm:flex-row mb-5 gap-5">
        <div class="w-full sm:w-2/3">
            <label class="mb-3 block" for="title">Title:</label>
            <input class="w-full px-3 py-2 text-lg" type="text" id="title" />
        </div>

        <div class="w-full sm:w-1/3">
            <label for="category" class="mb-3 block">Category:</label>
            <select class="w-full px-3 py-[10.5px] text-lg bg-white" id="category">
                <option>News</option>
                <option>Gaming</option>
                <option>Films</option>
                <option>TV</option>
                <option>Science and Nature</option>
            </select>
        </div>
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="content">Content:</label>
        <textarea class="w-full" id="content" rows="9"></textarea>
    </div>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Create Post" />
</form>

</body>
</html>