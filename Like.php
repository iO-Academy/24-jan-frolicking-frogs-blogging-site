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
    $data = $postModel->hasLiked($postId, $userId);
    $dislike = $postModel->hasDisliked($postId, $userId);
    header("Location: singlePost.php?id={$_GET['id']}");
    if (!$data && !$dislike) {
        $postModel->likePost($postId, $userId);
    } else if ($dislike) {
        $postModel->removeDislike($postId, $userId);
        $postModel->likePost($postId, $userId);
    }
}
