<?php include 'database.php'; // Veritabanı bağlantısı ?>
<!DOCTYPE html>
<html lang="en">
<?php
// Veritabanı bağlantısını burada dahil edebilirsiniz
include 'head.php';
?>
<body>
    <div class="tm-page-wrap mx-auto">
        <div class="position-relative">
            <?php
                // Veritabanı bağlantısını burada dahil edebilirsiniz
                include 'navbar.php';
                ?>
            <!-- Veritabanından çekilen metin -->
 
            <div class="tm-welcome-container tm-fixed-header tm-fixed-header-3">
                <div class="text-center">
                <div class="text-center">
                    <?php
                    $sql = "SELECT title_value FROM page_texts WHERE text_key = 'contact_description'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        
                        echo '<p class="pt-5 px-3 tm-welcome-text tm-welcome-text-2 mb-1 text-white mx-auto">' . $row['title_value'] . '</p>';
                    } else {
                        echo '<p class="pt-5 px-3 tm-welcome-text tm-welcome-text-2 mb-1 text-white mx-auto">Default message here</p>';
                    }
                    ?>
                </div>                      
                </div>                
            </div>

            <div id="tm-fixed-header-bg"></div> <!-- Header image -->
        </div>

        <!-- Page content -->
        <main>
            <div class="container-fluid px-0">
                <div class="mx-auto tm-content-container">
                    <div class="row mt-3 mb-5 pb-3">
                        <div class="col-12">
                            <div class="mx-auto tm-about-text-container px-3">

                            <?php
                                // about_page_description metnini veritabanından çekiyoruz
                                $sql = "SELECT title FROM page_texts WHERE text_key = 'register_description'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo '<h2 class="tm-page-title mb-4">' . $row['title'] . '</h2>';
                                } else {
                                    echo '<h2 class="tm-page-title mb-4">Beceremedin</h2>';
                                }
                            ?>

                            <!-- Hata mesajını burada göster -->
                            <?php if (isset($_GET['error'])): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo htmlspecialchars($_GET['error']); ?>
                                </div>
                            <?php endif; ?>
                                
                            <!-- Register Form -->
                <div class="row">
                    <div class="col-12">
                        <form id="register-form" action="register-process.php" method="POST" class="tm-register-form">
                            <?php
                            include 'database.php'; // Veritabanı bağlantısı
                            $sql = "SELECT * FROM users LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();

                                echo '
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control rounded-0" placeholder="Username" required="" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control rounded-0" placeholder="Email" required="" />
                                </div>                  
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control rounded-0" placeholder="Password" required="">
                                </div>';
                            }
                            ?>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary rounded-0 d-block ml-auto mr-0 tm-btn-animate tm-btn-submit tm-icon-submit">
                        <span>Kayıt Ol</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

                            </div>  
                        </div>                      
                    </div>
                    <div class="parallax-window parallax-window-2" data-parallax="scroll" data-image-src="img/contact-2.jpg"></div>
                    
                </div>

            </div>
        </main>

            
    </div>
    <?php
        // Veritabanı bağlantısını burada dahil edebilirsiniz
        include 'footer.php';
    ?>
    </div>

    <?php
        // Veritabanı bağlantısını burada dahil edebilirsiniz
        include 'script.php';
    ?>
</body>
</html>
