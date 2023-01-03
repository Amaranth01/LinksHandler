<?php
use App\Routing;
use RedBeanPHP\R;
use Symfony\Component\ErrorHandler\Debug;

require '../Routing.php';
require '../vendor/autoload.php';
session_start();

R::setup('mysql:host=localhost;dbname=links', 'root', '');
Debug::enable();
Routing::route();