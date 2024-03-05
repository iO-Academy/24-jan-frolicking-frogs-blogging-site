<?php

function connectToDB() :PDO
{

    $db = new PDO('mysql:host=127.0.0.1; dbname=frolicking-frogs-blog-site', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;

}
