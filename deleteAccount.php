<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('Location: /php-insecure-app/login.php');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . '/db.php';
    $username = $_SESSION["username"];
    $sql = "DELETE FROM users where username='$username';";
    $stmt = get_database()->query($sql);
    $isSuccess = $stmt->execute();
    if (!$isSuccess) {
        echo 'Failed to delete user';
        exit;
    }

    session_destroy();
    echo 'Deleted profile successfully';
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Security Demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>

    <body>
        <div class="container mt-5">
            <h1>Delete Account</h1>
            <p>Are you sure you want to delete your account?</p>
            <form method="POST">
                <button type="submit" class="btn btn-danger">Yes, Delete My Account</button>
            </form>
        </div>
    </body>

    </html>
<?php
}
?>