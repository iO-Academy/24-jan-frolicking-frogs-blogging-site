<?php

require_once 'SessionHandler.php';
require_once 'src/Models/PostModel.php';
require_once 'connectToDB.php';

session_start();

$session = new SessionHandles();
if (!$session->checkUserLoggedIn()) {
    header('Location: login.php');
} else {
    $postId = $_GET['id'];
    header("Location: singlePost.php?id={$_GET['id']}");
    $db = connectToDB();
    $postModel = new PostModel($db);
    $userId = $_SESSION['userid'];
    if ($postModel->HasLiked($postId, $userId) === false) {
        $postModel->LikePost($postId, $userId);
    } else {
        echo 'hello';
    }
}
