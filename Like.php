<?php

require_once 'SessionHandler.php';

session_start();

$session = new SessionHandles();
if (!$session->checkUserLoggedIn()) {
    header('Location: login.php');
}