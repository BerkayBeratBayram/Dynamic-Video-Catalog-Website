<?php
session_start();
include 'database.php'; // Veritabanı bağlantısı

$error = ''; // Hata mesajı için değişken oluştur

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Şifreyi hashle
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Aynı kullanıcı veya email zaten var mı diye kontrol et
            $check_sql = "SELECT * FROM users WHERE email = ? OR username = ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("ss", $email, $username);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            if ($result->num_rows > 0) {
                // Hata durumunda hata mesajını sakla
                $error = "Bu kullanıcı adı veya e-posta zaten var. Lütfen farklı bir tane deneyin.";
                header("Location: register.php?error=" . urlencode($error));
                exit;
            } else {
                // Kullanıcıyı veritabanına ekle
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $username, $email, $hashed_password);

                if ($stmt->execute()) {
                    // Kayıt başarılı, kullanıcıyı yönlendirin
                    $_SESSION['username'] = $username;
                    header("Location: index.php"); // Başarılı kayıt sonrası yönlendirme
                    exit;
                } else {
                    $error = "Kayıt sırasında bir hata oluştu.";
                    header("Location: register.php?error=" . urlencode($error));
                    exit;
                }
            }
        }
        ?>
