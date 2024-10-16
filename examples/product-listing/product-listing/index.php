<?php
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = file_get_contents('/run/secrets/db_password');
$db = getenv('DB_NAME');

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h1>Fruits</h1>";
echo "<ul>";
$json = file_get_contents("http://product-service");
$obj = json_decode($json);
$fruits = $obj->fruits;
foreach ($fruits as $fruit) {
    echo "<li>$fruit</li>";
}
echo "</ul>";

$conn->close();
