<?php

require_once 'SessionHandler.php';
require_once 'src/Models/PostModel.php';
require_once 'connectToDB.php';
session_start();

$session = new SessionHandles();
if (!$session->checkUserLoggedIn()) {
    header('Location: index.php');
} else {
    $db = connectToDB();
    $postModel = new PostModel($db);
    $postModel->
}
