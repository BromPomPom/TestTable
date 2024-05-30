<?php
echo "Welkom bij de HR applicatie van HolidayParks<br>";

$servername = "10.10.2.4";
$username = "mysqladmin";
$password = "wgohcYEFlN9sItoDm1vR";
$dbname = "db-suitecrm";

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}
echo "Succesvol verbonden<br>";

// Voeg een simpele tabel toe
$sql = "CREATE TABLE IF NOT EXISTS test_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabel succesvol aangemaakt";
} else {
    echo "Fout bij het aanmaken van tabel: " . $conn->error;
}

$conn->close();
?>
