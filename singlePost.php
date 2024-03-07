<?php

require_once 'connectToDB.php';
require_once 'src/Models/PostModel.php';

$db = connectToDB();
$postModel = new PostModel($db);

session_start();
$postId = $_GET['id'];
$singlePostDetails = $postModel->getSinglePostById($postId);
$dislikes = $postModel->DislikeCount($postId);
$likes = $postModel->LikeCount($postId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Example Title</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
        <a href="addPost.php">Create Post</a>
    </div>
</nav>

<section class="container md:w-1/2 mx-auto">
    <article class="p-8 border border-solid rounded-md">
        <div class="flex justify-between items-center flex-col md:flex-row mb-4">
            <h2 class="text-4xl"><?php echo $singlePostDetails->title; ?></h2>
            <span class="text-xl"><?php echo "{$likes['COUNT(`reaction`)']} likes - {$dislikes['COUNT(`reaction`)']} dislikes"; ?></span>
        </div>
        <p class="text-2xl mb-10"><?php echo $singlePostDetails->dateTime; ?> - By <?php echo $singlePostDetails->authorName; ?></p>
        <p><?php echo $singlePostDetails->content; ?></p>
        <div class="flex justify-center gap-5">
           <?php echo "<a class='px-3 py-2 mt-4 text-lg bg-green-300 hover:bg-green-400 hover:text-white transition inline-block rounded-sm' href='Like.php?id={$_GET['id']}'>Like</a>";
           echo "<a class='px-3 py-2 mt-4 text-lg bg-red-300 hover:bg-red-400 hover:text-white transition inline-block rounded-sm' href='Dislike.php?id={$_GET['id']}'>Dislike</a>"; ?>
        </div>
        <div class="flex justify-center">
            <a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="index.php">View all posts</a>
        </div>
    </article>
</section>

</body>
</html>
