<?php
require_once __DIR__ .'/config/config.php';
require_once __DIR__ . '/helpers/url_helper.php';
require_once __DIR__ . '/helpers/session_helper.php';

spl_autoload_register(function ($className) {
    require_once __DIR__ .'/libraries/' . $className . '.php';
});
