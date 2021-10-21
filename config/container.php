<?php

$container->set(PDO::class, function () {
    return new PDO("mysql:host=localhost;dbname=ubouffe;charset=utf8", "glory", "bidiboum91");
});
