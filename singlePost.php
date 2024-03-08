<?php

require_once 'connectToDB.php';
require_once 'src/Models/PostModel.php';
require_once 'SessionHandler.php';
require_once 'src/Models/CommentModel.php';
require_once 'src/CommentsViewHelper.php';

session_start();
$db = connectToDB();
$postModel = new PostModel($db);
$commentModel = new CommentModel($db);
$commentsViewHelper = new \src\CommentsViewHelper();
$errorMessage = '';
$successMessage = '';
$postId = $_GET['id'];
$singlePostDetails = $postModel->getSinglePostById($postId);
$dislikes = $postModel->dislikeCount($postId);
$likes = $postModel->likeCount($postId);

$controversial = '';
if ($dislikes['DislikeCount'] > ($likes['LikeCount'] * 1.5)) {
    $controversial = '<span class="px-3 py-2 bg bg-rose-600 inline-block mb-4 rounded-sm">Controversial</span>';
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $singlePostDetails = $postModel->getSinglePostById($id);
    $formattedDate = date('d/m/Y', strtotime($singlePostDetails->dateTime));

    if (!$singlePostDetails) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}


if (isset($_POST['submit']))
{

    $inputtedComment = strip_tags($_POST['comment']);
    $currentUserId = $_SESSION['userid'];
    $currentPostId = $_GET['id'];

    $db = connectToDb();
    $commentModel = new CommentModel($db);

    if(strlen($inputtedComment) < 10 || strlen($inputtedComment) > 200) {
        $errorMessage = 'Comment must be between 10 to 200 characters';
    } else {
        $commentModel->addComment($inputtedComment, $currentUserId, $currentPostId);
        $successMessage = 'Congratulations! Your comment has been added to this blog post! Thanks for contributing to our network!';
        $inputtedComment = '';
    }
}

$comments = $commentModel->getAllComments($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - <?php echo $singlePostDetails->title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <?php $session = new SessionHandles();
    if (!$session->checkUserLoggedIn()) {
        echo '<div class="flex gap-5">
        <a href="login.php">Login</a>
        <a href="registration.php">Register</a>
        <a href="login.php">Create Post</a>
        </div>'; } else {
        echo '<div class="flex gap-5">
        <a href="addPost.php">Create Post</a>
        <a href="logout.php">Logout</a>
        </div>'; }?>
</nav>

<section class="container md:w-1/2 mx-auto">
    <article class="p-8 border border-solid rounded-md">
        <?php echo $controversial ?>
        <div class="flex justify-between items-center flex-col md:flex-row mb-4">
            <h2 class="text-4xl"><?php echo $singlePostDetails->title; ?></h2>
            <div>
                <span class="text-xl"><?php echo "{$likes['LikeCount']} likes - {$dislikes['DislikeCount']} dislikes"; ?></span>
            </div>
            </div>
        <p class="text-2xl mb-10"><?php echo $formattedDate; ?> - By <?php echo $singlePostDetails->authorName; ?></p>
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

<?php
$session = new SessionHandles();
if ($session->checkUserLoggedIn()) {
?>
<section class="container md:w-1/2 mx-auto mt-5">
    <form method="post" class="p-8 border border-solid rounded-md bg-slate-200">
        <div class="mb-5">
            <label class="mb-3 block" for="content">Comment:</label>
            <textarea class="w-full" id="content" rows="5" name="comment"><?php echo (!empty($errorMessage)) ? ($_POST['comment']) : ''; ?></textarea>
            <?php if (!empty($errorMessage)) : ?>
                <p class="text-red-500"><?php echo $errorMessage; ?></p>
            <?php endif; ?>    <?php if (!empty($successMessage)) : ?>
                <p class="text-green-500"><?php echo $successMessage; ?></p>
            <?php endif; ?>
        </div>
        <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" name="submit" type="submit" value="Post Comment" />
    </form>
</section>
    <?php } ?>
<section class="container md:w-1/2 mx-auto mt-5 mb-10">
    <?php echo $commentsViewHelper->displayAllComments($comments) ?>
</section>
</body>
</html>
