<?php

require_once 'src/Models/PostModel.php';

function connectToDB() :PDO
{

    $db = new PDO('mysql:host=db; dbname=frolicking-frogs-blog-site', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;

}
$db = connectToDB();
$postModel = new PostModel($db);

$posts = $postModel->getAllPosts();

$displayPosts = $postModel->displayAllPosts();

foreach ($displayPosts as $post) {
    echo '<ul>';
    echo "<li>{$post['title']}</li>";
    echo mb_strimwidth("<li>{$post['content']}</li>", 0, 100, "...");
    echo '</ul>';
    echo '<br>';
}
//echo '<pre>';
//var_dump($posts);


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
    <article class="p-8 border border-solid rounded-md">
        <span class="px-3 py-2 bg bg-slate-200 inline-block mb-4 rounded-sm">Science and Nature</span>

        <div class="flex justify-between items-center flex-col md:flex-row mb-4">
            <h2 class="text-4xl"><?php echo $post['title'] ?></h2>
            <span class="text-xl">100 likes - 50 dislikes</span>
        </div>
        <p class="text-2xl mb-2">01/01/2024 - By Bob</p>
        <p>Lorem ipsum dolor sit amet, consectetur efficitur, Lorem ipsum dolor sit amet, consectetur efficitur...</p>
        <div class="flex justify-center">
            <a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="singlePost.php">View post</a>
        </div>
    </article>

    <article class="p-8 border border-solid rounded-md">
        <span class="px-3 py-2 bg bg-rose-600 inline-block mb-4 rounded-sm">Controversial</span>
        <span class="px-3 py-2 bg bg-slate-200 inline-block mb-4 rounded-sm">Gaming</span>

        <div class="flex justify-between items-center flex-col md:flex-row mb-4">
            <h2 class="text-4xl">Example title</h2>
            <span class="text-xl">50 likes - 100 dislikes</span>
        </div>
        <p class="text-2xl mb-2">01/01/2024 - By Bob</p>
        <p>Lorem ipsum dolor sit amet, consectetur efficitur, Lorem ipsum dolor sit amet, consectetur efficitur...</p>
        <div class="flex justify-center">
            <a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="singlePost.php">View post</a>
        </div>
    </article>
</section>
</body>
</html>





