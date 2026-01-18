<?php
session_start();
session_destroy();
header('Location: /php-insecure-app/index.php');
exit;
