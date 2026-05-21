<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_COOKIE['is_admin']) || $_COOKIE['is_admin'] != "1") {
    header("Location: index.html");
    exit();
}

$host = "localhost:3306";
$user = "rh69626_admin";
$pass = "admin222!!";
$db = "rh69626_allatok";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, felhasznalonev, emailcim, is_admin FROM felhasznalok ORDER BY id ASC";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Felhasználók listája</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #eee;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }
    </style>
</head>
<body>

<h1>Felhasználók listája</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Felhasználónév</th>
        <th>Email</th>
        <th>Admin?</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['felhasznalonev']) ?></td>
            <td><?= htmlspecialchars($row['emailcim']) ?></td>
            <td><?= htmlspecialchars($row['is_admin']) ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php
$result->free();
$conn->close();
?>