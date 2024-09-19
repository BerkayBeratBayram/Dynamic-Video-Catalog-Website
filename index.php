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
<?php

    // Eğer giriş başarılıysa, başarı mesajını göster
    if (isset($_SESSION['login_success'])) {
        echo '<div class="alert alert-success" role="alert">';
        echo $_SESSION['login_success'];
        echo '</div>';

        // Mesajı bir defa göstermek için session'dan kaldırıyoruz
        unset($_SESSION['login_success']);
    }
?>

            <!-- Veritabanından çekilen metin -->
            <div class="tm-welcome-container tm-fixed-header tm-fixed-header-1">
                <div class="text-center">
                    <?php
                    $sql = "SELECT title_value FROM page_texts WHERE text_key = 'background_message'";
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

            <!-- Arka planda video -->
            <div id="tm-video-container">
                <video autoplay muted loop id="tm-video">
                    <source src="video/wheat-field.mp4" type="video/mp4">
                    Tarayıcınız bu videoyu desteklemiyor.
                </video>    
            </div>
        </div>

        <!-- Sayfa içeriği -->
        <div class="container-fluid">
            <div class="mx-auto tm-content-container">
                <main>
                    <div class="row">
                        <div class="col-12">

                        <div class="row">
    <div class="col-12">
        <?php
        // Veritabanından 'background_message' başlığını çekiyoruz
        $sql = "SELECT title FROM page_texts WHERE text_key = 'background_message'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<h2 class="tm-page-title mb-4">' . $row['title'] . '</h2>';
        } else {
            echo '<h2 class="tm-page-title mb-4">Our Vidseo Catalog</h2>';
        }
        ?>
    </div>
</div>

                    </div>
                    </div>

                    <!-- Kategorileri Veritabanından Çek -->
                    <div class="row">
                        <div class="col-12">
                            <div class="tm-categories-container mb-5">
                                <h3 class="tm-text-primary tm-categories-text">Categories:</h3>
                                <ul class="nav tm-category-list">
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $categories_result = $conn->query($sql);

                                    if ($categories_result->num_rows > 0) {
                                        while ($category = $categories_result->fetch_assoc()) {
                                            echo '<li class="nav-item tm-category-item">
                                                    <a href="index.php?category_id=' . $category["id"] . '" class="nav-link tm-category-link">' . $category["name"] . '</a>
                                                  </li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Videoları Veritabanından Çek -->
                    <div class="row mb-5 pb-5">
                        <div class="col-12">
                            <div class="row tm-catalog-item-list">
                                <?php
                                // Kategoriye göre filtrele
                                $category_filter = "";
                                if (isset($_GET['category_id'])) {
                                    $category_id = intval($_GET['category_id']);
                                    $category_filter = " WHERE category_id = $category_id";
                                }

                                // Videoları veritabanından çek
                                $sql = "SELECT * FROM videos" . $category_filter;
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '
                                        <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
                                            <div class="position-relative tm-thumbnail-container">
                                                <img src="' . $row["thumbnail"] . '" alt="Image" class="img-fluid tm-catalog-item-img">    
                                                <a href="video-page.php?id=' . $row["id"] . '" class="position-absolute tm-img-overlay">
                                                    <i class="fas fa-play tm-overlay-icon"></i>
                                                </a>
                                            </div>
                                            <div class="p-4 tm-bg-gray tm-catalog-item-description">
                                                <h3 class="tm-text-gray mb-3 tm-catalog-item-title">' . $row["title"] . '</h3>
                                                <p class="tm-catalog-item-text">' . $row["description"] . '</p>
                                            </div>
                                        </div>';
                                    }
                                } else {
                                    echo "<p>Kategoriye ait video bulunamadı.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Sayfalama -->
                    <div>
                        <ul class="nav tm-paging-links">
                            <li class="nav-item active"><a href="#" class="nav-link tm-paging-link">1</a></li>
                            <li class="nav-item"><a href="#" class="nav-link tm-paging-link">2</a></li>
                            <li class="nav-item"><a href="#" class="nav-link tm-paging-link">3</a></li>
                            <li class="nav-item"><a href="#" class="nav-link tm-paging-link">4</a></li>
                            <li class="nav-item"><a href="#" class="nav-link tm-paging-link">></a></li>
                        </ul>
                    </div>
                </main>

                <!-- Diğer Veritabanı İçerikleri -->
                <?php
                // Veritabanı bağlantısını burada dahil edebilirsiniz
                include 'footer.php';
                ?>
            </div>
        </div>
    </div>
</body>
</html>
