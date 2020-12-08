<?php
use App\Vendor\Framework\Core\Application;

require_once __DIR__."/../vendor/autoload.php";

/*
 | .env file configuration
 | This script will pass .env files keys as array in the super global $_ENV
 */
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/*
 | Application will run by this script
 */
$app = new Application(dirname(__DIR__));

/*
 * Routes/web.php will execute by this script
 */
require_once dirname(__DIR__). "/Routes/web.php";

$app->run();