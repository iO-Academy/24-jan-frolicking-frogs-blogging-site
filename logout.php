<?php

session_start();

// Deletes the session for that user
session_destroy();

?>

<body class="bg-gray-100">

<div class="container mx-auto p-8 max-w-md text-center">
    <h1 class="text-2xl font-semibold mb-6">You have been logged out</h1>
    <a href="login.php" class="text-blue-500 hover:underline block">Log in here</a>
</div>

</body>
