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
                                $sql = "SELECT title, text_value FROM page_texts WHERE text_key = 'contact_description'";
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
                                <!-- Contact Form -->
                                <div class="row">
                                    <div class="col-lg-6 mb-5">
                                        <form id="contact-form" action="" method="POST" class="tm-contact-form">
                                            <?php
                                            include 'database.php'; // Veritabanı bağlantısı
                                            $sql = "SELECT * FROM contact_form LIMIT 1";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                
                                                echo '
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control rounded-0" placeholder="' . $row['name_label'] . '" required="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control rounded-0" placeholder="' . $row['email_label'] . '" required="" />
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" id="contact-select" name="subject">
                                                      <option value="-">' . $row['subject_label'] . '</option>
                                                      <option value="sales">Sales &amp; Marketing</option>
                                                      <option value="creative">Creative Design</option>
                                                      <option value="uiux">UI / UX</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea rows="8" name="message" class="form-control rounded-0" placeholder="' . $row['message_label'] . '"
                                                              required=""></textarea>
                                                </div>';
                                            }
                                            ?>

                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary rounded-0 d-block ml-auto mr-0 tm-btn-animate tm-btn-submit tm-icon-submit"><span>Submit</span></button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Map from Database -->
                                    <div class="col-lg-6">
                                        <?php
                                        // Haritayı veritabanından çekiyoruz
                                        $sql = "SELECT image_url FROM images WHERE image_key = 'gmap_canvas'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            echo '<iframe width="100%" height="520" id="gmap_canvas" src="' . $row["image_url"] . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>';
                                        }
                                        ?>
                                    </div>
                                </div>  
							</div>							
						</div>						
					</div>
                    <div class="parallax-window parallax-window-2" data-parallax="scroll" data-image-src="img/contact-2.jpg"></div>

                    <!-- Testimonials Section -->
                    <div class="mx-auto tm-content-container mt-4 px-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="tm-page-title mb-5 tm-text-primary">Testimonials</h2>    
                            </div>                        
                        </div>
                        <div class="row">
                            <?php
                            // Testimonials'ı veritabanından çekiyoruz
                            $sql = "SELECT image_url, text FROM testimonials";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <div class="col-lg-6 mb-5 pt-3">
                                        <div class="media tm-testimonial">
                                            <img class="mr-4 rounded-circle img-fluid" src="' . $row["image_url"] . '" alt="Testimonial image">
                                            <p class="media-body pt-3 tm-testimonial-text">' . $row["text"] . '</p>                              
                                        </div>              
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
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
