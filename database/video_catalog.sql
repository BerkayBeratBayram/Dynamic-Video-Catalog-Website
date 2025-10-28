-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Eyl 2024, 17:47:53
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `video_catalog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about_icons`
--

CREATE TABLE `about_icons` (
  `id` int(11) NOT NULL,
  `icon_class` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `about_icons`
--

INSERT INTO `about_icons` (`id`, `icon_class`, `title`, `description`) VALUES
(1, 'fas fa-headphones', 'High-Quality Sound', 'Experience the best sound quality with our modern audio equipment.'),
(2, 'fas fa-broadcast-tower', 'Broadcast Anywhere', 'Stream live broadcasts from anywhere with our advanced transmission tools.'),
(3, 'fas fa-film', 'Professional Filming', 'Capture every moment with professional-grade film equipment.'),
(4, 'far fa-map', 'Detailed Mapping', 'Navigate easily with our detailed and precise maps.'),
(5, 'fas fa-rainbow', 'Stunning Visual Effects', 'Add vibrant colors and visual effects to enhance your videos.'),
(6, 'fas fa-cloud-sun-rain', 'Weather Monitoring', 'Monitor weather conditions in real-time, ensuring you are prepared for any situation.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'All'),
(2, 'Drone Shots'),
(3, 'Nature'),
(4, 'Actions'),
(5, 'Featured');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name_label` varchar(255) NOT NULL,
  `email_label` varchar(255) NOT NULL,
  `subject_label` varchar(100) NOT NULL,
  `message_label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `contact_form`
--

INSERT INTO `contact_form` (`id`, `name_label`, `email_label`, `subject_label`, `message_label`) VALUES
(1, 'Name', 'Email', 'Subject', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_key` varchar(255) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `image_key`, `image_url`) VALUES
(1, 'gmap_canvas', 'https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu_links`
--

CREATE TABLE `menu_links` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `menu_links`
--

INSERT INTO `menu_links` (`id`, `name`, `url`) VALUES
(1, 'Videos', 'index.php'),
(2, 'About', 'about.php'),
(3, 'Contact', 'contact.php'),
(4, 'Login', 'login.php'),
(5, 'Register', 'register.php'),
(6, 'Logout', 'index.php');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `our_pages`
--

CREATE TABLE `our_pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `our_pages`
--

INSERT INTO `our_pages` (`id`, `name`, `url`) VALUES
(1, 'Our Videos', '#'),
(2, 'License Terms', '#'),
(3, 'About Us', '#'),
(4, 'Contact', '#'),
(5, 'Privacy Policies', '#');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page_texts`
--

CREATE TABLE `page_texts` (
  `id` int(11) NOT NULL,
  `text_key` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text_value` text DEFAULT NULL,
  `title_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `page_texts`
--

INSERT INTO `page_texts` (`id`, `text_key`, `title`, `text_value`, `title_value`) VALUES
(1, 'background_message', 'Our Video Catalog\n', '\nBoş', 'Another Image BG\nit can be fixed.\nContent will simply slide over.\nThis is a full-width video banner.'),
(2, 'about_page_description\n', 'About the Video Catalog\n', 'Video Catalog is free HTML CSS template for your website. This Bootstrap v4.4.1 website template is 100% free download for everyone. You can modify and expand this template for your CMS websites. You can use it for commercial or non-commercial work. If you wish to support TemplateMo, please contact us.\n\nYou are not allowed to re-distribute the template ZIP file on any template collection website.\n\nVivamus sit amet justo sed erat iaculis consequat. Nulla suscipit posuere lectus ut venenatis. Proin sed orci eget tellus euismod vulputate eu eu arcu. Etiam a bibendum lorem. Curabitur ac bibendum odio. Vivamus euismod dui mauris, ut tincidunt mi congue quis.\n\nPhasellus luctus orci dolor, a luctus massa tincidunt vitae. Integer sit amet odio id libero tincidunt dignissim in eget arcu. Aliquam tristique ut magna sit amet tincidunt. Sed tempor tellus nulla, molestie luctus lectus tincidunt id. Cras duismod leo a urna placerat, vel blandit turpis fermentum.', 'Contact Another Image BG it can be fixed. Content will simply slide over.'),
(3, 'contact_description', 'Contact Our Team', 'Integer sit amet odio id libero tincidunt dignissim in eget arcu. Aliquam tristique ut magna sit amet tincidunt. Sed tempor tellus nulla, molestie luctus lectus tincidunt id. You are not allowed to re-distribute the template ZIP file on any template collection website.\r\n\r\nVideo Catalog is a free website template for your business. This is 100% free Bootstrap v4.4.1 layout. You can modify and adapt this template for your CMS websites. You can use it for commercial or non-commercial work. If you wish to suport TemplateMo, please contact us.', 'Talk to Us\n\nabout any question you have\n'),
(4, 'login_description', 'Login', NULL, NULL),
(5, 'register_description', 'Register', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quick_links`
--

CREATE TABLE `quick_links` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `quick_links`
--

INSERT INTO `quick_links` (`id`, `name`, `url`) VALUES
(1, 'Duis bibendum', '#'),
(2, 'Purus non dignissim', '#'),
(3, 'Sapien metus gravida', '#'),
(4, 'Eget consequat', '#'),
(5, 'Praesent eu pulvinar', '#');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `testimonials`
--

INSERT INTO `testimonials` (`id`, `image_url`, `text`) VALUES
(1, 'img/testimonial-1.jpg', 'Vestibulum non lectus id lacus aliquet porttitor in non nulla. Aenean urna diam, finibys id lorem nec, feugiat convallis dolor.'),
(2, 'img/testimonial-2.jpg', 'Maecenas et libero in eros laoreet finibus sed vitae diam. Etiam consetetur, nunc sed pretium elementum.'),
(3, 'img/testimonial-3.png', 'Aliquam tristique ut magna sit amet tincidunt. Sed tempor tellus nulla, molestie luctus lectus tincidunt id.'),
(4, 'img/testimonial-4.png', 'Nulla suscipit posuere lectus ut venenatis. Proin sed orci eget tellus euismod vulputate eu eu arcu.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `updates`
--

INSERT INTO `updates` (`id`, `title`, `message`) VALUES
(1, 'Do you want to get our latest updates?', 'Please subscribe to our newsletter for upcoming new videos and latest information about our work. Thank you.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Melih Yeter', 'melihyeter@gmail.com', '$2y$10$wgGLmtkbEkGfl4TveKH6I.kZPgMt9cXONWreN7JtZkfaDFjMLRP6G', '2024-09-18 13:50:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `category_id`, `thumbnail`) VALUES
(10, 'Drone Video 1', 'Bu bir drone videosudur.', 1, 'img/tn-01.jpg'),
(11, 'Nature Video 1', 'Bu bir doğa videosudur.', 2, 'img/tn-02.jpg'),
(12, 'Action Video 1', 'Bu bir aksiyon videosudur.', 3, 'img/tn-03.jpg'),
(13, 'Featured Video 1', 'Bu bir özel video.', 4, 'img/tn-04.jpg'),
(14, 'Ananas Video 1', 'Bu bir ananas videosudur.', 3, 'img/tn-05.jpg'),
(15, 'Çiçek Video 1', 'Bu bir aksiyon videosudur.', 5, 'img/tn-06.jpg'),
(16, 'At Yarışı Video 1', 'Bu bir at yarışı videosudur.', 4, 'img/tn-07.jpg'),
(17, 'Sinema Videosu 1', 'Bu bir at sinema filmi videosudur.\r\n\r\n', 2, 'img/tn-08.jpg'),
(18, 'Yüzme Videosu 1', 'Bu bir yüzme videosudur.', 4, 'img/tn-09.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about_icons`
--
ALTER TABLE `about_icons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `our_pages`
--
ALTER TABLE `our_pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `page_texts`
--
ALTER TABLE `page_texts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `quick_links`
--
ALTER TABLE `quick_links`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about_icons`
--
ALTER TABLE `about_icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `our_pages`
--
ALTER TABLE `our_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `page_texts`
--
ALTER TABLE `page_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `quick_links`
--
ALTER TABLE `quick_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
