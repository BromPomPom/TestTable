<?php
// Error reporting inschakelen
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialiseer MySQLi
$con = mysqli_init();

// Maak verbinding met de MySQL server zonder SSL
$server = "srv-mysql-holidayparks-01.mysql.database.azure.com";
$username = "sqladmin@srv-mysql-holidayparks-01"; // Zorg ervoor dat je '@srv-mysql-holidayparks-01' toevoegt
$password = "wgohcYEFlN9sItoDm1vR"; // Het werkelijke wachtwoord
$database = "db-suitecrm";
$port = 3306;

// Maak verbinding
if (mysqli_real_connect($con, $server, $username, $password, $database, $port)) {
    echo "Succesvol verbonden met de database.<br>";

    // SQL query om een tabel aan te maken
    $sql = "CREATE TABLE IF NOT EXISTS test_table (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    )";

    // Voer de query uit
    if (mysqli_query($con, $sql)) {
        echo "Tabel succesvol aangemaakt.<br>";
    } else {
        echo "Fout bij het aanmaken van de tabel: " . mysqli_error($con) . "<br>";
    }

    // Sluit de verbinding
    mysqli_close($con);
} else {
    echo "Verbinding mislukt: " . mysqli_connect_error() . "<br>";
}
?>
