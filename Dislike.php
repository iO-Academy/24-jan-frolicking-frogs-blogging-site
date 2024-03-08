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
    $db = connectToDB();
    $postModel = new PostModel($db);
    $userId = $_SESSION['userid'];
    $data = $postModel->hasDisliked($postId, $userId);
    $like = $postModel->hasLiked($postId, $userId);
    header("Location: singlePost.php?id={$_GET['id']}");
    if (!$data && !$like) {
        $postModel->dislikePost($postId, $userId);
    } else if ($like) {
        $postModel->removeLike($postId, $userId);
        $postModel->dislikePost($postId, $userId);
    }
}