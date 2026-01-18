<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $pdo = get_database();
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $stmt = $pdo->prepare($sql);
    $isSuccess = $stmt->execute();
    if ($isSuccess) {
        header('Location: /php-insecure-app/index.php');
        exit;
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
        <h1>Register</h1>
        <?php
        if (isset($isSuccess) && !$isSuccess) {
            echo '<div class="alert alert-danger">Failed to register user.</div>';
        }
        ?>
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