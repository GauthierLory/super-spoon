<?php

use Symfony\Component\Routing\Route;

$container->set(PDO::class, function () {
    return new PDO("mysql:host=localhost;dbname=ubouffe;charset=utf8", "root", "");
});
