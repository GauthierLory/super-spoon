<?php

use Graille\Migration\MigrationFinder;
use Graille\Migration\MigrationRunner;
use Graille\Migration\History;
use Graille\Migration\PlanRunner;
use Graille\Migration\Logger;

require __DIR__ . '/vendor/autoload.php';

$pdo = new PDO("mysql:host=localhost:3306;dbname=ubouffe;charset=utf8", "glory", "bidiboum91");

$logger = new Logger;

$runner = new MigrationRunner(
    new MigrationFinder(new History($pdo), "Migrations\\"),
    new PlanRunner($pdo, $logger),
    __DIR__ . '/migrations/'
);


$runner->migrate();
