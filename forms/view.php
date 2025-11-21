<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$secure_password = "secret123";

// Password check
if (!isset($_GET["pass"]) || $_GET["pass"] !== $secure_password) {
    die("Unauthorized. Use ?pass=YOUR_PASSWORD");
}

// Connect DB
$db = new SQLite3('users.db');

// ----------------------------------
// DELETE OPERATION (inside view.php)
// ----------------------------------
if (isset($_GET["delete"])) {
    $id = intval($_GET["delete"]); // safe integer

    $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();

    // Refresh page after delete
    header("Location: view.php?pass=$secure_password");
    exit;
}

// ----------------------------------
// DISPLAY TABLE
// ----------------------------------

$result = $db->query("SELECT * FROM users");

echo "<h2>Submitted Users:</h2>";

echo "<table border='1' cellpadding='5'>
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Hashed Password</th>
    <th>Delete</th>
</tr>";

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {

    $id = htmlspecialchars($row['id']);
    $username = htmlspecialchars($row['username']);
    $email = htmlspecialchars($row['email']);
    $password = htmlspecialchars($row['password']);

    echo "<tr>
            <td>$id</td>
            <td>$username</td>
            <td>$email</td>
            <td>$password</td>
            <td>
                <a href='view.php?pass=$secure_password&delete=$id'
                   onclick=\"return confirm('Are you sure you want to delete this user?');\">
                    Delete
                </a>
            </td>
          </tr>";
}

echo "</table>";

echo "<br><a href='index.html'>Go Back</a>";

?>
