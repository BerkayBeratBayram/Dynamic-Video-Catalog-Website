<?php
$host = "localhost";
$user = "root"; // Veritabanı kullanıcı adınızı buraya girin
$pass = ""; // Veritabanı şifrenizi buraya girin
$dbname = "video_catalog";

// Bağlantıyı kur
$conn = new mysqli($host, $user, $pass, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}
?>
