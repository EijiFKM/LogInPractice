<?php

//ユーザ一覧を呼び出す

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Index();

$app->run();
