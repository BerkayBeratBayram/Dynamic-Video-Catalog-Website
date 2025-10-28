<?php
include 'database.php'; // Veritabanı bağlantısını sağlayan dosyayı buraya ekle
session_start();

?>


<div class="potition-absolute tm-site-header">
                <div class="container-fluid position-relative">
                    <div class="row">                        
                        <div class="col-7 col-md-4">
                            <a href="index.php" class="tm-bg-black text-center tm-logo-container">
                                <i class="fas fa-video tm-site-logo mb-3"></i>
                                <h1 class="tm-site-name">Video Catalog</h1>
                            </a>
                        </div>
                        <div class="col-5 col-md-8 ml-auto mr-0">
                            <div class="tm-site-nav">
                                <nav class="navbar navbar-expand-lg mr-0 ml-auto" id="tm-main-nav">
                                    <button class="navbar-toggler tm-bg-black py-2 px-3 mr-0 ml-auto collapsed" type="button"
                                        data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbar-nav"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span>
                                            <i class="fas fa-bars tm-menu-closed-icon"></i>
                                            <i class="fas fa-times tm-menu-opened-icon"></i>
                                        </span>
                                    </button>
                                    <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                                        <ul class="navbar-nav text-uppercase">
                                            <?php

                                            // Veritabanından menü linklerini çekiyoruz
                                            $sql = "SELECT * FROM menu_links";
                                            $menu_result = $conn->query($sql);

                                            if ($menu_result->num_rows > 0) {
                                                while ($menu = $menu_result->fetch_assoc()) {
                                                    // Aktif sayfa için class ekleme
                                                    $activeClass = ($_SERVER['PHP_SELF'] == '/' . $menu['url']) ? 'active' : ''; 
                                                    echo '<li class="nav-item ' . $activeClass . '">
                                                            <a class="nav-link tm-nav-link" href="' . $menu["url"] . '">' . $menu["name"] . '</a>
                                                          </li>';
                                                }
                                            } else {
                                                echo '<li class="nav-item">Menü bulunamadı</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
