<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: /INSECUREAPP/login.php");
    exit;
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
        <h1>User List</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once __DIR__ . '/db.php';
                $pdo = get_database();
                $sql = "SELECT * FROM users";
                $stmt = $pdo->query($sql);
                $users = $stmt->fetchAll();
                foreach ($users as $user) {
                    echo '<tr>';
                    echo "<td>" . $user["Id"] . "</td>";
                    echo "<td>" . $user["username"] . "</td>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>