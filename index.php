<?php

require_once 'config/constants.php';
require_once 'config/autoload.php';

use config\Request as Request;
use config\Router as Router;

session_start();

$router = Router::Route(new Request());