<?php
session_start();
include 'database.php'; // Veritabanı bağlantısı

// `$_SERVER['REQUEST_METHOD']` POST olarak ayarlanmış mı kontrol ediliyor.
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? ''; // Eğer `username` formdan gelmiyorsa varsayılan boş
    $email = $_POST['email'] ?? '';       // Aynı şekilde email için kontrol
    $password = $_POST['password'] ?? ''; // Şifre için de varsayılan değer kontrolü

    // Şifreyi hashleyin ve veritabanında şifreyi doğrulayın
    $sql = "SELECT * FROM users WHERE username = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Kullanıcının şifresi hash ile kontrol ediliyor
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            // "Başarıyla giriş yapıldı" mesajını session içine koyuyoruz
            $_SESSION['login_success'] = "Başarıyla giriş yapıldı! Hoş geldiniz, " . $username;
            header("Location: index.php"); // Başarılı giriş sonrası yönlendirme
            exit; // Başarılı yönlendirme için exit eklenmeli
        } else {
            echo "Yanlış şifre!";
        }
    } else {
        echo "Kullanıcı bulunamadı!";
    }
} else {
    echo "Geçersiz istek yöntemi!";
}
?>
