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

            <!-- Veritabanından çekilen başlık -->
            <div class="tm-welcome-container tm-fixed-header tm-fixed-header-2">
                <div class="text-center">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            // Başlık 'background_message' text_key'ine göre çekiliyor
                            $sql = "SELECT title_value FROM page_texts WHERE text_key = 'about_page_description'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo '<h2 class="tm-page-title mb-4 text-white">' . $row['title_value'] . '</h2>';
                            } else {
                                echo '<h2 class="tm-page-title mb-4 text-white">Beceremedin</h2>';
                            }
                            ?>
                        </div>
                    </div>
                </div>                
            </div>

            <div id="tm-fixed-header-bg"></div> <!-- Header image -->
        </div>

        <!-- Sayfa içeriği -->
        <main>
            <div class="container-fluid px-0">
                <div class="mx-auto tm-content-container">                    
                    <div class="row mt-3 mb-5 pb-3">
                        <div class="col-12">
                            <div class="mx-auto tm-about-text-container px-3">
                            <?php
                                // about_page_description metnini veritabanından çekiyoruz
                                $sql = "SELECT title, text_value FROM page_texts WHERE text_key = 'about_page_description'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo '<h2 class="tm-page-title mb-4">' . $row['title'] . '</h2>';
                                    echo '<p class="mb-4">' . $row['text_value'] . '</p>';
                                } else {
                                    echo '<h2 class="tm-page-title mb-4">Beceremedin</h2>';
                                    echo '<p class="mb-4">Default description here...</p>';

                                }
                                ?>
                            </div>                            
                        </div>                        
                    </div>                    
                </div>

                <!-- Parallax image -->
                <div class="parallax-window" data-parallax="scroll" data-image-src="img/about-2.jpg"></div>

                <!-- Iconlu Kısımlar -->
                <div class="mx-auto tm-content-container mt-4 px-3">
                    <div class="row tm-catalog-item-list mb-4">
                        <?php
                        $sql = "SELECT * FROM about_icons";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
                                    <div class="tm-bg-gray p-4">
                                        <i class="' . $row["icon_class"] . ' fa-5x p-3 mb-4 tm-about-icon"></i>
                                        <h3 class="tm-text-primary mb-3">' . $row["title"] . '</h3>
                                        <p>' . $row["description"] . '</p>
                                    </div>                            
                                </div>';
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="parallax-window" data-parallax="scroll" data-image-src="img/about-3.jpg"></div>
            </div>
        </main>

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
