<?php

require_once 'connectToDB.php';
require_once 'src/Models/PostModel.php';
require_once 'SessionHandler.php';

session_start();

$errorMessage = '';
$successMessage = '';

if (isset($_POST['submit']))
{
    $inputtedTitle = strip_tags($_POST['title']);
    $inputtedContent = strip_tags($_POST['content']);
    $currentUserId = $_SESSION['userid'];

    $db = connectToDb();
    $postsModel = new PostModel($db);

    if(strlen($inputtedTitle) > 30) {
        $errorMessage = 'Title should be less than 30 characters in length.';
    } elseif(strlen($inputtedContent) < 50 || strlen($inputtedContent) > 1000) {
        $errorMessage = 'Content must have between 50 to 1000 characters';
    } else {
        $postsModel->addPost($inputtedTitle, $inputtedContent, $currentUserId);
        $successMessage = 'Congratulations! Your post has been added to our blog! Thanks for contributing to our network!';
        $inputtedTitle = '';
        $inputtedContent = '';
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
        <?php $session = new SessionHandles();
        if (!$session->checkUserLoggedIn()) {
            echo '<div class="flex gap-5">
        <a href="login.php">Login</a>
        <a href="registration.php">Register</a>
        </div>'; } else {
            echo '<div class="flex gap-5">
        <a href="logout.php">Logout</a>
        </div>'; }?>
    </div>
</nav>

<form method="post" class="container lg:w-3/4 mx-auto flex flex-col p-8 bg-slate-200">
    <h2 class="text-3xl mb-4 text-center">Create new post</h2>

    <div class="flex flex-col sm:flex-row mb-5 gap-5">
        <div class="w-full sm:w-2/3">
            <label class="mb-3 block" for="title">Title:</label>
            <input class="w-full px-3 py-2 text-lg" name="title" type="text" id="title"  value="<?php echo (!empty($errorMessage)) ? ($_POST['title']) : ''; ?>"/>
        </div>
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="content">Content:</label>
        <textarea class="w-full" name="content" id="content" rows="9" ><?php echo (!empty($errorMessage)) ? ($_POST['content']) : ''; ?></textarea>
    </div>
    <?php if (!empty($errorMessage)) : ?>
        <p class="text-red-500"><?php echo $errorMessage; ?></p>
    <?php endif; ?>    <?php if (!empty($successMessage)) : ?>
        <p class="text-green-500"><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" name="submit" type="submit" value="Create Post" />
</form>

</body>
</html>