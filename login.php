<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $pdo = get_database();
    $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll();
    if (count($result) > 0) {
        session_start();
        $_SESSION["username"] = $username;
        header('location: /php-insecure-app/index.php');
        exit;
    } else {
        session_start();
        session_destroy();
        $isSuccess = false;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Security Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Login</h1>
        <div class="alert alert-danger" style="display: <?php echo (isset($isSuccess) && !$isSuccess) ? 'block' : 'none'; ?>">
            Failed to login user
        </div>

        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" id="username" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" id="password" type="password" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>