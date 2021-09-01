-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 07:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ali2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_details`
--

CREATE TABLE `about_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_details`
--

INSERT INTO `about_details` (`id`, `title_ar`, `title_en`, `text_ar`, `text_en`, `icon`, `created_at`, `updated_at`) VALUES
(10, 'رؤيتنا', 'Our Hope', '<p>رؤﻳﺘﻨﺎ أن يكون ﻣـﺴــﺘـﺸــﻔـﻰ ﻋﻠﻲ ﺑــﻦ ﻋﻠﻲ اﻟﻤـﻜــﺎن اﻷﻓـﻀـــﻞ ﻟﻠﺤـﺼـــﻮل ﻋـﻠـﻰ اﻟـﺮﻋـﺎﻳـﺔ, وﻣـﻤـﺎرﺳــﺔ ﻣـﻬـﻨـﺔ اﻟـﻄـﺐ , وأن ﺗـﻜــﻮن ﻫـﻲ اﻟﻤﻜﺎن اﻷﻓﻀﻞ ﻟﻠﻌﻤﻞ</p>', '<p>Our vision is that Ali Bin Ali Hospital is the best place to get care and practice medicine, and to be the best place to work.</p>', 'fa fa-eye', '2021-07-29 09:23:34', '2021-07-29 09:23:34'),
(11, 'الرسالة الجديدة', 'Our Message', '<p>رﺳـﺎﻟﺘﻨﺎ ﻓﻲ ﻣـﺴﺘـﺸـﻔﻰ ﻋﻠﻲ ﺑـﻦ ﻋﻠﻲ هي التفوق ﻓﻲ ﺗﻮﻓﻴﺮ ﻛﺎﻓﺔ اﺣﺘﻴﺎﺟﺎت اﻟـﺮﻋﺎﻳﺔ الصحية ﻓـﻲ ﻋﺎﺻﻤﺘﻨﺎ ﻣﻦ ﺧـﻼل ﺗـﻮﻓﻴﺮ اﻟﺠـﻮدة واﻟﻜـﻔﺎءة والعـناية الـمركزة لـمرضانا</p>', '<p>Our mission at Ali Bin Ali Hospital is to excel in providing all healthcare needs in our capital by providing quality, efficiency and intensive care to our patients.</p>', 'fab fa-cc-stripe', '2021-07-29 09:26:22', '2021-07-29 19:32:46'),
(12, 'قيمنا', 'Our Value', '<ul><li>الطموح</li><li>الأمان</li><li>المسؤولية</li><li>التعليم</li><li>البراعة</li><li>الولاء</li><li>النزاهه</li><li>المبادرة</li></ul>', '<ul><li>Ambition</li><li>Safety</li><li>Responsibility</li><li>Education</li><li>Ingenuity</li><li>Loyalty</li><li>Integrity</li><li>Initiative</li></ul>', 'fa fa-shopping-bag', '2021-07-29 09:28:29', '2021-07-29 09:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `about_infos`
--

CREATE TABLE `about_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text1_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_infos`
--

INSERT INTO `about_infos` (`id`, `text1_ar`, `text1_en`, `text2_ar`, `text2_en`, `title_ar`, `title_en`, `content_ar`, `content_en`, `created_at`, `updated_at`) VALUES
(1, 'تعد المستشفى واحدة من أكبر مقدمي الخدمات الطبية والرعاية السريرية المتميزة بالرياض , مع توافر أحدث الأجهزة الطبية الحديثة ووحدة القسطرة القلبية , وتقدم المستشفى خدماتها وفقآ لأحدث المعاييرالعلمية المتعارف عليها وتحت إشراف طاقمآ متميزآ من البروفيسرات والإس', 'The hospital is one of the largest providers of medical services and excellent clinical care in Riyadh, with the availability of the latest modern medical devices and a cardiac catheterization unit. Our reviewers, taking care of them and in line with thei', 'تقدم المستشفى خدماتها بقسم الطوارئ يوميآ وعلى مدار 24 ساعة , تحت إشراف نخبة من أكفأ الأطباء وفريق عمل من الممرضين والممرضات المتميزين والمدربين بعناية على كيفية التعامل مع الحالات الإسعافية والمرضية وبالسرعة الفائقـة', 'The hospital provides its services in the emergency department daily and 24 hours a day, under the supervision of a group of the most efficient doctors and a team of distinguished and carefully trained nurses on how to deal with emergency and sick cases w', 'تصميم المستشفي', 'hospital design', 'يعتبر المستشفى واحداً من المنظومات الصحية الداعمة لتقديم رعاية صحية عالية الجودة وبمساندة أحدث التقنيات الحديثة\r\n\r\nتبلغ الطاقة الاستيعابية للمستشفى 100سرير وتشتمل الخدمات على الأقسام التنويمية، وخدمات العيادات الخارجية، والأشعة والمختبر، والعلاج الطبيعي،', 'يعتبر المستشفى واحداً من المنظومات الصحية الداعمة لتقديم رعاية صحية عالية الجودة وبمساندة أحدث التقنيات الحديثة\r\n\r\nتبلغ الطاقة الاستيعابية للمستشفى 100سرير وتشتمل الخدمات على الأقسام التنويمية، وخدمات العيادات الخارجية، والأشعة والمختبر، والعلاج الطبيعي،', NULL, '2021-07-31 07:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `about_sliders`
--

CREATE TABLE `about_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title_ar`, `title_en`, `text_ar`, `text_en`, `job_ar`, `job_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'وليد بن علي ين محمد', 'Walid bin Ali yen Muhammad', 'اﻟـﻮﻗـﺎﺋـﻴـﺔ واﻟـﺘـﺄﻫـﻴـﻠـﻴـﺔ ﺑـﺄﻋـﻠـﻰ ﻣﺴــــﺘـﻮﻳـﺎﺗـﻬـﺎ ﺑـﺠـﻨـﻮب اﻟﻌـﺎﺻـﻤﺔ اﻟﺴــﻌﻮدﻳﺔ اﻟﺮﻳﺎض . إن ﻧــﺒــﺾ اﻟـﺤـﻴـﺎة ﻫـﻮ ﺷـــﻌـﺎرﻧـﺎ اﻟــﺬي أﺻــﺒــﺢ إﻟـﺰاﻣــﺎ وﺑــﻜــﻞ ﻣــﻬــﺎرة وإﺗــﻘــﺎن واﺣـــﺘــﺮام ﻟـﺠــﻤــﻴــﻊ ﻋـﻤـﻼﺋــﻨــﺎ ﻣــﻦ اﻟـﻤـﺮاﺟــﻌــﻴــﻦ واﻟـ', 'Preventive and rehabilitative at its highest levels in the south of the Saudi capital, Riyadh. The pulse of life is our motto, which has become binding and with all the skill and mastery and respect for all of our customers and employees of the reviewers', 'الرئيس التنفيذي', 'Chief Executive Officer', 'uploads/about_us/a.jpg', NULL, '2021-07-30 14:22:31'),
(101, 'الشيخ علي بن علي', 'Sheikh Ali bin Ali', 'إﻧﻨﺎ ﻣﺘﻄﻠﻌﻮن ﻟﻠﻮﺻﻮل إﻟﻰ أرﻗﻰ اﻟﻤﺴﺘﻮﻳﺎت اﻟﻄﺒﻴﺔ ﻣـﻊ ﺗﻄﺒﻴﻖ أﻓﻀﻞ اﻟﻤﻮاﺻﻔﺎت واﻟﻤﻘﺎﻳﻴـﺲ اﻟﻌﺎﻟﻤـﻴـﺔ ، وذﻟﻚ ﻣـﻦ ﺧـﻼل إﺳــﺘـﻘﻄـﺎب اﻟﻜﻔـﺎءات واﻟﺨـﺒـﺮات اﻟﻄـﺒﻴـﺔ اﻟﻤـﺘـﻤـﻴـﺰة ذات اﻟـﻤـﺆﻫـﻞ العالي ﻓـﻲ ﻣﻌـﻈـﻢ اﻟﺘﺨﺼـﺼـﺎت . إن ﻣﻨﻈﻮﻣﺔ ﻣـﺴـﺘﺸـﻔﻰ ﻋﻠﻲ ﺑﻦ ﻋﻠﻲ وﻣﻦ ﺧﻼل رؤﻳﺘﻬﺎ ', 'Preventive and rehabilitative at its highest levels in the south of the Saudi capital, Riyadh. The pulse of life is our motto, which has become binding and with all the skill and mastery and respect for all of our customers and employees of the reviewers ', 'رئيس مجلس الادارة', 'Chairman of Board of Directors', 'uploads/about_us/p15.jpg', NULL, NULL),
(103, 'الشيخ خالد أل فهد', 'Elshiekh Khaled AL-FAHD', 'نص عربي جديد', 'english text', 'مدير عام', 'General Maneger', 'uploads/about_us/1627660365.jpg', '2021-07-30 13:00:43', '2021-07-30 13:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','doctor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `clinic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `min_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `phone`, `type`, `name_ar`, `name_en`, `category_ar`, `category_en`, `image`, `country_id`, `clinic_id`, `min_age`, `max_age`, `created_at`, `updated_at`) VALUES
(15, 'admin@admin.com', '$2y$10$6rlvRvrxWQrc1iF.eS0cLuo1rAMwSX3ohC45b//0e.YHj4ovvcg3S', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'doctor@doctor.com', '$2y$10$6rlvRvrxWQrc1iF.eS0cLuo1rAMwSX3ohC45b//0e.YHj4ovvcg3S', '01098380509', 'doctor', 'محمد منصور', 'Mohamed Mansour', 'استشاري', 'Consultant ', 'uploads/doctors/doctor1.png', NULL, NULL, '10', '60', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apply_orders`
--

CREATE TABLE `apply_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`id`, `image`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(11, 'uploads/clinic/1627726149.jpg', 'انف واذن وحنجرة', 'Nose & Eyes', '2021-07-31 07:54:05', '2021-07-31 08:11:00'),
(12, 'uploads/clinic/1627726211.jpg', 'امراض القلب', 'Heart Attack', '2021-07-31 08:10:11', '2021-07-31 08:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'محمد احمد', 'mohamed@gmail.com', '01098380454', 'يرجي تطوير المستشفي', '2021-07-20 12:39:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 'Egypt', 'uploads/flags/Egypt.png', NULL, NULL),
(2, 'السعودية', 'SAUDI-', 'uploads/Countries/1627743494.jpg', '2021-07-31 12:58:14', '2021-07-31 12:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_dates`
--

CREATE TABLE `doctor_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_reserved` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_hours`
--

CREATE TABLE `doctor_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_reserved` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'uploads/doctors/doctor1.png', NULL, NULL),
(2, 'uploads/doctors/doctor2.png', NULL, NULL),
(3, 'uploads/doctors/doctor2.png', NULL, NULL),
(4, 'uploads/doctors/doctor2.png', NULL, NULL),
(5, 'uploads/doctors/doctor2.png', NULL, NULL),
(6, 'uploads/doctors/doctor2.png', NULL, NULL),
(7, 'uploads/doctors/doctor2.png', NULL, NULL),
(8, 'uploads/doctors/doctor2.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

CREATE TABLE `join_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_us`
--

INSERT INTO `join_us` (`id`, `title_ar`, `title_en`, `text_ar`, `text_en`, `created_at`, `updated_at`) VALUES
(1, 'فرصنا الحالية', 'Our Jobs view', 'نحن في مستشفى علي بن علي لدينا بيئة عمل مليئة بالتحديات والتحفيز والتي تتيح مجالًا كبيرًا للنمو والتطوير الوظيفي. نخلق ثقافة عمل موصلة تجذب الأفراد الموهوبين والملتزمين وتحافظ عليهم وتساعدهم على النمو. نحن نشجع التعلم مدى الحياة ونقدم أفضل رعاية لعملائنا ونسعى جاهدين لإنشاء منصة عالمية المستوى لرعاية محترفي الغد.', 'We have a  very good environment', NULL, '2021-07-28 06:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `join_us_details`
--

CREATE TABLE `join_us_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_us_details`
--

INSERT INTO `join_us_details` (`id`, `title_ar`, `title_en`, `category_ar`, `category_en`, `address_ar`, `address_en`, `content_ar`, `content_en`, `date`, `created_at`, `updated_at`) VALUES
(4, 'ممرض', 'nurse', 'اول', 'first', 'المستشفي', 'hospital', 'راتب يبدأ من 2000 ريال', 'salary starts with 2000 RE', NULL, '2021-07-28 08:25:20', '2021-07-28 11:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_14_095359_create_sliders_table', 1),
(2, '2021_07_14_095732_create_settings_table', 1),
(3, '2021_07_26_143130_create_second_sections_table', 1),
(4, '2021_07_26_143209_create_images_table', 1),
(5, '2021_07_26_143220_create_videos_table', 1),
(6, '2021_07_26_143233_create_news_table', 1),
(7, '2021_07_26_143250_create_about_infos_table', 1),
(8, '2021_07_26_143302_create_counters_table', 1),
(9, '2021_07_26_143310_create_about_us_table', 1),
(10, '2021_07_26_143323_create_contacts_table', 1),
(11, '2021_07_26_143333_create_about_details_table', 1),
(12, '2021_07_26_143349_create_clinics_table', 1),
(13, '2021_07_26_143404_create_countries_table', 1),
(14, '2021_07_26_143416_create_admins_table', 1),
(15, '2021_07_26_143540_create_about_sliders_table', 1),
(16, '2021_07_26_143550_create_cvs_table', 1),
(17, '2021_07_26_143606_create_doctor_dates_table', 1),
(18, '2021_07_26_143617_create_doctor_hours_table', 1),
(19, '2021_07_26_143620_create_diseases_table', 1),
(20, '2021_07_26_143631_create_reservations_table', 1),
(21, '2021_07_26_143645_create_join_us_table', 1),
(22, '2021_07_26_143842_create_join_us_details_table', 1),
(23, '2021_07_26_143906_create_apply_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `title_ar`, `title_en`, `content_ar`, `content_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'يوليو', 'ads', 'asdasd', 'asdasdasdasd', 'asdasd', '1627742853.jpg', '2021-07-31 12:47:33', '2021-07-31 12:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hour_id` bigint(20) UNSIGNED DEFAULT NULL,
  `disease_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','accepted','refused') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `second_sections`
--

CREATE TABLE `second_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `second_sections`
--

INSERT INTO `second_sections` (`id`, `title_ar`, `title_en`, `content_ar`, `content_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'نص عربي', 'english title new', 'محتوي عربي', 'English content', 'uploads/second_section/1627399186.jpg', NULL, '2021-07-27 13:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone1`, `phone2`, `facebook`, `twitter`, `insta`, `linkedin`, `address_ar`, `address_en`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'ahmed@gmail.com', '01098380656', '01005295332', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://www.linkedin.com', 'الرياض', 'El-Reyad', '23.3735562', '40.8695936', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'uploads/slider/1627381896.jpg', '2021-07-27 08:31:36', '2021-07-27 08:31:36'),
(3, 'uploads/slider/1627571286.jpg', '2021-07-29 13:08:06', '2021-07-29 13:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone_code` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone_code`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ahmed samir', '20', '1234567891', '$2y$10$vD.Ej5p0XIYZOzGBXib9c.Rj2jU5Ey7OnK8UquhEHU6zxVp0whTYq', '2021-07-31 12:22:40', '2021-07-31 12:22:40'),
(2, NULL, NULL, NULL, '$2y$10$paMuhnpZK7WuMAkZN/KplOhF55pfVvlaxFKtxdPgHN0aI2DGFmBJG', '2021-07-31 12:53:21', '2021-07-31 12:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'asad', 'asdasd', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_details`
--
ALTER TABLE `about_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_infos`
--
ALTER TABLE `about_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_sliders`
--
ALTER TABLE `about_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_country_id_foreign` (`country_id`),
  ADD KEY `admins_clinic_id_foreign` (`clinic_id`);

--
-- Indexes for table `apply_orders`
--
ALTER TABLE `apply_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apply_orders_details_id_foreign` (`details_id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cvs_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_dates`
--
ALTER TABLE `doctor_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_dates_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctor_hours`
--
ALTER TABLE `doctor_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_hours_date_id_foreign` (`date_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_us`
--
ALTER TABLE `join_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_us_details`
--
ALTER TABLE `join_us_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_doctor_id_foreign` (`doctor_id`),
  ADD KEY `reservations_date_id_foreign` (`date_id`),
  ADD KEY `reservations_hour_id_foreign` (`hour_id`),
  ADD KEY `reservations_disease_id_foreign` (`disease_id`);

--
-- Indexes for table `second_sections`
--
ALTER TABLE `second_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_details`
--
ALTER TABLE `about_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `about_infos`
--
ALTER TABLE `about_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_sliders`
--
ALTER TABLE `about_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `apply_orders`
--
ALTER TABLE `apply_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_dates`
--
ALTER TABLE `doctor_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_hours`
--
ALTER TABLE `doctor_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `join_us`
--
ALTER TABLE `join_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `join_us_details`
--
ALTER TABLE `join_us_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `second_sections`
--
ALTER TABLE `second_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `apply_orders`
--
ALTER TABLE `apply_orders`
  ADD CONSTRAINT `apply_orders_details_id_foreign` FOREIGN KEY (`details_id`) REFERENCES `join_us_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cvs`
--
ALTER TABLE `cvs`
  ADD CONSTRAINT `cvs_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_dates`
--
ALTER TABLE `doctor_dates`
  ADD CONSTRAINT `doctor_dates_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_hours`
--
ALTER TABLE `doctor_hours`
  ADD CONSTRAINT `doctor_hours_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `doctor_dates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `doctor_dates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_hour_id_foreign` FOREIGN KEY (`hour_id`) REFERENCES `doctor_hours` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
