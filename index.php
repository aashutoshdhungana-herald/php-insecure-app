<!DOCTYPE html>
<html>

<head>
    <title>Security Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Security Demo</a>
            <div class="navbar-nav">
                <a class="nav-link" href="#">Home</a>
                <?php
                if (!isset($_SESSION["username"])) {
                    echo '<a class="nav-link" href="/php-insecure-app/register.php">Register</a>';
                    echo '<a class="nav-link" href="/php-insecure-app/login.php">LogIn</a>';
                } else {
                    echo '<a class="nav-link" href="/php-insecure-app/users.php">Users</a>';
                    echo '<a class="nav-link" href="/php-insecure-app/deleteAccount.php">Delete Account</a>';
                    echo '<a class="nav-link" href="/php-insecure-app/logout.php">Logout</a>';
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <?php
        if (isset($_SESSION["username"])) {
            echo "<h1>Welcome to the app " . htmlspecialchars($_SESSION["username"]) . "!</h1>";
        } else {
            echo "<h1>Login to continue</h1>";
        }
        ?>
    </div>
</body>

</html>