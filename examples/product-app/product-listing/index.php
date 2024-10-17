<?php
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = trim(file_get_contents('/run/secrets/db_password'));
$db = getenv('DB_NAME');

echo "Attempting to connect to MySQL:<br>";
echo "Host: $host<br>";
echo "User: $user<br>";
echo "Database: $db<br>";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully to MySQL<br>";

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
