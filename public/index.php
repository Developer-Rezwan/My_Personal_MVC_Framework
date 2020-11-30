<?php
require_once __DIR__."/../vendor/autoload.php";

use App\core\Application;
$app = new Application(dirname(__DIR__));

require_once __DIR__ . "/../Routes/web.php";

$app->run();