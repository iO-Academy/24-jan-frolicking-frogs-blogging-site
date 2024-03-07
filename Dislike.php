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
    $data = $postModel->HasDisliked($postId, $userId);
    if (!$data) {
        $postModel->DislikePost($postId, $userId);
    }
}