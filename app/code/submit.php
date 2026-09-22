<?php

$db_host = "db";
$db_user = "root";
$db_pass = "root";
$db_name = "FCT";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
    );

    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            text-align: center;
        }
        h2 { color: green; }
    </style>
</head>
<body>
    <div class='message'>
        <h2>Registration Successful!</h2>
        <p>Welcome, " . htmlspecialchars($name) . "!</p>
    </div>
</body>
</html>";
    } else {
        echo "Registration Failed: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>
