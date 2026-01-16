<?php
session_start();
session_destroy();
header('Location: /InsecureApp/index.php');
exit;
