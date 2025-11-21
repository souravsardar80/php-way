<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Create DB if missing
$db = new SQLite3('users.db');

// Create table if missing
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT,
    email TEXT,
    password TEXT
)");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    // Sanitize
    $username = htmlspecialchars(strip_tags($username));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into DB
    $stmt = $db->prepare(
        "INSERT INTO users (username, email, password)
         VALUES (:username, :email, :password)"
    );

    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);

    $stmt->execute();

    echo "Data Saved Successfully!<br>";
    echo '<a href="view.php?pass=secret123">View Data (Secure Access)</a>';
    exit;
}

// GET handler (optional)
$page = $_GET["page"] ?? 1;
$search = $_GET["q"] ?? "";
?>
