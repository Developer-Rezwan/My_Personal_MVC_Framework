<?php
require_once __DIR__."/../vendor/autoload.php";

use App\Vendor\Framework\Core\Application;
$app = new Application(dirname(__DIR__));

require_once __DIR__ . "/../Routes/web.php";

$app->run();