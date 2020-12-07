<?php
require_once __DIR__."/../vendor/autoload.php";

use App\Vendor\Framework\Core\Application;
use App\Vendor\Framework\Form\Form;
















$app = new Application(dirname(__DIR__));

require_once __DIR__ . "/../Routes/web.php";

$app->run();