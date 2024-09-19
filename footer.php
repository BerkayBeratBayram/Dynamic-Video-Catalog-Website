<div class="container-fluid tm-content-container mx-auto pt-5">
            <!-- Subscribe form and footer links -->
            <div class="row mt-5 pt-3">
                <div class="col-xl-6 col-lg-12 mb-4">
                    <div class="tm-bg-gray p-5 h-100">
                        <?php
                        $sql = "SELECT * FROM updates WHERE id = 1"; // Updates bölümünden çekiyoruz
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo '<h3 class="tm-text-primary mb-3">' . $row["title"] . '</h3>';
                            echo '<p class="mb-5">' . $row["message"] . '</p>';
                        }
                        ?>
                        <form action="" method="GET" class="tm-subscribe-form">
                            <input type="text" name="email" placeholder="Your Email..." required>
                            <button type="submit" class="btn rounded-0 btn-primary tm-btn-small">Subscribe</button>
                        </form>
                    </div>
                </div>

                <!-- Quick Links Veritabanından Çek -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="p-5 tm-bg-gray">
                        <h3 class="tm-text-primary mb-4">Quick Links</h3>
                        <ul class="list-unstyled tm-footer-links">
                            <?php
                            $sql = "SELECT * FROM quick_links";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li><a href="' . $row["url"] . '">' . $row["name"] . '</a></li>';
                                }
                            }
                            ?>
                        </ul>    
                    </div>                        
                </div>

                <!-- Our Pages Veritabanından Çek -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="p-5 tm-bg-gray h-100">
                        <h3 class="tm-text-primary mb-4">Our Pages</h3>
                        <ul class="list-unstyled tm-footer-links">
                            <?php
                            $sql = "SELECT * FROM our_pages";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li><a href="' . $row["url"] . '">' . $row["name"] . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>                        
                </div>
            </div> <!-- row -->

            <footer class="row pt-5">
                <div class="col-12">
                    <p class="text-right">Copyright 2020 The Video Catalog Company - Designed by <a href="https://templatemo.com" rel="nofollow" target="_parent">TemplateMo</a></p>
                </div>
            </footer>
        </div>        
    </div>

</body>
</html>
